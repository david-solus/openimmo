<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Zimmer
 * Objekart / Typ f. Zimmer
 *
 * @XmlRoot("zimmer")
 */
class Zimmer
{
    /**
     */
    public const ZIMMERTYP_ZIMMER = 'ZIMMER';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see ZIMMERTYP_* constants
     * @var string
     */
    protected $zimmertyp;

    /**
     * @param string $zimmertyp Shortcut setter for zimmertyp
     */
    public function __construct(string $zimmertyp = null)
    {
        $this->zimmertyp = $zimmertyp;
    }

    /**
     * @return string
     */
    public function getZimmertyp(): ?string
    {
        return $this->zimmertyp;
    }

    /**
     * @param string $zimmertyp Setter for zimmertyp
     * @return Zimmer
     */
    public function setZimmertyp(?string $zimmertyp)
    {
        $this->zimmertyp = $zimmertyp;
        return $this;
    }
}
