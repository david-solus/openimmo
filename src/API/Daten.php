<?php
namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Daten
 *
 * @package Ujamii\OpenImmo\API
 * @XmlRoot("daten") 
 */
class Daten {

	/**
	 * Base64 encoded binary
	 *
	 * @var string
	 */
	protected $anhanginhalt;

	/**
	 * @var string
	 */
	protected $pfad;

	/**
	 * @return string
	 */
	public function getAnhanginhalt(): string {
		return $this->anhanginhalt;
	}

	/**
	 * @return string
	 */
	public function getPfad(): string {
		return $this->pfad;
	}

	/**
	 * @param string $anhanginhalt Setter for anhanginhalt
	 * @return Daten
	 */
	public function setAnhanginhalt(string $anhanginhalt) {
		$this->anhanginhalt = $anhanginhalt;
		return $this;
	}

	/**
	 * @param string $pfad Setter for pfad
	 * @return Daten
	 */
	public function setPfad(string $pfad) {
		$this->pfad = $pfad;
		return $this;
	}
}
