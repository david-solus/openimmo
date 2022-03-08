<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class StpCarport
 *
 * @XmlRoot("stp_carport")
 */
class StpCarport
{
    /**
     * optional
     *
     * @Type("float")
     * @XmlAttribute
     * @var float
     */
    protected $stellplatzmiete;

    /**
     * optional
     *
     * @Type("float")
     * @XmlAttribute
     * @var float
     */
    protected $stellplatzkaufpreis;

    /**
     * optional
     *
     * @Type("int")
     * @XmlAttribute
     * @var int Minimum value (inclusive): -2147483648, Maximum value (inclusive): 2147483647
     */
    protected $anzahl;

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
     * @param float $stellplatzmiete Shortcut setter for stellplatzmiete
     * @param float $stellplatzkaufpreis Shortcut setter for stellplatzkaufpreis
     * @param int $anzahl Shortcut setter for anzahl
     */
    public function __construct(float $stellplatzmiete = null, float $stellplatzkaufpreis = null, int $anzahl = null)
    {
        $this->stellplatzmiete = $stellplatzmiete;
        $this->stellplatzkaufpreis = $stellplatzkaufpreis;
        $this->anzahl = $anzahl;
    }

    /**
     * @return int
     */
    public function getAnzahl(): ?int
    {
        return $this->anzahl;
    }

    /**
     * @return float
     */
    public function getStellplatzkaufpreis(): ?float
    {
        return $this->stellplatzkaufpreis;
    }

    /**
     * @return float
     */
    public function getStellplatzmiete(): ?float
    {
        return $this->stellplatzmiete;
    }

    /**
     * @param int $anzahl Setter for anzahl
     * @return StpCarport
     */
    public function setAnzahl(?int $anzahl)
    {
        $this->anzahl = $anzahl;
        return $this;
    }

    /**
     * @param float $stellplatzkaufpreis Setter for stellplatzkaufpreis
     * @return StpCarport
     */
    public function setStellplatzkaufpreis(?float $stellplatzkaufpreis)
    {
        $this->stellplatzkaufpreis = $stellplatzkaufpreis;
        return $this;
    }

    /**
     * @param float $stellplatzmiete Setter for stellplatzmiete
     * @return StpCarport
     */
    public function setStellplatzmiete(?float $stellplatzmiete)
    {
        $this->stellplatzmiete = $stellplatzmiete;
        return $this;
    }
}
