<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Anhaenge
 *
 * @XmlRoot("anhaenge")
 */
class Anhaenge
{
    /**
     * @XmlList(inline = true, entry = "anhang")
     * @Type("array<REO\OpenImmo\API\Anhang>")
     * @var Anhang[]
     */
    protected $anhang;

    /**
     * @XmlList(inline = true, entry = "user_defined_simplefield")
     * @Type("array<REO\OpenImmo\API\UserDefinedSimplefield>")
     * @var UserDefinedSimplefield[]
     */
    protected $userDefinedSimplefield;
    
    /**
     * @XmlList(inline = true, entry = "user_defined_anyfield")
     * @Type("array<REO\OpenImmo\API\UserDefinedAnyfield>")
     * @var UserDefinedAnyfield[]
     */
    protected $userDefinedAnyfield;

    /**
     * @XmlList(inline = true, entry = "user_defined_extend")
     * @Type("array<REO\OpenImmo\API\UserDefinedExtend>")
     * @var UserDefinedExtend[]
     */
    protected $userDefinedExtend;


    /**
     * @param array $anhang Shortcut setter for anhang
     * @param array $userDefinedSimplefield Shortcut setter for userDefinedSimplefield
     * @param array $userDefinedAnyfield Shortcut setter for userDefinedAnyfield
     * @param array $userDefinedExtend Shortcut setter for userDefinedExtend
     */
    public function __construct(array $anhang = [], array $userDefinedSimplefield = [], array $userDefinedAnyfield = [], array $userDefinedExtend = [])
    {
        $this->anhang = $anhang;
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        $this->userDefinedAnyfield = $userDefinedAnyfield;
        $this->userDefinedExtend = $userDefinedExtend;
    }

    /**
     * Returns array of Anhang
     *
     * @return array
     */
    public function getAnhang(): array
    {
        return $this->anhang ?? [];
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
     * Returns array of UserDefinedExtend
     *
     * @return array
     */
    public function getUserDefinedExtend(): array
    {
        return $this->userDefinedExtend ?? [];
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
     * @param array $anhang Setter for anhang
     * @return Anhaenge
     */
    public function setAnhang(array $anhang)
    {
        $this->anhang = $anhang;
        return $this;
    }

    /**
     * @param array $userDefinedAnyfield Setter for userDefinedAnyfield
     * @return Anhaenge
     */
    public function setUserDefinedAnyfield(array $userDefinedAnyfield)
    {
        $this->userDefinedAnyfield = $userDefinedAnyfield;
        return $this;
    }

    /**
     * @param array $userDefinedExtend Setter for userDefinedExtend
     * @return Anhaenge
     */
    public function setUserDefinedExtend(array $userDefinedExtend)
    {
        $this->userDefinedExtend = $userDefinedExtend;
        return $this;
    }

    /**
     * @param array $userDefinedSimplefield Setter for userDefinedSimplefield
     * @return Anhaenge
     */
    public function setUserDefinedSimplefield(array $userDefinedSimplefield)
    {
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        return $this;
    }
}
