<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Ausblick
 * Welcher Ausblick ist vorhanden, Optionen nicht kombinierbar
 *
 * @XmlRoot("ausblick")
 */
class Ausblick
{
    /**
     */
    public const BLICK_BERGE = 'BERGE';

    /**
     */
    public const BLICK_FERNE = 'FERNE';

    /**
     */
    public const BLICK_MEER = 'MEER';

    /**
     */
    public const BLICK_SEE = 'SEE';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see BLICK_* constants
     * @var string
     */
    protected $blick;

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
     * @param string $blick Shortcut setter for blick
     */
    public function __construct(string $blick = null)
    {
        $this->blick = $blick;
    }

    /**
     * @return string
     */
    public function getBlick(): ?string
    {
        return $this->blick;
    }

    /**
     * @param string $blick Setter for blick
     * @return Ausblick
     */
    public function setBlick(?string $blick)
    {
        $this->blick = $blick;
        return $this;
    }
}
