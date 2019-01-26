<?php
namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class MieteinnahmenIst
 *
 * @package Ujamii\OpenImmo\API
 * @XmlRoot("mieteinnahmen_ist") 
 */
class MieteinnahmenIst {

	/**
	 */
	const PERIODE_JAHR = 'JAHR';

	/**
	 */
	const PERIODE_MONAT = 'MONAT';

	/**
	 */
	const PERIODE_TAG = 'TAG';

	/**
	 */
	const PERIODE_WOCHE = 'WOCHE';

	/**
	 * optional
	 *
	 * @XmlAttribute 
	 * @see PERIODE_* constants
	 * @var string
	 */
	protected $periode;

	/**
	 * @Inline 
	 * @var float
	 */
	protected $value;

	/**
	 * @return string
	 */
	public function getPeriode(): string {
		return $this->periode;
	}

	/**
	 * @return float
	 */
	public function getValue(): float {
		return $this->value;
	}

	/**
	 * @param string $periode Setter for periode
	 * @return MieteinnahmenIst
	 */
	public function setPeriode(string $periode) {
		$this->periode = $periode;
		return $this;
	}

	/**
	 * @param float $value Setter for value
	 * @return MieteinnahmenIst
	 */
	public function setValue(float $value) {
		$this->value = $value;
		return $this;
	}
}
