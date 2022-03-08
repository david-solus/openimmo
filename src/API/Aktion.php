<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Aktion
 * Aktion für Objekt. Wenn nicht vorhanden, dann "ADD", als neu.
 *  Change= Update der Objektdaten, Delete = Löschen des Objektes
 *  Referenz= Die Möglichkeit Objekte in Portalen als Verkauft oder Archiv zu definieren.
 *
 * @XmlRoot("aktion")
 */
class Aktion
{
    /**
     */
    public const AKTIONART_CHANGE = 'CHANGE';

    /**
     */
    public const AKTIONART_DELETE = 'DELETE';

    /**
     */
    public const AKTIONART_REFERENZ = 'REFERENZ';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see AKTIONART_* constants
     * @var string
     */
    protected $aktionart;

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
     * @param string $aktionart Shortcut setter for aktionart
     */
    public function __construct(string $aktionart = null)
    {
        $this->aktionart = $aktionart;
    }

    /**
     * @return string
     */
    public function getAktionart(): ?string
    {
        return $this->aktionart;
    }

    /**
     * @param string $aktionart Setter for aktionart
     * @return Aktion
     */
    public function setAktionart(?string $aktionart)
    {
        $this->aktionart = $aktionart;
        return $this;
    }
}
