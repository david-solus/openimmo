<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Einzelhandel
 * Objektart / Typ f. Handel
 *
 * @XmlRoot("einzelhandel")
 */
class Einzelhandel
{
    /**
     */
    public const HANDEL_TYP_AUSSTELLUNGSFLAECHE = 'AUSSTELLUNGSFLAECHE';

    /**
     */
    public const HANDEL_TYP_EINKAUFSZENTRUM = 'EINKAUFSZENTRUM';

    /**
     */
    public const HANDEL_TYP_EINZELHANDELSLADEN = 'EINZELHANDELSLADEN';

    /**
     */
    public const HANDEL_TYP_FACTORY_OUTLET = 'FACTORY_OUTLET';

    /**
     */
    public const HANDEL_TYP_KAUFHAUS = 'KAUFHAUS';

    /**
     */
    public const HANDEL_TYP_KIOSK = 'KIOSK';

    /**
     */
    public const HANDEL_TYP_LADENLOKAL = 'LADENLOKAL';

    /**
     */
    public const HANDEL_TYP_VERBRAUCHERMARKT = 'VERBRAUCHERMARKT';

    /**
     */
    public const HANDEL_TYP_VERKAUFSFLAECHE = 'VERKAUFSFLAECHE';

    /**
     * optional
     *
     * @Type("string")
     * @XmlAttribute
     * @see HANDEL_TYP_* constants
     * @var string
     */
    protected $handelTyp;

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
     * @param string $handelTyp Shortcut setter for handelTyp
     */
    public function __construct(string $handelTyp = null)
    {
        $this->handelTyp = $handelTyp;
    }

    /**
     * @return string
     */
    public function getHandelTyp(): ?string
    {
        return $this->handelTyp;
    }

    /**
     * @param string $handelTyp Setter for handelTyp
     * @return Einzelhandel
     */
    public function setHandelTyp(?string $handelTyp)
    {
        $this->handelTyp = $handelTyp;
        return $this;
    }
}
