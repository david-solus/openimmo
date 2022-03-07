<?php

namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Daten
 * Anhangdaten
 *
 * @XmlRoot("daten")
 */
class Daten
{
    /**
     * @Type("string")
     * @var string
     */
    protected $pfad;

    /**
     * @Type("string")
     * @var string
     */
    protected $anhanginhalt;

    /**
     * @param string $pfad Shortcut setter for pfad
     * @param string $anhanginhalt Shortcut setter for anhanginhalt
     */
    public function __construct(string $pfad = null, string $anhanginhalt = null)
    {
        $this->pfad = $pfad;
        $this->anhanginhalt = $anhanginhalt;
    }

    /**
     * @return string
     */
    public function getAnhanginhalt(): ?string
    {
        return $this->anhanginhalt;
    }

    /**
     * @return string
     */
    public function getPfad(): ?string
    {
        return $this->pfad;
    }

    /**
     * @param string $anhanginhalt Setter for anhanginhalt
     * @return Daten
     */
    public function setAnhanginhalt(?string $anhanginhalt)
    {
        $this->anhanginhalt = $anhanginhalt;
        return $this;
    }

    /**
     * @param string $pfad Setter for pfad
     * @return Daten
     */
    public function setPfad(?string $pfad)
    {
        $this->pfad = $pfad;
        return $this;
    }
}
