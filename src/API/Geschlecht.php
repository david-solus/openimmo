<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Geschlecht
 * Soll das Objekt nur an Frauen bzw. nur an Männer vermietet werden,
 *  fehlende Angabe wird als 'Ja' interpretiert
 *
 * @XmlRoot("geschlecht")
 */
class Geschlecht
{
    /**
     */
    public const GESCHL_ATTR_EGAL = 'EGAL';

    /**
     */
    public const GESCHL_ATTR_NUR_FRAU = 'NUR_FRAU';

    /**
     */
    public const GESCHL_ATTR_NUR_MANN = 'NUR_MANN';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see GESCHL_ATTR_* constants
     * @var string
     */
    protected $geschlAttr;

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
     * @param string $geschlAttr Shortcut setter for geschlAttr
     */
    public function __construct(string $geschlAttr = null)
    {
        $this->geschlAttr = $geschlAttr;
    }

    /**
     * @return string
     */
    public function getGeschlAttr(): ?string
    {
        return $this->geschlAttr;
    }

    /**
     * @param string $geschlAttr Setter for geschlAttr
     * @return Geschlecht
     */
    public function setGeschlAttr(?string $geschlAttr)
    {
        $this->geschlAttr = $geschlAttr;
        return $this;
    }
}
