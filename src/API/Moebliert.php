<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Moebliert
 * Wie ist die Möblierung: Voll, Teil oder keine Aussage
 *
 * @XmlRoot("moebliert")
 */
class Moebliert
{
    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see MOEB_* constants
     * @var string
     */
    protected $moeb;

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
     */
    public const MOEB_VOLL = 'VOLL';

    /**
     */
    public const MOEB_TEIL = 'TEIL';

    /**
     * @param string $moeb Shortcut setter for moeb
     */
    public function __construct(string $moeb = null)
    {
        $this->moeb = $moeb;
    }

    /**
     * @return string
     */
    public function getMoeb(): ?string
    {
        return $this->moeb;
    }

    /**
     * @param string $moeb Setter for moeb
     * @return Moebliert
     */
    public function setMoeb(?string $moeb)
    {
        $this->moeb = $moeb;
        return $this;
    }
}
