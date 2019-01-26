<?php
namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Kaufpreisnetto
 *
 * @package Ujamii\OpenImmo\API
 * @XmlRoot("kaufpreisnetto") 
 */
class Kaufpreisnetto {

	/**
	 * optional
	 *
	 * @XmlAttribute 
	 * @var float
	 */
	protected $kaufpreisust;

	/**
	 * @Inline 
	 * @var float
	 */
	protected $value;

	/**
	 * @return float
	 */
	public function getKaufpreisust(): float {
		return $this->kaufpreisust;
	}

	/**
	 * @return float
	 */
	public function getValue(): float {
		return $this->value;
	}

	/**
	 * @param float $kaufpreisust Setter for kaufpreisust
	 * @return Kaufpreisnetto
	 */
	public function setKaufpreisust(float $kaufpreisust) {
		$this->kaufpreisust = $kaufpreisust;
		return $this;
	}

	/**
	 * @param float $value Setter for value
	 * @return Kaufpreisnetto
	 */
	public function setValue(float $value) {
		$this->value = $value;
		return $this;
	}
}
