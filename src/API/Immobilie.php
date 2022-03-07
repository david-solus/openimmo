<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * Class Immobilie
 * Angaben einer einzelnen Immobile
 *
 * @XmlRoot("immobilie")
 */
class Immobilie
{
    
    /**
     * @Type("REO\OpenImmo\API\Objektkategorie")
     * @var Objektkategorie
     */
    protected $objektkategorie;

    /**
     * @Type("REO\OpenImmo\API\Geo")
     * @var Geo
     */
    protected $geo;

    /**
     * @Type("REO\OpenImmo\API\Kontaktperson")
     * @var Kontaktperson
     */
    protected $kontaktperson;

    /**
     * @XmlList(inline = true, entry = "weitere_adresse")
     * @Type("array<REO\OpenImmo\API\WeitereAdresse>")
     * @var WeitereAdresse[]
     */
    protected $weitereAdresse;

    /**
     * @Type("REO\OpenImmo\API\Preise")
     * @var Preise
     */
    protected $preise;

    /**
     * @Type("REO\OpenImmo\API\Bieterverfahren")
     * @var Bieterverfahren
     */
    protected $bieterverfahren;

    /**
     * @Type("REO\OpenImmo\API\Versteigerung")
     * @var Versteigerung
     */
    protected $versteigerung;

    /**
     * @Type("REO\OpenImmo\API\Flaechen")
     * @var Flaechen
     */
    protected $flaechen;

    /**
     * @Type("REO\OpenImmo\API\Ausstattung")
     * @var Ausstattung
     */
    protected $ausstattung;

    /**
     * @Type("REO\OpenImmo\API\ZustandAngaben")
     * @var ZustandAngaben
     */
    protected $zustandAngaben;

    /**
     * @Type("REO\OpenImmo\API\Bewertung")
     * @var Bewertung
     */
    protected $bewertung;

    /**
     * @Type("REO\OpenImmo\API\Infrastruktur")
     * @var Infrastruktur
     */
    protected $infrastruktur;

    /**
     * @Type("REO\OpenImmo\API\Freitexte")
     * @var Freitexte
     */
    protected $freitexte;

    /**
     * @Type("REO\OpenImmo\API\Anhaenge")
     * @var Anhaenge
     */
    protected $anhaenge;

    /**
     * @Type("REO\OpenImmo\API\VerwaltungObjekt")
     * @var VerwaltungObjekt
     */
    protected $verwaltungObjekt;

    /**
     * @Type("REO\OpenImmo\API\VerwaltungTechn")
     * @var VerwaltungTechn
     */
    protected $verwaltungTechn;

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
     * @return Anhaenge
     */
    public function getAnhaenge(): ?Anhaenge
    {
        return $this->anhaenge;
    }

    /**
     * @return Ausstattung
     */
    public function getAusstattung(): ?Ausstattung
    {
        return $this->ausstattung;
    }

    /**
     * @return Bewertung
     */
    public function getBewertung(): ?Bewertung
    {
        return $this->bewertung;
    }

    /**
     * @return Bieterverfahren
     */
    public function getBieterverfahren(): ?Bieterverfahren
    {
        return $this->bieterverfahren;
    }

    /**
     * @return Flaechen
     */
    public function getFlaechen(): ?Flaechen
    {
        return $this->flaechen;
    }

    /**
     * @return Freitexte
     */
    public function getFreitexte(): ?Freitexte
    {
        return $this->freitexte;
    }

    /**
     * @return Geo
     */
    public function getGeo(): ?Geo
    {
        return $this->geo;
    }

    /**
     * @return Infrastruktur
     */
    public function getInfrastruktur(): ?Infrastruktur
    {
        return $this->infrastruktur;
    }

    /**
     * @return Kontaktperson
     */
    public function getKontaktperson(): ?Kontaktperson
    {
        return $this->kontaktperson;
    }

    /**
     * @return Objektkategorie
     */
    public function getObjektkategorie(): ?Objektkategorie
    {
        return $this->objektkategorie;
    }

    /**
     * @return Preise
     */
    public function getPreise(): ?Preise
    {
        return $this->preise;
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
     * @return Versteigerung
     */
    public function getVersteigerung(): ?Versteigerung
    {
        return $this->versteigerung;
    }

    /**
     * @return VerwaltungObjekt
     */
    public function getVerwaltungObjekt(): ?VerwaltungObjekt
    {
        return $this->verwaltungObjekt;
    }

    /**
     * @return VerwaltungTechn
     */
    public function getVerwaltungTechn(): ?VerwaltungTechn
    {
        return $this->verwaltungTechn;
    }

    /**
     * Returns array of WeitereAdresse
     *
     * @return array
     */
    public function getWeitereAdresse(): array
    {
        return $this->weitereAdresse ?? [];
    }

    /**
     * @return ZustandAngaben
     */
    public function getZustandAngaben(): ?ZustandAngaben
    {
        return $this->zustandAngaben;
    }

    /**
     * @param Anhaenge $anhaenge Setter for anhaenge
     * @return Immobilie
     */
    public function setAnhaenge(?Anhaenge $anhaenge)
    {
        $this->anhaenge = $anhaenge;
        return $this;
    }

    /**
     * @param Ausstattung $ausstattung Setter for ausstattung
     * @return Immobilie
     */
    public function setAusstattung(?Ausstattung $ausstattung)
    {
        $this->ausstattung = $ausstattung;
        return $this;
    }

    /**
     * @param Bewertung $bewertung Setter for bewertung
     * @return Immobilie
     */
    public function setBewertung(?Bewertung $bewertung)
    {
        $this->bewertung = $bewertung;
        return $this;
    }

    /**
     * @param Bieterverfahren $bieterverfahren Setter for bieterverfahren
     * @return Immobilie
     */
    public function setBieterverfahren(?Bieterverfahren $bieterverfahren)
    {
        $this->bieterverfahren = $bieterverfahren;
        return $this;
    }

    /**
     * @param Flaechen $flaechen Setter for flaechen
     * @return Immobilie
     */
    public function setFlaechen(?Flaechen $flaechen)
    {
        $this->flaechen = $flaechen;
        return $this;
    }

    /**
     * @param Freitexte $freitexte Setter for freitexte
     * @return Immobilie
     */
    public function setFreitexte(?Freitexte $freitexte)
    {
        $this->freitexte = $freitexte;
        return $this;
    }

    /**
     * @param Geo $geo Setter for geo
     * @return Immobilie
     */
    public function setGeo(?Geo $geo)
    {
        $this->geo = $geo;
        return $this;
    }

    /**
     * @param Infrastruktur $infrastruktur Setter for infrastruktur
     * @return Immobilie
     */
    public function setInfrastruktur(?Infrastruktur $infrastruktur)
    {
        $this->infrastruktur = $infrastruktur;
        return $this;
    }

    /**
     * @param Kontaktperson $kontaktperson Setter for kontaktperson
     * @return Immobilie
     */
    public function setKontaktperson(?Kontaktperson $kontaktperson)
    {
        $this->kontaktperson = $kontaktperson;
        return $this;
    }

    /**
     * @param Objektkategorie $objektkategorie Setter for objektkategorie
     * @return Immobilie
     */
    public function setObjektkategorie(?Objektkategorie $objektkategorie)
    {
        $this->objektkategorie = $objektkategorie;
        return $this;
    }

    /**
     * @param Preise $preise Setter for preise
     * @return Immobilie
     */
    public function setPreise(?Preise $preise)
    {
        $this->preise = $preise;
        return $this;
    }

    /**
     * @param array $userDefinedAnyfield Setter for userDefinedAnyfield
     * @return Immobilie
     */
    public function setUserDefinedAnyfield(array $userDefinedAnyfield)
    {
        $this->userDefinedAnyfield = $userDefinedAnyfield;
        return $this;
    }

    /**
     * @param array $userDefinedExtend Setter for userDefinedExtend
     * @return Immobilie
     */
    public function setUserDefinedExtend(array $userDefinedExtend)
    {
        $this->userDefinedExtend = $userDefinedExtend;
        return $this;
    }

    /**
     * @param array $userDefinedSimplefield Setter for userDefinedSimplefield
     * @return Immobilie
     */
    public function setUserDefinedSimplefield(array $userDefinedSimplefield)
    {
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        return $this;
    }

    /**
     * @param Versteigerung $versteigerung Setter for versteigerung
     * @return Immobilie
     */
    public function setVersteigerung(?Versteigerung $versteigerung)
    {
        $this->versteigerung = $versteigerung;
        return $this;
    }

    /**
     * @param VerwaltungObjekt $verwaltungObjekt Setter for verwaltungObjekt
     * @return Immobilie
     */
    public function setVerwaltungObjekt(?VerwaltungObjekt $verwaltungObjekt)
    {
        $this->verwaltungObjekt = $verwaltungObjekt;
        return $this;
    }

    /**
     * @param VerwaltungTechn $verwaltungTechn Setter for verwaltungTechn
     * @return Immobilie
     */
    public function setVerwaltungTechn(?VerwaltungTechn $verwaltungTechn)
    {
        $this->verwaltungTechn = $verwaltungTechn;
        return $this;
    }

    /**
     * @param array $weitereAdresse Setter for weitereAdresse
     * @return Immobilie
     */
    public function setWeitereAdresse(array $weitereAdresse)
    {
        $this->weitereAdresse = $weitereAdresse;
        return $this;
    }

    /**
     * @param ZustandAngaben $zustandAngaben Setter for zustandAngaben
     * @return Immobilie
     */
    public function setZustandAngaben(?ZustandAngaben $zustandAngaben)
    {
        $this->zustandAngaben = $zustandAngaben;
        return $this;
    }
}
