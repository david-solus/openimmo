<?php

namespace REO\OpenImmo\Tests\Generator;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use REO\OpenImmo\API\Aktion;
use REO\OpenImmo\API\Anbieter;
use REO\OpenImmo\API\Ausblick;
use REO\OpenImmo\API\AussenCourtage;
use REO\OpenImmo\API\Bewertung;
use REO\OpenImmo\API\Distanzen;
use REO\OpenImmo\API\DistanzenSport;
use REO\OpenImmo\API\Feld;
use REO\OpenImmo\API\Geo;
use REO\OpenImmo\API\Immobilie;
use REO\OpenImmo\API\Infrastruktur;
use REO\OpenImmo\API\Kontaktperson;
use REO\OpenImmo\API\Nutzungsart;
use REO\OpenImmo\API\Objektart;
use REO\OpenImmo\API\Objektkategorie;
use REO\OpenImmo\API\Openimmo;
use REO\OpenImmo\API\Uebertragung;
use REO\OpenImmo\API\Vermarktungsart;
use REO\OpenImmo\API\VerwaltungTechn;
use REO\OpenImmo\API\Wohnung;

class SymfonyJsonSerializerTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    protected $serializerContext = [
        AbstractObjectNormalizer::SKIP_NULL_VALUES       => true,
        AbstractObjectNormalizer::PRESERVE_EMPTY_OBJECTS => false,
        'json_encode_options'                            => \JSON_PRESERVE_ZERO_FRACTION
    ];

    /**
     *
     */
    public function setUp(): void
    {
        $encoders    = [new JsonEncoder()];
        $normalizers = [
            new DateTimeNormalizer(),
            new GetSetMethodNormalizer()
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function testWriteImmobilieJson()
    {
        $jsonString = '{
            "geo": {
                "userDefinedAnyfield": [],
                "userDefinedExtend": [],
                "userDefinedSimplefield": []
            },
            "kontaktperson": {
                "anrede": "Herr",
                "emailSonstige": [],
                "name": "John Doe",
                "telSonstige": [],
                "userDefinedAnyfield": [],
                "userDefinedExtend": [],
                "userDefinedSimplefield": []
            },
            "objektkategorie": {
                "nutzungsart": {
                    "gewerbe": false,
                    "wohnen": false
                },
                "objektart": {
                    "bueroPraxen": [],
                    "einzelhandel": [],
                    "freizeitimmobilieGewerblich": [],
                    "gastgewerbe": [],
                    "grundstueck": [],
                    "hallenLagerProd": [],
                    "haus": [],
                    "landUndForstwirtschaft": [],
                    "objektartZusatz": [],
                    "parken": [],
                    "sonstige": [],
                    "wohnung": [],
                    "zimmer": [],
                    "zinshausRenditeobjekt": []
                },
                "userDefinedAnyfield": [],
                "userDefinedExtend": [],
                "userDefinedSimplefield": [],
                "vermarktungsart": {
                    "kauf": true,
                    "mietePacht": false
                }
            },
            "userDefinedAnyfield": [],
            "userDefinedExtend": [],
            "userDefinedSimplefield": [],
            "verwaltungTechn": {
                "aktion": {},
                "objektnrExtern": "456",
                "openimmoObid": "123",
                "standVom": "2021-06-30T09:54:33+00:00",
                "userDefinedAnyfield": [],
                "userDefinedExtend": [],
                "userDefinedSimplefield": []
            },
            "weitereAdresse": []
        }';

        $data = new Immobilie();
        $data->setKontaktperson((new Kontaktperson())->setAnrede('Herr')->setName('John Doe'));
        $data->setGeo(new Geo());
        $data->setObjektkategorie(
            (new Objektkategorie())
                ->setNutzungsart((new Nutzungsart())->setGewerbe(false)->setWohnen(false))
                ->setObjektart(new Objektart())
                ->setVermarktungsart((new Vermarktungsart())->setKauf(true)->setMietePacht(false))
        );
        $data->setVerwaltungTechn(
            (new VerwaltungTechn())
                ->setAktion(new Aktion())
                ->setObjektnrExtern('456')
                ->setOpenimmoObid('123')
                ->setStandVom(new \DateTime('@1625046873'))
        );

        $jsonContent = $this->serializer->serialize($data, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteUebertragungJson()
    {
        $jsonString = '{
            "art": "ONLINE",
            "modus": "NEW",
            "regiId": "ABCD143",
            "sendersoftware": "OIGEN",
            "senderversion": "0.9",
            "technEmail": "",
            "timestamp": "2014-06-01T10:00:00+00:00",
            "umfang": "VOLL",
            "version": "1.2.7"
        }';

        $uebertragung = new Uebertragung();
        $uebertragung
            ->setArt(Uebertragung::ART_ONLINE)
            ->setUmfang(Uebertragung::UMFANG_VOLL)
            ->setModus(Uebertragung::MODUS_NEW)
            ->setVersion('1.2.7')
            ->setSendersoftware('OIGEN')
            ->setSenderversion('0.9')
            ->setTechnEmail('')
            ->setTimestamp(new \DateTime('2014-06-01T10:00:00'))
            ->setRegiId('ABCD143');

        $jsonContent = $this->serializer->serialize($uebertragung, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteUebertragungJsonRealWorld()
    {
        $jsonString = '{
            "art": "OFFLINE",
            "modus": "CHANGE",
            "sendersoftware": "OOF",
            "senderversion": "$Rev: 85202 $",
            "technEmail": "xxx@xxx.de",
            "timestamp": "2019-09-30T12:42:27+00:00",
            "umfang": "TEIL",
            "version": "1.2.7"
        }';

        $uebertragung = new Uebertragung();
        $uebertragung
            ->setArt(Uebertragung::ART_OFFLINE)
            ->setUmfang(Uebertragung::UMFANG_TEIL)
            ->setModus(Uebertragung::MODUS_CHANGE)
            ->setVersion('1.2.7')
            ->setSendersoftware('OOF')
            ->setSenderversion('$Rev: 85202 $')
            ->setTechnEmail('xxx@xxx.de')
            ->setTimestamp(new \DateTime('2019-09-30T12:42:27.000+00:00'));

        $jsonContent = $this->serializer->serialize($uebertragung, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteNutzungsartJsonAsUsedInReadme()
    {
        $jsonString  = '{
            "anlage": false,
            "gewerbe": false,
            "waz": false,
            "wohnen": true
        }';
        $nutzungsart = new Nutzungsart();
        $nutzungsart
            ->setWohnen(true)
            ->setGewerbe(false)
            ->setAnlage(false)
            ->setWaz(false);

        $jsonContent = $this->serializer->serialize($nutzungsart, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteDistanzenZuSportJson()
    {
        $jsonString = '{"distanzZuSport": "SEE", "value": 15}';
        $phpObj     = new DistanzenSport(DistanzenSport::DISTANZ_ZU_SPORT_SEE, 15);

        $jsonContent = $this->serializer->serialize($phpObj, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteInfrastrukturJsonAsUsedInReadme()
    {
        $jsonString    = '{
            "ausblick": {
                "blick": "BERGE"
            },
            "distanzen": [
                {
                    "distanzZu": "HAUPTSCHULE",
                    "value": "22.0"
                }
            ],
            "distanzenSport": [
                {
                    "distanzZuSport": "SEE",
                    "value": 15
                }
            ],
            "zulieferung": false,
            "userDefinedAnyfield": [],
            "userDefinedExtend": [],
            "userDefinedSimplefield": []
        }';
        $infrastruktur = new Infrastruktur();
        $infrastruktur
            ->setZulieferung(false)
            ->setAusblick((new Ausblick())->setBlick(Ausblick::BLICK_BERGE))
            ->setDistanzenSport([
                new DistanzenSport(DistanzenSport::DISTANZ_ZU_SPORT_SEE, 15)
            ])
            ->setDistanzen([
                new Distanzen(Distanzen::DISTANZ_ZU_HAUPTSCHULE, '22.0')
            ]);

        $jsonContent = $this->serializer->serialize($infrastruktur, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteAnbieterJson()
    {
        $jsonString = '{
            "anbieter": [
                {
                    "firma": "MusterMannFrau Immobilien",
                    "immobilie": [],
                    "lizenzkennung": "ABCD13",
                    "openimmoAnid": "MUSTER",
                    "userDefinedAnyfield": [],
                    "userDefinedExtend": [],
                    "userDefinedSimplefield": []
                }
            ],
            "uebertragung": {
                "art": "OFFLINE",
                "modus": "CHANGE",
                "sendersoftware": "OOF",
                "senderversion": "$Rev: 85202 $",
                "technEmail": "xxx@xxx.de",
                "timestamp": "2019-09-30T12:42:27+00:00",
                "umfang": "TEIL",
                "version": "1.2.7"
            },
            "userDefinedAnyfield": [],
            "userDefinedSimplefield": []
        }';

        $openImmo = new Openimmo();
        $openImmo
            ->setAnbieter([
                (new Anbieter())
                    ->setFirma('MusterMannFrau Immobilien')
                    ->setLizenzkennung('ABCD13')
                    ->setOpenimmoAnid('MUSTER')
            ])
            ->setUebertragung(
                (new Uebertragung())
                    ->setArt(Uebertragung::ART_OFFLINE)
                    ->setUmfang(Uebertragung::UMFANG_TEIL)
                    ->setModus(Uebertragung::MODUS_CHANGE)
                    ->setVersion('1.2.7')
                    ->setSendersoftware('OOF')
                    ->setSenderversion('$Rev: 85202 $')
                    ->setTechnEmail('xxx@xxx.de')
                    ->setTimestamp(new \DateTime('2019-09-30T12:42:27.000+00:00'))
            );

        $jsonContent = $this->serializer->serialize($openImmo, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteObjektKategorieJson()
    {
        $jsonString = '{
            "nutzungsart": {
                "gewerbe": false,
                "wohnen": true
            },
            "objektart": {
                "bueroPraxen": [],
                "einzelhandel": [],
                "freizeitimmobilieGewerblich": [],
                "gastgewerbe": [],
                "grundstueck": [],
                "hallenLagerProd": [],
                "haus": [],
                "landUndForstwirtschaft": [],
                "objektartZusatz": [
                    "Dachgeschoss"
                ],
                "parken": [],
                "sonstige": [],
                "wohnung": [
                    {
                        "wohnungtyp": "MAISONETTE"
                    }
                ],
                "zimmer": [],
                "zinshausRenditeobjekt": []
            },
            "userDefinedAnyfield": [],
            "userDefinedExtend": [],
            "userDefinedSimplefield": [],
            "vermarktungsart": {
                "kauf": false,
                "mietePacht": true
            }
        }';

        $category = new Objektkategorie();
        $category->setNutzungsart((new Nutzungsart())->setWohnen(true)->setGewerbe(false));
        $category->setVermarktungsart((new Vermarktungsart())->setKauf(false)->setMietePacht(true));

        $art = new Objektart();
        $art->setWohnung([(new Wohnung())->setWohnungtyp(Wohnung::WOHNUNGTYP_MAISONETTE)]);
        $art->setObjektartZusatz(['Dachgeschoss']);

        $category->setObjektart($art);
        $jsonContent = $this->serializer->serialize($category, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteComplexTypeMixed()
    {
        $jsonString = '{"value": "k.A."}';
        $subject    = new AussenCourtage(null, 'k.A.');

        $jsonContent = $this->serializer->serialize($subject, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }

    public function testWriteComplexType()
    {
        $jsonString = '{
            "feld": [
                {
                    "modus": [
                        "kauf"
                    ],
                    "name": "abc",
                    "typ": [
                        "int"
                    ],
                    "wert": "100"
                }
            ]
        }';
        $subject    = new Bewertung();
        $subject->setFeld([new Feld('abc', '100', ['int'], ['kauf'])]);

        $jsonContent = $this->serializer->serialize($subject, JsonEncoder::FORMAT, $this->serializerContext);
        $this->assertJsonStringEqualsJsonString($jsonString, $jsonContent);
    }
}
