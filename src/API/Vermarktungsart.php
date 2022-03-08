<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Vermarktungsart
 * Vermarktungsart, Optionen kombinierbar, Kauf + Miete
 *
 * @XmlRoot("vermarktungsart")
 */
class Vermarktungsart
{
    /**
     * required
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("KAUF")
     * @var bool
     */
    protected $kauf;

    /**
     * required
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("MIETE_PACHT")
     * @var bool
     */
    protected $mietePacht;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("ERBPACHT")
     * @var bool
     */
    protected $erbpacht;

    /**
     * optional
     *
     * @Type("bool")
     * @XmlAttribute
     * @SerializedName("LEASING")
     * @var bool
     */
    protected $leasing;

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
     * @param bool $kauf Shortcut setter for kauf
     * @param bool $mietePacht Shortcut setter for mietePacht
     * @param bool $erbpacht Shortcut setter for erbpacht
     * @param bool $leasing Shortcut setter for leasing
     */
    public function __construct(bool $kauf = null, bool $mietePacht = null, bool $erbpacht = null, bool $leasing = null)
    {
        $this->kauf = $kauf;
        $this->mietePacht = $mietePacht;
        $this->erbpacht = $erbpacht;
        $this->leasing = $leasing;
    }

    /**
     * @return bool
     */
    public function getErbpacht(): ?bool
    {
        return $this->erbpacht;
    }

    /**
     * @return bool
     */
    public function getKauf(): bool
    {
        return $this->kauf;
    }

    /**
     * @return bool
     */
    public function getLeasing(): ?bool
    {
        return $this->leasing;
    }

    /**
     * @return bool
     */
    public function getMietePacht(): bool
    {
        return $this->mietePacht;
    }

    /**
     * @param bool $erbpacht Setter for erbpacht
     * @return Vermarktungsart
     */
    public function setErbpacht(?bool $erbpacht)
    {
        $this->erbpacht = $erbpacht;
        return $this;
    }

    /**
     * @param bool $kauf Setter for kauf
     * @return Vermarktungsart
     */
    public function setKauf(bool $kauf)
    {
        $this->kauf = $kauf;
        return $this;
    }

    /**
     * @param bool $leasing Setter for leasing
     * @return Vermarktungsart
     */
    public function setLeasing(?bool $leasing)
    {
        $this->leasing = $leasing;
        return $this;
    }

    /**
     * @param bool $mietePacht Setter for mietePacht
     * @return Vermarktungsart
     */
    public function setMietePacht(bool $mietePacht)
    {
        $this->mietePacht = $mietePacht;
        return $this;
    }
}
