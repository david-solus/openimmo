<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class FreizeitimmobilieGewerblich
 * Objektart / Typ f. gew. Freizeitimmobilen
 *
 * @XmlRoot("freizeitimmobilie_gewerblich")
 */
class FreizeitimmobilieGewerblich
{
    /**
     */
    public const FREIZEIT_TYP_FREIZEITANLAGE = 'FREIZEITANLAGE';

    /**
     */
    public const FREIZEIT_TYP_SPORTANLAGEN = 'SPORTANLAGEN';

    /**
     */
    public const FREIZEIT_TYP_VERGNUEGUNGSPARKS_UND_CENTER = 'VERGNUEGUNGSPARKS_UND_CENTER';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see FREIZEIT_TYP_* constants
     * @var string
     */
    protected $freizeitTyp;

    /**
     * @param string $freizeitTyp Shortcut setter for freizeitTyp
     */
    public function __construct(string $freizeitTyp = null)
    {
        $this->freizeitTyp = $freizeitTyp;
    }

    /**
     * @return string
     */
    public function getFreizeitTyp(): ?string
    {
        return $this->freizeitTyp;
    }

    /**
     * @param string $freizeitTyp Setter for freizeitTyp
     * @return FreizeitimmobilieGewerblich
     */
    public function setFreizeitTyp(?string $freizeitTyp)
    {
        $this->freizeitTyp = $freizeitTyp;
        return $this;
    }
}
