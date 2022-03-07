<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Alter
 * Ist es ein Neu- oder Altbau, Optionen nicht kombinierbar
 *
 * @XmlRoot("alter")
 */
class Alter
{
    /**
     */
    public const ALTER_ATTR_ALTBAU = 'ALTBAU';

    /**
     */
    public const ALTER_ATTR_NEUBAU = 'NEUBAU';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see ALTER_ATTR_* constants
     * @var string
     */
    protected $alterAttr;

    /**
     * @param string $alterAttr Shortcut setter for alterAttr
     */
    public function __construct(string $alterAttr = null)
    {
        $this->alterAttr = $alterAttr;
    }

    /**
     * @return string
     */
    public function getAlterAttr(): ?string
    {
        return $this->alterAttr;
    }

    /**
     * @param string $alterAttr Setter for alterAttr
     * @return Alter
     */
    public function setAlterAttr(?string $alterAttr)
    {
        $this->alterAttr = $alterAttr;
        return $this;
    }
}
