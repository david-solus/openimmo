<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Parken
 * Objektart für diverse Parkplatz Angaben
 *
 * @XmlRoot("parken")
 */
class Parken
{
    /**
     */
    public const PARKEN_TYP_BOOTSLIEGEPLATZ = 'BOOTSLIEGEPLATZ';

    /**
     */
    public const PARKEN_TYP_CARPORT = 'CARPORT';

    /**
     */
    public const PARKEN_TYP_DOPPELGARAGE = 'DOPPELGARAGE';

    /**
     */
    public const PARKEN_TYP_DUPLEX = 'DUPLEX';

    /**
     */
    public const PARKEN_TYP_EINZELGARAGE = 'EINZELGARAGE';

    /**
     */
    public const PARKEN_TYP_PARKHAUS = 'PARKHAUS';

    /**
     */
    public const PARKEN_TYP_PARKPLATZ_STROM = 'PARKPLATZ_STROM';

    /**
     */
    public const PARKEN_TYP_STELLPLATZ = 'STELLPLATZ';

    /**
     */
    public const PARKEN_TYP_TIEFGARAGE = 'TIEFGARAGE';

    /**
     */
    public const PARKEN_TYP_TIEFGARAGENSTELLPLATZ = 'TIEFGARAGENSTELLPLATZ';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see PARKEN_TYP_* constants
     * @var string
     */
    protected $parkenTyp;

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
     * @param string $parkenTyp Shortcut setter for parkenTyp
     */
    public function __construct(string $parkenTyp = null)
    {
        $this->parkenTyp = $parkenTyp;
    }

    /**
     * @return string
     */
    public function getParkenTyp(): ?string
    {
        return $this->parkenTyp;
    }

    /**
     * @param string $parkenTyp Setter for parkenTyp
     * @return Parken
     */
    public function setParkenTyp(?string $parkenTyp)
    {
        $this->parkenTyp = $parkenTyp;
        return $this;
    }
}
