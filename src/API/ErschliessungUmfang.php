<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class ErschliessungUmfang
 * Detailbeschreibung der Massnahmen
 *
 * @XmlRoot("erschliessung_umfang")
 */
class ErschliessungUmfang
{
    /**
     */
    public const ERSCHL_ATTR_GAS = 'GAS';

    /**
     */
    public const ERSCHL_ATTR_STROM = 'STROM';

    /**
     */
    public const ERSCHL_ATTR_TK = 'TK';

    /**
     */
    public const ERSCHL_ATTR_WASSER = 'WASSER';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see ERSCHL_ATTR_* constants
     * @var string
     */
    protected $erschlAttr;

    /**
     * This value is needed because a class with only xml attributes
     * will result in using any next value as an xml value of this tag
     *
     * @Type("string")
     * @XmlValue
     * @var string
     */
    private $xmlEmptySpace = " ";
    
    /**
     * @param string $erschlAttr Shortcut setter for erschlAttr
     */
    public function __construct(string $erschlAttr = null)
    {
        $this->erschlAttr = $erschlAttr;
    }

    /**
     * @return string
     */
    public function getErschlAttr(): ?string
    {
        return $this->erschlAttr;
    }

    /**
     * @param string $erschlAttr Setter for erschlAttr
     * @return ErschliessungUmfang
     */
    public function setErschlAttr(?string $erschlAttr)
    {
        $this->erschlAttr = $erschlAttr;
        return $this;
    }
}
