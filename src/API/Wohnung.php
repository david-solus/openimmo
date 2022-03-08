<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Wohnung
 * Objektart / Typ f. Wohnungen
 *
 * @XmlRoot("wohnung")
 */
class Wohnung
{
    /**
     */
    public const WOHNUNGTYP_APARTMENT = 'APARTMENT';

    /**
     */
    public const WOHNUNGTYP_ATTIKAWOHNUNG = 'ATTIKAWOHNUNG';

    /**
     */
    public const WOHNUNGTYP_DACHGESCHOSS = 'DACHGESCHOSS';

    /**
     */
    public const WOHNUNGTYP_ERDGESCHOSS = 'ERDGESCHOSS';

    /**
     */
    public const WOHNUNGTYP_ETAGE = 'ETAGE';

    /**
     */
    public const WOHNUNGTYP_FERIENWOHNUNG = 'FERIENWOHNUNG';

    /**
     */
    public const WOHNUNGTYP_GALERIE = 'GALERIE';

    /**
     */
    public const WOHNUNGTYP_KEINE_ANGABE = 'KEINE_ANGABE';

    /**
     */
    public const WOHNUNGTYP_LOFT_STUDIO_ATELIER = 'LOFT-STUDIO-ATELIER';

    /**
     */
    public const WOHNUNGTYP_MAISONETTE = 'MAISONETTE';

    /**
     */
    public const WOHNUNGTYP_PENTHOUSE = 'PENTHOUSE';

    /**
     */
    public const WOHNUNGTYP_ROHDACHBODEN = 'ROHDACHBODEN';

    /**
     */
    public const WOHNUNGTYP_SOUTERRAIN = 'SOUTERRAIN';

    /**
     */
    public const WOHNUNGTYP_TERRASSEN = 'TERRASSEN';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see WOHNUNGTYP_* constants
     * @var string
     */
    protected $wohnungtyp;

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
     * @param string $wohnungtyp Shortcut setter for wohnungtyp
     */
    public function __construct(string $wohnungtyp = null)
    {
        $this->wohnungtyp = $wohnungtyp;
    }

    /**
     * @return string
     */
    public function getWohnungtyp(): ?string
    {
        return $this->wohnungtyp;
    }

    /**
     * @param string $wohnungtyp Setter for wohnungtyp
     * @return Wohnung
     */
    public function setWohnungtyp(?string $wohnungtyp)
    {
        $this->wohnungtyp = $wohnungtyp;
        return $this;
    }
}
