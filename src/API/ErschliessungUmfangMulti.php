<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class ErschliessungUmfang
 * Detailbeschreibung der Massnahmen
 *
 * @XmlRoot("erschliessung_umfang")
 */
class ErschliessungUmfangMulti
{
    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("GAS")
     * @var bool
     */
    protected $gas;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("STROM")
     * @var bool
     */
    protected $strom;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("TK")
     * @var bool
     */
    protected $tk;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("WASSER")
     * @var bool
     */
    protected $wasser;

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
     * @param string $erschlAttr Shortcut setter for erschlAttr
     */
    public function __construct(bool $gas = null, bool $strom = null, bool $tk = null, bool $wasser = null)
    {
        $this->gas = $gas;
        $this->strom = $strom;
        $this->tk = $tk;
        $this->wasser = $wasser;
    }

    /**
     * @return bool
     */
    public function getWasser(): ?bool
    {
        return $this->wasser;
    }

    /**
     * @return bool
     */
    public function getGas(): ?bool
    {
        return $this->gas;
    }

    /**
     * @return bool
     */
    public function getStrom(): ?bool
    {
        return $this->strom;
    }

    /**
     * @return bool
     */
    public function getTK(): ?bool
    {
        return $this->tk;
    }

    /**
     * @param bool $wasser Setter for wasser
     * @return ErschliessungUmfang
     */
    public function setWasser(?bool $wasser)
    {
        $this->wasser = $wasser;
        return $this;
    }

    /**
     * @param bool $strom Setter for strom
     * @return ErschliessungUmfang
     */
    public function setStrom(?bool $strom)
    {
        $this->strom = $strom;
        return $this;
    }

    /**
     * @param bool $tk Setter for tk
     * @return ErschliessungUmfang
     */
    public function setTK(?bool $tk)
    {
        $this->tk = $tk;
        return $this;
    }

    /**
     * @param bool $gas Setter for gas
     * @return ErschliessungUmfang
     */
    public function setGas(?bool $gas)
    {
        $this->gas = $gas;
        return $this;
    }
}
