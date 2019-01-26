<?php
namespace Ujamii\OpenImmo\API;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class InnenCourtage
 *
 * @package Ujamii\OpenImmo\API
 * @XmlRoot("innen_courtage") 
 */
class InnenCourtage {

	/**
	 * @var boolean
	 */
	protected $mitMwst;

	/**
	 * @return boolean
	 */
	public function getMitMwst(): bool {
		return $this->mitMwst;
	}

	/**
	 * @param boolean $mitMwst Setter for mitMwst
	 * @return InnenCourtage
	 */
	public function setMitMwst(bool $mitMwst) {
		$this->mitMwst = $mitMwst;
		return $this;
	}
}
