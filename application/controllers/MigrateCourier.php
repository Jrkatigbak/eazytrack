<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MigrateCourier extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('plans_model');
	}

    // Procedures on how to migrate
    // 1. Run the API from aftership
    // 2. Copy the response
    // 3. paste the new reponse here in data method
    // 4. Run this controller in you browser

	public function index()
	{
        $data = $this->data();
        $data = json_decode($data,true);
       
        $insertArray = array();
        foreach($data as $row){
            $new_add = array(
                'slug'                      =>$row['slug'],
                'name'                      =>$row['name'],
                'phone'                     =>$row['phone'],
                'other_name'                =>$row['other_name'],
                'web_url'                   =>$row['web_url'],
                // 'required_fields'           =>$row['required_fields'],
                // 'optional_fields'           =>$row['optional_fields'],
                'default_language'          =>$row['default_language'],
                // 'support_languages'         =>$row['support_languages'],
                // 'service_from_country_iso3' =>$row['service_from_country_iso3']
            );
           array_push($insertArray,$new_add);
        }
        $this->db->query('delete from couriers'); 
        $this->db->insert_batch('couriers', $insertArray); 

    }
    
    public function data()
    {
        return '
            [
                
            {
                "slug": "tuffnells-reference",
                "name": "Tuffnells Parcels Express- Reference",
                "phone": "+0330 838 4230",
                "other_name": "",
                "web_url": "https://www.tuffnells.co.uk/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "eu-fleet-solutions",
                "name": "EU Fleet Solutions",
                "phone": "+44 0121 573 0320",
                "other_name": "",
                "web_url": "http://www.eufleetsolutions.co.uk/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "mara-xpress",
                "name": "Mara Xpress",
                "phone": "+971 43411010",
                "other_name": "",
                "web_url": "http://www.maraxpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ARE"
                ]
            },
            {
                "slug": "dsv",
                "name": "DSV",
                "phone": "+1 (732) 850-8000",
                "other_name": "",
                "web_url": "http://www.dsv.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "xdp-uk-reference",
                "name": "XDP Express Reference",
                "phone": "+44 843 1782222",
                "other_name": "XDP UK",
                "web_url": "http://www.xdp.co.uk/express/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "pfcexpress",
                "name": "PFC Express",
                "phone": "+86 0755-83727415",
                "other_name": "PFCu7687u5bb6u7269u6d41",
                "web_url": "http://www.pfcexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "tourline",
                "name": "tourline",
                "phone": "+",
                "other_name": "ctt",
                "web_url": "https://www.tourlineexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP",
                    "PRT"
                ]
            },
            {
                "slug": "ninjavan-my",
                "name": "Ninja Van Malaysia",
                "phone": "011-1722 5600",
                "other_name": "NinjaVan MY",
                "web_url": "http://ninjavan.my",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "taiwan-post",
                "name": "Taiwan Post",
                "phone": "+886 (02)2703-7527",
                "other_name": "Chunghwa Post, 台灣中華郵政",
                "web_url": "http://www.post.gov.tw/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "zh-TW"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "delnext",
                "name": "Delnext",
                "phone": "+(351) 707 019 368 (+34) 902 787 695",
                "other_name": "",
                "web_url": "https://www.delnext.com/EN/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "cnexps",
                "name": "CNE Express",
                "phone": "+86 400 021 5600",
                "other_name": "国际快递",
                "web_url": "http://www.cne.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "gdex",
                "name": "GDEX",
                "phone": "+6 03-6419 5003",
                "other_name": "GD Express",
                "web_url": "http://www.gdexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "expeditors-api-ref",
                "name": "Expeditors API Reference",
                "phone": null,
                "other_name": "",
                "web_url": "https://www.expeditors.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "ecargo-asia",
                "name": "Ecargo",
                "phone": "+82 (0) 70-4940-0025",
                "other_name": "Ecargo Pte. Ltd",
                "web_url": "http://ecargo.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "deutsch-post",
                "name": "Deutsche Post Mail",
                "phone": "+49 (0) 180 2 000221",
                "other_name": "dpdhl",
                "web_url": "https://www.deutschepost.de/sendung/simpleQuery.html",
                "required_fields": [
                    "tracking_ship_date"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "fetchr-webhook",
                "name": "Mena 360 (Fetchr)",
                "phone": "+971-4801-8100",
                "other_name": "",
                "web_url": "https://fetchr.us/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ARE"
                ]
            },
            {
                "slug": "tnt",
                "name": "TNT",
                "phone": "+1 800 558 5555",
                "other_name": "TNT Express",
                "web_url": "http://www.tnt.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_destination_country",
                    "tracking_origin_country"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "packs",
                "name": "Packs",
                "phone": "31 888040800",
                "other_name": null,
                "web_url": "http://www.packs.nl/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "dpd-ro",
                "name": "DPD Romania",
                "phone": "+40 031 824 9090",
                "other_name": "",
                "web_url": "https://www.dpd.com/ro_en",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ROU"
                ]
            },
            {
                "slug": "kiala",
                "name": "Kiala",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.kiala.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "nim-express",
                "name": "Nim Express",
                "phone": "+66 9 05541988",
                "other_name": "Armadillio Express",
                "web_url": "https://www.nimexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "007ex",
                "name": "007EX",
                "phone": "+7 88003019226",
                "other_name": "",
                "web_url": "http://www.007ex.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "mailplus",
                "name": "MailPlus",
                "phone": "+310 5357266",
                "other_name": "",
                "web_url": "https://www.nittsu.com/epelicangen2/track/Track.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "interparcel-au",
                "name": "Interparcel Australia",
                "phone": "+1300 006 031",
                "other_name": "Interparcel",
                "web_url": "https://au.interparcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "anserx",
                "name": "ANSERX",
                "phone": "8613127912789",
                "other_name": null,
                "web_url": "http://www.anserx.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "nightline",
                "name": "Nightline",
                "phone": "+353 (0)1 883 5400",
                "other_name": "",
                "web_url": "http://www.nightline.ie",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "taxydromiki",
                "name": "Geniki Taxydromiki",
                "phone": "+30 210 4851100",
                "other_name": "ΓΕΝΙΚΗ ΤΑΧΥΔΡΟΜΙΚΗ",
                "web_url": "http://www.taxydromiki.gr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "el",
                "support_languages": [
                    "el",
                    "en"
                ],
                "service_from_country_iso3": [
                    "GRC"
                ]
            },
            {
                "slug": "dajin",
                "name": "Shanghai Aqrum Chemical Logistics Co.Ltd",
                "phone": "+81-21-34307666",
                "other_name": "Dajin",
                "web_url": "http://www.aqrum.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "wizmo",
                "name": "Wizmo",
                "phone": "+18444694966",
                "other_name": "",
                "web_url": "https://shipwizmo.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA",
                    "CAN"
                ]
            },
            {
                "slug": "wepost",
                "name": "WePost Logistics",
                "phone": "+60183887399",
                "other_name": "",
                "web_url": "https://www.wepost.com.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "nova-poshtaint",
                "name": "Nova Poshta (International)",
                "phone": "+380 50-4-500-609",
                "other_name": "Новая Почта",
                "web_url": "http://novaposhta.ua/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "uk",
                "support_languages": [
                    "uk"
                ],
                "service_from_country_iso3": [
                    "UKR"
                ]
            },
            {
                "slug": "tnt-fr",
                "name": "TNT France",
                "phone": "+33 4 72 80 77 77",
                "other_name": "TNT Express FR",
                "web_url": "http://www.tnt.fr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "doora",
                "name": "Doora Logistics",
                "phone": "+82226652490",
                "other_name": "",
                "web_url": "http://www.doora.co.kr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "delhivery",
                "name": "Delhivery",
                "phone": "+91 (124) 6719500",
                "other_name": "Gharpay",
                "web_url": "http://www.delhivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "cae-delivers",
                "name": "CAE Delivers",
                "phone": "+44 161 872 6893",
                "other_name": "",
                "web_url": "https://caedelivers.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "ukrposhta",
                "name": "UkrPoshta",
                "phone": "+380 (0) 800-500-440",
                "other_name": "Укрпошта",
                "web_url": "http://www.ukrposhta.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "uk",
                "support_languages": [
                    "uk"
                ],
                "service_from_country_iso3": [
                    "UKR"
                ]
            },
            {
                "slug": "sagawa",
                "name": "Sagawa",
                "phone": "+81 0120-18-9595",
                "other_name": "佐川急便",
                "web_url": "http://www.sagawa-exp.co.jp/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ja",
                "support_languages": [
                    "ja"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "ecourier",
                "name": "eCourier",
                "phone": "+8801819182157",
                "other_name": "",
                "web_url": "https://www.ecourier.com.bd/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BGD"
                ]
            },
            {
                "slug": "chronopost-france",
                "name": "Chronopost France",
                "phone": "+33 (0) 969 391 391",
                "other_name": "La Poste EMS",
                "web_url": "http://www.chronopost.fr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr",
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "agility",
                "name": "Agility",
                "phone": "+1 860 544 2542",
                "other_name": null,
                "web_url": "https://www.agility.com/en/homepage/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA",
                    "KWT"
                ]
            },
            {
                "slug": "gls-slovakia",
                "name": "GLS General Logistics Systems Slovakia s.r.o.",
                "phone": "+421 455242500",
                "other_name": "",
                "web_url": "https://gls-group.eu/SK/en/the-company",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "sk",
                "support_languages": [
                    "sk"
                ],
                "service_from_country_iso3": [
                    "SVK"
                ]
            },
            {
                "slug": "sweden-posten",
                "name": "PostNord Sweden",
                "phone": "+46 8 23 22 20",
                "other_name": "Sweden Post, Posten, Sweden Posten",
                "web_url": "http://www.postnord.se/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "lexship",
                "name": "LexShip",
                "phone": "+91 8448444097",
                "other_name": "",
                "web_url": "https://www.lexship.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "ark-logistics",
                "name": "ARK Logistics",
                "phone": "+44 1254 771703",
                "other_name": null,
                "web_url": "https://arklogistics.co.uk",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "hermes-de",
                "name": "Hermes Germany",
                "phone": "+49 1806-311211",
                "other_name": "myhermes.de, Hermes Logistik Gruppe Deutschland",
                "web_url": "https://www.myhermes.de/wps/portal/paket/Home/privatkunden/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "de",
                "support_languages": [
                    "de",
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "sk-posta",
                "name": "Slovenská pošta, a.s.",
                "phone": "+421 48 437 87 77",
                "other_name": "",
                "web_url": "https://www.posta.sk/en",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SVK"
                ]
            },
            {
                "slug": "specialisedfreight-za",
                "name": "Specialised Freight",
                "phone": "+27 21 528 1000",
                "other_name": "SFS",
                "web_url": "http://www.specialisedfreight.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "clevy-links",
                "name": "Clevy Links",
                "phone": "+755 26902130",
                "other_name": "",
                "web_url": "http://clevylinks.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "ubi-logistics",
                "name": "UBI Smart Parcel",
                "phone": "+61-2-9355 3888",
                "other_name": "",
                "web_url": "http://www.ubismartparcel.com/en",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "eshipping",
                "name": "Eshipping",
                "phone": "+86 18244976697",
                "other_name": "Eshipping Global Supply Chain Management(Shenzhen)Co. Ltd",
                "web_url": "http://www.eshippinggateway.com/uexpress/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "gls",
                "name": "GLS",
                "phone": "+011 353 1 860 6200",
                "other_name": "General Logistics Systems",
                "web_url": "https://gls-group.eu/EU/en/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "sf-express",
                "name": "S.F. Express",
                "phone": "+852 273 00 273 / +86 4008-111-111 / +886 800 088 830/+1 855 901 1133 / +65 66030630",
                "other_name": "順豊快遞, SF",
                "web_url": "http://www.sf-express.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG",
                    "CHN"
                ]
            },
            {
                "slug": "borderexpress",
                "name": "Border Express",
                "phone": "+61 297327300",
                "other_name": "",
                "web_url": "https://www.borderexpress.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "abcustom",
                "name": "AB Custom Group",
                "phone": "+34 934 987 715",
                "other_name": "",
                "web_url": "http://www.abcustom.es/portal/en/home",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "parcel2go",
                "name": "Parcel2Go",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.parcel2go.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "osm-worldwide",
                "name": "OSM Worldwide",
                "phone": "+866 681 7867",
                "other_name": "",
                "web_url": "https://www.osmworldwide.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "roadbull",
                "name": "Roadbull Logistics",
                "phone": "+65 3100 1111",
                "other_name": "Roadbull Logistics Pte Ltd",
                "web_url": "http://www.roadbull.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "yodel-international",
                "name": "Yodel International",
                "phone": "+44 844 755 0117",
                "other_name": "Home Delivery Network, HDNL",
                "web_url": "http://www.yodel.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "szdpex",
                "name": "DPEX China",
                "phone": "+86 755-8829 7707",
                "other_name": "DPEX（深圳）国际物流, Toll China",
                "web_url": "http://www.szdpex.com.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "brt-it-sender-ref",
                "name": "BRT Bartolini(Sender Reference)",
                "phone": "+",
                "other_name": "",
                "web_url": "http://www.brt.it",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "tnt-uk-reference",
                "name": "TNT UK Reference",
                "phone": "+44 800 100 600",
                "other_name": "TNT UK consignment reference",
                "web_url": "http://www.tnt.com/webtracker/uktracking.do",
                "required_fields": [],
                "optional_fields": [
                    "tracking_ship_date"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "ceva-tracking",
                "name": "CEVA Package",
                "phone": "+13MEGA (136342)",
                "other_name": "",
                "web_url": "https://www.cevalogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN",
                    "USA"
                ]
            },
            {
                "slug": "ec-firstclass",
                "name": "Chukou1",
                "phone": "+86 4006 988 223",
                "other_name": "出口易、Chukou1、CK1",
                "web_url": "https://www.chukou1.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "el",
                "support_languages": [
                    "el"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "saudi-post",
                "name": "Saudi Post",
                "phone": "+966 9200 05700",
                "other_name": "البريد السعودي",
                "web_url": "http://www.sp.com.sa/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SAU"
                ]
            },
            {
                "slug": "tophatterexpress",
                "name": "Tophatter Express",
                "phone": "+86 021-66776511",
                "other_name": "",
                "web_url": "http://www.tophatterexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "champion-logistics",
                "name": "Champion Logistics",
                "phone": "+1 708-562-4200",
                "other_name": "Champlog",
                "web_url": "https://www.champlog.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dtdc-au",
                "name": "DTDC Australia",
                "phone": "+1300 658 775",
                "other_name": "",
                "web_url": "http://www.dtdcaustralia.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "bluedart",
                "name": "Bluedart",
                "phone": "18602331234",
                "other_name": "Blue Dart Express",
                "web_url": "http://www.bluedart.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "myhermes-uk",
                "name": "myHermes UK",
                "phone": "+44 330 333 6556",
                "other_name": "",
                "web_url": "https://www.myhermes.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "costmeticsnow",
                "name": "Cosmetics Now",
                "phone": "+1-415-230-2376",
                "other_name": "CosmeticsNow",
                "web_url": "https://www.cosmeticsnow.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "singapore-speedpost",
                "name": "Singapore Speedpost",
                "phone": "+65 6222 5777",
                "other_name": "Singapore EMS",
                "web_url": "http://www.speedpost.com.sg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "cbl-logistica",
                "name": "CBL Logistica",
                "phone": "+34902887887",
                "other_name": "",
                "web_url": "http://www.cbl-logistica.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "paperfly",
                "name": "Paperfly Private Limited",
                "phone": "01998706032",
                "other_name": "",
                "web_url": "http://paperfly.com.bd/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BGD"
                ]
            },
            {
                "slug": "acommerce",
                "name": "aCommerce",
                "phone": "+662 683 4960",
                "other_name": "",
                "web_url": "http://www.acommerce.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "lalamove",
                "name": "Lalamove",
                "phone": "+852 37013701",
                "other_name": "",
                "web_url": "http://lalamove.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "spectran",
                "name": "Spectran",
                "phone": "18476408181",
                "other_name": null,
                "web_url": "https://shipspectran.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "sap-express",
                "name": "SAP EXPRESS",
                "phone": "+62 02122806611",
                "other_name": "",
                "web_url": "www.sap-express.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "spoton",
                "name": "SPOTON Logistics Pvt Ltd",
                "phone": "+1800 200 1414",
                "other_name": "",
                "web_url": "http://www.spoton.co.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "acscourier",
                "name": "ACS Courier",
                "phone": "+30 210 81 90 000",
                "other_name": "Αναζήτηση Καταστημάτων",
                "web_url": "https://www.acscourier.net/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GRC"
                ]
            },
            {
                "slug": "flytexpress",
                "name": "Flyt Express",
                "phone": "+86 400-888-4003",
                "other_name": "飞特物流",
                "web_url": "http://www.flytexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "estafeta",
                "name": "Estafeta",
                "phone": "+52 1-800-378-2338",
                "other_name": "Estafeta Mexicana",
                "web_url": "http://www.estafeta.com/default.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es",
                    "en"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "fonsen",
                "name": "Fonsen Logistics",
                "phone": "+65 9727 5725",
                "other_name": "",
                "web_url": "https://portal.fonsenlogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "postnord",
                "name": "PostNord Logistics",
                "phone": "+46 771 33 33 10",
                "other_name": "Posten Norden",
                "web_url": "http://www.postnordlogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "trunkrs-webhook",
                "name": "Trunkrs",
                "phone": "+31 0 85 060 1410",
                "other_name": "",
                "web_url": "https://www.trunkrs.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "milkman",
                "name": "Milkman",
                "phone": "+9215500969",
                "other_name": "",
                "web_url": "https://milkman.it/#/en/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "cj-malaysia-international",
                "name": "CJ Century (International)",
                "phone": "+03-33612888",
                "other_name": "CJ Logistics",
                "web_url": "https://www.cjlogistics.com/en/network/en-my",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "directlog",
                "name": "Directlog",
                "phone": "+55 11 4003 2034",
                "other_name": "Direct Express",
                "web_url": "http://www.directlog.com.br/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "malaysia-post-posdaftar",
                "name": "Malaysia Post - Registered",
                "phone": "+603 27279100",
                "other_name": "PosDaftar",
                "web_url": "http://www.pos.com.my",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "jcex",
                "name": "JCEX",
                "phone": "+86 571-86436777",
                "other_name": "JiaCheng, 杭州佳成",
                "web_url": "http://www.jcex.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "bh-posta",
                "name": "JP BH Pošta",
                "phone": "+387 033 723 440",
                "other_name": "Bosnia and Herzegovina Post",
                "web_url": "http://www.posta.ba/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "bs",
                "support_languages": [
                    "bs"
                ],
                "service_from_country_iso3": [
                    "BIH"
                ]
            },
            {
                "slug": "freterapido",
                "name": "Frete Rápido",
                "phone": "+55 11 4933-2698",
                "other_name": "",
                "web_url": "https://freterapido.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "arco-spedizioni",
                "name": "Arco Spedizioni SP",
                "phone": "null",
                "other_name": null,
                "web_url": "https://www.arcospedizioni.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "gls-italy",
                "name": "GLS Italy",
                "phone": "+39 199 151188",
                "other_name": "GLS Corriere Espresso",
                "web_url": "http://www.gls-italy.com/index_noreg.asp",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "rzyexpress",
                "name": "RZY Express",
                "phone": "+65 96982006",
                "other_name": "RZYExpress",
                "web_url": "http://rzyexpress.com.sg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "bpost",
                "name": "Bpost",
                "phone": "+32 2 201 23 45",
                "other_name": "Belgian Post, Belgium Post",
                "web_url": "http://www.bpost.be/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BEL"
                ]
            },
            {
                "slug": "nipost",
                "name": "NiPost",
                "phone": "+234 09-3149531",
                "other_name": "Nigerian Postal Service",
                "web_url": "http://www.emsng.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NGA"
                ]
            },
            {
                "slug": "okayparcel",
                "name": "OkayParcel",
                "phone": "+852 9091 7296",
                "other_name": "",
                "web_url": "http://www.okayparcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "shopfans",
                "name": "ShopfansRU LLC",
                "phone": "+1 734 709 1713",
                "other_name": "",
                "web_url": "https://shopfans.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "yunexpress",
                "name": "Yun Express",
                "phone": "+86 400-0262-126",
                "other_name": "云途物流",
                "web_url": "http://www.yunexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "imexglobalsolutions",
                "name": "IMEX Global Solutions",
                "phone": "+800-521-0080",
                "other_name": "",
                "web_url": "http://www.imexglobalsolutions.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "rocketparcel",
                "name": "Rocket Parcel International",
                "phone": "+82-2-6237-1418",
                "other_name": "",
                "web_url": "http://www.rocketparcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "hrvatska-posta",
                "name": "Hrvatska Pošta",
                "phone": "+385 0800 303 304",
                "other_name": "Croatia Post",
                "web_url": "http://www.posta.hr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HRV"
                ]
            },
            {
                "slug": "hh-exp",
                "name": "Hua Han Logistics",
                "phone": "+86-0755-82518733",
                "other_name": "u534eu7ff0u56fdu9645u7269u6d41",
                "web_url": "http://www.hh-exp.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "xq-express",
                "name": "XQ Express",
                "phone": "+86 13824485784",
                "other_name": "u661fu4e7eu7269u6d41",
                "web_url": "http://www.xqkjwl.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "kpost",
                "name": "Korea Post",
                "phone": "+82 2 2195 1114",
                "other_name": "우정사업본부",
                "web_url": "http://www.koreapost.go.kr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "designertransport-webhook",
                "name": "Designer Transport",
                "phone": "1300 076 099",
                "other_name": null,
                "web_url": "https://designertransport.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "spanish-seur-api",
                "name": "Spanish Seur API",
                "phone": "+34 902101010",
                "other_name": "",
                "web_url": "https://www.seur.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "ziingfinalmile",
                "name": "Ziing Final Mile Inc",
                "phone": null,
                "other_name": null,
                "web_url": "https://www.ziingfinalmile.ca/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "fedex",
                "name": "FedEx",
                "phone": "1 800 463 3339 / 03456 070809 / 1800 419 4343",
                "other_name": "Federal Express",
                "web_url": "http://www.fedex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "jayonexpress",
                "name": "Jayon Express (JEX)",
                "phone": "",
                "other_name": "",
                "web_url": "http://jayonexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "planzer",
                "name": "Planzer Group",
                "phone": "+41 44 438 50 40",
                "other_name": "",
                "web_url": "https://www.planzer.ch/en",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHE"
                ]
            },
            {
                "slug": "omniparcel",
                "name": "Omni Parcel",
                "phone": "-",
                "other_name": "Omni-Channel Logistics (Seko)",
                "web_url": "http://track.omniparcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "buylogic",
                "name": "Buylogic",
                "phone": "+1 800-610-6500",
                "other_name": "捷买送",
                "web_url": "http://www.buylogic.cc/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "first-logistics",
                "name": "First Logistics",
                "phone": "+62 021 - 73880707",
                "other_name": "PT Synergy First Logistics",
                "web_url": "http://www.jne.co.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "matdespatch",
                "name": "Matdespatch",
                "phone": "+6011 1080 4414",
                "other_name": "",
                "web_url": "https://www.matdespatch.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "vnpost-ems",
                "name": "Vietnam Post EMS",
                "phone": "+84 1900 54 54 81",
                "other_name": "VNPost EMS",
                "web_url": "http://www.vnpost.vn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "vi",
                "support_languages": [
                    "vi"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "dhlparcel-es",
                "name": "DHL Parcel Spain",
                "phone": "+34 902123030",
                "other_name": "",
                "web_url": "https://www.dhlparcel.es/en/private-customers.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "loomis-express",
                "name": "Loomis Express",
                "phone": "1-(855)256-6647",
                "other_name": "",
                "web_url": "https://www.loomisexpress.com/loomship/en/Home/Home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "midland",
                "name": "Midland",
                "phone": "+1 888 643 5263",
                "other_name": "",
                "web_url": "https://www.midlandtransport.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "ocs-worldwide",
                "name": "OCS WORLDWIDE",
                "phone": "+44 207 640 3800",
                "other_name": "",
                "web_url": "https://www.ocsworldwide.co.uk",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "taqbin-jp",
                "name": "Yamato Japan",
                "phone": "+81 0120-17-9625",
                "other_name": "ヤマト運輸, TAQBIN",
                "web_url": "http://www.kuronekoyamato.co.jp/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ja",
                "support_languages": [
                    "ja"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "sefl",
                "name": "Southeastern Freight Lines",
                "phone": "",
                "other_name": "",
                "web_url": "https://sefl.com/seflWebsite/index.jsp",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "intexpress",
                "name": "Internet Express",
                "phone": "+27 0860 439 773",
                "other_name": "",
                "web_url": "http://www.internetexpress.co.za",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "chitchats",
                "name": "Chit Chats",
                "phone": "+1-844-842-8777",
                "other_name": "",
                "web_url": "https://chitchats.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "cj-korea-thai",
                "name": "CJ Korea Express",
                "phone": "+66 2 751 0044",
                "other_name": "",
                "web_url": "https://www.cjlogistics.com/en/network/th-th",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "urgent-cargus",
                "name": "Urgent Cargus",
                "phone": "+021 9330",
                "other_name": "",
                "web_url": "https://www.urgentcargus.ro/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ro",
                "support_languages": [
                    "ro"
                ],
                "service_from_country_iso3": [
                    "ROU"
                ]
            },
            {
                "slug": "lwe-hk",
                "name": "Logistic Worldwide Express",
                "phone": "+852 3421 1122",
                "other_name": "LWE",
                "web_url": "http://www.lwe.com.hk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "ecom-express",
                "name": "Ecom Express",
                "phone": "+91 011-30212000",
                "other_name": "EcomExpress",
                "web_url": "http://www.ecomexpress.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "zjs-express",
                "name": "ZJS International",
                "phone": "+86 4006789000",
                "other_name": "宅急送快運",
                "web_url": "http://www.zjs.com.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "kerryttc-vn",
                "name": "Kerry Express (Vietnam) Co Ltd",
                "phone": "+84 08 38112112",
                "other_name": "KTTC",
                "web_url": "http://www.kerryexpress.com.vn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "post-slovenia",
                "name": "Post of Slovenia",
                "phone": "+386 080 14 00",
                "other_name": "",
                "web_url": "https://www.posta.si/zasebno",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SVN"
                ]
            },
            {
                "slug": "dhl-global-forwarding",
                "name": "DHL Global Forwarding",
                "phone": "1-800-426-5962",
                "other_name": "DHL Logistics",
                "web_url": "https://www.logistics.dhl/fr-fr/home.html?locale=true",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "smooth",
                "name": "Smooth Couriers",
                "phone": "+44 161 883 2773",
                "other_name": "",
                "web_url": "http://www.smoothparcel.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "linkbridge",
                "name": "Link Bridge(BeiJing)international logistics co.,ltd",
                "phone": "+86 01069450988",
                "other_name": "联博瑞翔（北京）国际物流股份有限公司",
                "web_url": "http://www.link-bridge.com.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "mondialrelay",
                "name": "Mondial Relay",
                "phone": "+33 09 69 32 23 32",
                "other_name": "Mondial Relay France",
                "web_url": "http://www.mondialrelay.fr/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "dayton-freight",
                "name": "Dayton Freight",
                "phone": "+000000000000",
                "other_name": "",
                "web_url": "https://www.daytonfreight.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "echo",
                "name": "Echo",
                "phone": "+1 (800) 354-7993",
                "other_name": "Echo Global Logistics",
                "web_url": "http://echo.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "aramex",
                "name": "Aramex",
                "phone": "+971 (600) 544000/ +966 920027447/ +973 (17) 330434 /+968 24473000/   +27 11 457 3000",
                "other_name": "ارامكس",
                "web_url": "http://www.aramex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "dhl",
                "name": "DHL Express",
                "phone": "+1 800 225 5345",
                "other_name": "DHL International",
                "web_url": "https://www.dhl.com/en.html",
                "required_fields": [],
                "optional_fields": [
                    "tracking_destination_country",
                    "tracking_origin_country"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "skypostal",
                "name": "Asendia HK – Premium Service (LATAM)",
                "phone": "+1 (305) 599-1812",
                "other_name": "SkyPostal (Postrac)",
                "web_url": "http://skypostal.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "asendia-uk",
                "name": "Asendia UK",
                "phone": "+44 845 8738155",
                "other_name": "Asendia United Kingdom",
                "web_url": "http://www.asendia.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "poste-italiane-paccocelere",
                "name": "Poste Italiane Paccocelere",
                "phone": "+39 803 160",
                "other_name": "Italian Post EMS / Express",
                "web_url": "http://www.poste.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "poste-italiane",
                "name": "Poste Italiane",
                "phone": "+39 803 160",
                "other_name": "Italian Post",
                "web_url": "http://www.poste.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "wndirect",
                "name": "wnDirect",
                "phone": "+44 1753 561262",
                "other_name": "",
                "web_url": "https://wndirect.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "cpacket",
                "name": "cPacket",
                "phone": "+86 400-999-6128",
                "other_name": "u52a0u90aeu5b9d",
                "web_url": "http://www.canadaposteway.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "westbank-courier",
                "name": "West Bank Courier",
                "phone": "+1-(844) 616-9378",
                "other_name": "",
                "web_url": "https://westbankcourier.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "kwt",
                "name": "Shenzhen Jinghuada Logistics Co., Ltd",
                "phone": "+86 0755 89689111",
                "other_name": "KWT",
                "web_url": "http://www.kwt56.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "dhl-reference",
                "name": "DHL",
                "phone": "",
                "other_name": null,
                "web_url": "https://www.dhl.com/",
                "required_fields": [
                    "tracking_ship_date"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "kurasi",
                "name": "KURASI",
                "phone": "+62 82122258170",
                "other_name": "",
                "web_url": "https://www.kurasi.co.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "dbschenker-sv",
                "name": "DB Schenker Sweden",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.dbschenker.com/se-sv",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SWE"
                ]
            },
            {
                "slug": "eurodis",
                "name": "Eurodis",
                "phone": "",
                "other_name": "",
                "web_url": "http://eurodis.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "alphafast",
                "name": "alphaFAST",
                "phone": "+02 290 2800",
                "other_name": "Alpha",
                "web_url": "http://www.alphafast.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "naqel-express",
                "name": "Naqel Express",
                "phone": "+966598795790",
                "other_name": "",
                "web_url": "https://www.naqelexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SAU"
                ]
            },
            {
                "slug": "eparcel-kr",
                "name": "eParcel Korea",
                "phone": "+822-2664-4032",
                "other_name": "Yong Seoung",
                "web_url": "http://eparcel.kr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "kec",
                "name": "Kerry eCommerce",
                "phone": "+852 6636 6636",
                "other_name": "",
                "web_url": "https://kerry-ecommerce.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG",
                    "CHN"
                ]
            },
            {
                "slug": "korea-post",
                "name": "Korea Post EMS",
                "phone": "+82 2 2195 1114",
                "other_name": "우정사업본부",
                "web_url": "http://www.koreapost.go.kr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "whistl",
                "name": "Whistl",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.whistl.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "4-72",
                "name": "4-72 Entregando",
                "phone": "+57 1 4722000",
                "other_name": "Colombia Postal Service",
                "web_url": "http://4-72.com.co/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "COL"
                ]
            },
            {
                "slug": "sutton",
                "name": "Sutton Transport",
                "phone": "+715-359-5893",
                "other_name": "",
                "web_url": "http://www.suttontrans.com/index.cfm",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "bluecare",
                "name": "Bluecare Express Ltd",
                "phone": "+1 917 200 9215",
                "other_name": "",
                "web_url": "https://www.bluecare.express/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "m-xpress",
                "name": "M Xpress Sdn Bhd",
                "phone": "1300888788",
                "other_name": "",
                "web_url": "http://www.mxpress2u.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "mx-cargo",
                "name": "M&X cargo",
                "phone": "+86 13288486452",
                "other_name": "M&X International Shipping Agency Co.,LTD",
                "web_url": "http://www.mx-56.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "THA",
                    "VNM"
                ]
            },
            {
                "slug": "collectplus",
                "name": "Collect+",
                "phone": "+44 1923 601616",
                "other_name": "Collect Plus UK",
                "web_url": "https://www.collectplus.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "gofly",
                "name": "GoFly",
                "phone": "+86 13143830725",
                "other_name": "GoFlyi",
                "web_url": "http://goflyi.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "elian-post",
                "name": "Yilian (Elian) Supply Chain",
                "phone": "+400-866-8808",
                "other_name": null,
                "web_url": "http://www.elianpost.com/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "ecoutier",
                "name": "eCoutier",
                "phone": "+8801819182157",
                "other_name": "",
                "web_url": "https://www.ecourier.com.bd/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BGD"
                ]
            },
            {
                "slug": "nacex",
                "name": "NACEX",
                "phone": "+34 900 100 000",
                "other_name": "",
                "web_url": "http://nacex.es/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "quantium",
                "name": "Quantium",
                "phone": "+852 2318 1213",
                "other_name": "u51a0u5eadu7269u6d41",
                "web_url": "http://quantiumsolutions.com/hk-tc/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "post-serbia",
                "name": "Post Serbia",
                "phone": "+381 700 100 300",
                "other_name": "Pou0161ta Srbije",
                "web_url": "http://www.posta.rs/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SRB"
                ]
            },
            {
                "slug": "grab-webhook",
                "name": "Grab",
                "phone": null,
                "other_name": null,
                "web_url": "https://www.grab.com/sg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "ocs",
                "name": "OCS ANA Group",
                "phone": "+91 11 44555666",
                "other_name": "",
                "web_url": "http://ocs-india.in/eng/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "aeroflash",
                "name": "Mexico AeroFlash",
                "phone": "+52 55 5445 2100",
                "other_name": "AeroFlash",
                "web_url": "http://www.aeroflash.com.mx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "pflogistics",
                "name": "PFL",
                "phone": "+61 2 9746 9997",
                "other_name": null,
                "web_url": "http://www.pflogistics.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "mikropakket",
                "name": "Mikropakket",
                "phone": "+31 30 220 9011",
                "other_name": "",
                "web_url": "https://www.mikropakket.nl/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "lao-post",
                "name": "Lao Post",
                "phone": "+",
                "other_name": "Laos Postal Service",
                "web_url": "http://www.laopostvte.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "LAO"
                ]
            },
            {
                "slug": "matkahuolto",
                "name": "Matkahuolto",
                "phone": "+358 0800 132 582",
                "other_name": "Oy Matkahuolto Ab",
                "web_url": "https://www.matkahuolto.fi/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fi",
                "support_languages": [
                    "fi"
                ],
                "service_from_country_iso3": [
                    "FIN"
                ]
            },
            {
                "slug": "inpost-paczkomaty",
                "name": "InPost Paczkomaty",
                "phone": "+48 801 400 100",
                "other_name": "",
                "web_url": "https://paczkomaty.pl",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "speedexcourier",
                "name": "Speedex Courier",
                "phone": "+971 600529996",
                "other_name": "Speedex Courier",
                "web_url": "http://www.speedexcourier.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KWT"
                ]
            },
            {
                "slug": "dhl-hk",
                "name": "DHL Hong Kong",
                "phone": "+852 2710-8111",
                "other_name": "DHL HK Domestic",
                "web_url": "http://www.dhl.com.hk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "italy-sda",
                "name": "Italy SDA",
                "phone": "+39 199 113366",
                "other_name": "SDA Express Courier",
                "web_url": "http://www.sda.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "posta-romana",
                "name": "Poșta Română",
                "phone": "+40 021 9393 111",
                "other_name": "Romania Post",
                "web_url": "http://www.posta-romana.ro/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ro",
                "support_languages": [
                    "ro"
                ],
                "service_from_country_iso3": [
                    "ROU"
                ]
            },
            {
                "slug": "tntpost-it",
                "name": "Nexive (TNT Post Italy)",
                "phone": "+39 02 50720011",
                "other_name": "Postnl TNT",
                "web_url": "http://www.nexive.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "pandulogistics",
                "name": "Pandu Logistics",
                "phone": "+62 (021) 461 6007",
                "other_name": "",
                "web_url": "http://pandulogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "id",
                "support_languages": [
                    "id"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "trakpak",
                "name": "TrakPak",
                "phone": "+44 (0) 1268 533114",
                "other_name": "bpost international P2P Mailing Trak Pak",
                "web_url": "http://www.trackmytrakpak.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "shippit",
                "name": "Shippit",
                "phone": "+61 1300 467 447",
                "other_name": "",
                "web_url": "https://www.shippit.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "ghn",
                "name": "Giao hàng nhanh",
                "phone": "+84 19006491",
                "other_name": "Giaohangnhanh.vn, GHN",
                "web_url": "http://giaohangnhanh.vn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "vi",
                "support_languages": [
                    "vi"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "israel-post-domestic",
                "name": "Israel Post Domestic",
                "phone": "+972 2 629 0691",
                "other_name": "חברת דואר ישראל מקומית",
                "web_url": "http://www.israelpost.co.il/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ISR"
                ]
            },
            {
                "slug": "j-net",
                "name": "J-Net",
                "phone": "+86 400-728-7156",
                "other_name": "",
                "web_url": "http://www.j-net.cn/cms",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "jinsung",
                "name": "JINSUNG TRADING",
                "phone": "+603 8601 6261",
                "other_name": "",
                "web_url": "http://jinsung-trading.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "landmark-global",
                "name": "Landmark Global",
                "phone": "+32 2 201 23 45",
                "other_name": "",
                "web_url": "http://landmarkglobal.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BEL"
                ]
            },
            {
                "slug": "skynetworldwide-uae",
                "name": "SkyNet Worldwide Express UAE",
                "phone": "+971 4 282 6555",
                "other_name": "",
                "web_url": "http://www.skynetworldwide.net/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "sapo",
                "name": "South African Post Office",
                "phone": "+27 0860 111 502",
                "other_name": "South African Post Office",
                "web_url": "http://www.postoffice.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "vnpost",
                "name": "Vietnam Post",
                "phone": "+84 1900 54 54 81",
                "other_name": "VNPost",
                "web_url": "http://www.vnpost.vn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "vi",
                "support_languages": [
                    "vi"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "seino",
                "name": "Seino",
                "phone": "+03 3667 0074",
                "other_name": "",
                "web_url": "https://www.seino.co.jp/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "sky-postal",
                "name": "SkyPostal",
                "phone": "+1 305 599 1812",
                "other_name": "",
                "web_url": "http://www.skypostal.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "dpd-uk",
                "name": "DPD UK",
                "phone": "0121 275 0500",
                "other_name": "Dynamic Parcel Distribution UK",
                "web_url": "http://www.dpd.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "panther",
                "name": "Panther",
                "phone": "+60 07-6625692",
                "other_name": "Panther Group UK",
                "web_url": "http://www.pantherpremium.com/Tracking.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "gbs-broker",
                "name": "GBS-Broker",
                "phone": "(+7)(495)7905885",
                "other_name": null,
                "web_url": "https://gbs-broker.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "rpd2man",
                "name": "RPD2man Deliveries",
                "phone": "+44 800 622 6399",
                "other_name": "RPD-2man",
                "web_url": "http://rpd2man.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "alfatrex",
                "name": "AlfaTrex",
                "phone": "+62-21-1500860",
                "other_name": "",
                "web_url": "www.alfatrex.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "detrack",
                "name": "Detrack",
                "phone": "+65 6844 0509",
                "other_name": "Detrack Singapore",
                "web_url": "http://www.detrack.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "dpe-express",
                "name": "DPE Express",
                "phone": "+86 20 36408572",
                "other_name": "Delivery Perfect Express Co.",
                "web_url": "http://www.dpe.net.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "deliveryontime",
                "name": "DELIVERYONTIME LOGISTICS PVT LTD",
                "phone": "+080-43701562",
                "other_name": "",
                "web_url": "http://www.bizlog.in",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "sypost",
                "name": "Sunyou Post",
                "phone": "+1 800-610-6500",
                "other_name": "",
                "web_url": "https://sypost.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "ensenda",
                "name": "Ensenda",
                "phone": "+1-888-407-4640",
                "other_name": "",
                "web_url": "http://ensenda.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "new-zealand-post",
                "name": "New Zealand Post",
                "phone": "+0800 501501",
                "other_name": "NZ Post",
                "web_url": "http://www.nzpost.co.nz/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "cbl-logistica-api",
                "name": "CBL Logistica",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.cbl-logistica.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "australia-post-sftp",
                "name": "Australia Post Sftp",
                "phone": "+61 13 13 18",
                "other_name": "AusPostSftp",
                "web_url": "http://auspost.com.au/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "postnl-3s",
                "name": "PostNL International 3S",
                "phone": "+31 (0)900 0990",
                "other_name": "TNT Post parcel service United Kingdom",
                "web_url": "http://www.postnl.nl/voorthuis/",
                "required_fields": [
                    "tracking_destination_country",
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "dhlparcel-nl",
                "name": "DHL Parcel NL",
                "phone": "+31880 552 000",
                "other_name": "Selektvracht, dhlparcel.nl",
                "web_url": "https://www.dhlparcel.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "apc",
                "name": "APC Postal Logistics",
                "phone": "+1 (888) 413-7300",
                "other_name": "APC-PLI",
                "web_url": "http://www.apc-pli.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "360lion",
                "name": "360 Lion Express",
                "phone": "+86-755-23917225",
                "other_name": "",
                "web_url": "http://www.360lion.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "magyar-posta",
                "name": "Magyar Posta",
                "phone": "+3617678282",
                "other_name": "Hungarian Post",
                "web_url": "http://www.posta.hu",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "hu",
                "support_languages": [
                    "hu"
                ],
                "service_from_country_iso3": [
                    "HUN"
                ]
            },
            {
                "slug": "tnt-reference",
                "name": "TNT Reference",
                "phone": "+1 800 558 5555",
                "other_name": "TNT consignment reference",
                "web_url": "http://www.tnt.com/webtracker/tracker.do?navigation=1&respLang=en",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "shreetirupati",
                "name": "SHREE TIRUPATI COURIER SERVICES PVT. LTD.",
                "phone": "+91 0261-3995227",
                "other_name": "",
                "web_url": "http://www.shreetirupaticourier.net/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "zyllem",
                "name": "Zyllem",
                "phone": "+65 3163 1082",
                "other_name": "RocketUncle",
                "web_url": "http://www.zyllem.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "budbee-webhook",
                "name": "Budbee",
                "phone": "+46 (0)8-409 028 00)",
                "other_name": "",
                "web_url": "https://budbee.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "gsi-express",
                "name": "GSI EXPRESS",
                "phone": "+1-201-345-3532",
                "other_name": "",
                "web_url": "http://gsiexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "airpak-express",
                "name": "Airpak Express",
                "phone": "+60 03-7875 7768",
                "other_name": "",
                "web_url": "http://www.airpak-express.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "amazon-uk-api",
                "name": "Amazon Shipping",
                "phone": null,
                "other_name": null,
                "web_url": "https://ship.amazon.co.uk/requestinfo",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "forrun",
                "name": "forrun Pvt Ltd (Arpatech Venture)",
                "phone": "+92 21 111 367786",
                "other_name": "",
                "web_url": "http://forrun.co/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PAK"
                ]
            },
            {
                "slug": "parknparcel",
                "name": "Park N Parcel",
                "phone": "+6564286200",
                "other_name": "",
                "web_url": "https://delivery.parknparcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "cyprus-post",
                "name": "Cyprus Post",
                "phone": "+357 22805802",
                "other_name": "ΚΥΠΡΙΑΚΑ ΤΑΧΥΔΡΟΜΕΙΑ",
                "web_url": "https://www.cypruspost.post/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "el",
                "support_languages": [
                    "el"
                ],
                "service_from_country_iso3": [
                    "CYP"
                ]
            },
            {
                "slug": "malaysia-post",
                "name": "Malaysia Post EMS / Pos Laju",
                "phone": "+603 7626-1900",
                "other_name": "Pos Ekspres, Pos Malaysia Express",
                "web_url": "http://www.poslaju.com.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "raben-group",
                "name": "Raben Group",
                "phone": "NA",
                "other_name": "myRaben",
                "web_url": "http://www.raben-group.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "xpedigo",
                "name": "Xpedigo",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.xpedigo.com/en/home/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "wmg",
                "name": "WMG Delivery",
                "phone": "+65 6744 9888",
                "other_name": "World Marketing Group Pte Ltd",
                "web_url": "http://www.wmgdelivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "dpd-de",
                "name": "DPD Germany",
                "phone": "+49 01806 373 200",
                "other_name": "DPD Germany",
                "web_url": "https://www.dpd.com/de_privatkunden/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "raiderex",
                "name": "RaidereX",
                "phone": "+65 8666-5481",
                "other_name": "Detrack",
                "web_url": "http://raiderex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "courant-plus",
                "name": "Courant Plus",
                "phone": "+1 514 233 1616",
                "other_name": null,
                "web_url": "http://courant.plus/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "tourline-reference",
                "name": "Tourline Express",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.tourlineexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP",
                    "PRT"
                ]
            },
            {
                "slug": "home-delivery-solutions",
                "name": "Home Delivery Solutions Ltd",
                "phone": "+00 44 191 250 2220",
                "other_name": null,
                "web_url": "http://www.homedeliverysolutions.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "megasave",
                "name": "Megasave",
                "phone": "+13MEGA (136342)",
                "other_name": "",
                "web_url": "https://megasave.live/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "parcelpal-webhook",
                "name": "ParcelPal",
                "phone": "+778-819-1720",
                "other_name": null,
                "web_url": "https://www.parcelpal.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "xl-express",
                "name": "XL Express",
                "phone": "+61 (0) 7 3274 2922",
                "other_name": "",
                "web_url": "http://www.xlexpress.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "star-track-express",
                "name": "Star Track Express",
                "phone": "+61 13 2345",
                "other_name": "AaE Australian air Express",
                "web_url": "http://www.star-track.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "dhl-global-mail-asia",
                "name": "DHL eCommerce Asia",
                "phone": "",
                "other_name": "DGM Asia",
                "web_url": "https://ecommerceportal.dhl.com/track/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "wahana",
                "name": "Wahana",
                "phone": "+62 2171355152",
                "other_name": "Wahana Indonesia",
                "web_url": "http://www.wahana.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "id",
                "support_languages": [
                    "id"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "austrian-post-registered",
                "name": "Austrian Post (Registered)",
                "phone": "+43 810 010 100",
                "other_name": "Österreichische Post AG",
                "web_url": "http://www.post.at",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUT"
                ]
            },
            {
                "slug": "k1-express",
                "name": "K1 Express",
                "phone": "+86 400-8063-513",
                "other_name": "",
                "web_url": "http://www.kuajingyihao.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "thailand-post",
                "name": "Thailand Thai Post",
                "phone": "+66 (0) 2831 3131",
                "other_name": "ไปรษณีย์ไทย",
                "web_url": "http://www.thailandpost.co.th/index.php?page=index&language=en",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "alliedexpress",
                "name": "Allied Express",
                "phone": "13 15 21",
                "other_name": "",
                "web_url": "http://www.alliedexpress.com.au/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "zajil-express",
                "name": "Zajil Express Company",
                "phone": "+966 920000177",
                "other_name": "",
                "web_url": "https://zajil-express.com/about.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SAU"
                ]
            },
            {
                "slug": "2go",
                "name": "2GO",
                "phone": "+63 2 77-99-222",
                "other_name": "Negros Navigation",
                "web_url": "http://supplychain.2go.com.ph/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "jx",
                "name": "JX",
                "phone": "+622180627027",
                "other_name": "",
                "web_url": "www.j-express.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "courierit",
                "name": "Courier IT",
                "phone": "+27 21 555 6777",
                "other_name": "Courierit",
                "web_url": "http://www.courierit.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "dhl-global-mail-asia-api",
                "name": "DHL eCommerce Asia",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.logistics.dhl/global-en/home/our-divisions/ecommerce.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "kerry-ecommerce",
                "name": "Kerry eCommerce",
                "phone": "+852 6636 6636",
                "other_name": "",
                "web_url": "https://kerry-ecommerce.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG",
                    "CHN"
                ]
            },
            {
                "slug": "poczta-polska",
                "name": "Poczta Polska",
                "phone": "+48 43-842-06-00",
                "other_name": "Poland Post",
                "web_url": "http://www.poczta-polska.pl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pl",
                "support_languages": [
                    "pl"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "sending",
                "name": "Sending Transporte Urgente y Comunicacion, S.A.U",
                "phone": "+34 902 250 254",
                "other_name": "",
                "web_url": "www.sending.es",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "dpd",
                "name": "DPD",
                "phone": "+49 01806 373 200",
                "other_name": "Dynamic Parcel Distribution",
                "web_url": "http://www.dpd.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "dhlparcel-uk",
                "name": "DHL Parcel UK",
                "phone": "+44 0844 248 0844",
                "other_name": "",
                "web_url": "https://www.dhlparcel.co.uk/en/business-users.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "post56",
                "name": "Post56",
                "phone": "+86 400-9966-156",
                "other_name": "捷邮快递",
                "web_url": "http://www.post56.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "gemworldwide",
                "name": "GEM Worldwide",
                "phone": "+44 01753 68100",
                "other_name": "",
                "web_url": "https://www.gemworldwide.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "nacex-spain",
                "name": "NACEX Spain",
                "phone": "+34 900 100 000",
                "other_name": "NACEX Logista",
                "web_url": "http://nacex.es/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "logistyx-transgroup",
                "name": "Transgroup",
                "phone": "+310-638-1230",
                "other_name": "",
                "web_url": "www.transgroup.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "cdek",
                "name": "CDEK",
                "phone": "null",
                "other_name": null,
                "web_url": "https://cdek.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "LVA"
                ]
            },
            {
                "slug": "directfreight-au-ref",
                "name": "Direct Freight Express",
                "phone": "+1300 347 397",
                "other_name": null,
                "web_url": "http://www.directfreight.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "neway",
                "name": "Neway Transport",
                "phone": "+(02) 9748 3333",
                "other_name": "",
                "web_url": "https://www.newaytransport.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "portugal-ctt",
                "name": "Portugal CTT",
                "phone": "+351 707 26 26 26",
                "other_name": "Correios de Portugal",
                "web_url": "http://www.ctt.pt/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "simplypost",
                "name": "J & T Express Singapore",
                "phone": "+65 6850 0660",
                "other_name": "",
                "web_url": "http://app.jtexpress.sg/track.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "nova-poshta",
                "name": "Nova Poshta",
                "phone": "+380 50-4-500-609",
                "other_name": "Новая Почта",
                "web_url": "http://novaposhta.ua/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "uk",
                "support_languages": [
                    "uk"
                ],
                "service_from_country_iso3": [
                    "UKR"
                ]
            },
            {
                "slug": "dhl-supplychain-id",
                "name": "DHL Supply Chain Indonesia",
                "phone": "+628119109542",
                "other_name": "",
                "web_url": "https://www.logistics.dhl/id-en/home/our-divisions/supply-chain.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "intelipost",
                "name": "Intelipost (TMS for LATAM)",
                "phone": "+55 (11) 3385-0700",
                "other_name": "",
                "web_url": "www.intelipost.com.br",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "dao365",
                "name": "DAO365",
                "phone": "+72 33 08 00",
                "other_name": "",
                "web_url": "http://www.dao.as/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "da",
                "support_languages": [
                    "da",
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "mrw-spain",
                "name": "MRW",
                "phone": "+34 902 300 403",
                "other_name": "MRW Spain",
                "web_url": "http://www.mrw.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es",
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "amazon-fba-swiship",
                "name": "Amazon FBA Swiship",
                "phone": null,
                "other_name": null,
                "web_url": "https://swiship.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "ydh-express",
                "name": "YDH express",
                "phone": "+86-21-61921512",
                "other_name": null,
                "web_url": "http://www.ydhex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "yamato-hk",
                "name": "Yamato Hong Kong Shipments",
                "phone": null,
                "other_name": null,
                "web_url": "http://www.yamatohk.com.hk/en/index.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "colis-prive",
                "name": "Colis Privé",
                "phone": "+33 0826 82 83 84",
                "other_name": "ColisPrivé",
                "web_url": "https://www.colisprive.com/moncolis/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "scudex-express",
                "name": "Scudex Express",
                "phone": "+91 011-46954545",
                "other_name": "",
                "web_url": "http://www.scudexexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "cj-gls",
                "name": "CJ GLS",
                "phone": "+63-567-1320",
                "other_name": "CJ Korea Express, 씨제이지엘에스주식회사",
                "web_url": "http://www.cjgls.com/eng/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "wedo",
                "name": "WeDo Logistics",
                "phone": "+86 (0779)2050300",
                "other_name": "運德物流",
                "web_url": "http://www.wedoexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "fmx",
                "name": "FMX",
                "phone": "+1700-818-369",
                "other_name": "",
                "web_url": "http://www.freightmark.com.my/fmx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "fercam",
                "name": "FERCAM Logistics & Transport",
                "phone": "+39 0471 530 000",
                "other_name": "FERCAM SpA",
                "web_url": "http://www.fercam.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "geodis-calberson-fr",
                "name": "GEODIS - Distribution & Express",
                "phone": "0892 05 28 28",
                "other_name": "Geodiscalberson",
                "web_url": "http://www.geodis.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_postal_code"
                ],
                "default_language": "fr",
                "support_languages": [
                    "fr",
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "ptt-posta",
                "name": "PTT Posta",
                "phone": "+90 444 1 788",
                "other_name": "Turkish Post",
                "web_url": "http://www.ptt.gov.tr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "tr",
                "support_languages": [
                    "tr",
                    "en"
                ],
                "service_from_country_iso3": [
                    "TUR"
                ]
            },
            {
                "slug": "cnwangtong",
                "name": "cnwangtong",
                "phone": "+886918128395",
                "other_name": null,
                "web_url": "https://cnwangtong.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hant",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "gls-cz",
                "name": "GLS Czech Republic",
                "phone": "+420 567 771 111",
                "other_name": "",
                "web_url": "https://gls-group.eu/CZ/en/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CZE"
                ]
            },
            {
                "slug": "packlink",
                "name": "Packlink",
                "phone": "",
                "other_name": "Packlink Spain",
                "web_url": "http://www.packlink.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "international-seur-api",
                "name": "International Seur API",
                "phone": "34 902101010",
                "other_name": null,
                "web_url": "http://www.seur.com/",
                "required_fields": [
                    "tracking_ship_date"
                ],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "delcart-in",
                "name": "Delcart",
                "phone": "+91 080 41311515",
                "other_name": "",
                "web_url": "http://www.delcart.in",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "opek",
                "name": "FedEx Poland Domestic",
                "phone": "+48 22 732 79 99",
                "other_name": "OPEK",
                "web_url": "http://www.fedex.com/pl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pl",
                "support_languages": [
                    "pl"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "an-post",
                "name": "An Post",
                "phone": "1850 30 50 60",
                "other_name": "Ireland Post",
                "web_url": "http://www.anpost.ie/AnPost/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "lion-parcel",
                "name": "Lion Parcel",
                "phone": "+62 21 63798000",
                "other_name": "",
                "web_url": "http://www.lionexpress.co.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "xdp-uk",
                "name": "XDP Express",
                "phone": "+44 843 1782222",
                "other_name": "XDP UK",
                "web_url": "http://www.xdp.co.uk/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "sailpost",
                "name": "SAILPOST",
                "phone": "+050 8008711",
                "other_name": "",
                "web_url": "http://www.sailpost.it/?q=tracker",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "endeavour-delivery",
                "name": "Endeavour Delivery",
                "phone": "+61 1800 639 329",
                "other_name": "",
                "web_url": "https://endeavourdelivery.com.au/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "efex",
                "name": "eFEx (E-Commerce Fulfillment & Express)",
                "phone": "+813 5776 1183",
                "other_name": "",
                "web_url": "http://efex.jp/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "firstmile",
                "name": "FirstMile",
                "phone": "+866-847-0674",
                "other_name": "",
                "web_url": "firstmile.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "apc-overnight-connum",
                "name": "APC Overnight Consignment Number",
                "phone": "+353 80037 3737",
                "other_name": "",
                "web_url": "https://apc-overnight.com/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "globegistics",
                "name": "Globegistics Inc.",
                "phone": "+1 516-479-6671",
                "other_name": "",
                "web_url": "http://www.globegisticsinc.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "rpx",
                "name": "RPX Indonesia",
                "phone": "+62 0-800-1-888-900",
                "other_name": "Repex Perdana International",
                "web_url": "http://www.rpxholding.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "cdek-tr",
                "name": "CDEK TR",
                "phone": "+908503332335",
                "other_name": "",
                "web_url": "www.cdek.com.tr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "TUR"
                ]
            },
            {
                "slug": "pil-logistics",
                "name": "PIL Logistics (China) Co., Ltd",
                "phone": "+86-21-25259288",
                "other_name": "",
                "web_url": "http://www.pillogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "xpo-logistics",
                "name": "XPO logistics",
                "phone": "+(844) 742-5976",
                "other_name": "",
                "web_url": "https://ltl-solutions.xpo.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "saia-freight",
                "name": "Saia LTL Freight",
                "phone": "+1-800-765-7242",
                "other_name": "",
                "web_url": "http://www.saia.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dmm-network",
                "name": "DMM Network",
                "phone": "+39 02-55396",
                "other_name": "dmmnetwork.it",
                "web_url": "http://www.dmmnetwork.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "postur-is",
                "name": "Iceland Post",
                "phone": "+354 580 1200",
                "other_name": "Postur.is, Íslandspóstur",
                "web_url": "http://www.postur.is/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ISL"
                ]
            },
            {
                "slug": "gso",
                "name": "GSO",
                "phone": "+1 800 322 5555",
                "other_name": "GSO Freight",
                "web_url": "https://www.gso.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "postnl-international",
                "name": "PostNL International",
                "phone": "088 22 55 555",
                "other_name": "Netherlands Post, Spring Global Mail",
                "web_url": "http://www.postnl.nl/voorthuis/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "doordash-webhook",
                "name": "DoorDash",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.doordash.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "legion-express",
                "name": "Legion Express",
                "phone": "+6569225614",
                "other_name": "",
                "web_url": "http://47.75.7.10/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "wiseloads",
                "name": "Wiseloads",
                "phone": "+353 74910 1911",
                "other_name": "",
                "web_url": "http://www.wiseloads.com/home.php",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "17postservice",
                "name": "17 Post Service",
                "phone": "+852 2620 0289",
                "other_name": "17PostService",
                "web_url": "http://17postservice.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "pixsell",
                "name": "PIXSELL LOGISTICS",
                "phone": "+632 6365677",
                "other_name": "",
                "web_url": "pixsell.com.ph",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "singapore-post",
                "name": "Singapore Post",
                "phone": "+65 6841 2000",
                "other_name": "SingPost",
                "web_url": "http://www.singpost.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "ruston",
                "name": "Ruston",
                "phone": "+86 400 656 0077",
                "other_name": "",
                "web_url": "http://www.ruston.cc",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "brouwer-transport",
                "name": "Brouwer Transport en Logistiek B.V.",
                "phone": "+31 (0)297 28 12 00",
                "other_name": null,
                "web_url": "https://brtl.nl/nl",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "topyou",
                "name": "TopYou",
                "phone": "+86 13714132837",
                "other_name": null,
                "web_url": "http://szty56.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "danske-fragt",
                "name": "Danske Fragtmænd",
                "phone": "+4572520000",
                "other_name": "Fragt DK",
                "web_url": "https://www.fragt.dk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "sekologistics",
                "name": "SEKO Logistics",
                "phone": null,
                "other_name": "SEKO",
                "web_url": "http://www.sekologistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "uship",
                "name": "uShip",
                "phone": "+1(844) 395-6353",
                "other_name": "",
                "web_url": "https://www.uship.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "tolos",
                "name": "Tolos",
                "phone": "+82 2 6929 0081",
                "other_name": "",
                "web_url": "http://www.tolos.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "cfl-logistics",
                "name": "CFL Logistics",
                "phone": "+(852) 2399 1434",
                "other_name": "",
                "web_url": "http://www.cflhk.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "pickupp-mys",
                "name": "PICK UPP",
                "phone": "+852 3757 6910",
                "other_name": "",
                "web_url": "https://my.pickupp.io/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "sfc",
                "name": "SFC",
                "phone": "+400-866-8808",
                "other_name": "三态速递",
                "web_url": "http://www.sfcservice.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "yrc",
                "name": "YRC",
                "phone": "+1 800-610-6500",
                "other_name": "YRC Freight",
                "web_url": "http://www.yrc.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "amazon-fba-us",
                "name": "Amazon FBA USA",
                "phone": "+1 206 266 2992",
                "other_name": "",
                "web_url": "https://www.swiship.com/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "nationwide-my",
                "name": "Nationwide Express",
                "phone": "1300 222 777",
                "other_name": "nationwide2u",
                "web_url": "http://www.nationwide2u.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "posti",
                "name": "Posti",
                "phone": "+358 600 94320",
                "other_name": "Finland Post",
                "web_url": "http://www.posti.fi/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fi",
                "support_languages": [
                    "fi",
                    "en"
                ],
                "service_from_country_iso3": [
                    "FIN"
                ]
            },
            {
                "slug": "dhl-supply-chain-au",
                "name": "DHL Supply Chain Australia",
                "phone": "+18002255345",
                "other_name": "DHL ConnectedView",
                "web_url": "https://www.logistics.dhl/us-en/home/our-divisions/supply-chain.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "dpd-ireland",
                "name": "DPD Ireland",
                "phone": "+353 (0)90 64 20500",
                "other_name": "DPD ie",
                "web_url": "http://www.dpd.ie/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "bring",
                "name": "Bring",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.bring.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SWE"
                ]
            },
            {
                "slug": "ezship",
                "name": "EZship",
                "phone": "+603 6412 8878",
                "other_name": "",
                "web_url": "http://ezshipkorea.co.kr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "yto",
                "name": "YTO Express",
                "phone": "+86 95554",
                "other_name": "u5706u901au901fu9012",
                "web_url": "http://www.yto.net.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "bond",
                "name": "Bond",
                "phone": "+347-6020908",
                "other_name": "",
                "web_url": "https://www.withbond.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "uds",
                "name": "United Delivery Service, Ltd",
                "phone": "+1 630-930-5201",
                "other_name": "",
                "web_url": "http://www.uniteddeliveryservice.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "seko-sftp",
                "name": "SEKO Worldwide, LLC",
                "phone": "+19728468600",
                "other_name": "SEKO Logistics",
                "web_url": "https://www.sekologistics.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "bjshomedelivery-ftp",
                "name": "BJS Distribution, Storage & Couriers - FTP",
                "phone": "+44 01922645650",
                "other_name": "",
                "web_url": "https://www.bjshomedelivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "xpost",
                "name": "Xpost.ph",
                "phone": "customercare@xpost.ph",
                "other_name": "",
                "web_url": "https://xpost.ph/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "deltec-courier",
                "name": "Deltec Courier",
                "phone": "+44 20 8569 6767",
                "other_name": "Deltec Interntional Courier",
                "web_url": "https://www.deltec-courier.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "lietuvos-pastas",
                "name": "Lietuvos Paštas",
                "phone": "+370 8 700 55 400",
                "other_name": "Lithuania Post, LP Express",
                "web_url": "http://www.post.lt/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "LTU"
                ]
            },
            {
                "slug": "srekorea",
                "name": "SRE Korea",
                "phone": "+82 02 2661 0055",
                "other_name": "SRE 배송서비스",
                "web_url": "http://www.srekorea.co.kr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "aersure",
                "name": "Aersure",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.aersure.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "palexpress",
                "name": "PAL Express Limited",
                "phone": "+852 3612-3133",
                "other_name": "",
                "web_url": "http://www.pacificair.hk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "dpd-ru",
                "name": "DPD Russia",
                "phone": "+7 800 250 44 34",
                "other_name": "",
                "web_url": "https://www.dpd.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "tgx",
                "name": "Kerry Express Hong Kong",
                "phone": "+852 3513 0888",
                "other_name": "Top Gun Express, 精英速運, TGX",
                "web_url": "http://www.tgxpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "wishpost",
                "name": "WishPost",
                "phone": "",
                "other_name": "Wish",
                "web_url": "https://www.wish.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "first-flight",
                "name": "First Flight Couriers",
                "phone": "+91 022-39576666",
                "other_name": "FirstFlight India",
                "web_url": "http://www.firstflight.net/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "cambodia-post",
                "name": "Cambodia Post",
                "phone": "+855 23 723 51",
                "other_name": "Cambodia Post",
                "web_url": "http://www.ems.com.kh/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KHM"
                ]
            },
            {
                "slug": "newzealand-couriers",
                "name": "NEW ZEALAND COURIERS",
                "phone": "+800800841",
                "other_name": "",
                "web_url": "https://www.nzcouriers.co.nz/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "adsone",
                "name": "ADSOne",
                "phone": "+61(3) 8379 8200",
                "other_name": "ADSOne Group",
                "web_url": "http://www.adsone.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "smsa-express",
                "name": "SMSA Express",
                "phone": "+966 92000 9999",
                "other_name": "",
                "web_url": "http://www.smsaexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SAU"
                ]
            },
            {
                "slug": "ninjavan-id",
                "name": "Ninja Van Indonesia",
                "phone": "+65 6602 8271",
                "other_name": "NinjaVan Indonesia",
                "web_url": "http://ninjavan.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "paquetexpress",
                "name": "Paquetexpress",
                "phone": "+018008210208",
                "other_name": "",
                "web_url": "http://www.paquetexpress.com.mx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "taqbin-sg",
                "name": "TAQBIN Singapore",
                "phone": "+65 1800 225 5888",
                "other_name": "Yamato Singapore",
                "web_url": "https://www.yamatosingapore.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "pickupp-sgp",
                "name": "PICK UPP",
                "phone": "+852 3757 6910",
                "other_name": "",
                "web_url": "https://sg.pickupp.io/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "newgistics",
                "name": "Newgistics",
                "phone": "+1 877-860-5997",
                "other_name": "",
                "web_url": "http://www.newgistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "rl-carriers",
                "name": "RL Carriers",
                "phone": "+1 800-543-5589",
                "other_name": "R+L Carriers",
                "web_url": "http://www.rlcarriers.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dhl-pieceid",
                "name": "DHL Express (Piece ID)",
                "phone": null,
                "other_name": "DHL International",
                "web_url": "http://www.dhl.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "mglobal",
                "name": "PT MGLOBAL LOGISTICS INDONESIA",
                "phone": "021 - 29853800",
                "other_name": "",
                "web_url": "http://www.mglobalgroup.co.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "usps",
                "name": "USPS",
                "phone": "+1 800-275-8777",
                "other_name": "United States Postal Service",
                "web_url": "https://www.usps.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "cj-philippines",
                "name": "CJ Transnational Philippines",
                "phone": "+63 2 541 3904",
                "other_name": "",
                "web_url": "https://www.cjlogistics.com/en/network/en-ph",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "jne-api",
                "name": "JNE",
                "phone": "+(62-21) 566 5262",
                "other_name": "",
                "web_url": "http://www.jne.co.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "id",
                "support_languages": [
                    "id"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "asendia-usa",
                "name": "Asendia USA",
                "phone": "+1 610 461 3661",
                "other_name": "Brokers Worldwide",
                "web_url": "http://www.brokersworldwide.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "general-overnight",
                "name": "Go!Express and logistics",
                "phone": "+0800 859 99 99",
                "other_name": "",
                "web_url": "https://www.general-overnight.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "de",
                "support_languages": [
                    "de"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "qualitypost",
                "name": "QualityPost",
                "phone": "+52 (81) 8288-9000",
                "other_name": "",
                "web_url": "http://www.qualitypost.com.mx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "ids-logistics",
                "name": "IDS Logistics",
                "phone": "+971 2 551 6789",
                "other_name": "",
                "web_url": "https://www.idsship.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "knuk",
                "name": "KNAirlink Aerospace Domestic Network",
                "phone": "+4407976360920",
                "other_name": "",
                "web_url": "http://knuk.tmware.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "pickupp-vnm",
                "name": "Pickupp Vietnam",
                "phone": "+",
                "other_name": "",
                "web_url": "https://vn.pickupp.io/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "lasership",
                "name": "LaserShip",
                "phone": "+1 (800) 527-3764",
                "other_name": "LaserShip",
                "web_url": "http://www.lasership.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "ao-courier",
                "name": "AO Logistics",
                "phone": "0344 257 3442",
                "other_name": "",
                "web_url": "https://ao.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "tiki",
                "name": "Tiki",
                "phone": "+62 500 125",
                "other_name": "Citra Van Titipan Kilat",
                "web_url": "https://tiki.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "dex-i",
                "name": "DEX-I",
                "phone": "+86 20 66854050",
                "other_name": "",
                "web_url": "http://www.dex-i.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "rcl",
                "name": "Red Carpet Logistics",
                "phone": "+6221-29379019",
                "other_name": "",
                "web_url": "https://www.rcl.co.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "elta-courier",
                "name": "ELTA Hellenic Post",
                "phone": "11120",
                "other_name": "Greece Post, Ελληνικά Ταχυδρομεία, ELTA Courier, Ταχυμεταφορές ΕΛΤΑ",
                "web_url": "http://www.elta.gr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GRC"
                ]
            },
            {
                "slug": "paack-webhook",
                "name": "Paack",
                "phone": "+34 931225457",
                "other_name": "",
                "web_url": "https://paack.co/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "tcs",
                "name": "TCS",
                "phone": "+9221-111123456",
                "other_name": "",
                "web_url": "https://www.tcsexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PAK"
                ]
            },
            {
                "slug": "dhl-poland",
                "name": "DHL Poland Domestic",
                "phone": "+48 42 6 345 345",
                "other_name": "DHL Polska",
                "web_url": "http://www.dhl.com.pl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pl",
                "support_languages": [
                    "pl",
                    "en"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "interlink-express-reference",
                "name": "DPD Local reference",
                "phone": "+44 121 275 05 24",
                "other_name": "",
                "web_url": "http://www.interlinkexpress.com/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "oca-ar",
                "name": "OCA Argentina",
                "phone": "+54 800-999-7700",
                "other_name": "OCA e-Pak",
                "web_url": "http://www.oca.com.ar/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ARG"
                ]
            },
            {
                "slug": "jam-express",
                "name": "Jam Express",
                "phone": "+63 239 7502",
                "other_name": "JAM Global Express",
                "web_url": "http://www.myjamexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "pan-asia",
                "name": "Pan-Asia International",
                "phone": "+86-631-5962383",
                "other_name": null,
                "web_url": "http://www.panasiachina.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "bneed",
                "name": "Bneed",
                "phone": "+351 229 381 008",
                "other_name": "",
                "web_url": "http://www.bneed.pt/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "equick-cn",
                "name": "Equick China",
                "phone": "+1 400 706 6078",
                "other_name": "北京网易速达",
                "web_url": "https://www.equick.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "zepto-express",
                "name": "ZeptoExpress",
                "phone": "+603-8325-1505 1300-88-9378",
                "other_name": "",
                "web_url": "https://www.zeptoexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "ninjavan-philippines",
                "name": "Ninja Van Philippines",
                "phone": "support_ph@ninjavan.com",
                "other_name": "",
                "web_url": "https://www.ninjavan.co/en-ph",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "professional-couriers",
                "name": "Professional Couriers",
                "phone": "+91 080 22110641",
                "other_name": "TPC India",
                "web_url": "http://www.tpcindia.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "oneclick",
                "name": "One click delivery services",
                "phone": "+971 45572705",
                "other_name": null,
                "web_url": "http://www.1click2deliver.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ARE"
                ]
            },
            {
                "slug": "canada-post",
                "name": "Canada Post",
                "phone": "+1 866 607 6301",
                "other_name": "Postes Canada",
                "web_url": "https://www.canadapost.ca/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "toll-priority",
                "name": "Toll Priority",
                "phone": "+61 13 15 31",
                "other_name": "Toll Group, Toll Priority",
                "web_url": "https://www.tollpriority.com.au/portal/page/portal/TOLL_PRIORITY/Home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "china-post",
                "name": "China Post",
                "phone": "+86 20 11185",
                "other_name": "中国邮政",
                "web_url": "http://yjcx.chinapost.com.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "janio",
                "name": "Janio Asia",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.janio.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "fastway-ireland",
                "name": "Fastway Ireland",
                "phone": "+353 1 4242 900",
                "other_name": "Fastway Couriers",
                "web_url": "http://www.fastway.ie/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IRL"
                ]
            },
            {
                "slug": "courierpost",
                "name": "CourierPost",
                "phone": "+64 0800 268 743",
                "other_name": "Express Couriers",
                "web_url": "http://www.courierpost.co.nz/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "i-parcel",
                "name": "i-parcel",
                "phone": "+44 1342 315 455",
                "other_name": "iparcel",
                "web_url": "https://www.i-parcel.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "ups",
                "name": "UPS",
                "phone": "+1 800 742 5877",
                "other_name": "United Parcel Service",
                "web_url": "http://www.ups.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "jtexpress",
                "name": "J&T EXPRESS MALAYSIA",
                "phone": "+1300 80 9000",
                "other_name": "",
                "web_url": "http://jtexpress.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "total-express",
                "name": "Total Express",
                "phone": "+55 11 3627-5900",
                "other_name": "",
                "web_url": "http://www.totalexpress.com.br/",
                "required_fields": [
                    "tracking_account_number",
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "iml",
                "name": "IML",
                "phone": "(+7)(926) 014-57-33",
                "other_name": null,
                "web_url": "https://iml.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "anjun",
                "name": "Anjun",
                "phone": "4009996128",
                "other_name": null,
                "web_url": "http://www.szanjun.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "zeleris",
                "name": "Zeleris",
                "phone": "+34902162646",
                "other_name": "",
                "web_url": "https://www.zeleris.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "holisol",
                "name": "Holisol",
                "phone": "+011-6537 6537",
                "other_name": "",
                "web_url": "http://holisollogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "b2ceurope",
                "name": "B2C Europe",
                "phone": "+32 (0)2 2569302",
                "other_name": "trackyourparcel.eu",
                "web_url": "http://b2ceurope.eu/",
                "required_fields": [
                    "tracking_postal_code",
                    "tracking_destination_country"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BEL"
                ]
            },
            {
                "slug": "sfb2c",
                "name": "S.F International",
                "phone": "+86 21 6976 3579, +1 855 901 1133",
                "other_name": "順豐國際",
                "web_url": "http://intl.sf-express.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hant",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "hsm-global",
                "name": "HSM Global",
                "phone": "+44 1403 269403",
                "other_name": null,
                "web_url": "http://www.hsmglobal.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "raf",
                "name": "RAF Philippines",
                "phone": "+632 820-2920 to 25",
                "other_name": "RAF Intl. Forwarding",
                "web_url": "http://www.raf.ph/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "ets-express",
                "name": "RETS express",
                "phone": "+400-879-6597",
                "other_name": "绥芬河俄通收国际货物运输代理有限责任公司",
                "web_url": "http://www.ets-express.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "india-post",
                "name": "India Post Domestic",
                "phone": "+91 1800 266 6868",
                "other_name": "भारतीय डाक",
                "web_url": "http://www.indiapost.gov.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "jne",
                "name": "JNE",
                "phone": "+62 21 29278888",
                "other_name": "Express Across Nation, Tiki Jalur Nugraha Ekakurir",
                "web_url": "http://www.jne.co.id/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "sprint-pack",
                "name": "SPRINT PACK",
                "phone": "+86 106 776 2567",
                "other_name": "",
                "web_url": "",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "xpressbees",
                "name": "XpressBees",
                "phone": "+91 020 46608 105",
                "other_name": "XpressBees logistics",
                "web_url": "http://www.xpressbees.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "bondscouriers",
                "name": "Bonds Couriers",
                "phone": "+61 1300-369-300",
                "other_name": "",
                "web_url": "http://www.bondscouriers.com.au",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "uk-mail",
                "name": "UK Mail",
                "phone": "+44 2476 937770",
                "other_name": "Business Post Group",
                "web_url": "https://www.ukmail.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "dicom",
                "name": "GLS Logistic Systems Canada Ltd./Dicom",
                "phone": "+1-888-Go-Dicom",
                "other_name": null,
                "web_url": "http://www.dicom.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "national-sameday",
                "name": "National Sameday",
                "phone": "+01582400200",
                "other_name": "",
                "web_url": "www.nationalsameday.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "taqbin-my",
                "name": "TAQBIN Malaysia",
                "phone": "+60 1800-8-827246",
                "other_name": "TAQBIN Malaysia",
                "web_url": "http://my.ta-q-bin.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "dms-matrix",
                "name": "DMSMatrix",
                "phone": "+",
                "other_name": "",
                "web_url": "https://3pl.dmsmatrix.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "parcel-force",
                "name": "Parcel Force",
                "phone": "+344 800 44 66",
                "other_name": "Parcelforce UK",
                "web_url": "http://www.parcelforce.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "dhl-nl",
                "name": "DHL Netherlands",
                "phone": "+31 26-324 6700",
                "other_name": "DHL Nederlands",
                "web_url": "http://www.dhl.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "cjpacket",
                "name": "CJ Packet",
                "phone": "+86 13867150135",
                "other_name": "",
                "web_url": "https://cjpacket.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "interparcel-uk",
                "name": "Interparcel UK",
                "phone": "+0333 3000 700",
                "other_name": "Interparcel",
                "web_url": "https://uk.interparcel.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "lotte",
                "name": "Lotte Global Logistics",
                "phone": "+353 74910 1911",
                "other_name": "",
                "web_url": "https://www.lotteglogis.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ko",
                "support_languages": [
                    "ko"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "etotal",
                "name": "eTotal Solution Limited",
                "phone": "| +86 020 83036431 | +86 020 83702521",
                "other_name": "",
                "web_url": "http://www.e-total.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "fitzmark-api",
                "name": "FitzMark",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.fitzmark.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dtdc-express",
                "name": "DTDC Express Global PTE LTD",
                "phone": "+852 3702 6376",
                "other_name": "",
                "web_url": "http://www.dtdc.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "viwo",
                "name": "VIWO IoT",
                "phone": "+86 0755 28709980",
                "other_name": "",
                "web_url": "http://tracking.viwoex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "dhl-global-mail",
                "name": "DHL eCommerce US",
                "phone": "+1 317 554 5191",
                "other_name": "DHL Global Mail",
                "web_url": "http://webtrack.dhlglobalmail.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "up-express",
                "name": "UP-express",
                "phone": "+7 495 477 52 54",
                "other_name": "",
                "web_url": "http://up-express.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "dotzot",
                "name": "Dotzot",
                "phone": "+91 33004444",
                "other_name": "Dotzot",
                "web_url": "http://dotzot.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "omniva",
                "name": "Omniva",
                "phone": "+00 372 661 6616",
                "other_name": "",
                "web_url": "https://www.omniva.ee/eng",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "EST"
                ]
            },
            {
                "slug": "ekart",
                "name": "Ekart",
                "phone": "+91 1800 420 1111",
                "other_name": "Ekart Logistics",
                "web_url": "https://www.ekartlogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "ceska-posta",
                "name": "Česká Pošta",
                "phone": "+420 840 111 244",
                "other_name": "Czech Post",
                "web_url": "http://www.ceskaposta.cz/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CZE"
                ]
            },
            {
                "slug": "couriers-please",
                "name": "Couriers Please",
                "phone": "1300 361 000",
                "other_name": "CouriersPlease",
                "web_url": "https://www.couriersplease.com.au",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "antron",
                "name": "Antron Express",
                "phone": "+0086-13242018916",
                "other_name": "",
                "web_url": "http://www.168express.cn/home.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "LKA",
                    "IND",
                    "PAK",
                    "BGD"
                ]
            },
            {
                "slug": "redjepakketje",
                "name": "Red je Pakketje",
                "phone": "+31(0)85 130 0944",
                "other_name": null,
                "web_url": "https://redjepakketje.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "liefery",
                "name": "liefery",
                "phone": "+49 69 2222 3149",
                "other_name": "",
                "web_url": "https://www.liefery.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "capital",
                "name": "Capital Transport",
                "phone": "+61 3 8562 0001",
                "other_name": "",
                "web_url": "http://www.capitaltransport.com.au/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "globaltranz",
                "name": "GlobalTranz",
                "phone": "+1-480-339-5782",
                "other_name": "",
                "web_url": "www.globaltranz.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "livrapide",
                "name": "Livrapide",
                "phone": "+514-232-6565",
                "other_name": "",
                "web_url": "https://livrapide.ca/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "mazet",
                "name": "Groupe Mazet",
                "phone": "+",
                "other_name": "",
                "web_url": "http://www.mazet.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "royal-mail",
                "name": "Royal Mail",
                "phone": "+44 3457740740",
                "other_name": "Royal Mail United Kingdom",
                "web_url": "http://www.royalmail.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "jocom",
                "name": "Jocom",
                "phone": "+603 2241 6637",
                "other_name": "",
                "web_url": "http://www.jocom.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "huodull",
                "name": "Huodull",
                "phone": "+400-1111-566",
                "other_name": "货兜",
                "web_url": "http://www.huodull.com/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "dx-b2b-connum",
                "name": "DX",
                "phone": "",
                "other_name": null,
                "web_url": "https://www.dxdelivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "emirates-post",
                "name": "Emirates Post",
                "phone": "+971 600 599999",
                "other_name": "مجموعة بريد الإمارات, UAE Post",
                "web_url": "http://www.epg.gov.ae/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ARE"
                ]
            },
            {
                "slug": "cle-logistics",
                "name": "CL E-Logistics Solutions Limited",
                "phone": "+852 24152381",
                "other_name": "",
                "web_url": "http://www.clels.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "always-express",
                "name": "Always Express",
                "phone": "+1-800-575-2233",
                "other_name": "",
                "web_url": "http://www.always-express.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "fastway-nz",
                "name": "Fastway New Zealand",
                "phone": "+64 (09) 634 3704",
                "other_name": "",
                "web_url": "http://www.fastway.co.nz/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "dimerco",
                "name": "Dimerco Express Group",
                "phone": "",
                "other_name": "",
                "web_url": "http://www.dimerco.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "correosexpress-api",
                "name": "Correos Express",
                "phone": "+353 74910 1911",
                "other_name": "",
                "web_url": "https://www.correosexpress.com/web/correosexpress/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "global-express",
                "name": "Tai Wan Global Business",
                "phone": "+449-8856",
                "other_name": "全球商务快递",
                "web_url": "https://www.global-business.com.tw/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hant",
                "support_languages": [
                    "zh-Hant"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "kgmhub",
                "name": "KGM Hub",
                "phone": "+65 6532 7172",
                "other_name": "KGM",
                "web_url": "http://www.kgmhub.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "kerry-logistics",
                "name": "Kerry Express Thailand",
                "phone": "+66 02 3384777",
                "other_name": "嘉里物流, Kerry Logistics",
                "web_url": "http://www.kerrylogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "rpxonline",
                "name": "RPX Online",
                "phone": "+852 2620 0289",
                "other_name": "Cathay Pacific",
                "web_url": "http://www.rpxonline.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "sfplus-webhook",
                "name": "SF Plus",
                "phone": "+852 21212211",
                "other_name": "Kin Shun Information Technology Limited",
                "web_url": "https://www.ks-it.co/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "speedee",
                "name": "Spee-Dee Delivery",
                "phone": "+1 320-251-6697",
                "other_name": "",
                "web_url": "http://speedeedelivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "sf-express-webhook",
                "name": "SF Express (Webhook)",
                "phone": "+86 95338",
                "other_name": "顺丰速运 (丰桥路由状态推送)",
                "web_url": "http://www.sf-express.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "yodel",
                "name": "Yodel Domestic",
                "phone": "+44 844 755 0117",
                "other_name": "Home Delivery Network Limited (HDNL)",
                "web_url": "http://www.yodel.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "continental",
                "name": "Continental",
                "phone": "+852 34263726",
                "other_name": "",
                "web_url": "https://www.contin-global.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "andreani",
                "name": "Grupo logistico Andreani",
                "phone": "+549 1122810023",
                "other_name": null,
                "web_url": "http://www.andreani.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ARG"
                ]
            },
            {
                "slug": "lonestar",
                "name": "Lone Star Overnight",
                "phone": "+1-512-873-8067",
                "other_name": "",
                "web_url": "https://www.lso.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "nowlog-api",
                "name": "Sequoialog",
                "phone": "+55 11 97593-3973",
                "other_name": "",
                "web_url": "http://sequoialog.com.br/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "estes",
                "name": "Estes",
                "phone": "+1-866-378-3748",
                "other_name": "Estes Express Lines",
                "web_url": "http://www.estes-express.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "wanbexpress",
                "name": "WanbExpress",
                "phone": "+86 135 9047 6393",
                "other_name": "",
                "web_url": "http://www.wanbexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "palletways",
                "name": "Palletways",
                "phone": "+44 (0) 1543 418000",
                "other_name": "",
                "web_url": "https://www.palletways.com/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "nhans-solutions",
                "name": "Nhans Solutions",
                "phone": "null",
                "other_name": "Nhans Courier",
                "web_url": "http://nhans-solutions.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "hermes-it",
                "name": "Hermes Italy",
                "phone": "+39 02 988573",
                "other_name": "",
                "web_url": "http://www.hermes-italy.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "airmee-webhook",
                "name": "Airmee",
                "phone": null,
                "other_name": "",
                "web_url": "https://www.airmee.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SWE"
                ]
            },
            {
                "slug": "etomars",
                "name": "Etomars",
                "phone": "+820776611030",
                "other_name": "",
                "web_url": "https://www.etomars.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "nanjingwoyuan",
                "name": "Nanjing Woyuan",
                "phone": "+86 13851704490",
                "other_name": "u6c83u6e90",
                "web_url": "http://www.nanjingwoyuan.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "star-track-courier",
                "name": "Star Track Courier",
                "phone": "+61 131320",
                "other_name": "",
                "web_url": "https://www.startrackcourier.com.au",
                "required_fields": [
                    "tracking_state"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "pickup",
                "name": "Pickupp",
                "phone": "+85237576910",
                "other_name": "",
                "web_url": "http://www.hkpickup.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "4px",
                "name": "4PX",
                "phone": "+86-755-23508077",
                "other_name": "递四方",
                "web_url": "http://express.4px.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "jet-ship",
                "name": "Jet-Ship Worldwide",
                "phone": "+0",
                "other_name": "",
                "web_url": "http://jet-ship.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "dpd-hk",
                "name": "DPD HK",
                "phone": "+852",
                "other_name": "",
                "web_url": "http://dpdgroup.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "dnj-express",
                "name": "DNJ Express",
                "phone": "+852 2321 8555",
                "other_name": "",
                "web_url": "http://www.dnjexpress.com/en/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "expeditors",
                "name": "Expeditors",
                "phone": null,
                "other_name": "",
                "web_url": "http://www.expeditors.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "yundaex",
                "name": "Yunda Express",
                "phone": "+86 400-821-6789",
                "other_name": "韵达快递",
                "web_url": "http://www.yundaex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "parcelpost-sg",
                "name": "Parcel Post Singapore",
                "phone": "+65",
                "other_name": "ParcelPost",
                "web_url": "http://www.parcelpost.com.sg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "australia-post",
                "name": "Australia Post",
                "phone": "+61 3 8847 9045",
                "other_name": "AusPost",
                "web_url": "http://auspost.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "redur-es",
                "name": "Redur Spain",
                "phone": "+34 93 263 16 16",
                "other_name": "Eurodis",
                "web_url": "http://www.redur.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "far-international",
                "name": "FAR international",
                "phone": "+0571-28121835",
                "other_name": "",
                "web_url": "http://www.far-group.com/index.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "carry-flap",
                "name": "Carry-Flap Co.,Ltd.",
                "phone": "+810522625800",
                "other_name": "",
                "web_url": "https://carry-flap.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "i-dika",
                "name": "i-dika",
                "phone": "+390119826611",
                "other_name": "",
                "web_url": "http://www.i-dika.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "con-way",
                "name": "Con-way Freight",
                "phone": "+1 800 426-6929",
                "other_name": "Conway",
                "web_url": "https://www.con-way.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "tipsa",
                "name": "TIPSA",
                "phone": "+34 902 10 10 47",
                "other_name": "",
                "web_url": "http://www.tip-sa.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "xend",
                "name": "Xend Express",
                "phone": "02 617 9572 | 02 617 9619",
                "other_name": "Xend Business Solutions",
                "web_url": "http://xendexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "gati-kwe",
                "name": "Gati-KWE",
                "phone": "1860-123-4284",
                "other_name": "Gati-Kintetsu Express",
                "web_url": "http://www.gatikwe.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "2ebox",
                "name": "2ebox",
                "phone": "+56227500737",
                "other_name": "",
                "web_url": "https://www.2ebox.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "descartes",
                "name": "Innovel",
                "phone": "+1 888 803-3459",
                "other_name": "",
                "web_url": "https://www.innovelsolutions.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "usf-reddaway",
                "name": "USF Reddaway",
                "phone": "+1 888-420-8960",
                "other_name": "",
                "web_url": "http://www.reddawayregional.com/index.shtml",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "cloudwish-asia",
                "name": "Cloudwish Asia",
                "phone": "+65 87539726",
                "other_name": "",
                "web_url": "https://www.cloudwish.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "international-seur",
                "name": "International Seur",
                "phone": "+34 902101010",
                "other_name": "SEUR Internacional",
                "web_url": "http://www.seur.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_ship_date"
                ],
                "default_language": "zh-Hans",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "dachser",
                "name": "DACHSER",
                "phone": "-",
                "other_name": "Azkar",
                "web_url": "http://www.dachser.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "dpd-poland",
                "name": "DPD Poland",
                "phone": "+48 801 400 373",
                "other_name": "Dynamic Parcel Distribution Poland",
                "web_url": "http://www.dpd.com.pl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pl",
                "support_languages": [
                    "pl",
                    "en"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "air21",
                "name": "AIR21",
                "phone": "+63 (02) 854-2100",
                "other_name": "AIR 21 PH",
                "web_url": "http://www.air21.com.ph",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "chrobinson",
                "name": "C.H. Robinson Worldwide, Inc.",
                "phone": "+1 855 229 6128",
                "other_name": "",
                "web_url": "https://www.chrobinson.com/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "ppbyb",
                "name": "PayPal Package",
                "phone": "+86 20 11185",
                "other_name": "贝邮宝",
                "web_url": "http://www.ppbyb.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "en",
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "asigna",
                "name": "ASIGNA",
                "phone": "+34 902 99 97 27",
                "other_name": null,
                "web_url": "http://www.logisticacanaria.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "austrian-post",
                "name": "Austrian Post (Express)",
                "phone": "+43 810 010 100",
                "other_name": "Österreichische Post AG",
                "web_url": "http://www.post.at",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUT"
                ]
            },
            {
                "slug": "jersey-post",
                "name": "Jersey Post",
                "phone": "+44 1534 616616",
                "other_name": "",
                "web_url": "http://www.jerseypost.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JEY"
                ]
            },
            {
                "slug": "brt-it",
                "name": "BRT Bartolini",
                "phone": "",
                "other_name": "BRT Corriere Espresso, DPD Italy",
                "web_url": "http://www.brt.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it",
                    "fr"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "india-post-int",
                "name": "India Post International",
                "phone": "+91 1800-11-2011",
                "other_name": "भारतीय डाक, Speed Post & eMO, EMS, IPS Web",
                "web_url": "http://www.indiapost.gov.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "cj-malaysia",
                "name": "CJ Century",
                "phone": "+03-33612888",
                "other_name": "CJ Logistics Malaysia",
                "web_url": "https://www.cjlogistics.com/en/network/en-my",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "hdb-box",
                "name": "Haidaibao",
                "phone": "+0086-4008258585",
                "other_name": "",
                "web_url": "www.haidaibao.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "celeritas",
                "name": "Celeritas Transporte, S.L",
                "phone": "+34 902 044 944",
                "other_name": "",
                "web_url": "https://celeritastransporte.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "fastway-za",
                "name": "Fastway South Africa",
                "phone": null,
                "other_name": "Fastway Couriers",
                "web_url": "https://www.fastway.co.za/contact-us/fastway-depot/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "abf",
                "name": "ABF Freight",
                "phone": "+1 (800) 610-5544",
                "other_name": "Arkansas Best Corporation",
                "web_url": "http://www.abfs.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dpe-za",
                "name": "DPE South Africa",
                "phone": "+27 (011) 573 3000",
                "other_name": "DPE Worldwide Express",
                "web_url": "http://www.dpe.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "homelogistics",
                "name": "Home Logistics",
                "phone": "+34 91 047 00 70",
                "other_name": null,
                "web_url": "https://homelogistics.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "ecms",
                "name": "ECMS International Logistics Co., Ltd.",
                "phone": "+86 400-086-1756",
                "other_name": "",
                "web_url": "http://www.ecmsglobal.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "portugal-seur",
                "name": "Portugal Seur",
                "phone": "+351 707 50 10 10",
                "other_name": "SEUR",
                "web_url": "http://www.seur.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "mexico-redpack",
                "name": "Mexico Redpack",
                "phone": "+52 1800-013-3333",
                "other_name": "TNT Mexico",
                "web_url": "http://www.redpack.com.mx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "arrowxl",
                "name": "Arrow XL",
                "phone": "+44 800 015 1509",
                "other_name": "Yodel XL",
                "web_url": "http://www.arrowxl.co.uk/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "gio-express",
                "name": "Gio Express",
                "phone": "+631-676-2810",
                "other_name": null,
                "web_url": "https://www.gioexonline.com/clientportal",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "kronos",
                "name": "Kronos Express",
                "phone": "+357 77777808",
                "other_name": "",
                "web_url": "www.kronosexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CYP"
                ]
            },
            {
                "slug": "dhl-deliverit",
                "name": "DHL 2-Mann-Handling",
                "phone": "-",
                "other_name": "DHL Deliver IT",
                "web_url": "https://www.dhl.de/en/privatkunden.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "aquiline",
                "name": "Aquiline",
                "phone": "+1 (318) 814-8859",
                "other_name": "",
                "web_url": "https://aquiline-tracking.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA",
                    "CAN",
                    "FRA",
                    "DEU",
                    "ESP",
                    "GBR",
                    "MEX",
                    "IND",
                    "ITA"
                ]
            },
            {
                "slug": "siodemka",
                "name": "Siodemka",
                "phone": "+48 22 777 77 77 ext. 3",
                "other_name": "Siodemka Kurier",
                "web_url": "http://www.siodemka.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pl",
                "support_languages": [
                    "pl"
                ],
                "service_from_country_iso3": [
                    "POL"
                ]
            },
            {
                "slug": "aaa-cooper",
                "name": "AAA Cooper",
                "phone": "(800) 633-7571",
                "other_name": "",
                "web_url": "http://www.aaacooper.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "misumi-cn",
                "name": "MISUMI Group Inc.",
                "phone": "",
                "other_name": "",
                "web_url": "",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "ninjavan-thai",
                "name": "Ninja Van Thailand",
                "phone": "+65 6602 8271",
                "other_name": "",
                "web_url": "https://www.ninjavan.co/th-th",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "hdb",
                "name": "Haidaibao",
                "phone": "+0086-4008258585",
                "other_name": "",
                "web_url": "www.haidaibao.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "kerrytj",
                "name": "Kerry TJ Logistics",
                "phone": "+886 2 3322-6888",
                "other_name": "KTJ嘉里大榮物流",
                "web_url": "https://www.kerrytj.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hant",
                "support_languages": [
                    "zh-TW"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "sfcservice",
                "name": "SFC Service",
                "phone": "+86 400-881-8106",
                "other_name": "u6df1u5733u4e09u6001u56fdu9645u901fu9012",
                "web_url": "http://www.sfcservice.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "tuffnells",
                "name": "Tuffnells Parcels Express",
                "phone": "+44 0330 838 4230",
                "other_name": "",
                "web_url": "http://www.tuffnells.co.uk/home",
                "required_fields": [
                    "tracking_account_number",
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "yanwen",
                "name": "Yanwen",
                "phone": "+86 010-64656790 / +86 010-64656791 / +86 010-64656792 / +86 010-64656793",
                "other_name": "燕文物流",
                "web_url": "http://www.yw56.com.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "elogistica",
                "name": "ELogistica",
                "phone": null,
                "other_name": null,
                "web_url": "http://www.elogistica.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ARG"
                ]
            },
            {
                "slug": "helthjem",
                "name": "Helthjem",
                "phone": "+47 40064009",
                "other_name": null,
                "web_url": "https://helthjem.no",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NOR"
                ]
            },
            {
                "slug": "mondialrelay-es",
                "name": "Mondial Relay Spain(Punto Pack)",
                "phone": "+330969322332",
                "other_name": null,
                "web_url": "https://www.puntopack.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "tforce-finalmile",
                "name": "TForce Final Mile",
                "phone": "+8003877787",
                "other_name": "",
                "web_url": "https://www.tforcefinalmile.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA",
                    "CAN"
                ]
            },
            {
                "slug": "toll-ipec",
                "name": "Toll IPEC",
                "phone": "+61 1300 865 547",
                "other_name": "Toll Express",
                "web_url": "http://www.tollgroup.com/tollipec",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "box-berry",
                "name": "Boxberry",
                "phone": "+8800-222-80-00",
                "other_name": "",
                "web_url": "https://boxberry.ru",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "hx-express",
                "name": "HX Express",
                "phone": "+862038063110",
                "other_name": "",
                "web_url": "http://www.hx-ep.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-CN",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "fedex-uk",
                "name": "FedEx UK",
                "phone": "03456 070809",
                "other_name": "FedEx United Kingdom",
                "web_url": "http://www.fedex.com/ukservices",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "intel-valley",
                "name": "Intel-Valley Supply chain (ShenZhen) Co. Ltd",
                "phone": "+86 15813849719",
                "other_name": "智谷供应链（深圳）有限公司",
                "web_url": "http://www.qhzhigu.com/cn/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "taqbin-hk",
                "name": "TAQBIN Hong Kong",
                "phone": "+852 2829 2222",
                "other_name": "Yamat, 雅瑪多運輸- 宅急便",
                "web_url": "http://hk.ta-q-bin.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "dhl-es",
                "name": "DHL Spain Domestic",
                "phone": "+34 902 09 05 41 | 902123030",
                "other_name": "DHL España",
                "web_url": "http://www.dhl.es/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "asendia-de",
                "name": "Asendia Germany",
                "phone": "+49 0800 18 17 000",
                "other_name": "Asendia De",
                "web_url": "http://www.asendia.de/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "gls-da",
                "name": "GLS Denmark",
                "phone": "+47 40064009",
                "other_name": null,
                "web_url": "https://gls-group.eu/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "da"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "ontrac",
                "name": "OnTrac",
                "phone": "+1 800 334 5000",
                "other_name": "OnTrac Shipping",
                "web_url": "https://www.ontrac.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "efs",
                "name": "EFS (E-commerce Fulfillment Service)",
                "phone": "+82 31-985-2856",
                "other_name": "",
                "web_url": "http://efs.asia/script/users/main.php",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "ninjavan",
                "name": "Ninja Van",
                "phone": "+65 6602 8271",
                "other_name": "",
                "web_url": "http://ninjavan.sg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "purolator-international",
                "name": "Purolator International",
                "phone": "+18885114811",
                "other_name": "",
                "web_url": "https://www.purolatorinternational.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN",
                    "USA"
                ]
            },
            {
                "slug": "courier-plus",
                "name": "Courier Plus",
                "phone": "+234 0703 307 4129",
                "other_name": "Courier Plus",
                "web_url": "http://www.courierplus-ng.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NGA"
                ]
            },
            {
                "slug": "mudita",
                "name": "MUDITA",
                "phone": "+91 011-40576384",
                "other_name": "",
                "web_url": "http://www.muditacargo.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "cello-square",
                "name": "Cello Square",
                "phone": "+82-10-4437-7128",
                "other_name": "",
                "web_url": "https://www.cellologistics.com/cellosq/web/pc/html/eng/square/overview.html?param=0___btn_goto_main",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "pos-indonesia-int",
                "name": "Pos Indonesia International",
                "phone": "+62 21 161",
                "other_name": "Indonesian Post International EMS",
                "web_url": "http://www.posindonesia.co.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "id",
                "support_languages": [
                    "id"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "shippify",
                "name": "Shippify, Inc",
                "phone": "+52 1 55 4004 1242",
                "other_name": "",
                "web_url": "https://www.shippify.co/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "abxexpress-my",
                "name": "ABX Express",
                "phone": "+60 03-7711 6633",
                "other_name": "ABX Express (M) Sdn Bhd",
                "web_url": "http://www.abxexpress.com.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "safexpress",
                "name": "Safexpress",
                "phone": "+91 1800 113 113",
                "other_name": "Safexpress",
                "web_url": "http://www.safexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "bgpost",
                "name": "Bulgarian Posts",
                "phone": "+3592/949 3280",
                "other_name": "Български пощи",
                "web_url": "http://www.bgpost.bg/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "bg",
                "support_languages": [
                    "bg"
                ],
                "service_from_country_iso3": [
                    "BGR"
                ]
            },
            {
                "slug": "ntl",
                "name": "NTL logistics",
                "phone": "+34 961855500",
                "other_name": "",
                "web_url": "http://www.ntl-trans.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "courex",
                "name": "Urbanfox",
                "phone": "+656476 7472",
                "other_name": "",
                "web_url": "https://www.urbanfox.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "cjlogistics",
                "name": "CJ Logistics International",
                "phone": "+60-3-3361-2888 +66-2-751-0044",
                "other_name": "",
                "web_url": "https://www.cjlogistics.com/en/network/en-sg",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "correos-de-mexico",
                "name": "Correos de Mexico",
                "phone": "+52 01 800 701 7000",
                "other_name": "Mexico Post",
                "web_url": "http://www.correosdemexico.com.mx/Paginas/Inicio.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "trans-kargo",
                "name": "Trans Kargo Internasional",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.tkicargo.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "dpex",
                "name": "DPEX",
                "phone": "+65 6781 8888",
                "other_name": "TGX, Toll Global Express Asia",
                "web_url": "https://www.dpex.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "aprisaexpress",
                "name": "Aprisa Express",
                "phone": "+1 (281) 303-1021",
                "other_name": "",
                "web_url": "http://www.aprisaexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "shree-maruti",
                "name": "Shree Maruti Courier Services Pvt Ltd",
                "phone": "9712 666 666",
                "other_name": "",
                "web_url": "www.shreemaruticourier.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "newgisticsapi",
                "name": "Newgistics API",
                "phone": "+1 877-860-5997",
                "other_name": "",
                "web_url": "http://www.newgistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "skybox",
                "name": "SKYBOX",
                "phone": "+66 2 105 6195",
                "other_name": "",
                "web_url": "https://www.attskybox.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "bh-worldwide",
                "name": "B&H Worldwide",
                "phone": "+44 (0) 208759 5544",
                "other_name": "",
                "web_url": "https://www.bhworldwide.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "parcelpoint",
                "name": "ParcelPoint Pty Ltd",
                "phone": "+1300 025 639",
                "other_name": "",
                "web_url": "https://parcelpoint.com.au",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "interparcel-nz",
                "name": "Interparcel New Zealand",
                "phone": "+09 8899599",
                "other_name": "Interparcel",
                "web_url": "https://nz.interparcel.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "mondialrelay-fr",
                "name": "Mondial Relay France",
                "phone": "+330969322332",
                "other_name": null,
                "web_url": "https://www.mondialrelay.fr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "dawnwing",
                "name": "Dawn Wing",
                "phone": "+27 0861 223 224",
                "other_name": "DPD Laser Express Logistics",
                "web_url": "http://www.dawnwing.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "citylinkexpress",
                "name": "City-Link Express",
                "phone": "+60 603-5565 8399",
                "other_name": "Citylink Malaysia",
                "web_url": "http://www.citylinkexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "aupost-china",
                "name": "AuPost China",
                "phone": "+86 4007005618",
                "other_name": "澳邮宝",
                "web_url": "http://www.aupost.org/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "landmark-global-reference",
                "name": "Landmark Global Reference",
                "phone": "+32 2 201 23 45",
                "other_name": "",
                "web_url": "https://landmarkglobal.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BEL"
                ]
            },
            {
                "slug": "dpd-fr-reference",
                "name": "DPD France",
                "phone": "09 70 80 85 66",
                "other_name": "",
                "web_url": "https://www.dpd.fr/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "mypostonline",
                "name": "Mypostonline",
                "phone": "+60 07-6625692",
                "other_name": "MYBOXPOST",
                "web_url": "http://qsm.mypostonline.com.cn/index.php",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "fastrak-th",
                "name": "Fastrak Services",
                "phone": "+66 (2) 710-2900",
                "other_name": "Fastrak Advanced Delivery Systems",
                "web_url": "http://www.fastrak.co.th/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "fedex-fims",
                "name": "FedEx International MailService",
                "phone": "+1 800 463 3339",
                "other_name": "",
                "web_url": "http://mailviewrecipient.fedex.com/recip_package_summary.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "corporatecouriers-webhook",
                "name": "Corporate Couriers",
                "phone": "+604-685-5900",
                "other_name": null,
                "web_url": "https://www.corporatecouriers.net/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "greyhound",
                "name": "Greyhound",
                "phone": "-",
                "other_name": "Greyhound Package Express",
                "web_url": "http://www.shipgreyhound.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "airspeed",
                "name": "Airspeed International Corporation",
                "phone": "+632 852 - 7338",
                "other_name": "Airspeed Philippines",
                "web_url": "http://www.airspeed.com.ph/aic/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PHL"
                ]
            },
            {
                "slug": "szendex",
                "name": "SZENDEX",
                "phone": null,
                "other_name": null,
                "web_url": "https://www.szendex.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "acsworldwide",
                "name": "ACS Worldwide Express",
                "phone": "+886227606269 +85227530392",
                "other_name": "",
                "web_url": "http://www.acsnets.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hant",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "swiss-post",
                "name": "Swiss Post",
                "phone": "+41 848 888 888",
                "other_name": "La Poste Suisse, Die Schweizerische Post, Die Post",
                "web_url": "https://www.post.ch/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHE"
                ]
            },
            {
                "slug": "paper-express",
                "name": "Paper Express",
                "phone": "+31 (0)347 - 75 50 70",
                "other_name": "",
                "web_url": "http://www.paper-express.nl/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "apc-overnight",
                "name": "APC Overnight",
                "phone": "+44 800 37 37 37",
                "other_name": "Net Despatch",
                "web_url": "http://www.apc-overnight.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_postal_code"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "mainfreight",
                "name": "Mainfreight",
                "phone": "+61 (2) 8784 2200",
                "other_name": "",
                "web_url": "http://www.mainfreight.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "bert-fr",
                "name": "Bert Transport",
                "phone": "+33 4 75 31 01 15",
                "other_name": "",
                "web_url": "http://bert.fr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "canpar",
                "name": "Canpar Courier",
                "phone": "+1 800-387-9335",
                "other_name": "TransForce",
                "web_url": "http://www.canpar.ca/en/home.jsp",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "skynet",
                "name": "SkyNet Malaysia",
                "phone": "+60 3- 56239090",
                "other_name": "SkyNet MY",
                "web_url": "http://www.skynet.com.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "thecourierguy",
                "name": "The Courier Guy",
                "phone": "+27 0861 203 203",
                "other_name": "TheCourierGuy",
                "web_url": "http://www.thecourierguy.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "easy-mail",
                "name": "Easy Mail",
                "phone": "+30 210 48 35 000",
                "other_name": "",
                "web_url": "http://easy-mail.gr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "el",
                "support_languages": [
                    "el"
                ],
                "service_from_country_iso3": [
                    "GRC"
                ]
            },
            {
                "slug": "weaship",
                "name": "Weaship",
                "phone": "+8613817016056",
                "other_name": "",
                "web_url": "http://www.weaship.com.cn/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "brt-it-parcelid",
                "name": "BRT Bartolini(Parcel ID)",
                "phone": "",
                "other_name": "BRT Corriere Espresso, DPD Italy",
                "web_url": "http://www.brt.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "sendit",
                "name": "Sendit",
                "phone": "+6620170324",
                "other_name": "",
                "web_url": "https://www.sendit.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "yakit",
                "name": "Yakit",
                "phone": "+1 408 645 0086",
                "other_name": "",
                "web_url": "https://www.yakit.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "zto-express",
                "name": "ZTO Express",
                "phone": "0344 257 3442",
                "other_name": "",
                "web_url": "http://www.zto.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "fedex-crossborder",
                "name": "Fedex Cross Border",
                "phone": "+877 577 3622",
                "other_name": "",
                "web_url": "http://crossborder.fedex.com/us/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "chronopost-portugal",
                "name": "Chronopost Portugal(DPD)",
                "phone": "+351 707 20 28 28",
                "other_name": "Chronopost pt",
                "web_url": "https://dpd.pt/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "adicional",
                "name": "Adicional Logistics",
                "phone": "+351 707 300 444",
                "other_name": "",
                "web_url": "http://www.adicional.pt/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "relaiscolis",
                "name": "Relais Colis",
                "phone": "970252231",
                "other_name": "",
                "web_url": "https://www.relaiscolis.com/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "en",
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "carriers",
                "name": "Carriers",
                "phone": "+000000000000",
                "other_name": "",
                "web_url": "https://www.carriers.com.br/site/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "PRT"
                ]
            },
            {
                "slug": "pony-express",
                "name": "Pony express",
                "phone": "+74959377777",
                "other_name": "",
                "web_url": "https://www.ponyexpress.ru/en/support/online-services/track/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "pos-indonesia",
                "name": "Pos Indonesia Domestic",
                "phone": "+62 21 161",
                "other_name": "Indonesian Post Domestic",
                "web_url": "http://www.posindonesia.co.id",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "id",
                "support_languages": [
                    "id"
                ],
                "service_from_country_iso3": [
                    "IDN"
                ]
            },
            {
                "slug": "demandship",
                "name": "DemandShip",
                "phone": "+1-310-844-6014",
                "other_name": "",
                "web_url": "http://www.demandship.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "ky-express",
                "name": "Kua Yue Express",
                "phone": "+86 95324",
                "other_name": "KYE",
                "web_url": "http://www.ky-express.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "caribou",
                "name": "Caribou",
                "phone": "+44 (0) 330 010 6000",
                "other_name": null,
                "web_url": "https://wearecaribou.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "collivery",
                "name": "MDS Collivery Pty (Ltd)",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.collivery.net",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "dhl-supplychain-in",
                "name": "DHL supply chain India",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.logistics.dhl/id-en/home/our-divisions/supply-chain.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "janco",
                "name": "Janco Ecommerce",
                "phone": "+852-2157-4048",
                "other_name": "",
                "web_url": "http://www.jancoecommerce.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "colissimo",
                "name": "Colissimo",
                "phone": "+33 3631",
                "other_name": "Colissimo fr",
                "web_url": "http://www.colissimo.fr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "dhl-benelux",
                "name": "DHL Benelux",
                "phone": "+31 26-324 6700",
                "other_name": "DHL TrackNet Benelux",
                "web_url": "http://www.dhl.nl/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl",
                    "en"
                ],
                "service_from_country_iso3": [
                    "BEL"
                ]
            },
            {
                "slug": "parcelled-in",
                "name": "Parcelled.in",
                "phone": "+91 1800 419 0285",
                "other_name": "Parcelled",
                "web_url": "http://parcelled.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "bluestar",
                "name": "Blue Star",
                "phone": "+61 3 8338 0500",
                "other_name": "",
                "web_url": "http://www.bluestarlogistics.com.au/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "fetchr",
                "name": "Fetchr",
                "phone": "+97148018100",
                "other_name": "",
                "web_url": "http://www.fetchr.us/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ARE"
                ]
            },
            {
                "slug": "geodis-espace",
                "name": "Geodis E-space",
                "phone": "0892 05 28 28",
                "other_name": "Geodis Distribution & Express",
                "web_url": "http://www.geodis.com/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "croshot",
                "name": "Croshot",
                "phone": "+8210-5307-8915",
                "other_name": null,
                "web_url": "http://www.croshot.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ko",
                "support_languages": [
                    "ko"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "mxe",
                "name": "MXE Express",
                "phone": "+86 21 59881019",
                "other_name": "上海淼信货运代理有限公司",
                "web_url": "http://www.mxe56.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "lht-express",
                "name": "LHT Express",
                "phone": "+852-27856678 +852-27857778",
                "other_name": "",
                "web_url": "http://www.lht-express.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "aduiepyle",
                "name": "A Duie Pyle",
                "phone": "+1 800-523-5020",
                "other_name": "",
                "web_url": "https://www.aduiepyle.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "tnt-uk",
                "name": "TNT UK",
                "phone": "+44 800 100 600",
                "other_name": "TNT United Kingdom",
                "web_url": "http://www.tnt.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "exapaq",
                "name": "DPD France",
                "phone": "09 70 80 85 66",
                "other_name": "Exapaq",
                "web_url": "http://www.dpd.fr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr",
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "toll-nz",
                "name": "Toll New Zealand",
                "phone": "+0800 865 569",
                "other_name": "",
                "web_url": "https://www.tollgroup.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "NZL"
                ]
            },
            {
                "slug": "birdsystem",
                "name": "BirdSystem",
                "phone": "+",
                "other_name": "",
                "web_url": "http://www.birdsystem.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "gls-netherlands",
                "name": "GLS Netherlands",
                "phone": "+31 0900-1116660",
                "other_name": "GLS NL",
                "web_url": "http://www.gls-netherlands.com/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "pittohio",
                "name": "PITT OHIO",
                "phone": "+(800) 366-7488",
                "other_name": "",
                "web_url": "https://works.pittohio.com/myPittOhio/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "cj-hk-international",
                "name": "CJ Logistics International(Hong Kong)",
                "phone": null,
                "other_name": null,
                "web_url": "https://www.cjlogistics.com/en/main",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG",
                    "THA",
                    "SGP",
                    "MYS"
                ]
            },
            {
                "slug": "interlink-express",
                "name": "DPD Local",
                "phone": "+44 121 275 05 24",
                "other_name": "Interlink UK",
                "web_url": "http://www.interlinkexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "israel-post",
                "name": "Israel Post",
                "phone": "+972 2 629 0691",
                "other_name": "חברת דואר ישראל",
                "web_url": "http://www.israelpost.co.il",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en",
                    "iw"
                ],
                "service_from_country_iso3": [
                    "ISR"
                ]
            },
            {
                "slug": "sendle",
                "name": "Sendle",
                "phone": "-",
                "other_name": "",
                "web_url": "https://try.sendle.com/en-us/partners/aftership",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "usps-webhook",
                "name": "USPS Informed Visibility - Webhook",
                "phone": "+1 8002758777",
                "other_name": "USPS IV",
                "web_url": "https://www.usps.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "hong-kong-post",
                "name": "Hong Kong Post",
                "phone": "+852 2921 2222",
                "other_name": "香港郵政",
                "web_url": "https://www.hongkongpost.hk/en/home/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en",
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "HKG"
                ]
            },
            {
                "slug": "mailamericas",
                "name": "MailAmericas",
                "phone": "+54 11 5218 6307",
                "other_name": "",
                "web_url": "http://mailamericas.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "dx-freight",
                "name": "DX Freight",
                "phone": "+44 844 826 1178",
                "other_name": "",
                "web_url": "https://www.dxdelivery.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "cuckooexpress",
                "name": "Cuckoo Express",
                "phone": "+86 400-100-0533",
                "other_name": "布谷鸟",
                "web_url": "http://www.cuckooexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "ddexpress",
                "name": "DD Express Courier",
                "phone": "+603-74997232",
                "other_name": "",
                "web_url": "https://dd.express/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "mail-box-etc",
                "name": "Mail Boxes Etc.",
                "phone": "+525550041919",
                "other_name": "",
                "web_url": "https://www.mbe.mx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "shiptor",
                "name": "Shiptor",
                "phone": "+1 603 2335679",
                "other_name": "",
                "web_url": "https://shiptor.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "speedcouriers-gr",
                "name": "Speed Couriers",
                "phone": "+30 210 9762007",
                "other_name": "Speed Couriers",
                "web_url": "http://speedcouriers.gr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GRC"
                ]
            },
            {
                "slug": "spain-correos-es",
                "name": "Correos de España",
                "phone": "+34 900400004",
                "other_name": "Spain Post, ChronoExpress",
                "web_url": "http://www.correos.es",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "qxpress",
                "name": "Qxpress",
                "phone": "+65-6661-9100",
                "other_name": "Qxpress Qoo10",
                "web_url": "http://www.qxpress.asia/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "dtdc",
                "name": "DTDC India",
                "phone": "+91 80 33004444",
                "other_name": "DTDC Courier & Cargo",
                "web_url": "http://dtdc.in/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "dhl-germany",
                "name": "Deutsche Post DHL",
                "phone": "+49 228 4333112",
                "other_name": "DHL Germany",
                "web_url": "http://www.dhl.de/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_postal_code"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "DEU"
                ]
            },
            {
                "slug": "correosexpress",
                "name": "Correos Express",
                "phone": "+34 902 1 22 333",
                "other_name": "",
                "web_url": "https://www.correosexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "skynet-za",
                "name": "Skynet World Wide Express South Africa",
                "phone": "+27 11 5861000",
                "other_name": "",
                "web_url": "www.skynet.co.za",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "ups-mi",
                "name": "UPS Mail Innovations",
                "phone": "+1 800-500-2224",
                "other_name": "UPS MI",
                "web_url": "http://www.upsmailinnovations.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "envialia",
                "name": "Envialia",
                "phone": "+34 902400909",
                "other_name": "Envialia Spain",
                "web_url": "http://www.envialia.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "expeditors-api",
                "name": "Expeditors API",
                "phone": null,
                "other_name": "",
                "web_url": "https://www.expeditors.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "dynamic-logistics",
                "name": "Dynamic Logistics",
                "phone": "+66 02-688-6688",
                "other_name": "Dynamic Logistics Thailand",
                "web_url": "http://www.dynamic-logistics.com/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "THA"
                ]
            },
            {
                "slug": "wise-express",
                "name": "Wise Express",
                "phone": "+86 4008 206 207",
                "other_name": "u4e07u8272u901fu9012",
                "web_url": "http://www.shwise.cn",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "tnt-it",
                "name": "TNT Italy",
                "phone": "+39 199 803 868",
                "other_name": "TNT Express IT",
                "web_url": "http://www.tnt.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "hunter-express",
                "name": "Hunter Express",
                "phone": "+61 2 9780 4099",
                "other_name": "",
                "web_url": "http://www.hunterexpress.com.au/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "australia-post-api",
                "name": "Australia Post",
                "phone": "13 76 78",
                "other_name": "",
                "web_url": "https://auspost.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "skynetworldwide",
                "name": "SkyNet Worldwide Express",
                "phone": "+44 20 8538 1988",
                "other_name": "Skynetwwe",
                "web_url": "http://www.skynetwwe.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "tnt-click",
                "name": "TNT-Click Italy",
                "phone": "+39 199 803 868",
                "other_name": "TNT Italy",
                "web_url": "https://www.tnt-click.it/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "it",
                "support_languages": [
                    "it"
                ],
                "service_from_country_iso3": [
                    "ITA"
                ]
            },
            {
                "slug": "cope",
                "name": "Cope Sensitive Freight",
                "phone": "+61287878888",
                "other_name": "",
                "web_url": "https://www.cope.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "rrdonnelley",
                "name": "RRD International Logistics U.S.A",
                "phone": "",
                "other_name": "RRD",
                "web_url": "-",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "latvijas-pasts",
                "name": "Latvijas Pasts",
                "phone": "+371 67008001",
                "other_name": "Latvijas Pasts",
                "web_url": "https://www.pasts.lv/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "LVA"
                ]
            },
            {
                "slug": "gls-croatia",
                "name": "GLS Croatia",
                "phone": "+385 1 2042 672",
                "other_name": "",
                "web_url": "https://gls-group.eu/HR/hr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HRV"
                ]
            },
            {
                "slug": "dhl-active-tracing",
                "name": "DHL Active Tracing",
                "phone": "+1 2400 3388",
                "other_name": "",
                "web_url": "https://activetracing.dhl.com/DatPublic/datSelection.do",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "line",
                "name": "Line Clear Express & Logistics Sdn Bhd",
                "phone": "+0355905590",
                "other_name": "",
                "web_url": "https://www.lineclearexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "ep-box",
                "name": "EP-Box",
                "phone": "+305 5992115",
                "other_name": "",
                "web_url": "http://www.ep-box.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "expresssale",
                "name": "Expresssale",
                "phone": "+8-800-505-46-25",
                "other_name": "",
                "web_url": "https://www.expressale.eu/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "cubyn",
                "name": "Cubyn",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.cubyn.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "sto",
                "name": "STO Express",
                "phone": "+86 95543",
                "other_name": "申通快递, Shentong Express",
                "web_url": "http://www.sto.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "destiny",
                "name": "Destiny Transportation",
                "phone": "317-852-0400",
                "other_name": null,
                "web_url": "https://www.destinyltl.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "danmark-post",
                "name": "PostNord Denmark",
                "phone": "+45 80 20 70 30",
                "other_name": "Danmark Post",
                "web_url": "http://www.pakkeboksen.dk/index.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "da",
                "support_languages": [
                    "da",
                    "en"
                ],
                "service_from_country_iso3": [
                    "DNK"
                ]
            },
            {
                "slug": "asm",
                "name": "ASM",
                "phone": "+34 902 11 33 00",
                "other_name": "Asm-Red",
                "web_url": "http://www.asmred.com/en/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "gls-spain",
                "name": "GLS Spain",
                "phone": "+902 11 33 00",
                "other_name": "",
                "web_url": "https://www.gls-spain.es/es/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "tfm",
                "name": "TFM Xpress",
                "phone": "+",
                "other_name": "",
                "web_url": "http://tfmxpress.com.au/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "fan",
                "name": "FAN COURIER EXPRESS",
                "phone": "(+4021).9336",
                "other_name": null,
                "web_url": "http://www.fancourier.ro/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SVN"
                ]
            },
            {
                "slug": "hermes",
                "name": "Hermesworld",
                "phone": "+44 844 543 7000",
                "other_name": "Hermes-europe UK",
                "web_url": "https://www.hermesworld.com/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "bpost-international",
                "name": "Bpost international",
                "phone": "+32 2 201 23 45",
                "other_name": "Landmark Global",
                "web_url": "http://www.bpostinternational.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_postal_code"
                ],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "gba",
                "name": "GBA Services Ltd",
                "phone": "+44(0)1772841899",
                "other_name": "",
                "web_url": "https://www.gbaservices.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "inexpost",
                "name": "Inexpost",
                "phone": "+8-800-505-46-25",
                "other_name": "",
                "web_url": "http://www.inexpost.ru",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "EST",
                    "FIN"
                ]
            },
            {
                "slug": "gojavas",
                "name": "GoJavas",
                "phone": "+91 124-4405730",
                "other_name": "Javas",
                "web_url": "http://gojavas.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "IND"
                ]
            },
            {
                "slug": "boxc",
                "name": "BoxC",
                "phone": "+1 646 762 5507",
                "other_name": "BOXC快遞",
                "web_url": "http://boxc.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "watkins-shepard",
                "name": "Watkins Shepard",
                "phone": "+1 800-824-0913",
                "other_name": "",
                "web_url": "http://wksh.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "copa-courier",
                "name": "Copa Airlines Courier",
                "phone": "+1 305-594-7210",
                "other_name": "Copa Courier",
                "web_url": "http://www.copacourier.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "purolator",
                "name": "Purolator",
                "phone": "+1-888-744-7123",
                "other_name": "Purolator Freight",
                "web_url": "http://www.purolator.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CAN"
                ]
            },
            {
                "slug": "viettelpost",
                "name": "ViettelPost",
                "phone": "+84 1900 8095",
                "other_name": "Bưu chính Viettel",
                "web_url": "http://www.viettelpost.com.vn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "vi",
                "support_languages": [
                    "vi"
                ],
                "service_from_country_iso3": [
                    "VNM"
                ]
            },
            {
                "slug": "asendia-hk",
                "name": "Asendia HK",
                "phone": "+852 2690 1005",
                "other_name": "",
                "web_url": "http://www.asendia.hk",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHE"
                ]
            },
            {
                "slug": "posten-norge",
                "name": "Posten Norge / Bring",
                "phone": "+47 21316260",
                "other_name": "Norway Post, Norska Posten",
                "web_url": "http://www.posten.no/en/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "no",
                "support_languages": [
                    "no",
                    "en"
                ],
                "service_from_country_iso3": [
                    "NOR"
                ]
            },
            {
                "slug": "dylt",
                "name": "Daylight Transport, LLC",
                "phone": "+800-468-9999",
                "other_name": "",
                "web_url": "http://www.dylt.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "mexico-senda-express",
                "name": "Mexico Senda Express",
                "phone": "+52 1800 833 93 00",
                "other_name": "Mexico Senda Express",
                "web_url": "http://www.sendaexpress.com.mx/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "MEX"
                ]
            },
            {
                "slug": "averitt",
                "name": "Averitt Express",
                "phone": "800-283-7488",
                "other_name": "",
                "web_url": "www.averittexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "smg-express",
                "name": "SMG Direct",
                "phone": "+44 0345 094 4347",
                "other_name": "",
                "web_url": "https://smg.direct",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "pitney-bowes",
                "name": "Pitney Bowes",
                "phone": "",
                "other_name": "",
                "web_url": "https://www.pitneybowes.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "zinc",
                "name": "Zinc",
                "phone": "(714) 696-6180",
                "other_name": "",
                "web_url": "https://zinc.io",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "yurtici-kargo",
                "name": "Yurtici Kargo",
                "phone": "+",
                "other_name": "",
                "web_url": "https://www.yurticikargo.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "tr",
                "support_languages": [
                    "tr"
                ],
                "service_from_country_iso3": [
                    "TUR"
                ]
            },
            {
                "slug": "alljoy",
                "name": "ALLJOY SUPPLY CHAIN CO., LTD",
                "phone": "+86 400-900-1982",
                "other_name": "",
                "web_url": "http://www.alljoylogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "brazil-correios",
                "name": "Brazil Correios",
                "phone": "+55 3003-0100",
                "other_name": "Brazilian Post",
                "web_url": "http://correios.com.br/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "pt",
                "support_languages": [
                    "pt"
                ],
                "service_from_country_iso3": [
                    "BRA"
                ]
            },
            {
                "slug": "mailplus-jp",
                "name": "MailPlus",
                "phone": "+310-535-7266",
                "other_name": "",
                "web_url": "https://www.nittsu.com/epelicangen2/track/Track.aspx",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "spring-gds",
                "name": "Spring GDS",
                "phone": "+34 902 102 108",
                "other_name": "",
                "web_url": "https://www.spring-gds.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "empsexpress",
                "name": "EMPS Express",
                "phone": "+86 (755) 36620359",
                "other_name": "快信快包",
                "web_url": "http://www.empsexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "postnl",
                "name": "PostNL Domestic",
                "phone": "",
                "other_name": "PostNL Pakketten, TNT Post Netherlands",
                "web_url": "https://www.postnl.nl/klantenservice",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "hct-logistics",
                "name": "HCT LOGISTICS CO.LTD.",
                "phone": "+886228371122",
                "other_name": "",
                "web_url": "https://www.hct.com.tw/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "kn",
                "name": "Kuehne + Nagel",
                "phone": "+41-44-7869511",
                "other_name": "KN",
                "web_url": "http://www.kn-portal.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "panther-reference",
                "name": "Panther Reference",
                "phone": "+44 800 685 0657",
                "other_name": "Panther Group UK",
                "web_url": "http://www.pantherpremium.com/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "speedy",
                "name": "Speedy",
                "phone": "+35 988 682 3635",
                "other_name": "",
                "web_url": "https://www.speedy.bg/en/track-shipment",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "BGR"
                ]
            },
            {
                "slug": "logwin-logistics",
                "name": "Logwin Logistics",
                "phone": "+49 6021 343 0",
                "other_name": "",
                "web_url": "http://www.logwin-logistics.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "spanish-seur",
                "name": "Spanish Seur",
                "phone": "+34 902101010",
                "other_name": "SEUR",
                "web_url": "http://www.seur.com/",
                "required_fields": [],
                "optional_fields": [
                    "tracking_ship_date"
                ],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ESP"
                ]
            },
            {
                "slug": "rincos",
                "name": "Rincos",
                "phone": "+82 2 1644 3832",
                "other_name": "",
                "web_url": "http://www.rincos.co.kr/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "KOR"
                ]
            },
            {
                "slug": "virtransport",
                "name": "VIR Transport",
                "phone": "+33 (0)2 54 55 47 50",
                "other_name": "",
                "web_url": "https://www.vir.fr/",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "ctc-express",
                "name": "CTC Express",
                "phone": "+8862-2792-9955",
                "other_name": "",
                "web_url": "www.ctc-express.com.tw",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-CN",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "TWN"
                ]
            },
            {
                "slug": "800bestex",
                "name": "Best Express",
                "phone": "+86 4009565656",
                "other_name": "百世汇通",
                "web_url": "http://www.800bestex.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "zh-Hans",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "apg",
                "name": "APG eCommerce Solutions Ltd.",
                "phone": "+44 (0) 203 9620242",
                "other_name": "",
                "web_url": "https://apgecommerce.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "hipshipper",
                "name": "Hipshipper",
                "phone": "+1-917-383-06-78",
                "other_name": "",
                "web_url": "https://www.hipshipper.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "old-dominion",
                "name": "Old Dominion Freight Line",
                "phone": "+1-800-432-6335",
                "other_name": "ODFL",
                "web_url": "http://www.odfl.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "belpost",
                "name": "Belpost",
                "phone": "+375 17 293 59 10",
                "other_name": "Belposhta, Белпочта",
                "web_url": "http://www.belpost.by",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "BLR"
                ]
            },
            {
                "slug": "russian-post",
                "name": "Russian Post",
                "phone": "+7 (495) 956-20-67",
                "other_name": "Почта России, EMS Post RU",
                "web_url": "https://www.pochta.ru/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "ru",
                "support_languages": [
                    "ru"
                ],
                "service_from_country_iso3": [
                    "RUS"
                ]
            },
            {
                "slug": "la-poste-colissimo",
                "name": "La Poste",
                "phone": "+33 810 82 18 21",
                "other_name": "Coliposte",
                "web_url": "http://www.csuivi.courrier.laposte.fr",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "dx",
                "name": "DX",
                "phone": "-",
                "other_name": "-",
                "web_url": "https://www.thedx.co.uk",
                "required_fields": [
                    "tracking_account_number"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "fasttrack",
                "name": "Fasttrack",
                "phone": "+54 0810-888-3278",
                "other_name": "",
                "web_url": "https://fasttrack.com.ar/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "es",
                "support_languages": [
                    "es"
                ],
                "service_from_country_iso3": [
                    "ARG"
                ]
            },
            {
                "slug": "oneworldexpress",
                "name": "One World Express",
                "phone": "+86 0755-86536663",
                "other_name": "u6613u65f6u9039u7269u6d41",
                "web_url": "http://www.oneworldexpress.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "transmission-nl",
                "name": "TransMission",
                "phone": "+31 (0)79 3438250",
                "other_name": "mijnzending",
                "web_url": "http://www.trans-mission.nl/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "nl",
                "support_languages": [
                    "nl"
                ],
                "service_from_country_iso3": [
                    "NLD"
                ]
            },
            {
                "slug": "ceva",
                "name": "CEVA LOGISTICS",
                "phone": "+1-800-888-4949",
                "other_name": "",
                "web_url": "https://www.cevalogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "ramgroup-za",
                "name": "RAM",
                "phone": "+27 0861 726 726",
                "other_name": "RAM Group",
                "web_url": "http://www.ram.co.za/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "ZAF"
                ]
            },
            {
                "slug": "ups-freight",
                "name": "UPS Freight",
                "phone": "+1 800-333-7400",
                "other_name": "UPS LTL and Truckload",
                "web_url": "http://ltl.upsfreight.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "japan-post",
                "name": "Japan Post",
                "phone": "+81 0570-046111",
                "other_name": "日本郵便",
                "web_url": "http://www.post.japanpost.jp/top.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "JPN"
                ]
            },
            {
                "slug": "dbschenker-se",
                "name": "DB Schenker",
                "phone": "",
                "other_name": "Deutsche Bahn",
                "web_url": "https://www.dbschenker.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SWE"
                ]
            },
            {
                "slug": "skynetworldwide-uk",
                "name": "Skynet Worldwide Express UK",
                "phone": "+44 20 8538 1988",
                "other_name": "Skynet UK",
                "web_url": "https://www.skynetworldwide.com",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "xpert-delivery",
                "name": "Xpert Delivery",
                "phone": "+44 01214680909",
                "other_name": "",
                "web_url": "https://www.xpertdelivery.co.uk/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "imxmail",
                "name": "IMX Mail",
                "phone": "+44 (0) 20 84 39 11 77",
                "other_name": "IMX International Mail Consolidator",
                "web_url": "http://www.imxmail.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "pilot-freight",
                "name": "Pilot Freight Services",
                "phone": "+1 800-447-4568",
                "other_name": "",
                "web_url": "http://www.pilotdelivers.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            },
            {
                "slug": "tnt-au",
                "name": "TNT Australia",
                "phone": "+61 13 11 50",
                "other_name": "TNT AU",
                "web_url": "http://www.tntexpress.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "allied-express-ftp",
                "name": "Allied Express",
                "phone": "13 13 73",
                "other_name": "",
                "web_url": "http://www.alliedexpress.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "china-ems",
                "name": "China EMS (ePacket)",
                "phone": "+86 20 11183",
                "other_name": "中国邮政速递物流, ePacket, e-Packet, e Packet",
                "web_url": "http://www.11183.com.cn/english.html",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "zh-CN"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "fastway-au",
                "name": "Aramex Australia (formerly Fastway AU)",
                "phone": "+61 (0) 2 9737 8288",
                "other_name": "Fastway Couriers",
                "web_url": "https://www.aramex.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "tck-express",
                "name": "TCK Express",
                "phone": "+13MEGA (136342)",
                "other_name": "",
                "web_url": "https://www.tckexpress.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "SGP"
                ]
            },
            {
                "slug": "sic-teliway",
                "name": "Teliway SIC Express",
                "phone": "-",
                "other_name": "Prevote",
                "web_url": "http://sic.teliway.com/appli/vsic/tracking/suivi.php?code=sic&clef=",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "fr",
                "support_languages": [
                    "fr"
                ],
                "service_from_country_iso3": [
                    "FRA"
                ]
            },
            {
                "slug": "kangaroo-my",
                "name": "Kangaroo Worldwide Express",
                "phone": "+ 60 603-5518 8228",
                "other_name": "",
                "web_url": "http://www.kangaroo.com.my/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "mainway",
                "name": "Mainway",
                "phone": "+852 81723676",
                "other_name": "",
                "web_url": "https://www.mainwaylogistics.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "HKG",
                    "FRA",
                    "GBR"
                ]
            },
            {
                "slug": "panther-order-number",
                "name": "Panther Order Number",
                "phone": "+44 800 685 0657",
                "other_name": "Panther Group UK",
                "web_url": "http://www.pantherpremium.com/",
                "required_fields": [
                    "tracking_postal_code"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "star-track",
                "name": "StarTrack",
                "phone": "+61 13 2345",
                "other_name": "Star Track",
                "web_url": "http://startrack.com.au/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "AUS"
                ]
            },
            {
                "slug": "norsk-global",
                "name": "Norsk Global",
                "phone": "+44 1753 800800",
                "other_name": "Norsk European Wholesale",
                "web_url": "http://www.norsk-global.com/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "GBR"
                ]
            },
            {
                "slug": "idexpress",
                "name": "IDEX",
                "phone": "+86 400-880-9976",
                "other_name": "上海宏杉国际物流",
                "web_url": "http://www.idexpress.com.cn/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "CHN"
                ]
            },
            {
                "slug": "collectco",
                "name": "CollectCo",
                "phone": "+603 7733 0933",
                "other_name": "",
                "web_url": "http://collectco.my",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "MYS"
                ]
            },
            {
                "slug": "gls-slovenia",
                "name": "GLS Slovenia",
                "phone": "+386 1 500 11 90",
                "other_name": "",
                "web_url": "https://gls-group.eu/SI/en/home",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "sl",
                "support_languages": [
                    "sl"
                ],
                "service_from_country_iso3": [
                    "SVN"
                ]
            },
            {
                "slug": "fedex-freight",
                "name": "FedEx Freight",
                "phone": "+1 800.463.3339",
                "other_name": "FedEx LTL",
                "web_url": "http://www.fedex.com/us/freight/",
                "required_fields": [],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": []
            },
            {
                "slug": "bestwayparcel",
                "name": "Best Way Parcel",
                "phone": "",
                "other_name": "",
                "web_url": "http://bestwayparcel.com/",
                "required_fields": [
                    "tracking_key"
                ],
                "optional_fields": [],
                "default_language": "en",
                "support_languages": [
                    "en"
                ],
                "service_from_country_iso3": [
                    "USA"
                ]
            }
        

            ]
        ';
    }

}
