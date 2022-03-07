<?php

namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Openimmo
 * Dokument Element
 * Root Element
 *
 * @XmlRoot("openimmo")
 */
class Openimmo
{
    /**
     * @Type("Ujamii\OpenImmo\API\Uebertragung")
     * @var Uebertragung
     */
    protected $uebertragung;
    
    /**
     * @XmlList(inline = true, entry = "anbieter")
     * @Type("array<Ujamii\OpenImmo\API\Anbieter>")
     * @SkipWhenEmpty
     * @var Anbieter[]
     */
    protected $anbieter = [];

    /**
     * @XmlList(inline = true, entry = "user_defined_simplefield")
     * @Type("array<Ujamii\OpenImmo\API\UserDefinedSimplefield>")
     * @var UserDefinedSimplefield[]
     */
    protected $userDefinedSimplefield;

    /**
     * @XmlList(inline = true, entry = "user_defined_anyfield")
     * @Type("array<Ujamii\OpenImmo\API\UserDefinedAnyfield>")
     * @var UserDefinedAnyfield[]
     */
    protected $userDefinedAnyfield;

    /**
     * @param Uebertragung $uebertragung Shortcut setter for uebertragung
     * @param array $anbieter Shortcut setter for anbieter
     * @param array $userDefinedSimplefield Shortcut setter for userDefinedSimplefield
     * @param array $userDefinedAnyfield Shortcut setter for userDefinedAnyfield
     */
    public function __construct(Uebertragung $uebertragung = null, array $anbieter = [], array $userDefinedSimplefield = [], array $userDefinedAnyfield = [])
    {
        $this->uebertragung = $uebertragung;
        $this->anbieter = $anbieter;
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        $this->userDefinedAnyfield = $userDefinedAnyfield;
    }

    /**
     * Returns array of Anbieter
     *
     * @return array
     */
    public function getAnbieter(): array
    {
        return $this->anbieter ?? [];
    }

    /**
     * @return Uebertragung
     */
    public function getUebertragung(): ?Uebertragung
    {
        return $this->uebertragung;
    }

    /**
     * Returns array of UserDefinedAnyfield
     *
     * @return array
     */
    public function getUserDefinedAnyfield(): array
    {
        return $this->userDefinedAnyfield ?? [];
    }

    /**
     * Returns array of UserDefinedSimplefield
     *
     * @return array
     */
    public function getUserDefinedSimplefield(): array
    {
        return $this->userDefinedSimplefield ?? [];
    }

    /**
     * @param array $anbieter Setter for anbieter
     * @return Openimmo
     */
    public function setAnbieter(array $anbieter)
    {
        $this->anbieter = $anbieter;
        return $this;
    }

    /**
     * @param Uebertragung $uebertragung Setter for uebertragung
     * @return Openimmo
     */
    public function setUebertragung(?Uebertragung $uebertragung)
    {
        $this->uebertragung = $uebertragung;
        return $this;
    }

    /**
     * @param array $userDefinedAnyfield Setter for userDefinedAnyfield
     * @return Openimmo
     */
    public function setUserDefinedAnyfield(array $userDefinedAnyfield)
    {
        $this->userDefinedAnyfield = $userDefinedAnyfield;
        return $this;
    }

    /**
     * @param array $userDefinedSimplefield Setter for userDefinedSimplefield
     * @return Openimmo
     */
    public function setUserDefinedSimplefield(array $userDefinedSimplefield)
    {
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        return $this;
    }
}
