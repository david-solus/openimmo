<?php

namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Master
 * Frei wählbare alphanumerische Kennung um Objekte einem Übergeordneten Objekt zuzuordnen.
 * Das Eltern Objekte hat in "gruppen_kennung" die gleiche ID wie "master". Anwendung z.b. in Neubau Projekten.
 * Damit die Anzeige des Master Objektes gesteuert werden kann, wird im Master ein Flag
 *  visible eingesetzt. Das Attribut ist dann zwingend anzugeben
 *
 * @XmlRoot("master")
 */
class Master
{
    /**
     * required
     *
     * @Type("bool")
     * @XmlAttribute
     * @var bool
     */
    protected $visible;

    /**
     * @Inline
     * @Type("string")
     * @var string
     */
    protected $value;

    /**
     * @param bool $visible Shortcut setter for visible
     * @param string $value Shortcut setter for value
     */
    public function __construct(bool $visible = null, string $value = null)
    {
        $this->visible = $visible;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function getVisible(): bool
    {
        return $this->visible;
    }

    /**
     * @param string $value Setter for value
     * @return Master
     */
    public function setValue(?string $value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param bool $visible Setter for visible
     * @return Master
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
        return $this;
    }
}
