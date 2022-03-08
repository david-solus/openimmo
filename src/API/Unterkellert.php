<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Unterkellert
 * Ist das Objekt unterkellert? Optionen nicht kombinierbar
 *
 * @XmlRoot("unterkellert")
 */
class Unterkellert
{
    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see KELLER_* constants
     * @var string
     */
    protected $keller;

    /**
     */
    public const KELLER_JA = 'JA';

    /**
     */
    public const KELLER_NEIN = 'NEIN';

    /**
     */
    public const KELLER_TEIL = 'TEIL';

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
     * @param string $keller Shortcut setter for keller
     */
    public function __construct(string $keller = null)
    {
        $this->keller = $keller;
    }

    /**
     * @return string
     */
    public function getKeller(): ?string
    {
        return $this->keller;
    }

    /**
     * @param string $keller Setter for keller
     * @return Unterkellert
     */
    public function setKeller(?string $keller)
    {
        $this->keller = $keller;
        return $this;
    }
}
