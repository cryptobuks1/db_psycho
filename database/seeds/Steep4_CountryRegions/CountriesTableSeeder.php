<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Country::truncate();

        \App\Models\Country::create([
            "country_name" => "Aruba",
            "country_full_name" => "Aruba",
            "country_code" => "533",
            "country_code_alpha2" => "AW",
            "country_code_alpha3" => "ABW",
        ]);

        \App\Models\Country::create([
            "country_name" => "Afghanistan",
            "country_full_name" => "Islamic Republic of Afghanistan",
            "country_code" => "004",
            "country_code_alpha2" => "AF",
            "country_code_alpha3" => "AFG",
        ]);

        \App\Models\Country::create([
            "country_name" => "Angola",
            "country_full_name" => "Republic of Angola",
            "country_code" => "024",
            "country_code_alpha2" => "AO",
            "country_code_alpha3" => "AGO",
        ]);

        \App\Models\Country::create([
            "country_name" => "Anguilla",
            "country_full_name" => "Anguilla",
            "country_code" => "660",
            "country_code_alpha2" => "AI",
            "country_code_alpha3" => "AIA",
        ]);

        \App\Models\Country::create([
            "country_name" => "Åland Islands",
            "country_full_name" => "Åland Islands",
            "country_code" => "248",
            "country_code_alpha2" => "AX",
            "country_code_alpha3" => "ALA",
        ]);

        \App\Models\Country::create([
            "country_name" => "Albania",
            "country_full_name" => "Republic of Albania",
            "country_code" => "008",
            "country_code_alpha2" => "AL",
            "country_code_alpha3" => "ALB",
        ]);

        \App\Models\Country::create([
            "country_name" => "Andorra",
            "country_full_name" => "Principality of Andorra",
            "country_code" => "020",
            "country_code_alpha2" => "AD",
            "country_code_alpha3" => "AND",
        ]);

        \App\Models\Country::create([
            "country_name" => "United Arab Emirates",
            "country_full_name" => "United Arab Emirates",
            "country_code" => "784",
            "country_code_alpha2" => "AE",
            "country_code_alpha3" => "ARE",
        ]);
        \App\Models\Country::create([
            "country_name" => "Argentina",
            "country_full_name" => "Argentine Republic",
            "country_code" => "032",
            "country_code_alpha2" => "AR",
            "country_code_alpha3" => "ARG",
        ]);

        \App\Models\Country::create([
            "country_name" => "Armenia",
            "country_full_name" => "Republic of Armenia",
            "country_code" => "051",
            "country_code_alpha2" => "AM",
            "country_code_alpha3" => "ARM",
        ]);

        \App\Models\Country::create([
            "country_name" => "American Samoa",
            "country_full_name" => "American Samoa",
            "country_code" => "016",
            "country_code_alpha2" => "AS",
            "country_code_alpha3" => "ASM",
        ]);

        \App\Models\Country::create([
                                "country_name" => "Antarctica",
                                "country_full_name" => "Antarctica",
                                "country_code" => "010",
                                "country_code_alpha2" => "AQ",
                                "country_code_alpha3" => "ATA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "French Southern and Antarctic Lands",
                                "country_full_name" => "Territory of the French Southern and Antarctic Lands",
                                "country_code" => "260",
                                "country_code_alpha2" => "TF",
                                "country_code_alpha3" => "ATF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Antigua and Barbuda",
                                "country_full_name" => "Antigua and Barbuda",
                                "country_code" => "028",
                                "country_code_alpha2" => "AG",
                                "country_code_alpha3" => "ATG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Australia",
                                "country_full_name" => "Commonwealth of Australia",
                                "country_code" => "036",
                                "country_code_alpha2" => "AU",
                                "country_code_alpha3" => "AUS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Austria",
                                "country_full_name" => "Republic of Austria",
                                "country_code" => "040",
                                "country_code_alpha2" => "AT",
                                "country_code_alpha3" => "AUT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Azerbaijan",
                                "country_full_name" => "Republic of Azerbaijan",
                                "country_code" => "031",
                                "country_code_alpha2" => "AZ",
                                "country_code_alpha3" => "AZE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Burundi",
                                "country_full_name" => "Republic of Burundi",
                                "country_code" => "108",
                                "country_code_alpha2" => "BI",
                                "country_code_alpha3" => "BDI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Belgium",
                                "country_full_name" => "Kingdom of Belgium",
                                "country_code" => "056",
                                "country_code_alpha2" => "BE",
                                "country_code_alpha3" => "BEL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Benin",
                                "country_full_name" => "Republic of Benin",
                                "country_code" => "204",
                                "country_code_alpha2" => "BJ",
                                "country_code_alpha3" => "BEN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Burkina Faso",
                                "country_full_name" => "Burkina Faso",
                                "country_code" => "854",
                                "country_code_alpha2" => "BF",
                                "country_code_alpha3" => "BFA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bangladesh",
                                "country_full_name" => "People's Republic of Bangladesh",
                                "country_code" => "050",
                                "country_code_alpha2" => "BD",
                                "country_code_alpha3" => "BGD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bulgaria",
                                "country_full_name" => "Republic of Bulgaria",
                                "country_code" => "100",
                                "country_code_alpha2" => "BG",
                                "country_code_alpha3" => "BGR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bahrain",
                                "country_full_name" => "Kingdom of Bahrain",
                                "country_code" => "048",
                                "country_code_alpha2" => "BH",
                                "country_code_alpha3" => "BHR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bahamas",
                                "country_full_name" => "Commonwealth of the Bahamas",
                                "country_code" => "044",
                                "country_code_alpha2" => "BS",
                                "country_code_alpha3" => "BHS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bosnia and Herzegovina",
                                "country_full_name" => "Bosnia and Herzegovina",
                                "country_code" => "070",
                                "country_code_alpha2" => "BA",
                                "country_code_alpha3" => "BIH",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Barthélemy",
                                "country_full_name" => "Collectivity of Saint Barthélemy",
                                "country_code" => "652",
                                "country_code_alpha2" => "BL",
                                "country_code_alpha3" => "BLM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Helena, Ascension and Tristan da Cunha",
                                "country_full_name" => "Saint Helena, Ascension and Tristan da Cunha",
                                "country_code" => "654",
                                "country_code_alpha2" => "SH",
                                "country_code_alpha3" => "SHN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Belarus",
                                "country_full_name" => "Republic of Belarus",
                                "country_code" => "112",
                                "country_code_alpha2" => "BY",
                                "country_code_alpha3" => "BLR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Belize",
                                "country_full_name" => "Belize",
                                "country_code" => "084",
                                "country_code_alpha2" => "BZ",
                                "country_code_alpha3" => "BLZ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bermuda",
                                "country_full_name" => "Bermuda",
                                "country_code" => "060",
                                "country_code_alpha2" => "BM",
                                "country_code_alpha3" => "BMU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bolivia",
                                "country_full_name" => "Plurinational State of Bolivia",
                                "country_code" => "068",
                                "country_code_alpha2" => "BO",
                                "country_code_alpha3" => "BOL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Caribbean Netherlands",
                                "country_full_name" => "Bonaire, Sint Eustatius and Saba",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Brazil",
                                "country_full_name" => "Federative Republic of Brazil",
                                "country_code" => "076",
                                "country_code_alpha2" => "BR",
                                "country_code_alpha3" => "BRA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Barbados",
                                "country_full_name" => "Barbados",
                                "country_code" => "052",
                                "country_code_alpha2" => "BB",
                                "country_code_alpha3" => "BRB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Brunei",
                                "country_full_name" => "Nation of Brunei, Abode of Peace",
                                "country_code" => "096",
                                "country_code_alpha2" => "BN",
                                "country_code_alpha3" => "BRN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bhutan",
                                "country_full_name" => "Kingdom of Bhutan",
                                "country_code" => "064",
                                "country_code_alpha2" => "BT",
                                "country_code_alpha3" => "BTN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bouvet Island",
                                "country_full_name" => "Bouvet Island",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Botswana",
                                "country_full_name" => "Republic of Botswana",
                                "country_code" => "072",
                                "country_code_alpha2" => "BW",
                                "country_code_alpha3" => "BWA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Central African Republic",
                                "country_full_name" => "Central African Republic",
                                "country_code" => "140",
                                "country_code_alpha2" => "CF",
                                "country_code_alpha3" => "CAF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Canada",
                                "country_full_name" => "Canada",
                                "country_code" => "124",
                                "country_code_alpha2" => "CA",
                                "country_code_alpha3" => "CAN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cocos (Keeling) Islands",
                                "country_full_name" => "Territory of the Cocos (Keeling) Islands",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Switzerland",
                                "country_full_name" => "Swiss Confederation",
                                "country_code" => "756",
                                "country_code_alpha2" => "CH",
                                "country_code_alpha3" => "CHE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Chile",
                                "country_full_name" => "Republic of Chile",
                                "country_code" => "152",
                                "country_code_alpha2" => "CL",
                                "country_code_alpha3" => "CHL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "China",
                                "country_full_name" => "People's Republic of China",
                                "country_code" => "156",
                                "country_code_alpha2" => "CN",
                                "country_code_alpha3" => "CHN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ivory Coast",
                                "country_full_name" => "Republic of Côte d'Ivoire",
                                "country_code" => "384",
                                "country_code_alpha2" => "CI",
                                "country_code_alpha3" => "CIV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cameroon",
                                "country_full_name" => "Republic of Cameroon",
                                "country_code" => "120",
                                "country_code_alpha2" => "CM",
                                "country_code_alpha3" => "CMR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "DR Congo",
                                "country_full_name" => "Democratic Republic of the Congo",
                                "country_code" => "180",
                                "country_code_alpha2" => "CD",
                                "country_code_alpha3" => "COD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Republic of the Congo",
                                "country_full_name" => "Republic of the Congo",
                                "country_code" => "178",
                                "country_code_alpha2" => "CG",
                                "country_code_alpha3" => "COG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cook Islands",
                                "country_full_name" => "Cook Islands",
                                "country_code" => "184",
                                "country_code_alpha2" => "CK",
                                "country_code_alpha3" => "COK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Colombia",
                                "country_full_name" => "Republic of Colombia",
                                "country_code" => "170",
                                "country_code_alpha2" => "CO",
                                "country_code_alpha3" => "COL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Comoros",
                                "country_full_name" => "Union of the Comoros",
                                "country_code" => "174",
                                "country_code_alpha2" => "KM",
                                "country_code_alpha3" => "COM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cape Verde",
                                "country_full_name" => "Republic of Cabo Verde",
                                "country_code" => "132",
                                "country_code_alpha2" => "CV",
                                "country_code_alpha3" => "CPV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Costa Rica",
                                "country_full_name" => "Republic of Costa Rica",
                                "country_code" => "188",
                                "country_code_alpha2" => "CR",
                                "country_code_alpha3" => "CRI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cuba",
                                "country_full_name" => "Republic of Cuba",
                                "country_code" => "192",
                                "country_code_alpha2" => "CU",
                                "country_code_alpha3" => "CUB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Curaçao",
                                "country_full_name" => "Country of Curaçao",
                                "country_code" => "531",
                                "country_code_alpha2" => "CW",
                                "country_code_alpha3" => "CUW",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Christmas Island",
                                "country_full_name" => "Territory of Christmas Island",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cayman Islands",
                                "country_full_name" => "Cayman Islands",
                                "country_code" => "136",
                                "country_code_alpha2" => "KY",
                                "country_code_alpha3" => "CYM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cyprus",
                                "country_full_name" => "Republic of Cyprus",
                                "country_code" => "196",
                                "country_code_alpha2" => "CY",
                                "country_code_alpha3" => "CYP",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Czechia",
                                "country_full_name" => "Czech Republic",
                                "country_code" => "203",
                                "country_code_alpha2" => "CZ",
                                "country_code_alpha3" => "CZE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Germany",
                                "country_full_name" => "Federal Republic of Germany",
                                "country_code" => "276",
                                "country_code_alpha2" => "DE",
                                "country_code_alpha3" => "DEU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Djibouti",
                                "country_full_name" => "Republic of Djibouti",
                                "country_code" => "262",
                                "country_code_alpha2" => "DJ",
                                "country_code_alpha3" => "DJI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Dominica",
                                "country_full_name" => "Commonwealth of Dominica",
                                "country_code" => "212",
                                "country_code_alpha2" => "DM",
                                "country_code_alpha3" => "DMA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Denmark",
                                "country_full_name" => "Kingdom of Denmark",
                                "country_code" => "208",
                                "country_code_alpha2" => "DK",
                                "country_code_alpha3" => "DNK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Dominican Republic",
                                "country_full_name" => "Dominican Republic",
                                "country_code" => "214",
                                "country_code_alpha2" => "DO",
                                "country_code_alpha3" => "DOM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Algeria",
                                "country_full_name" => "People's Democratic Republic of Algeria",
                                "country_code" => "012",
                                "country_code_alpha2" => "DZ",
                                "country_code_alpha3" => "DZA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ecuador",
                                "country_full_name" => "Republic of Ecuador",
                                "country_code" => "218",
                                "country_code_alpha2" => "EC",
                                "country_code_alpha3" => "ECU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Egypt",
                                "country_full_name" => "Arab Republic of Egypt",
                                "country_code" => "818",
                                "country_code_alpha2" => "EG",
                                "country_code_alpha3" => "EGY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Eritrea",
                                "country_full_name" => "State of Eritrea",
                                "country_code" => "232",
                                "country_code_alpha2" => "ER",
                                "country_code_alpha3" => "ERI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Western Sahara",
                                "country_full_name" => "Sahrawi Arab Democratic Republic",
                                "country_code" => "732",
                                "country_code_alpha2" => "EH",
                                "country_code_alpha3" => "ESH",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Spain",
                                "country_full_name" => "Kingdom of Spain",
                                "country_code" => "724",
                                "country_code_alpha2" => "ES",
                                "country_code_alpha3" => "ESP",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Estonia",
                                "country_full_name" => "Republic of Estonia",
                                "country_code" => "233",
                                "country_code_alpha2" => "EE",
                                "country_code_alpha3" => "EST",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ethiopia",
                                "country_full_name" => "Federal Democratic Republic of Ethiopia",
                                "country_code" => "231",
                                "country_code_alpha2" => "ET",
                                "country_code_alpha3" => "ETH",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Finland",
                                "country_full_name" => "Republic of Finland",
                                "country_code" => "246",
                                "country_code_alpha2" => "FI",
                                "country_code_alpha3" => "FIN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Fiji",
                                "country_full_name" => "Republic of Fiji",
                                "country_code" => "242",
                                "country_code_alpha2" => "FJ",
                                "country_code_alpha3" => "FJI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Falkland Islands",
                                "country_full_name" => "Falkland Islands",
                                "country_code" => "238",
                                "country_code_alpha2" => "FK",
                                "country_code_alpha3" => "FLK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "France",
                                "country_full_name" => "French Republic",
                                "country_code" => "250",
                                "country_code_alpha2" => "FR",
                                "country_code_alpha3" => "FRA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Faroe Islands",
                                "country_full_name" => "Faroe Islands",
                                "country_code" => "234",
                                "country_code_alpha2" => "FO",
                                "country_code_alpha3" => "FRO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Micronesia",
                                "country_full_name" => "Federated States of Micronesia",
                                "country_code" => "583",
                                "country_code_alpha2" => "FM",
                                "country_code_alpha3" => "FSM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Gabon",
                                "country_full_name" => "Gabonese Republic",
                                "country_code" => "266",
                                "country_code_alpha2" => "GA",
                                "country_code_alpha3" => "GAB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "United Kingdom",
                                "country_full_name" => "United Kingdom of Great Britain and Northern Ireland",
                                "country_code" => "826",
                                "country_code_alpha2" => "GB",
                                "country_code_alpha3" => "GBR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Georgia",
                                "country_full_name" => "Georgia",
                                "country_code" => "268",
                                "country_code_alpha2" => "GE",
                                "country_code_alpha3" => "GEO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guernsey",
                                "country_full_name" => "Bailiwick of Guernsey",
                                "country_code" => "831",
                                "country_code_alpha2" => "GG",
                                "country_code_alpha3" => "GGY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ghana",
                                "country_full_name" => "Republic of Ghana",
                                "country_code" => "288",
                                "country_code_alpha2" => "GH",
                                "country_code_alpha3" => "GHA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Gibraltar",
                                "country_full_name" => "Gibraltar",
                                "country_code" => "292",
                                "country_code_alpha2" => "GI",
                                "country_code_alpha3" => "GIB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guinea",
                                "country_full_name" => "Republic of Guinea",
                                "country_code" => "324",
                                "country_code_alpha2" => "GN",
                                "country_code_alpha3" => "GIN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guadeloupe",
                                "country_full_name" => "Guadeloupe",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Gambia",
                                "country_full_name" => "Republic of the Gambia",
                                "country_code" => "270",
                                "country_code_alpha2" => "GM",
                                "country_code_alpha3" => "GMB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guinea-Bissau",
                                "country_full_name" => "Republic of Guinea-Bissau",
                                "country_code" => "624",
                                "country_code_alpha2" => "GW",
                                "country_code_alpha3" => "GNB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Equatorial Guinea",
                                "country_full_name" => "Republic of Equatorial Guinea",
                                "country_code" => "226",
                                "country_code_alpha2" => "GQ",
                                "country_code_alpha3" => "GNQ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Greece",
                                "country_full_name" => "Hellenic Republic",
                                "country_code" => "300",
                                "country_code_alpha2" => "GR",
                                "country_code_alpha3" => "GRC",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Grenada",
                                "country_full_name" => "Grenada",
                                "country_code" => "308",
                                "country_code_alpha2" => "GD",
                                "country_code_alpha3" => "GRD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Greenland",
                                "country_full_name" => "Greenland",
                                "country_code" => "304",
                                "country_code_alpha2" => "GL",
                                "country_code_alpha3" => "GRL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guatemala",
                                "country_full_name" => "Republic of Guatemala",
                                "country_code" => "320",
                                "country_code_alpha2" => "GT",
                                "country_code_alpha3" => "GTM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "French Guiana",
                                "country_full_name" => "Guiana",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guam",
                                "country_full_name" => "Guam",
                                "country_code" => "316",
                                "country_code_alpha2" => "GU",
                                "country_code_alpha3" => "GUM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Guyana",
                                "country_full_name" => "Co-operative Republic of Guyana",
                                "country_code" => "328",
                                "country_code_alpha2" => "GY",
                                "country_code_alpha3" => "GUY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Hong Kong",
                                "country_full_name" => "Hong Kong Special Administrative Region of the People's Republic of China",
                                "country_code" => "344",
                                "country_code_alpha2" => "HK",
                                "country_code_alpha3" => "HKG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Heard Island and McDonald Islands",
                                "country_full_name" => "Heard Island and McDonald Islands",
                                "country_code" => "334",
                                "country_code_alpha2" => "HM",
                                "country_code_alpha3" => "HMD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Honduras",
                                "country_full_name" => "Republic of Honduras",
                                "country_code" => "340",
                                "country_code_alpha2" => "HN",
                                "country_code_alpha3" => "HND",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Croatia",
                                "country_full_name" => "Republic of Croatia",
                                "country_code" => "191",
                                "country_code_alpha2" => "HR",
                                "country_code_alpha3" => "HRV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Haiti",
                                "country_full_name" => "Republic of Haiti",
                                "country_code" => "332",
                                "country_code_alpha2" => "HT",
                                "country_code_alpha3" => "HTI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Hungary",
                                "country_full_name" => "Hungary",
                                "country_code" => "348",
                                "country_code_alpha2" => "HU",
                                "country_code_alpha3" => "HUN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Indonesia",
                                "country_full_name" => "Republic of Indonesia",
                                "country_code" => "360",
                                "country_code_alpha2" => "ID",
                                "country_code_alpha3" => "IDN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Isle of Man",
                                "country_full_name" => "Isle of Man",
                                "country_code" => "833",
                                "country_code_alpha2" => "IM",
                                "country_code_alpha3" => "IMN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "India",
                                "country_full_name" => "Republic of India",
                                "country_code" => "356",
                                "country_code_alpha2" => "IN",
                                "country_code_alpha3" => "IND",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "British Indian Ocean Territory",
                                "country_full_name" => "British Indian Ocean Territory",
                                "country_code" => "086",
                                "country_code_alpha2" => "IO",
                                "country_code_alpha3" => "IOT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ireland",
                                "country_full_name" => "Republic of Ireland",
                                "country_code" => "372",
                                "country_code_alpha2" => "IE",
                                "country_code_alpha3" => "IRL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Iran",
                                "country_full_name" => "Islamic Republic of Iran",
                                "country_code" => "364",
                                "country_code_alpha2" => "IR",
                                "country_code_alpha3" => "IRN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Iraq",
                                "country_full_name" => "Republic of Iraq",
                                "country_code" => "368",
                                "country_code_alpha2" => "IQ",
                                "country_code_alpha3" => "IRQ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Iceland",
                                "country_full_name" => "Iceland",
                                "country_code" => "352",
                                "country_code_alpha2" => "IS",
                                "country_code_alpha3" => "ISL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Israel",
                                "country_full_name" => "State of Israel",
                                "country_code" => "376",
                                "country_code_alpha2" => "IL",
                                "country_code_alpha3" => "ISR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Italy",
                                "country_full_name" => "Italian Republic",
                                "country_code" => "380",
                                "country_code_alpha2" => "IT",
                                "country_code_alpha3" => "ITA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Jamaica",
                                "country_full_name" => "Jamaica",
                                "country_code" => "388",
                                "country_code_alpha2" => "JM",
                                "country_code_alpha3" => "JAM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Jersey",
                                "country_full_name" => "Bailiwick of Jersey",
                                "country_code" => "832",
                                "country_code_alpha2" => "JE",
                                "country_code_alpha3" => "JEY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Jordan",
                                "country_full_name" => "Hashemite Kingdom of Jordan",
                                "country_code" => "400",
                                "country_code_alpha2" => "JO",
                                "country_code_alpha3" => "JOR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Japan",
                                "country_full_name" => "Japan",
                                "country_code" => "392",
                                "country_code_alpha2" => "JP",
                                "country_code_alpha3" => "JPN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kazakhstan",
                                "country_full_name" => "Republic of Kazakhstan",
                                "country_code" => "398",
                                "country_code_alpha2" => "KZ",
                                "country_code_alpha3" => "KAZ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kenya",
                                "country_full_name" => "Republic of Kenya",
                                "country_code" => "404",
                                "country_code_alpha2" => "KE",
                                "country_code_alpha3" => "KEN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kyrgyzstan",
                                "country_full_name" => "Kyrgyz Republic",
                                "country_code" => "417",
                                "country_code_alpha2" => "KG",
                                "country_code_alpha3" => "KGZ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cambodia",
                                "country_full_name" => "Kingdom of Cambodia",
                                "country_code" => "116",
                                "country_code_alpha2" => "KH",
                                "country_code_alpha3" => "KHM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kiribati",
                                "country_full_name" => "Independent and Sovereign Republic of Kiribati",
                                "country_code" => "296",
                                "country_code_alpha2" => "KI",
                                "country_code_alpha3" => "KIR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Kitts and Nevis",
                                "country_full_name" => "Federation of Saint Christopher and Nevisa",
                                "country_code" => "659",
                                "country_code_alpha2" => "KN",
                                "country_code_alpha3" => "KNA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "South Korea",
                                "country_full_name" => "Republic of Korea",
                                "country_code" => "410",
                                "country_code_alpha2" => "KR",
                                "country_code_alpha3" => "KOR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kosovo",
                                "country_full_name" => "Republic of Kosovo",
                                "country_code" => "",
                                "country_code_alpha2" => "XK",
                                "country_code_alpha3" => "UNK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Kuwait",
                                "country_full_name" => "State of Kuwait",
                                "country_code" => "414",
                                "country_code_alpha2" => "KW",
                                "country_code_alpha3" => "KWT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Laos",
                                "country_full_name" => "Lao People's Democratic Republic",
                                "country_code" => "418",
                                "country_code_alpha2" => "LA",
                                "country_code_alpha3" => "LAO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Lebanon",
                                "country_full_name" => "Lebanese Republic",
                                "country_code" => "422",
                                "country_code_alpha2" => "LB",
                                "country_code_alpha3" => "LBN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Liberia",
                                "country_full_name" => "Republic of Liberia",
                                "country_code" => "430",
                                "country_code_alpha2" => "LR",
                                "country_code_alpha3" => "LBR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Libya",
                                "country_full_name" => "State of Libya",
                                "country_code" => "434",
                                "country_code_alpha2" => "LY",
                                "country_code_alpha3" => "LBY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Lucia",
                                "country_full_name" => "Saint Lucia",
                                "country_code" => "662",
                                "country_code_alpha2" => "LC",
                                "country_code_alpha3" => "LCA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Liechtenstein",
                                "country_full_name" => "Principality of Liechtenstein",
                                "country_code" => "438",
                                "country_code_alpha2" => "LI",
                                "country_code_alpha3" => "LIE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Sri Lanka",
                                "country_full_name" => "Democratic Socialist Republic of Sri Lanka",
                                "country_code" => "144",
                                "country_code_alpha2" => "LK",
                                "country_code_alpha3" => "LKA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Lesotho",
                                "country_full_name" => "Kingdom of Lesotho",
                                "country_code" => "426",
                                "country_code_alpha2" => "LS",
                                "country_code_alpha3" => "LSO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Lithuania",
                                "country_full_name" => "Republic of Lithuania",
                                "country_code" => "440",
                                "country_code_alpha2" => "LT",
                                "country_code_alpha3" => "LTU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Luxembourg",
                                "country_full_name" => "Grand Duchy of Luxembourg",
                                "country_code" => "442",
                                "country_code_alpha2" => "LU",
                                "country_code_alpha3" => "LUX",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Latvia",
                                "country_full_name" => "Republic of Latvia",
                                "country_code" => "428",
                                "country_code_alpha2" => "LV",
                                "country_code_alpha3" => "LVA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Macau",
                                "country_full_name" => "Macao Special Administrative Region of the People's Republic of China",
                                "country_code" => "446",
                                "country_code_alpha2" => "MO",
                                "country_code_alpha3" => "MAC",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Martin",
                                "country_full_name" => "Saint Martin",
                                "country_code" => "663",
                                "country_code_alpha2" => "MF",
                                "country_code_alpha3" => "MAF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Morocco",
                                "country_full_name" => "Kingdom of Morocco",
                                "country_code" => "504",
                                "country_code_alpha2" => "MA",
                                "country_code_alpha3" => "MAR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Monaco",
                                "country_full_name" => "Principality of Monaco",
                                "country_code" => "492",
                                "country_code_alpha2" => "MC",
                                "country_code_alpha3" => "MCO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Moldova",
                                "country_full_name" => "Republic of Moldova",
                                "country_code" => "498",
                                "country_code_alpha2" => "MD",
                                "country_code_alpha3" => "MDA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Madagascar",
                                "country_full_name" => "Republic of Madagascar",
                                "country_code" => "450",
                                "country_code_alpha2" => "MG",
                                "country_code_alpha3" => "MDG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Maldives",
                                "country_full_name" => "Republic of the Maldives",
                                "country_code" => "462",
                                "country_code_alpha2" => "MV",
                                "country_code_alpha3" => "MDV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mexico",
                                "country_full_name" => "United Mexican States",
                                "country_code" => "484",
                                "country_code_alpha2" => "MX",
                                "country_code_alpha3" => "MEX",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Marshall Islands",
                                "country_full_name" => "Republic of the Marshall Islands",
                                "country_code" => "584",
                                "country_code_alpha2" => "MH",
                                "country_code_alpha3" => "MHL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Macedonia",
                                "country_full_name" => "Republic of Macedonia",
                                "country_code" => "807",
                                "country_code_alpha2" => "MK",
                                "country_code_alpha3" => "MKD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mali",
                                "country_full_name" => "Republic of Mali",
                                "country_code" => "466",
                                "country_code_alpha2" => "ML",
                                "country_code_alpha3" => "MLI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Malta",
                                "country_full_name" => "Republic of Malta",
                                "country_code" => "470",
                                "country_code_alpha2" => "MT",
                                "country_code_alpha3" => "MLT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Myanmar",
                                "country_full_name" => "Republic of the Union of Myanmar",
                                "country_code" => "104",
                                "country_code_alpha2" => "MM",
                                "country_code_alpha3" => "MMR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Montenegro",
                                "country_full_name" => "Montenegro",
                                "country_code" => "499",
                                "country_code_alpha2" => "ME",
                                "country_code_alpha3" => "MNE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mongolia",
                                "country_full_name" => "Mongolia",
                                "country_code" => "496",
                                "country_code_alpha2" => "MN",
                                "country_code_alpha3" => "MNG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Northern Mariana Islands",
                                "country_full_name" => "Commonwealth of the Northern Mariana Islands",
                                "country_code" => "580",
                                "country_code_alpha2" => "MP",
                                "country_code_alpha3" => "MNP",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mozambique",
                                "country_full_name" => "Republic of Mozambique",
                                "country_code" => "508",
                                "country_code_alpha2" => "MZ",
                                "country_code_alpha3" => "MOZ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mauritania",
                                "country_full_name" => "Islamic Republic of Mauritania",
                                "country_code" => "478",
                                "country_code_alpha2" => "MR",
                                "country_code_alpha3" => "MRT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Montserrat",
                                "country_full_name" => "Montserrat",
                                "country_code" => "500",
                                "country_code_alpha2" => "MS",
                                "country_code_alpha3" => "MSR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Martinique",
                                "country_full_name" => "Martinique",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mauritius",
                                "country_full_name" => "Republic of Mauritius",
                                "country_code" => "480",
                                "country_code_alpha2" => "MU",
                                "country_code_alpha3" => "MUS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Malawi",
                                "country_full_name" => "Republic of Malawi",
                                "country_code" => "454",
                                "country_code_alpha2" => "MW",
                                "country_code_alpha3" => "MWI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Malaysia",
                                "country_full_name" => "Malaysia",
                                "country_code" => "458",
                                "country_code_alpha2" => "MY",
                                "country_code_alpha3" => "MYS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Mayotte",
                                "country_full_name" => "Department of Mayotte",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Namibia",
                                "country_full_name" => "Republic of Namibia",
                                "country_code" => "516",
                                "country_code_alpha2" => "NA",
                                "country_code_alpha3" => "NAM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "New Caledonia",
                                "country_full_name" => "New Caledonia",
                                "country_code" => "540",
                                "country_code_alpha2" => "NC",
                                "country_code_alpha3" => "NCL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Niger",
                                "country_full_name" => "Republic of Niger",
                                "country_code" => "562",
                                "country_code_alpha2" => "NE",
                                "country_code_alpha3" => "NER",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Norfolk Island",
                                "country_full_name" => "Territory of Norfolk Island",
                                "country_code" => "574",
                                "country_code_alpha2" => "NF",
                                "country_code_alpha3" => "NFK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Nigeria",
                                "country_full_name" => "Federal Republic of Nigeria",
                                "country_code" => "566",
                                "country_code_alpha2" => "NG",
                                "country_code_alpha3" => "NGA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Nicaragua",
                                "country_full_name" => "Republic of Nicaragua",
                                "country_code" => "558",
                                "country_code_alpha2" => "NI",
                                "country_code_alpha3" => "NIC",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Niue",
                                "country_full_name" => "Niue",
                                "country_code" => "570",
                                "country_code_alpha2" => "NU",
                                "country_code_alpha3" => "NIU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Netherlands",
                                "country_full_name" => "Netherlands",
                                "country_code" => "528",
                                "country_code_alpha2" => "NL",
                                "country_code_alpha3" => "NLD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Norway",
                                "country_full_name" => "Kingdom of Norway",
                                "country_code" => "578",
                                "country_code_alpha2" => "NO",
                                "country_code_alpha3" => "NOR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Nepal",
                                "country_full_name" => "Federal Democratic Republic of Nepal",
                                "country_code" => "524",
                                "country_code_alpha2" => "NP",
                                "country_code_alpha3" => "NPL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Nauru",
                                "country_full_name" => "Republic of Nauru",
                                "country_code" => "520",
                                "country_code_alpha2" => "NR",
                                "country_code_alpha3" => "NRU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "New Zealand",
                                "country_full_name" => "New Zealand",
                                "country_code" => "554",
                                "country_code_alpha2" => "NZ",
                                "country_code_alpha3" => "NZL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Oman",
                                "country_full_name" => "Sultanate of Oman",
                                "country_code" => "512",
                                "country_code_alpha2" => "OM",
                                "country_code_alpha3" => "OMN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Pakistan",
                                "country_full_name" => "Islamic Republic of Pakistan",
                                "country_code" => "586",
                                "country_code_alpha2" => "PK",
                                "country_code_alpha3" => "PAK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Panama",
                                "country_full_name" => "Republic of Panama",
                                "country_code" => "591",
                                "country_code_alpha2" => "PA",
                                "country_code_alpha3" => "PAN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Pitcairn Islands",
                                "country_full_name" => "Pitcairn Group of Islands",
                                "country_code" => "612",
                                "country_code_alpha2" => "PN",
                                "country_code_alpha3" => "PCN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Peru",
                                "country_full_name" => "Republic of Peru",
                                "country_code" => "604",
                                "country_code_alpha2" => "PE",
                                "country_code_alpha3" => "PER",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Philippines",
                                "country_full_name" => "Republic of the Philippines",
                                "country_code" => "608",
                                "country_code_alpha2" => "PH",
                                "country_code_alpha3" => "PHL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Palau",
                                "country_full_name" => "Republic of Palau",
                                "country_code" => "585",
                                "country_code_alpha2" => "PW",
                                "country_code_alpha3" => "PLW",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Papua New Guinea",
                                "country_full_name" => "Independent State of Papua New Guinea",
                                "country_code" => "598",
                                "country_code_alpha2" => "PG",
                                "country_code_alpha3" => "PNG",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Poland",
                                "country_full_name" => "Republic of Poland",
                                "country_code" => "616",
                                "country_code_alpha2" => "PL",
                                "country_code_alpha3" => "POL",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Puerto Rico",
                                "country_full_name" => "Commonwealth of Puerto Rico",
                                "country_code" => "630",
                                "country_code_alpha2" => "PR",
                                "country_code_alpha3" => "PRI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "North Korea",
                                "country_full_name" => "Democratic People's Republic of Korea",
                                "country_code" => "408",
                                "country_code_alpha2" => "KP",
                                "country_code_alpha3" => "PRK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Portugal",
                                "country_full_name" => "Portuguese Republic",
                                "country_code" => "620",
                                "country_code_alpha2" => "PT",
                                "country_code_alpha3" => "PRT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Paraguay",
                                "country_full_name" => "Republic of Paraguay",
                                "country_code" => "600",
                                "country_code_alpha2" => "PY",
                                "country_code_alpha3" => "PRY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Palestine",
                                "country_full_name" => "State of Palestine",
                                "country_code" => "275",
                                "country_code_alpha2" => "PS",
                                "country_code_alpha3" => "PSE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "French Polynesia",
                                "country_full_name" => "French Polynesia",
                                "country_code" => "258",
                                "country_code_alpha2" => "PF",
                                "country_code_alpha3" => "PYF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Qatar",
                                "country_full_name" => "State of Qatar",
                                "country_code" => "634",
                                "country_code_alpha2" => "QA",
                                "country_code_alpha3" => "QAT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Réunion",
                                "country_full_name" => "Réunion Island",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Romania",
                                "country_full_name" => "Romania",
                                "country_code" => "642",
                                "country_code_alpha2" => "RO",
                                "country_code_alpha3" => "ROU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Russia",
                                "country_full_name" => "Russian Federation",
                                "country_code" => "643",
                                "country_code_alpha2" => "RU",
                                "country_code_alpha3" => "RUS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Rwanda",
                                "country_full_name" => "Republic of Rwanda",
                                "country_code" => "646",
                                "country_code_alpha2" => "RW",
                                "country_code_alpha3" => "RWA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saudi Arabia",
                                "country_full_name" => "Kingdom of Saudi Arabia",
                                "country_code" => "682",
                                "country_code_alpha2" => "SA",
                                "country_code_alpha3" => "SAU",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Sudan",
                                "country_full_name" => "Republic of the Sudan",
                                "country_code" => "729",
                                "country_code_alpha2" => "SD",
                                "country_code_alpha3" => "SDN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Senegal",
                                "country_full_name" => "Republic of Senegal",
                                "country_code" => "686",
                                "country_code_alpha2" => "SN",
                                "country_code_alpha3" => "SEN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Singapore",
                                "country_full_name" => "Republic of Singapore",
                                "country_code" => "702",
                                "country_code_alpha2" => "SG",
                                "country_code_alpha3" => "SGP",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "South Georgia",
                                "country_full_name" => "South Georgia and the South Sandwich Islands",
                                "country_code" => "239",
                                "country_code_alpha2" => "GS",
                                "country_code_alpha3" => "SGS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Svalbard and Jan Mayen",
                                "country_full_name" => "Svalbard og Jan Mayen",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Solomon Islands",
                                "country_full_name" => "Solomon Islands",
                                "country_code" => "090",
                                "country_code_alpha2" => "SB",
                                "country_code_alpha3" => "SLB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Sierra Leone",
                                "country_full_name" => "Republic of Sierra Leone",
                                "country_code" => "694",
                                "country_code_alpha2" => "SL",
                                "country_code_alpha3" => "SLE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "El Salvador",
                                "country_full_name" => "Republic of El Salvador",
                                "country_code" => "222",
                                "country_code_alpha2" => "SV",
                                "country_code_alpha3" => "SLV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "San Marino",
                                "country_full_name" => "Most Serene Republic of San Marino",
                                "country_code" => "674",
                                "country_code_alpha2" => "SM",
                                "country_code_alpha3" => "SMR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Somalia",
                                "country_full_name" => "Federal Republic of Somalia",
                                "country_code" => "706",
                                "country_code_alpha2" => "SO",
                                "country_code_alpha3" => "SOM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Pierre and Miquelon",
                                "country_full_name" => "Saint Pierre and Miquelon",
                                "country_code" => "666",
                                "country_code_alpha2" => "PM",
                                "country_code_alpha3" => "SPM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Serbia",
                                "country_full_name" => "Republic of Serbia",
                                "country_code" => "688",
                                "country_code_alpha2" => "RS",
                                "country_code_alpha3" => "SRB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "South Sudan",
                                "country_full_name" => "Republic of South Sudan",
                                "country_code" => "728",
                                "country_code_alpha2" => "SS",
                                "country_code_alpha3" => "SSD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "São Tomé and Príncipe",
                                "country_full_name" => "Democratic Republic of São Tomé and Príncipe",
                                "country_code" => "678",
                                "country_code_alpha2" => "ST",
                                "country_code_alpha3" => "STP",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Suriname",
                                "country_full_name" => "Republic of Suriname",
                                "country_code" => "740",
                                "country_code_alpha2" => "SR",
                                "country_code_alpha3" => "SUR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Slovakia",
                                "country_full_name" => "Slovak Republic",
                                "country_code" => "703",
                                "country_code_alpha2" => "SK",
                                "country_code_alpha3" => "SVK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Slovenia",
                                "country_full_name" => "Republic of Slovenia",
                                "country_code" => "705",
                                "country_code_alpha2" => "SI",
                                "country_code_alpha3" => "SVN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Sweden",
                                "country_full_name" => "Kingdom of Sweden",
                                "country_code" => "752",
                                "country_code_alpha2" => "SE",
                                "country_code_alpha3" => "SWE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Swaziland",
                                "country_full_name" => "Kingdom of Swaziland",
                                "country_code" => "748",
                                "country_code_alpha2" => "SZ",
                                "country_code_alpha3" => "SWZ",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Sint Maarten",
                                "country_full_name" => "Sint Maarten",
                                "country_code" => "534",
                                "country_code_alpha2" => "SX",
                                "country_code_alpha3" => "SXM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Seychelles",
                                "country_full_name" => "Republic of Seychelles",
                                "country_code" => "690",
                                "country_code_alpha2" => "SC",
                                "country_code_alpha3" => "SYC",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Syria",
                                "country_full_name" => "Syrian Arab Republic",
                                "country_code" => "760",
                                "country_code_alpha2" => "SY",
                                "country_code_alpha3" => "SYR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Turks and Caicos Islands",
                                "country_full_name" => "Turks and Caicos Islands",
                                "country_code" => "796",
                                "country_code_alpha2" => "TC",
                                "country_code_alpha3" => "TCA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Chad",
                                "country_full_name" => "Republic of Chad",
                                "country_code" => "148",
                                "country_code_alpha2" => "TD",
                                "country_code_alpha3" => "TCD",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Togo",
                                "country_full_name" => "Togolese Republic",
                                "country_code" => "768",
                                "country_code_alpha2" => "TG",
                                "country_code_alpha3" => "TGO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Thailand",
                                "country_full_name" => "Kingdom of Thailand",
                                "country_code" => "764",
                                "country_code_alpha2" => "TH",
                                "country_code_alpha3" => "THA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tajikistan",
                                "country_full_name" => "Republic of Tajikistan",
                                "country_code" => "762",
                                "country_code_alpha2" => "TJ",
                                "country_code_alpha3" => "TJK",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tokelau",
                                "country_full_name" => "Tokelau",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Turkmenistan",
                                "country_full_name" => "Turkmenistan",
                                "country_code" => "795",
                                "country_code_alpha2" => "TM",
                                "country_code_alpha3" => "TKM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Timor-Leste",
                                "country_full_name" => "Democratic Republic of Timor-Leste",
                                "country_code" => "626",
                                "country_code_alpha2" => "TL",
                                "country_code_alpha3" => "TLS",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tonga",
                                "country_full_name" => "Kingdom of Tonga",
                                "country_code" => "776",
                                "country_code_alpha2" => "TO",
                                "country_code_alpha3" => "TON",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Trinidad and Tobago",
                                "country_full_name" => "Republic of Trinidad and Tobago",
                                "country_code" => "780",
                                "country_code_alpha2" => "TT",
                                "country_code_alpha3" => "TTO",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tunisia",
                                "country_full_name" => "Tunisian Republic",
                                "country_code" => "788",
                                "country_code_alpha2" => "TN",
                                "country_code_alpha3" => "TUN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Turkey",
                                "country_full_name" => "Republic of Turkey",
                                "country_code" => "792",
                                "country_code_alpha2" => "TR",
                                "country_code_alpha3" => "TUR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tuvalu",
                                "country_full_name" => "Tuvalu",
                                "country_code" => "798",
                                "country_code_alpha2" => "TV",
                                "country_code_alpha3" => "TUV",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Taiwan",
                                "country_full_name" => "Republic of China (Taiwan)",
                                "country_code" => "158",
                                "country_code_alpha2" => "TW",
                                "country_code_alpha3" => "TWN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Tanzania",
                                "country_full_name" => "United Republic of Tanzania",
                                "country_code" => "834",
                                "country_code_alpha2" => "TZ",
                                "country_code_alpha3" => "TZA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Uganda",
                                "country_full_name" => "Republic of Uganda",
                                "country_code" => "800",
                                "country_code_alpha2" => "UG",
                                "country_code_alpha3" => "UGA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ukraine",
                                "country_full_name" => "Ukraine",
                                "country_code" => "804",
                                "country_code_alpha2" => "UA",
                                "country_code_alpha3" => "UKR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "United States Minor Outlying Islands",
                                "country_full_name" => "United States Minor Outlying Islands",
                                "country_code" => "581",
                                "country_code_alpha2" => "UM",
                                "country_code_alpha3" => "UMI",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Uruguay",
                                "country_full_name" => "Oriental Republic of Uruguay",
                                "country_code" => "858",
                                "country_code_alpha2" => "UY",
                                "country_code_alpha3" => "URY",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "United States",
                                "country_full_name" => "United States of America",
                                "country_code" => "840",
                                "country_code_alpha2" => "US",
                                "country_code_alpha3" => "USA",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Uzbekistan",
                                "country_full_name" => "Republic of Uzbekistan",
                                "country_code" => "860",
                                "country_code_alpha2" => "UZ",
                                "country_code_alpha3" => "UZB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Vatican City",
                                "country_full_name" => "Vatican City State",
                                "country_code" => "336",
                                "country_code_alpha2" => "VA",
                                "country_code_alpha3" => "VAT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Saint Vincent and the Grenadines",
                                "country_full_name" => "Saint Vincent and the Grenadines",
                                "country_code" => "670",
                                "country_code_alpha2" => "VC",
                                "country_code_alpha3" => "VCT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Venezuela",
                                "country_full_name" => "Bolivarian Republic of Venezuela",
                                "country_code" => "862",
                                "country_code_alpha2" => "VE",
                                "country_code_alpha3" => "VEN",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "British Virgin Islands",
                                "country_full_name" => "Virgin Islands",
                                "country_code" => "092",
                                "country_code_alpha2" => "VG",
                                "country_code_alpha3" => "VGB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "United States Virgin Islands",
                                "country_full_name" => "Virgin Islands of the United States",
                                "country_code" => "850",
                                "country_code_alpha2" => "VI",
                                "country_code_alpha3" => "VIR",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Vietnam",
                                "country_full_name" => "Socialist Republic of Vietnam",
                                "country_code" => "704",
                                "country_code_alpha2" => "VN",
                                "country_code_alpha3" => "VNM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Vanuatu",
                                "country_full_name" => "Republic of Vanuatu",
                                "country_code" => "548",
                                "country_code_alpha2" => "VU",
                                "country_code_alpha3" => "VUT",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Wallis and Futuna",
                                "country_full_name" => "Territory of the Wallis and Futuna Islands",
                                "country_code" => "876",
                                "country_code_alpha2" => "WF",
                                "country_code_alpha3" => "WLF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Samoa",
                                "country_full_name" => "Independent State of Samoa",
                                "country_code" => "882",
                                "country_code_alpha2" => "WS",
                                "country_code_alpha3" => "WSM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Yemen",
                                "country_full_name" => "Republic of Yemen",
                                "country_code" => "887",
                                "country_code_alpha2" => "YE",
                                "country_code_alpha3" => "YEM",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "South Africa",
                                "country_full_name" => "Republic of South Africa",
                                "country_code" => "710",
                                "country_code_alpha2" => "ZA",
                                "country_code_alpha3" => "ZAF",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Zambia",
                                "country_full_name" => "Republic of Zambia",
                                "country_code" => "894",
                                "country_code_alpha2" => "ZM",
                                "country_code_alpha3" => "ZMB",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Zimbabwe",
                                "country_full_name" => "Republic of Zimbabwe",
                                "country_code" => "716",
                                "country_code_alpha2" => "ZW",
                                "country_code_alpha3" => "ZWE",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Ashmore and Cartier Is.",
                                "country_full_name" => "Territory of Ashmore and Cartier Islands",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Bajo Nuevo Bank",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Clipperton I.",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Cyprus U.N. Buffer Zone",
                                "country_full_name" => "Cyprus No Mans Land",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Coral Sea Is.",
                                "country_full_name" => "Coral Sea Islands Territory",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "N. Cyprus",
                                "country_full_name" => "Turkish Republic of Northern Cyprus",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Dhekelia",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Indian Ocean Ter.",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Baikonur",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Siachen Glacier",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Spratly Is.",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Scarborough Reef",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Serranilla Bank",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Somaliland",
                                "country_full_name" => "Republic of Somaliland",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "USNB Guantanamo Bay",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Akrotiri",
                                "country_full_name" => "",
                                "country_code" => "",
                                "country_code_alpha2" => "",
                                "country_code_alpha3" => "",
                            ]);

        \App\Models\Country::create([
                                "country_name" => "Europe Union",
                                "country_full_name" => "Europe Union",
                                "country_code" => "250",
                                "country_code_alpha2" => "EU",
                                "country_code_alpha3" => "EUR",
                            ]);




    }
}
