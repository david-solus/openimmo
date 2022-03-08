<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class HallenLagerProd
 * Objektart / Typ f. Hallen/Lager/Produktion
 *
 * @XmlRoot("hallen_lager_prod")
 */
class HallenLagerProd
{
    /**
     */
    public const HALLEN_TYP_FREIFLAECHEN = 'FREIFLAECHEN';

    /**
     */
    public const HALLEN_TYP_HALLE = 'HALLE';

    /**
     */
    public const HALLEN_TYP_HOCHREGALLAGER = 'HOCHREGALLAGER';

    /**
     */
    public const HALLEN_TYP_INDUSTRIEHALLE = 'INDUSTRIEHALLE';

    /**
     */
    public const HALLEN_TYP_KUEHLHAUS = 'KUEHLHAUS';

    /**
     */
    public const HALLEN_TYP_LAGER = 'LAGER';

    /**
     */
    public const HALLEN_TYP_LAGER_MIT_FREIFLAECHE = 'LAGER_MIT_FREIFLAECHE';

    /**
     */
    public const HALLEN_TYP_LAGERFLAECHEN = 'LAGERFLAECHEN';

    /**
     */
    public const HALLEN_TYP_PRODUKTION = 'PRODUKTION';

    /**
     */
    public const HALLEN_TYP_SERVICE = 'SERVICE';

    /**
     */
    public const HALLEN_TYP_SPEDITIONSLAGER = 'SPEDITIONSLAGER';

    /**
     */
    public const HALLEN_TYP_WERKSTATT = 'WERKSTATT';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see HALLEN_TYP_* constants
     * @var string
     */
    protected $hallenTyp;

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
     * @param string $hallenTyp Shortcut setter for hallenTyp
     */
    public function __construct(string $hallenTyp = null)
    {
        $this->hallenTyp = $hallenTyp;
    }

    /**
     * @return string
     */
    public function getHallenTyp(): ?string
    {
        return $this->hallenTyp;
    }

    /**
     * @param string $hallenTyp Setter for hallenTyp
     * @return HallenLagerProd
     */
    public function setHallenTyp(?string $hallenTyp)
    {
        $this->hallenTyp = $hallenTyp;
        return $this;
    }
}
