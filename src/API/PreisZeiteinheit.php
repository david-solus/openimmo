<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class PreisZeiteinheit
 * Zeiteinheit für die der Preis gilt, vorrangig bei Ferienobjekten
 *
 * @XmlRoot("preis_zeiteinheit")
 */
class PreisZeiteinheit
{
    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see ZEITEINHEIT_* constants
     * @var string
     */
    protected $zeiteinheit;

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
    public const ZEITEINHEIT_TAG = 'TAG';

    /**
     */
    public const ZEITEINHEIT_WOCHE = 'WOCHE';

    /**
     */
    public const ZEITEINHEIT_MONAT = 'MONAT';

    /**
     */
    public const ZEITEINHEIT_JAHR = 'JAHR';

    /**
     * @param string $zeiteinheit Shortcut setter for zeiteinheit
     */
    public function __construct(string $zeiteinheit = null)
    {
        $this->zeiteinheit = $zeiteinheit;
    }

    /**
     * @return string
     */
    public function getZeiteinheit(): ?string
    {
        return $this->zeiteinheit;
    }

    /**
     * @param string $zeiteinheit Setter for zeiteinheit
     * @return PreisZeiteinheit
     */
    public function setZeiteinheit(?string $zeiteinheit)
    {
        $this->zeiteinheit = $zeiteinheit;
        return $this;
    }
}
