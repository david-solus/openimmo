<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class AngeschlGastronomie
 * Welcher Art ist die angeschlossene Gastronomie, Optionen kombinierbar
 *
 * @XmlRoot("angeschl_gastronomie")
 */
class AngeschlGastronomie
{
    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("HOTELRESTAURANT")
     * @var bool
     */
    protected $hotelrestaurant;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("BAR")
     * @var bool
     */
    protected $bar;

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
     * @param bool $hotelrestaurant Shortcut setter for hotelrestaurant
     * @param bool $bar Shortcut setter for bar
     */
    public function __construct(bool $hotelrestaurant = null, bool $bar = null)
    {
        $this->hotelrestaurant = $hotelrestaurant;
        $this->bar = $bar;
    }

    /**
     * @return bool
     */
    public function getBar(): ?bool
    {
        return $this->bar;
    }

    /**
     * @return bool
     */
    public function getHotelrestaurant(): ?bool
    {
        return $this->hotelrestaurant;
    }

    /**
     * @param bool $bar Setter for bar
     * @return AngeschlGastronomie
     */
    public function setBar(?bool $bar)
    {
        $this->bar = $bar;
        return $this;
    }

    /**
     * @param bool $hotelrestaurant Setter for hotelrestaurant
     * @return AngeschlGastronomie
     */
    public function setHotelrestaurant(?bool $hotelrestaurant)
    {
        $this->hotelrestaurant = $hotelrestaurant;
        return $this;
    }
}
