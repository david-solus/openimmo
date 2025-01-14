<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class EmailSonstige
 *
 * @XmlRoot("email_sonstige")
 */
class EmailSonstige
{
    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see EMAILART_* constants
     * @var string
     */
    protected $emailart;

    /**
     * @Inline
     * @Type("string")
     * @var string
     */
    protected $value;

    /**
     */
    public const EMAILART_EM_ZENTRALE = 'EM_ZENTRALE';

    /**
     */
    public const EMAILART_EM_DIREKT = 'EM_DIREKT';

    /**
     */
    public const EMAILART_EM_PRIVAT = 'EM_PRIVAT';

    /**
     */
    public const EMAILART_EM_SONSTIGE = 'EM_SONSTIGE';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @var string
     */
    protected $bemerkung;

    /**
     * @param string $emailart Shortcut setter for emailart
     * @param string $bemerkung Shortcut setter for bemerkung
     * @param string $value Shortcut setter for value
     */
    public function __construct(string $emailart = null, string $bemerkung = null, string $value = null)
    {
        $this->emailart = $emailart;
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
    public function getEmailart(): ?string
    {
        return $this->emailart;
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
     * @return EmailSonstige
     */
    public function setBemerkung(?string $bemerkung)
    {
        $this->bemerkung = $bemerkung;
        return $this;
    }

    /**
     * @param string $emailart Setter for emailart
     * @return EmailSonstige
     */
    public function setEmailart(?string $emailart)
    {
        $this->emailart = $emailart;
        return $this;
    }

    /**
     * @param string $value Setter for value
     * @return EmailSonstige
     */
    public function setValue(?string $value)
    {
        $this->value = $value;
        return $this;
    }
}
