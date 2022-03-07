<?php

namespace REO\OpenImmo\Generator;

use GoetasWebservices\XML\XSDReader\Schema\Attribute\Attribute;
use GoetasWebservices\XML\XSDReader\Schema\Element\ElementItem;
use GoetasWebservices\XML\XSDReader\Schema\Element\ElementRef;
use GoetasWebservices\XML\XSDReader\Schema\Inheritance\Extension;
use GoetasWebservices\XML\XSDReader\Schema\Inheritance\Restriction;
use GoetasWebservices\XML\XSDReader\Schema\Item;
use GoetasWebservices\XML\XSDReader\Schema\Type\ComplexType;
use GoetasWebservices\XML\XSDReader\Schema\Type\ComplexTypeSimpleContent;
use GoetasWebservices\XML\XSDReader\Schema\Type\SimpleType;
use GoetasWebservices\XML\XSDReader\SchemaReader;
use gossi\codegen\generator\CodeFileGenerator;
use gossi\codegen\model\PhpClass;
use gossi\codegen\model\PhpMethod;
use gossi\codegen\model\PhpParameter;
use gossi\codegen\model\PhpProperty;
use gossi\docblock\tags\TagFactory;
use REO\OpenImmo\XSDReader\Schema\Type\ComplexTypeMixed;

/**
 * Class ApiGenerator
 */
class ApiGenerator
{
    /**
     * Maximum number of properties a class should have for generating
     * a constructor. Read: If a class has more than X properties, no constructor
     * method will be generated.
     */
    public const MAX_PROPERTIES_IN_CONSTRUCTOR = 6;

    /**
     * @var string
     */
    protected string $targetFolder = './src/API/';

    /**
     * @var array<bool>
     */
    protected array $generatorConfig = [
        'generateScalarTypeHints' => true,
        'generateNullableTypes'   => true,
        'generateReturnTypeHints' => true,
    ];

    /**
     * Additional elements may be referenced inside of MixedComplexTypes.
     * @var array
     */
    protected array $referencedInlineElements = [];

    /**
     * Generates the API classes.
     *
     * @param string $xsdFile file path
     * @param bool $wipeTargetFolder
     * @param ?string $targetFolder
     *
     * @throws \GoetasWebservices\XML\XSDReader\Exception\IOException
     * @throws \Exception
     */
    public function generateApiClasses(string $xsdFile, bool $wipeTargetFolder = true, ?string $targetFolder = null): void
    {
        $this->setTargetFolder($targetFolder);

        if ($wipeTargetFolder) {
            $this->wipeTargetFolder();
        }

        $reader                         = new SchemaReader();
        $schema                         = $reader->readFile($xsdFile);
        $this->referencedInlineElements = [];

        foreach ($schema->getElements() as $element) {
            if (! ($element->getType() instanceof SimpleType)) {
                $this->parseElementDef($element);
            }
        }
        foreach ($this->referencedInlineElements as $element) {
            $this->parseElementDef($element);
        }
    }

    /**
     * @param Item|ElementItem $element
     */
    private function parseElementDef($element): void
    {
        $className = TypeUtil::camelize($element->getName());

        $class = new PhpClass();
        $class
            ->setQualifiedName('REO\\OpenImmo\\API\\' . $className)
            ->setUseStatements([
                'XmlRoot' => 'JMS\Serializer\Annotation\XmlRoot',
                'Type'    => 'JMS\Serializer\Annotation\Type'
            ])
            ->setDescription('Class ' . $className . PHP_EOL . $element->getDoc())
            ->getDocblock()
            ->appendTag(TagFactory::create('XmlRoot("' . $element->getName() . '")'));

        /* @var $attributeFromXsd Attribute */
        foreach ($element->getType()->getAttributes() as $attributeFromXsd) {
            $this->parseAttribute($attributeFromXsd, $class);
        }

        if ($element->getType() instanceof ComplexTypeSimpleContent) {
            $this->addSimpleValue($element->getType()->getExtension(), $class);
        } elseif ($element->getType() instanceof ComplexTypeMixed) {
            // @see https://github.com/REO/openimmo/issues/3
            $this->addSimpleValue(null, $class);
        } else {
            /* @var ComplexType $complexType */
            foreach ($element->getType()->getElements() as $property) {
                $this->parseProperty($property, $class);
            }
        }

        if (count($element->getType()->getAttributes()) > 0) {
            $class->addUseStatement('JMS\Serializer\Annotation\XmlAttribute');
        }

        $classPropertyCount = $class->getPropertyNames()->size();
        $hasConstructor     = $class->hasMethod('__construct');
        if (! $hasConstructor && $classPropertyCount > 0 && $classPropertyCount <= self::MAX_PROPERTIES_IN_CONSTRUCTOR) {
            $this->generateConstructor($class);
        }

        $this->createPhpFile($class);
    }

    /**
     * @param Extension|null $extension
     * @param PhpClass $class
     */
    private function addSimpleValue(?Extension $extension, PhpClass $class): void
    {
        $propertyName  = 'value';
        $classProperty = PhpProperty::create($propertyName)->setVisibility(PhpProperty::VISIBILITY_PROTECTED);

        if (is_null($extension)) {
            $xsdType = 'string';
        } else {
            $xsdType = TypeUtil::extractTypeForPhp($extension->getBase());
        }

        $propertyType = TypeUtil::getValidPhpType($xsdType);
        $classProperty->setType($propertyType);
        $classProperty->getDocblock()->appendTag(TagFactory::create('Inline'));
        $classProperty->getDocblock()->appendTag(TagFactory::create('Type("' . TypeUtil::getTypeForSerializer($xsdType) . '")'));
        $class->addUseStatement('JMS\Serializer\Annotation\Type');

        $class->addUseStatement('JMS\Serializer\Annotation\Inline');
        $class->setProperty($classProperty);
        CodeGenUtil::generateGetterAndSetter($classProperty, $class);
    }

    /**
     * @param PhpClass $class
     *
     * @return void
     */
    private function generateConstructor(PhpClass $class): void
    {
        $constructor = PhpMethod::create('__construct');

        $constructorCode = [];
        foreach ($class->getPropertyNames() as $classPropertyName) {
            $type        = $class->getProperty($classPropertyName)->getType();
            $typeIsArray = substr($type, -2) === '[]';
            $type        = TypeUtil::getValidPhpType($type);
            $phpParam    = PhpParameter::create($classPropertyName)
                                       ->setType($typeIsArray ? 'array' : $type)
                                       ->setDescription('Shortcut setter for ' . $classPropertyName);
            if ($typeIsArray) {
                $phpParam->setExpression('[]');
            } else {
                if ($class->getProperty($classPropertyName)->getNullable()) {
                    $phpParam->setValue(null);
                } else {
                    $phpParam->setValue($class->getProperty($classPropertyName)->getValue());
                }
            }
            $constructor->addParameter($phpParam);
            $constructorCode[] = '$this->' . $classPropertyName . ' = $' . $classPropertyName . ';';
        }

        $constructor->setBody(implode(PHP_EOL, $constructorCode));
        $class->setMethod($constructor);
    }

    /**
     * @param ElementItem $property
     * @param PhpClass $class
     */
    private function parseProperty(ElementItem $property, PhpClass $class): void
    {
        $propertyName  = TypeUtil::camelize($property->getName(), true);
        $classProperty = PhpProperty::create($propertyName)->setVisibility(PhpProperty::VISIBILITY_PROTECTED);
        $xsdType  = $this->getPhpPropertyTypeFromXsdElement($property);

        // take min/max into account, as this may be an array instead
        if ($property->getMax() == -1) {
            $classProperty->getDocblock()->appendTag(TagFactory::create('XmlList(inline = true, entry = "' . $property->getName() . '")'));
            $class->addUseStatement('JMS\Serializer\Annotation\XmlList');
        }

        $phpType = TypeUtil::getValidPhpType($xsdType);
        $classProperty->setType($phpType);

        $serializerType = TypeUtil::getTypeForSerializer($xsdType);

        $classProperty->getDocblock()->appendTag(TagFactory::create('Type("' . $serializerType . '")'));
        $class->addUseStatement('JMS\Serializer\Annotation\Type');

        $nullable = $property->getMin() === 0;
        // if the property type is an object, it should be nullable
        if (strpos($serializerType, 'REO\\OpenImmo\\API\\') === 0 || '\DateTime' === $phpType) {
            $nullable = true;
        }
        if (!$nullable) {
            $defaultValue = TypeUtil::getDefaultValueForType($phpType);
            if ('[]' === substr($phpType, -2)) {
                $classProperty->setExpression($defaultValue);
            } else {
                $classProperty->setValue($defaultValue);
            }

            $classProperty->getDocblock()->appendTag(TagFactory::create('SkipWhenEmpty'));
            $class->addUseStatement('JMS\Serializer\Annotation\SkipWhenEmpty');
        }

        if ($property->getType()->getRestriction()) {
            $this->parseRestriction(
                $property->getType()->getRestriction(),
                $property->getName(),
                $class,
                $classProperty
            );
        }

        $class->setProperty($classProperty);
        CodeGenUtil::generateGetterAndSetter($classProperty, $class, true, $nullable);
    }

    /**
     * @param Item|ElementItem $property
     *
     * @return string
     */
    private function getPhpPropertyTypeFromXsdElement($property): string
    {
        if ($property instanceof ElementRef) {
            if ($property->getReferencedElement()->getType() instanceof SimpleType) {
                $propertyType = TypeUtil::extractTypeForPhp($property->getReferencedElement()->getType());
            } else {
                $propertyType = TypeUtil::camelize($property->getReferencedElement()->getName());
            }
        } else {
            if ($property->getType() instanceof ComplexType) {
                $this->referencedInlineElements[] = $property;
                $propertyType                     = TypeUtil::extractTypeForPhp($property->getType(), TypeUtil::camelize($property->getName(), true));
            } else {
                $propertyType = TypeUtil::extractTypeForPhp($property->getType());
            }
        }

        if (! ($property instanceof Attribute) && $property->getMax() == -1) {
            $propertyType .= '[]';
        }

        return $propertyType;
    }

    /**
     * @param Attribute $attribute
     * @param PhpClass $class
     */
    private function parseAttribute(Attribute $attribute, PhpClass $class): void
    {
        $propertyName  = TypeUtil::camelize(strtolower($attribute->getName()), true);
        $classProperty = PhpProperty::create($propertyName)->setVisibility(PhpProperty::VISIBILITY_PROTECTED);
        $xsdType       = TypeUtil::extractTypeForPhp($attribute->getType());
        $phpType       = TypeUtil::getValidPhpType($xsdType);
        $classProperty->getDocblock()->appendTag(TagFactory::create('Type("' . TypeUtil::getTypeForSerializer($xsdType) . '")'));
        $class->addUseStatement('JMS\Serializer\Annotation\Type');
        $nullable = true;

        $classProperty->setType($phpType);
        $classProperty->getDocblock()->appendTag(TagFactory::create('XmlAttribute'));

        // as the openimmo guys like to switch randomly between lowercase and uppercase, serialized names may differ from property names
        if (strtolower($attribute->getName()) != $attribute->getName()) {
            $classProperty->getDocblock()->appendTag(TagFactory::create('SerializedName("' . $attribute->getName() . '")'));
            $class->addUseStatement('JMS\Serializer\Annotation\SerializedName');
        }

        // on some very few places, there are comments in the xsd file
        if ($attribute->getUse() != '') {
            $classProperty->setDescription($attribute->getUse());
            if ($attribute->getUse() === 'required') {
                $nullable = false;
            }
        }

        $this->parseRestriction(
            $attribute->getType()->getRestriction(),
            $attribute->getName(),
            $class,
            $classProperty
        );

        $class->setProperty($classProperty);

        CodeGenUtil::generateGetterAndSetter($classProperty, $class, true, $nullable);
    }

    /**
     * @param Restriction $restriction
     * @param string $nameInXsd
     * @param PhpClass $class
     * @param PhpProperty $classProperty
     */
    private function parseRestriction(Restriction $restriction, string $nameInXsd, PhpClass $class, PhpProperty $classProperty): void
    {
        foreach ($restriction->getChecks() as $type => $options) {
            switch ($type) {

                case 'enumeration':
                    $constantPrefix = strtoupper($nameInXsd . '_');
                    foreach ($options as $possibleValue) {
                        $constantName = strtoupper($constantPrefix . str_replace([' ', '-'], '_', $possibleValue['value']));
                        $class->setConstant($constantName, $possibleValue['value']);
                    }
                    $classProperty->getDocblock()->appendTag(TagFactory::create('see', $constantPrefix . '* constants'));
                    break;

                case 'whiteSpace':
                    // do nothing. This is not a real restriction, it is just an empty block.
                    break;

                case 'minLength':
                    CodeGenUtil::addDescriptionPart($classProperty, 'Minimum length: ' . $options[0]['value']);
                    break;

                case 'minInclusive':
                    CodeGenUtil::addDescriptionPart($classProperty, 'Minimum value (inclusive): ' . $options[0]['value']);
                    break;

                case 'maxInclusive':
                    CodeGenUtil::addDescriptionPart($classProperty, 'Maximum value (inclusive): ' . $options[0]['value']);
                    break;

                case 'fractionDigits':
                    CodeGenUtil::addDescriptionPart($classProperty, 'Maximum precision: ' . $options[0]['value']);
                    break;

                default:
                    throw new \InvalidArgumentException(vsprintf('Type "%s" is not handled in %s->parseAttribute', [$type, __CLASS__]));

            }
        }
    }

    /**
     * Removes all files in the target folder.
     */
    private function wipeTargetFolder(): void
    {
        array_map('unlink', glob($this->getTargetFolder() . '/*.php'));
    }

    /**
     * @return array<bool>
     */
    public function getGeneratorConfig(): array
    {
        return $this->generatorConfig;
    }

    /**
     * @param array<bool> $generatorConfig
     */
    public function setGeneratorConfig(array $generatorConfig): void
    {
        $this->generatorConfig = $generatorConfig;
    }

    /**
     * @param PhpClass $class
     *
     * @return bool|int
     */
    private function createPhpFile(PhpClass $class)
    {
        $generator = new CodeFileGenerator($this->getGeneratorConfig());
        $code      = $generator->generate($class);

        return file_put_contents($this->getTargetFolder() . $class->getName() . '.php', $code);
    }

    /**
     * @return string
     */
    public function getTargetFolder(): string
    {
        return $this->targetFolder;
    }

    /**
     * @param string|null $targetFolder
     *
     * @throws \Exception
     */
    public function setTargetFolder(?string $targetFolder): void
    {
        if (! is_null($targetFolder)) {
            if (! (is_dir($targetFolder) && is_writable($targetFolder))) {
                throw new \Exception("Directory {$targetFolder} does not exist or is not writeable!");
            }
            $this->targetFolder = $targetFolder;
        }
    }
}
