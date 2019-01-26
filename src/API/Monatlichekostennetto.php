<?php
namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Monatlichekostennetto
 *
 * @package Ujamii\OpenImmo\API
 * @XmlRoot("monatlichekostennetto") 
 */
class Monatlichekostennetto {

	/**
	 * optional
	 *
	 * @XmlAttribute 
	 * @var float
	 */
	protected $monatlichekostenust;

	/**
	 * @Inline 
	 * @var float
	 */
	protected $value;

	/**
	 * @return float
	 */
	public function getMonatlichekostenust(): float {
		return $this->monatlichekostenust;
	}

	/**
	 * @return float
	 */
	public function getValue(): float {
		return $this->value;
	}

	/**
	 * @param float $monatlichekostenust Setter for monatlichekostenust
	 * @return Monatlichekostennetto
	 */
	public function setMonatlichekostenust(float $monatlichekostenust) {
		$this->monatlichekostenust = $monatlichekostenust;
		return $this;
	}

	/**
	 * @param float $value Setter for value
	 * @return Monatlichekostennetto
	 */
	public function setValue(float $value) {
		$this->value = $value;
		return $this;
	}
}
