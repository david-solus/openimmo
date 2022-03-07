<?php

namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class TelSonstige
 *
 * @XmlRoot("tel_sonstige")
 */
class TelSonstige
{
    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see TELEFONART_* constants
     * @var string
     */
    protected $telefonart;

    /**
     * @Inline
     * @Type("string")
     * @var string
     */
    protected $value;

    /**
     */
    public const TELEFONART_TEL_ZENTRALE = 'TEL_ZENTRALE';

    /**
     */
    public const TELEFONART_TEL_DURCHW = 'TEL_DURCHW';

    /**
     */
    public const TELEFONART_TEL_PRIVAT = 'TEL_PRIVAT';

    /**
     */
    public const TELEFONART_TEL_HANDY = 'TEL_HANDY';

    /**
     */
    public const TELEFONART_TEL_FAX = 'TEL_FAX';

    /**
     */
    public const TELEFONART_TEL_SONSTIGE = 'TEL_SONSTIGE';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @var string
     */
    protected $bemerkung;

    /**
     * @param string $telefonart Shortcut setter for telefonart
     * @param string $bemerkung Shortcut setter for bemerkung
     * @param string $value Shortcut setter for value
     */
    public function __construct(string $telefonart = null, string $bemerkung = null, string $value = null)
    {
        $this->telefonart = $telefonart;
        $this->bemerkung = $bemerkung;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getBemerkung(): ?string
    {
        return $this->bemerkung;
    }

    /**
     * @return string
     */
    public function getTelefonart(): ?string
    {
        return $this->telefonart;
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $bemerkung Setter for bemerkung
     * @return TelSonstige
     */
    public function setBemerkung(?string $bemerkung)
    {
        $this->bemerkung = $bemerkung;
        return $this;
    }

    /**
     * @param string $telefonart Setter for telefonart
     * @return TelSonstige
     */
    public function setTelefonart(?string $telefonart)
    {
        $this->telefonart = $telefonart;
        return $this;
    }

    /**
     * @param string $value Setter for value
     * @return TelSonstige
     */
    public function setValue(?string $value)
    {
        $this->value = $value;
        return $this;
    }
}
