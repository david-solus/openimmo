<?php

namespace REO\OpenImmo\API;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Class Ausstattung
 *
 * @XmlRoot("ausstattung")
 */
class Ausstattung
{
    /**
     * @Type("string")
     * @see AUSSTATT_KATEGORIE_* constants
     * @var string
     */
    protected $ausstattKategorie;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $wgGeeignet;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $raeumeVeraenderbar;

    /**
     * @Type("REO\OpenImmo\API\Bad")
     * @var Bad
     */
    protected $bad;

    /**
     * @Type("REO\OpenImmo\API\Kueche")
     * @var Kueche
     */
    protected $kueche;

    /**
     * @Type("REO\OpenImmo\API\Boden")
     * @var Boden
     */
    protected $boden;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $kamin;

    /**
     * @Type("REO\OpenImmo\API\Heizungsart")
     * @var Heizungsart
     */
    protected $heizungsart;

    /**
     * @Type("REO\OpenImmo\API\Befeuerung")
     * @var Befeuerung
     */
    protected $befeuerung;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $klimatisiert;

    /**
     * @Type("REO\OpenImmo\API\Fahrstuhl")
     * @var Fahrstuhl
     */
    protected $fahrstuhl;

    /**
     * @XmlList(inline = true, entry = "stellplatzart")
     * @Type("array<REO\OpenImmo\API\Stellplatzart>")
     * @var Stellplatzart[]
     */
    protected $stellplatzart;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $gartennutzung;

    /**
     * @Type("REO\OpenImmo\API\AusrichtBalkonTerrasse")
     * @var AusrichtBalkonTerrasse
     */
    protected $ausrichtBalkonTerrasse;

    /**
     * @Type("REO\OpenImmo\API\Moebliert")
     * @var Moebliert
     */
    protected $moebliert;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $rollstuhlgerecht;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $kabelSatTv;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $dvbt;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $barrierefrei;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $sauna;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $swimmingpool;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $waschTrockenraum;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $wintergarten;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $dvVerkabelung;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $rampe;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $hebebuehne;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $kran;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $gastterrasse;

    /**
     * @Type("string")
     * @var string
     */
    protected $stromanschlusswert;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $kantineCafeteria;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $teekueche;

    /**
     * @Type("float")
     * @var float
     */
    protected $hallenhoehe;

    /**
     * @Type("REO\OpenImmo\API\AngeschlGastronomie")
     * @var AngeschlGastronomie
     */
    protected $angeschlGastronomie;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $brauereibindung;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $sporteinrichtungen;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $wellnessbereich;

    /**
     * @XmlList(inline = true, entry = "serviceleistungen")
     * @Type("array<REO\OpenImmo\API\Serviceleistungen>")
     * @var Serviceleistungen[]
     */
    protected $serviceleistungen;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $telefonFerienimmobilie;

    /**
     * @Type("REO\OpenImmo\API\BreitbandZugang")
     * @var BreitbandZugang
     */
    protected $breitbandZugang;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $umtsEmpfang;

    /**
     * @Type("REO\OpenImmo\API\Sicherheitstechnik")
     * @var Sicherheitstechnik
     */
    protected $sicherheitstechnik;

    /**
     * @Type("REO\OpenImmo\API\Unterkellert")
     * @var Unterkellert
     */
    protected $unterkellert;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $abstellraum;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $fahrradraum;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $rolladen;

    /**
     * @Type("REO\OpenImmo\API\Dachform")
     * @var Dachform
     */
    protected $dachform;

    /**
     * @Type("REO\OpenImmo\API\Bauweise")
     * @var Bauweise
     */
    protected $bauweise;

    /**
     * @Type("REO\OpenImmo\API\Ausbaustufe")
     * @var Ausbaustufe
     */
    protected $ausbaustufe;

    /**
     * @Type("REO\OpenImmo\API\Energietyp")
     * @var Energietyp
     */
    protected $energietyp;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $bibliothek;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $dachboden;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $gaestewc;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $kabelkanaele;

    /**
     * @Type("bool")
     * @var bool
     */
    protected $seniorengerecht;

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
     * This value is needed because a class with only xml attributes
     * will result in using any next value as an xml value of this tag
     *
     * @Type("string")
     * @XmlValue
     * @var string
     */
    private $xmlEmptySpace = " ";

    /**
     */
    public const AUSSTATT_KATEGORIE_GEHOBEN = 'GEHOBEN';

    /**
     */
    public const AUSSTATT_KATEGORIE_LUXUS = 'LUXUS';

    /**
     */
    public const AUSSTATT_KATEGORIE_STANDARD = 'STANDARD';

    /**
     * @return bool
     */
    public function getAbstellraum(): ?bool
    {
        return $this->abstellraum;
    }

    /**
     * @return AngeschlGastronomie
     */
    public function getAngeschlGastronomie(): ?AngeschlGastronomie
    {
        return $this->angeschlGastronomie;
    }

    /**
     * @return Ausbaustufe
     */
    public function getAusbaustufe(): ?Ausbaustufe
    {
        return $this->ausbaustufe;
    }

    /**
     * @return AusrichtBalkonTerrasse
     */
    public function getAusrichtBalkonTerrasse(): ?AusrichtBalkonTerrasse
    {
        return $this->ausrichtBalkonTerrasse;
    }

    /**
     * @return string
     */
    public function getAusstattKategorie(): ?string
    {
        return $this->ausstattKategorie;
    }

    /**
     * @return Bad
     */
    public function getBad(): ?Bad
    {
        return $this->bad;
    }

    /**
     * @return bool
     */
    public function getBarrierefrei(): ?bool
    {
        return $this->barrierefrei;
    }

    /**
     * @return Bauweise
     */
    public function getBauweise(): ?Bauweise
    {
        return $this->bauweise;
    }

    /**
     * @return Befeuerung
     */
    public function getBefeuerung(): ?Befeuerung
    {
        return $this->befeuerung;
    }

    /**
     * @return bool
     */
    public function getBibliothek(): ?bool
    {
        return $this->bibliothek;
    }

    /**
     * @return Boden
     */
    public function getBoden(): ?Boden
    {
        return $this->boden;
    }

    /**
     * @return bool
     */
    public function getBrauereibindung(): ?bool
    {
        return $this->brauereibindung;
    }

    /**
     * @return BreitbandZugang
     */
    public function getBreitbandZugang(): ?BreitbandZugang
    {
        return $this->breitbandZugang;
    }

    /**
     * @return bool
     */
    public function getDachboden(): ?bool
    {
        return $this->dachboden;
    }

    /**
     * @return Dachform
     */
    public function getDachform(): ?Dachform
    {
        return $this->dachform;
    }

    /**
     * @return bool
     */
    public function getDvbt(): ?bool
    {
        return $this->dvbt;
    }

    /**
     * @return bool
     */
    public function getDvVerkabelung(): ?bool
    {
        return $this->dvVerkabelung;
    }

    /**
     * @return Energietyp
     */
    public function getEnergietyp(): ?Energietyp
    {
        return $this->energietyp;
    }

    /**
     * @return bool
     */
    public function getFahrradraum(): ?bool
    {
        return $this->fahrradraum;
    }

    /**
     * @return Fahrstuhl
     */
    public function getFahrstuhl(): ?Fahrstuhl
    {
        return $this->fahrstuhl;
    }

    /**
     * @return bool
     */
    public function getGaestewc(): ?bool
    {
        return $this->gaestewc;
    }

    /**
     * @return bool
     */
    public function getGartennutzung(): ?bool
    {
        return $this->gartennutzung;
    }

    /**
     * @return bool
     */
    public function getGastterrasse(): ?bool
    {
        return $this->gastterrasse;
    }

    /**
     * @return float
     */
    public function getHallenhoehe(): ?float
    {
        return $this->hallenhoehe;
    }

    /**
     * @return bool
     */
    public function getHebebuehne(): ?bool
    {
        return $this->hebebuehne;
    }

    /**
     * @return Heizungsart
     */
    public function getHeizungsart(): ?Heizungsart
    {
        return $this->heizungsart;
    }

    /**
     * @return bool
     */
    public function getKabelkanaele(): ?bool
    {
        return $this->kabelkanaele;
    }

    /**
     * @return bool
     */
    public function getKabelSatTv(): ?bool
    {
        return $this->kabelSatTv;
    }

    /**
     * @return bool
     */
    public function getKamin(): ?bool
    {
        return $this->kamin;
    }

    /**
     * @return bool
     */
    public function getKantineCafeteria(): ?bool
    {
        return $this->kantineCafeteria;
    }

    /**
     * @return bool
     */
    public function getKlimatisiert(): ?bool
    {
        return $this->klimatisiert;
    }

    /**
     * @return bool
     */
    public function getKran(): ?bool
    {
        return $this->kran;
    }

    /**
     * @return Kueche
     */
    public function getKueche(): ?Kueche
    {
        return $this->kueche;
    }

    /**
     * @return Moebliert
     */
    public function getMoebliert(): ?Moebliert
    {
        return $this->moebliert;
    }

    /**
     * @return bool
     */
    public function getRaeumeVeraenderbar(): ?bool
    {
        return $this->raeumeVeraenderbar;
    }

    /**
     * @return bool
     */
    public function getRampe(): ?bool
    {
        return $this->rampe;
    }

    /**
     * @return bool
     */
    public function getRolladen(): ?bool
    {
        return $this->rolladen;
    }

    /**
     * @return bool
     */
    public function getRollstuhlgerecht(): ?bool
    {
        return $this->rollstuhlgerecht;
    }

    /**
     * @return bool
     */
    public function getSauna(): ?bool
    {
        return $this->sauna;
    }

    /**
     * @return bool
     */
    public function getSeniorengerecht(): ?bool
    {
        return $this->seniorengerecht;
    }

    /**
     * Returns array of Serviceleistungen
     *
     * @return array
     */
    public function getServiceleistungen(): array
    {
        return $this->serviceleistungen ?? [];
    }

    /**
     * @return Sicherheitstechnik
     */
    public function getSicherheitstechnik(): ?Sicherheitstechnik
    {
        return $this->sicherheitstechnik;
    }

    /**
     * @return bool
     */
    public function getSporteinrichtungen(): ?bool
    {
        return $this->sporteinrichtungen;
    }

    /**
     * Returns array of Stellplatzart
     *
     * @return array
     */
    public function getStellplatzart(): array
    {
        return $this->stellplatzart ?? [];
    }

    /**
     * @return string
     */
    public function getStromanschlusswert(): ?string
    {
        return $this->stromanschlusswert;
    }

    /**
     * @return bool
     */
    public function getSwimmingpool(): ?bool
    {
        return $this->swimmingpool;
    }

    /**
     * @return bool
     */
    public function getTeekueche(): ?bool
    {
        return $this->teekueche;
    }

    /**
     * @return bool
     */
    public function getTelefonFerienimmobilie(): ?bool
    {
        return $this->telefonFerienimmobilie;
    }

    /**
     * @return bool
     */
    public function getUmtsEmpfang(): ?bool
    {
        return $this->umtsEmpfang;
    }

    /**
     * @return Unterkellert
     */
    public function getUnterkellert(): ?Unterkellert
    {
        return $this->unterkellert;
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
     * @return bool
     */
    public function getWaschTrockenraum(): ?bool
    {
        return $this->waschTrockenraum;
    }

    /**
     * @return bool
     */
    public function getWellnessbereich(): ?bool
    {
        return $this->wellnessbereich;
    }

    /**
     * @return bool
     */
    public function getWgGeeignet(): ?bool
    {
        return $this->wgGeeignet;
    }

    /**
     * @return bool
     */
    public function getWintergarten(): ?bool
    {
        return $this->wintergarten;
    }

    /**
     * @param bool $abstellraum Setter for abstellraum
     * @return Ausstattung
     */
    public function setAbstellraum(?bool $abstellraum)
    {
        $this->abstellraum = $abstellraum;
        return $this;
    }

    /**
     * @param AngeschlGastronomie $angeschlGastronomie Setter for angeschlGastronomie
     * @return Ausstattung
     */
    public function setAngeschlGastronomie(?AngeschlGastronomie $angeschlGastronomie)
    {
        $this->angeschlGastronomie = $angeschlGastronomie;
        return $this;
    }

    /**
     * @param Ausbaustufe $ausbaustufe Setter for ausbaustufe
     * @return Ausstattung
     */
    public function setAusbaustufe(?Ausbaustufe $ausbaustufe)
    {
        $this->ausbaustufe = $ausbaustufe;
        return $this;
    }

    /**
     * @param AusrichtBalkonTerrasse $ausrichtBalkonTerrasse Setter for ausrichtBalkonTerrasse
     * @return Ausstattung
     */
    public function setAusrichtBalkonTerrasse(?AusrichtBalkonTerrasse $ausrichtBalkonTerrasse)
    {
        $this->ausrichtBalkonTerrasse = $ausrichtBalkonTerrasse;
        return $this;
    }

    /**
     * @param string $ausstattKategorie Setter for ausstattKategorie
     * @return Ausstattung
     */
    public function setAusstattKategorie(?string $ausstattKategorie)
    {
        $this->ausstattKategorie = $ausstattKategorie;
        return $this;
    }

    /**
     * @param Bad $bad Setter for bad
     * @return Ausstattung
     */
    public function setBad(?Bad $bad)
    {
        $this->bad = $bad;
        return $this;
    }

    /**
     * @param bool $barrierefrei Setter for barrierefrei
     * @return Ausstattung
     */
    public function setBarrierefrei(?bool $barrierefrei)
    {
        $this->barrierefrei = $barrierefrei;
        return $this;
    }

    /**
     * @param Bauweise $bauweise Setter for bauweise
     * @return Ausstattung
     */
    public function setBauweise(?Bauweise $bauweise)
    {
        $this->bauweise = $bauweise;
        return $this;
    }

    /**
     * @param Befeuerung $befeuerung Setter for befeuerung
     * @return Ausstattung
     */
    public function setBefeuerung(?Befeuerung $befeuerung)
    {
        $this->befeuerung = $befeuerung;
        return $this;
    }

    /**
     * @param bool $bibliothek Setter for bibliothek
     * @return Ausstattung
     */
    public function setBibliothek(?bool $bibliothek)
    {
        $this->bibliothek = $bibliothek;
        return $this;
    }

    /**
     * @param Boden $boden Setter for boden
     * @return Ausstattung
     */
    public function setBoden(?Boden $boden)
    {
        $this->boden = $boden;
        return $this;
    }

    /**
     * @param bool $brauereibindung Setter for brauereibindung
     * @return Ausstattung
     */
    public function setBrauereibindung(?bool $brauereibindung)
    {
        $this->brauereibindung = $brauereibindung;
        return $this;
    }

    /**
     * @param BreitbandZugang $breitbandZugang Setter for breitbandZugang
     * @return Ausstattung
     */
    public function setBreitbandZugang(?BreitbandZugang $breitbandZugang)
    {
        $this->breitbandZugang = $breitbandZugang;
        return $this;
    }

    /**
     * @param bool $dachboden Setter for dachboden
     * @return Ausstattung
     */
    public function setDachboden(?bool $dachboden)
    {
        $this->dachboden = $dachboden;
        return $this;
    }

    /**
     * @param Dachform $dachform Setter for dachform
     * @return Ausstattung
     */
    public function setDachform(?Dachform $dachform)
    {
        $this->dachform = $dachform;
        return $this;
    }

    /**
     * @param bool $dvbt Setter for dvbt
     * @return Ausstattung
     */
    public function setDvbt(?bool $dvbt)
    {
        $this->dvbt = $dvbt;
        return $this;
    }

    /**
     * @param bool $dvVerkabelung Setter for dvVerkabelung
     * @return Ausstattung
     */
    public function setDvVerkabelung(?bool $dvVerkabelung)
    {
        $this->dvVerkabelung = $dvVerkabelung;
        return $this;
    }

    /**
     * @param Energietyp $energietyp Setter for energietyp
     * @return Ausstattung
     */
    public function setEnergietyp(?Energietyp $energietyp)
    {
        $this->energietyp = $energietyp;
        return $this;
    }

    /**
     * @param bool $fahrradraum Setter for fahrradraum
     * @return Ausstattung
     */
    public function setFahrradraum(?bool $fahrradraum)
    {
        $this->fahrradraum = $fahrradraum;
        return $this;
    }

    /**
     * @param Fahrstuhl $fahrstuhl Setter for fahrstuhl
     * @return Ausstattung
     */
    public function setFahrstuhl(?Fahrstuhl $fahrstuhl)
    {
        $this->fahrstuhl = $fahrstuhl;
        return $this;
    }

    /**
     * @param bool $gaestewc Setter for gaestewc
     * @return Ausstattung
     */
    public function setGaestewc(?bool $gaestewc)
    {
        $this->gaestewc = $gaestewc;
        return $this;
    }

    /**
     * @param bool $gartennutzung Setter for gartennutzung
     * @return Ausstattung
     */
    public function setGartennutzung(?bool $gartennutzung)
    {
        $this->gartennutzung = $gartennutzung;
        return $this;
    }

    /**
     * @param bool $gastterrasse Setter for gastterrasse
     * @return Ausstattung
     */
    public function setGastterrasse(?bool $gastterrasse)
    {
        $this->gastterrasse = $gastterrasse;
        return $this;
    }

    /**
     * @param float $hallenhoehe Setter for hallenhoehe
     * @return Ausstattung
     */
    public function setHallenhoehe(?float $hallenhoehe)
    {
        $this->hallenhoehe = $hallenhoehe;
        return $this;
    }

    /**
     * @param bool $hebebuehne Setter for hebebuehne
     * @return Ausstattung
     */
    public function setHebebuehne(?bool $hebebuehne)
    {
        $this->hebebuehne = $hebebuehne;
        return $this;
    }

    /**
     * @param Heizungsart $heizungsart Setter for heizungsart
     * @return Ausstattung
     */
    public function setHeizungsart(?Heizungsart $heizungsart)
    {
        $this->heizungsart = $heizungsart;
        return $this;
    }

    /**
     * @param bool $kabelkanaele Setter for kabelkanaele
     * @return Ausstattung
     */
    public function setKabelkanaele(?bool $kabelkanaele)
    {
        $this->kabelkanaele = $kabelkanaele;
        return $this;
    }

    /**
     * @param bool $kabelSatTv Setter for kabelSatTv
     * @return Ausstattung
     */
    public function setKabelSatTv(?bool $kabelSatTv)
    {
        $this->kabelSatTv = $kabelSatTv;
        return $this;
    }

    /**
     * @param bool $kamin Setter for kamin
     * @return Ausstattung
     */
    public function setKamin(?bool $kamin)
    {
        $this->kamin = $kamin;
        return $this;
    }

    /**
     * @param bool $kantineCafeteria Setter for kantineCafeteria
     * @return Ausstattung
     */
    public function setKantineCafeteria(?bool $kantineCafeteria)
    {
        $this->kantineCafeteria = $kantineCafeteria;
        return $this;
    }

    /**
     * @param bool $klimatisiert Setter for klimatisiert
     * @return Ausstattung
     */
    public function setKlimatisiert(?bool $klimatisiert)
    {
        $this->klimatisiert = $klimatisiert;
        return $this;
    }

    /**
     * @param bool $kran Setter for kran
     * @return Ausstattung
     */
    public function setKran(?bool $kran)
    {
        $this->kran = $kran;
        return $this;
    }

    /**
     * @param Kueche $kueche Setter for kueche
     * @return Ausstattung
     */
    public function setKueche(?Kueche $kueche)
    {
        $this->kueche = $kueche;
        return $this;
    }

    /**
     * @param Moebliert $moebliert Setter for moebliert
     * @return Ausstattung
     */
    public function setMoebliert(?Moebliert $moebliert)
    {
        $this->moebliert = $moebliert;
        return $this;
    }

    /**
     * @param bool $raeumeVeraenderbar Setter for raeumeVeraenderbar
     * @return Ausstattung
     */
    public function setRaeumeVeraenderbar(?bool $raeumeVeraenderbar)
    {
        $this->raeumeVeraenderbar = $raeumeVeraenderbar;
        return $this;
    }

    /**
     * @param bool $rampe Setter for rampe
     * @return Ausstattung
     */
    public function setRampe(?bool $rampe)
    {
        $this->rampe = $rampe;
        return $this;
    }

    /**
     * @param bool $rolladen Setter for rolladen
     * @return Ausstattung
     */
    public function setRolladen(?bool $rolladen)
    {
        $this->rolladen = $rolladen;
        return $this;
    }

    /**
     * @param bool $rollstuhlgerecht Setter for rollstuhlgerecht
     * @return Ausstattung
     */
    public function setRollstuhlgerecht(?bool $rollstuhlgerecht)
    {
        $this->rollstuhlgerecht = $rollstuhlgerecht;
        return $this;
    }

    /**
     * @param bool $sauna Setter for sauna
     * @return Ausstattung
     */
    public function setSauna(?bool $sauna)
    {
        $this->sauna = $sauna;
        return $this;
    }

    /**
     * @param bool $seniorengerecht Setter for seniorengerecht
     * @return Ausstattung
     */
    public function setSeniorengerecht(?bool $seniorengerecht)
    {
        $this->seniorengerecht = $seniorengerecht;
        return $this;
    }

    /**
     * @param array $serviceleistungen Setter for serviceleistungen
     * @return Ausstattung
     */
    public function setServiceleistungen(array $serviceleistungen)
    {
        $this->serviceleistungen = $serviceleistungen;
        return $this;
    }

    /**
     * @param Sicherheitstechnik $sicherheitstechnik Setter for sicherheitstechnik
     * @return Ausstattung
     */
    public function setSicherheitstechnik(?Sicherheitstechnik $sicherheitstechnik)
    {
        $this->sicherheitstechnik = $sicherheitstechnik;
        return $this;
    }

    /**
     * @param bool $sporteinrichtungen Setter for sporteinrichtungen
     * @return Ausstattung
     */
    public function setSporteinrichtungen(?bool $sporteinrichtungen)
    {
        $this->sporteinrichtungen = $sporteinrichtungen;
        return $this;
    }

    /**
     * @param array $stellplatzart Setter for stellplatzart
     * @return Ausstattung
     */
    public function setStellplatzart(array $stellplatzart)
    {
        $this->stellplatzart = $stellplatzart;
        return $this;
    }

    /**
     * @param string $stromanschlusswert Setter for stromanschlusswert
     * @return Ausstattung
     */
    public function setStromanschlusswert(?string $stromanschlusswert)
    {
        $this->stromanschlusswert = $stromanschlusswert;
        return $this;
    }

    /**
     * @param bool $swimmingpool Setter for swimmingpool
     * @return Ausstattung
     */
    public function setSwimmingpool(?bool $swimmingpool)
    {
        $this->swimmingpool = $swimmingpool;
        return $this;
    }

    /**
     * @param bool $teekueche Setter for teekueche
     * @return Ausstattung
     */
    public function setTeekueche(?bool $teekueche)
    {
        $this->teekueche = $teekueche;
        return $this;
    }

    /**
     * @param bool $telefonFerienimmobilie Setter for telefonFerienimmobilie
     * @return Ausstattung
     */
    public function setTelefonFerienimmobilie(?bool $telefonFerienimmobilie)
    {
        $this->telefonFerienimmobilie = $telefonFerienimmobilie;
        return $this;
    }

    /**
     * @param bool $umtsEmpfang Setter for umtsEmpfang
     * @return Ausstattung
     */
    public function setUmtsEmpfang(?bool $umtsEmpfang)
    {
        $this->umtsEmpfang = $umtsEmpfang;
        return $this;
    }

    /**
     * @param Unterkellert $unterkellert Setter for unterkellert
     * @return Ausstattung
     */
    public function setUnterkellert(?Unterkellert $unterkellert)
    {
        $this->unterkellert = $unterkellert;
        return $this;
    }

    /**
     * @param array $userDefinedAnyfield Setter for userDefinedAnyfield
     * @return Ausstattung
     */
    public function setUserDefinedAnyfield(array $userDefinedAnyfield)
    {
        $this->userDefinedAnyfield = $userDefinedAnyfield;
        return $this;
    }

    /**
     * @param array $userDefinedExtend Setter for userDefinedExtend
     * @return Ausstattung
     */
    public function setUserDefinedExtend(array $userDefinedExtend)
    {
        $this->userDefinedExtend = $userDefinedExtend;
        return $this;
    }

    /**
     * @param array $userDefinedSimplefield Setter for userDefinedSimplefield
     * @return Ausstattung
     */
    public function setUserDefinedSimplefield(array $userDefinedSimplefield)
    {
        $this->userDefinedSimplefield = $userDefinedSimplefield;
        return $this;
    }

    /**
     * @param bool $waschTrockenraum Setter for waschTrockenraum
     * @return Ausstattung
     */
    public function setWaschTrockenraum(?bool $waschTrockenraum)
    {
        $this->waschTrockenraum = $waschTrockenraum;
        return $this;
    }

    /**
     * @param bool $wellnessbereich Setter for wellnessbereich
     * @return Ausstattung
     */
    public function setWellnessbereich(?bool $wellnessbereich)
    {
        $this->wellnessbereich = $wellnessbereich;
        return $this;
    }

    /**
     * @param bool $wgGeeignet Setter for wgGeeignet
     * @return Ausstattung
     */
    public function setWgGeeignet(?bool $wgGeeignet)
    {
        $this->wgGeeignet = $wgGeeignet;
        return $this;
    }

    /**
     * @param bool $wintergarten Setter for wintergarten
     * @return Ausstattung
     */
    public function setWintergarten(?bool $wintergarten)
    {
        $this->wintergarten = $wintergarten;
        return $this;
    }
}
