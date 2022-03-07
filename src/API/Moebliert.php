<?php

namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

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
