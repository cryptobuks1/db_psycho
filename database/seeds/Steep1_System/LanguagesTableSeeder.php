<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Language::truncate();
        
        \App\Models\Language::create([
            "language_code" => "en",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "English",
            "language_view" => "English",
        ]);

        \App\Models\Language::create([
            "language_code" => "ru",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Russian",
            "language_name_ru" => "Русский",
            "language_view" => "Русский",
        ]);

        \App\Models\Language::create([
            "language_code" => "aa",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Afar",
            "language_name_aa" => "Afar",
            "language_view" => "Afar",
        ]);

        \App\Models\Language::create([
            "language_code" => "ab",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Abkhazian",
            "language_name_ab" => "Abkhazian",
            "language_view" => "Abkhazian",
        ]);

        \App\Models\Language::create([
            "language_code" => "ae",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Avestan",
            "language_name_ae" => "Avestan",
            "language_view" => "Avestan",
        ]);

        \App\Models\Language::create([
            "language_code" => "af",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Afrikaans",
            "language_name_af" => "Afrikaans",
            "language_view" => "Afrikaans",
        ]);

        \App\Models\Language::create([
            "language_code" => "ak",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Akan",
            "language_name_ak" => "Akan",
            "language_view" => "Akan",
        ]);

        \App\Models\Language::create([
            "language_code" => "am",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Amharic",
            "language_name_am" => "Amharic",
            "language_view" => "Amharic",
        ]);

        \App\Models\Language::create([
            "language_code" => "an",
            "language_code3" =>"" ,
            "language_code_n" => "",
            "language_name" => "Aragonese",
            "language_name_an" => "Aragonese",
            "language_view" => "Aragonese",
        ]);

        \App\Models\Language::create([
            "language_code" => "ar",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Arabic",
            "language_name_ar" => "Arabic",
            "language_view" => "Arabic",
        ]);

        \App\Models\Language::create([
            "language_code" => "as",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Assamese",
            "language_name_as" => "Assamese",
            "language_view" => "Assamese",
        ]);

        \App\Models\Language::create([
            "language_code" => "av",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Avaric",
            "language_name_av" => "Avaric",
            "language_view" => "Avaric",
        ]);

        \App\Models\Language::create([
            "language_code" => "ay",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Aymara",
            "language_name_ay" => "Aymara",
            "language_view" => "Aymara",
        ]);

        \App\Models\Language::create([
            "language_code" => "az",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Azerbaijani",
            "language_name_az" => "Azerbaijani",
            "language_view" => "Azerbaijani",
        ]);

        \App\Models\Language::create([
            "language_code" => "ba",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Bashkir",
            "language_name_ba" => "Bashkir",
            "language_view" => "Bashkir",
        ]);

        \App\Models\Language::create([
            "language_code" => "be",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Belarusian",
            "language_name_be" => "Belarusian",
            "language_view" => "Belarusian",
        ]);

        \App\Models\Language::create([
            "language_code" => "bg",
            "language_code3" => "",
            "language_code_n" => "115",
            "language_name" => "Bulgarian",
            "language_name_bg" => "Bulgarian",
            "language_view" => "Bulgarian",
        ]);

        \App\Models\Language::create([
            "language_code" => "bh",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Bihari",
            "language_name_bh" => "Bihari",
            "language_view" => "Bihari",
        ]);

        \App\Models\Language::create([
            "language_code" => "bm",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Bambara",
            "language_name_bm" => "Bambara",
            "language_view" => "Bambara",
        ]);

        \App\Models\Language::create([
            "language_code" => "bi",
            "language_code3" => "",
            "language_code_n" => "107",
            "language_name" => "Bislama",
            "language_name_bi" => "Bislama",
            "language_view" => "Bislama",
        ]);

        \App\Models\Language::create([
            "language_code" => "bn",
            "language_code3" => "",
            "language_code_n" => "100",
            "language_name" => "Bengali",
            "language_name_bn" => "Bengali",
            "language_view" => "Bengali",
        ]);

        \App\Models\Language::create([
            "language_code" => "bo",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Tibetan",
            "language_name_bo" => "Tibetan",
            "language_view" => "Tibetan",
        ]);

        \App\Models\Language::create([
            "language_code" => "br",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Breton",
            "language_name_br" => "Breton",
            "language_view" => "Breton",
        ]);

        \App\Models\Language::create([
            "language_code" => "bs",
            "language_code3" => "",
            "language_code_n" => "",
            "language_name" => "Bosnian",
            "language_name_bs" => "Bosnian",
            "language_view" => "Bosnian",
        ]);

        \App\Models\Language::create([
            "language_code" => "ca",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Catalan",
            "language_name_ca" => "Catalan",
            "language_view" => "Catalan",
        ]);

        \App\Models\Language::create([
            "language_code" => "ce",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Chechen",
            "language_name_ce" => "Chechen",
            "language_view" => "Chechen",
        ]);

        \App\Models\Language::create([
            "language_code" => "ch",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Chamorro",
            "language_name_ch" => "Chamorro",
            "language_view" => "Chamorro",
        ]);

        \App\Models\Language::create([
            "language_code" => "co",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Corsican",
            "language_name_co" => "Corsican",
            "language_view" => "Corsican",
        ]);

        \App\Models\Language::create([
            "language_code" => "cr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Cree",
            "language_name_cr" => "Cree",
            "language_view" => "Cree",
        ]);

        \App\Models\Language::create([
            "language_code" => "cs",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Czech",
            "language_name_cs" => "Czech",
            "language_view" => "Czech",
        ]);

        \App\Models\Language::create([
            "language_code" => "cu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Church",
            "language_name_cu" => "Church",
            "language_view" => "Church",
        ]);

        \App\Models\Language::create([
            "language_code" => "cv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Chuvash",
            "language_name_cv" => "Chuvash",
            "language_view" => "Chuvash",
        ]);

        \App\Models\Language::create([
            "language_code" => "cy",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Welsh",
            "language_name_cy" => "Welsh",
            "language_view" => "Welsh",
        ]);

        \App\Models\Language::create([
            "language_code" => "da",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Danish",
            "language_name_da" => "Danish",
            "language_view" => "Danish",
        ]);

        \App\Models\Language::create([
            "language_code" => "de",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "German",
            "language_name_de" => "German",
            "language_view" => "German",
        ]);

        \App\Models\Language::create([
            "language_code" => "dv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Divehi",
            "language_name_dv" => "Divehi",
            "language_view" => "Divehi",
        ]);

        \App\Models\Language::create([
            "language_code" => "dz",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Dzongkha",
            "language_name_dz" => "Dzongkha",
            "language_view" => "Dzongkha",
        ]);

        \App\Models\Language::create([
            "language_code" => "ee",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ewe",
            "language_name_ee" => "Ewe",
            "language_view" => "Ewe",
        ]);

        \App\Models\Language::create([
            "language_code" => "el",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Greek",
            "language_name_el" => "Greek",
            "language_view" => "Greek",
        ]);

        \App\Models\Language::create([
            "language_code" => "eo",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Esperanto",
            "language_name_eo" => "Esperanto",
            "language_view" => "Esperanto",
        ]);

        \App\Models\Language::create([
            "language_code" => "es",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Spanish",
            "language_name_es" => "Spanish",
            "language_view" => "Spanish",
        ]);

        \App\Models\Language::create([
            "language_code" => "et",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Estonian",
            "language_name_et" => "Estonian",
            "language_view" => "Estonian",
        ]);

        \App\Models\Language::create([
            "language_code" => "eu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Basque",
            "language_name_eu" => "Basque",
            "language_view" => "Basque",
        ]);

        \App\Models\Language::create([
            "language_code" => "fa",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Persian",
            "language_name_fa" => "Persian",
            "language_view" => "Persian",
        ]);

        \App\Models\Language::create([
            "language_code" => "ff",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Fulah",
            "language_name_ff" => "Fulah",
            "language_view" => "Fulah",
        ]);

        \App\Models\Language::create([
            "language_code" => "fi",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Finnish",
            "language_name_fi" => "Finnish",
            "language_view" => "Finnish",
        ]);

        \App\Models\Language::create([
            "language_code" => "fj",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Fijian",
            "language_name_fj" => "Fijian",
            "language_view" => "Fijian",
        ]);

        \App\Models\Language::create([
            "language_code" => "fo",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Faroese",
            "language_name_fo" => "Faroese",
            "language_view" => "Faroese",
        ]);

        \App\Models\Language::create([
            "language_code" => "fr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "French",
            "language_name_fr" => "French",
            "language_view" => "French",
        ]);

        \App\Models\Language::create([
            "language_code" => "fy",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Western",
            "language_name_fy" => "Western",
            "language_view" => "Western",
        ]);

        \App\Models\Language::create([
            "language_code" => "ga",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Irish",
            "language_name_ga" => "Irish",
            "language_view" => "Irish",
        ]);

        \App\Models\Language::create([
            "language_code" => "gd",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Gaelic",
            "language_name_gd" => "Gaelic",
            "language_view" => "Gaelic",
        ]);

        \App\Models\Language::create([
            "language_code" => "gl",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Galician",
            "language_name_gl" => "Galician",
            "language_view" => "Galician",
        ]);

        \App\Models\Language::create([
            "language_code" => "gn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Guarani",
            "language_name_gn" => "Guarani",
            "language_view" => "Guarani",
        ]);

        \App\Models\Language::create([
            "language_code" => "gu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Gujarati",
            "language_name_gu" => "Gujarati",
            "language_view" => "Gujarati",
        ]);

        \App\Models\Language::create([
            "language_code" => "gv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Manx",
            "language_name_gv" => "Manx",
            "language_view" => "Manx",
        ]);

        \App\Models\Language::create([
            "language_code" => "ha",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Hausa",
            "language_name_ha" => "Hausa",
            "language_view" => "Hausa",
        ]);

        \App\Models\Language::create([
            "language_code" => "he",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Hebrew",
            "language_name_he" => "Hebrew",
            "language_view" => "Hebrew",
        ]);

        \App\Models\Language::create([
            "language_code" => "hi",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Hindi",
            "language_name_hi" => "Hindi",
            "language_view" => "Hindi",
        ]);

        \App\Models\Language::create([
            "language_code" => "ho",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Hiri Motu",
            "language_name_ho" => "Hiri Motu",
            "language_view" => "Hiri Motu",
        ]);

        \App\Models\Language::create([
            "language_code" => "hr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Croatian",
            "language_name_hr" => "Croatian",
            "language_view" => "Croatian",
        ]);

        \App\Models\Language::create([
            "language_code" => "ht",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Haitian",
            "language_name_ht" => "Haitian",
            "language_view" => "Haitian",
        ]);

        \App\Models\Language::create([
            "language_code" => "hu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Hungarian",
            "language_name_hu" => "Hungarian",
            "language_view" => "Hungarian",
        ]);

        \App\Models\Language::create([
            "language_code" => "hy",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Armenian",
            "language_name_hy" => "Armenian",
            "language_view" => "Armenian",
        ]);

        \App\Models\Language::create([
            "language_code" => "hz",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Herero",
            "language_name_hz" => "Herero",
            "language_view" => "Herero",
        ]);

        \App\Models\Language::create([
            "language_code" => "ia",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Interlingua",
            "language_name_ia" => "Interlingua",
            "language_view" => "Interlingua",
        ]);

        \App\Models\Language::create([
            "language_code" => "id",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Indonesian",
            "language_name_id" => "Indonesian",
            "language_view" => "Indonesian",
        ]);

        \App\Models\Language::create([
            "language_code" => "ie",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Interlingue",
            "language_name_ie" => "Interlingue",
            "language_view" => "Interlingue",
        ]);

        \App\Models\Language::create([
            "language_code" => "ig",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Igbo",
            "language_name_ig" => "Igbo",
            "language_view" => "Igbo",
        ]);

        \App\Models\Language::create([
            "language_code" => "ii",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Sichuan Yi",
            "language_name_ii" => "Sichuan Yi",
            "language_view" => "Sichuan Yi",
        ]);

        \App\Models\Language::create([
            "language_code" => "ik",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Inupiaq",
            "language_name_ik" => "Inupiaq",
            "language_view" => "Inupiaq",
        ]);

        \App\Models\Language::create([
            "language_code" => "io",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ido",
            "language_name_io" => "Ido",
            "language_view" => "Ido",
        ]);

        \App\Models\Language::create([
            "language_code" => "is",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Icelandic",
            "language_name_is" => "Icelandic",
            "language_view" => "Icelandic",
        ]);

        \App\Models\Language::create([
            "language_code" => "it",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Italian",
            "language_name_it" => "Italian",
            "language_view" => "Italian",
        ]);

        \App\Models\Language::create([
            "language_code" => "iu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Inuktitut",
            "language_name_iu" => "Inuktitut",
            "language_view" => "Inuktitut",
        ]);

        \App\Models\Language::create([
            "language_code" => "ja",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Japanese",
            "language_name_ja" => "Japanese",
            "language_view" => "Japanese",
        ]);

        \App\Models\Language::create([
            "language_code" => "jv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Javanese",
            "language_name_jv" => "Javanese",
            "language_view" => "Javanese",
        ]);

        \App\Models\Language::create([
            "language_code" => "ka",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Georgian",
            "language_name_ka" => "Georgian",
            "language_view" => "Georgian",
        ]);

        \App\Models\Language::create([
            "language_code" => "kg",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kongo",
            "language_name_kg" => "Kongo",
            "language_view" => "Kongo",
        ]);

        \App\Models\Language::create([
            "language_code" => "ki",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kikuyu",
            "language_name_ki" => "Kikuyu",
            "language_view" => "Kikuyu",
        ]);

        \App\Models\Language::create([
            "language_code" => "kj",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kuanyama",
            "language_name_kj" => "Kuanyama",
            "language_view" => "Kuanyama",
        ]);

        \App\Models\Language::create([
            "language_code" => "kk",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kazakh",
            "language_name_kk" => "Kazakh",
            "language_view" => "Kazakh",
        ]);

        \App\Models\Language::create([
            "language_code" => "kl",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kalaallisut",
            "language_name_kl" => "Kalaallisut",
            "language_view" => "Kalaallisut",
        ]);

        \App\Models\Language::create([
            "language_code" => "km",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Central",
            "language_name_km" => "Central",
            "language_view" => "Central",
        ]);

        \App\Models\Language::create([
            "language_code" => "kn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kannada",
            "language_name_kn" => "Kannada",
            "language_view" => "Kannada",
        ]);

        \App\Models\Language::create([
            "language_code" => "ko",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Korean",
            "language_name_ko" => "Korean",
            "language_view" => "Korean",
        ]);

        \App\Models\Language::create([
            "language_code" => "kr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kanuri",
            "language_name_kr" => "Kanuri",
            "language_view" => "Kanuri",
        ]);

        \App\Models\Language::create([
            "language_code" => "ks",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kashmiri",
            "language_name_ks" => "Kashmiri",
            "language_view" => "Kashmiri",
        ]);

        \App\Models\Language::create([
            "language_code" => "ku",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kurdish",
            "language_name_ku" => "Kurdish",
            "language_view" => "Kurdish",
        ]);

        \App\Models\Language::create([
            "language_code" => "kv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Komi",
            "language_name_kv" => "Komi",
            "language_view" => "Komi",
        ]);

        \App\Models\Language::create([
            "language_code" => "kw",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Cornish",
            "language_name_kw" => "Cornish",
            "language_view" => "Cornish",
        ]);

        \App\Models\Language::create([
            "language_code" => "ky",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kirghiz",
            "language_name_ky" => "Kirghiz",
            "language_view" => "Kirghiz",
        ]);

        \App\Models\Language::create([
            "language_code" => "la",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Latin",
            "language_name_la" => "Latin",
            "language_view" => "Latin",
        ]);

        \App\Models\Language::create([
            "language_code" => "lb",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Luxembourgish",
            "language_name_lb" => "Luxembourgish",
            "language_view" => "Luxembourgish",
        ]);

        \App\Models\Language::create([
            "language_code" => "lg",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ganda",
            "language_name_lg" => "Ganda",
            "language_view" => "Ganda",
        ]);

        \App\Models\Language::create([
            "language_code" => "li",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Limburgan",
            "language_name_li" => "Limburgan",
            "language_view" => "Limburgan",
        ]);

        \App\Models\Language::create([
            "language_code" => "ln",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Lingala",
            "language_name_ln" => "Lingala",
            "language_view" => "Lingala",
        ]);

        \App\Models\Language::create([
            "language_code" => "lo",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Lao",
            "language_name_lo" => "Lao",
            "language_view" => "Lao",
        ]);

        \App\Models\Language::create([
            "language_code" => "lt",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Lithuanian",
            "language_name_lt" => "Lithuanian",
            "language_view" => "Lithuanian",
        ]);

        \App\Models\Language::create([
            "language_code" => "lu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Luba-Katanga",
            "language_name_lu" => "Luba-Katanga",
            "language_view" => "Luba-Katanga",
        ]);


        \App\Models\Language::create([
            "language_code" => "lv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Latvian",
            "language_name_lv" => "Latvian",
            "language_view" => "Latvian",
        ]);


        \App\Models\Language::create([
            "language_code" => "mg",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Malagasy",
            "language_name_mg" => "Malagasy",
            "language_view" => "Malagasy",
        ]);


        \App\Models\Language::create([
            "language_code" => "mh",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Marshallese",
            "language_name_mh" => "Marshallese",
            "language_view" => "Marshallese",
        ]);


        \App\Models\Language::create([
            "language_code" => "mi",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Maori",
            "language_name_mi" => "Maori",
            "language_view" => "Maori",
        ]);


        \App\Models\Language::create([
            "language_code" => "mk",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Macedonian",
            "language_name_mk" => "Macedonian",
            "language_view" => "Macedonian",
        ]);


        \App\Models\Language::create([
            "language_code" => "ml",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Malayalam",
            "language_name_ml" => "Malayalam",
            "language_view" => "Malayalam",
        ]);


        \App\Models\Language::create([
            "language_code" => "mn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Mongolian",
            "language_name_mn" => "Mongolian",
            "language_view" => "Mongolian",
        ]);


        \App\Models\Language::create([
            "language_code" => "mr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Marathi",
            "language_name_mr" => "Marathi",
            "language_view" => "Marathi",
        ]);


        \App\Models\Language::create([
            "language_code" => "ms",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Malay",
            "language_name_ms" => "Malay",
            "language_view" => "Malay",
        ]);


        \App\Models\Language::create([
            "language_code" => "mt",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Maltese",
            "language_name_mt" => "Maltese",
            "language_view" => "Maltese",
        ]);


        \App\Models\Language::create([
            "language_code" => "my",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Burmese",
            "language_name_my" => "Burmese",
            "language_view" => "Burmese",
        ]);


        \App\Models\Language::create([
            "language_code" => "na",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Nauru",
            "language_name_na" => "Nauru",
            "language_view" => "Nauru",
        ]);


        \App\Models\Language::create([
            "language_code" => "nb",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Bokmål",
            "language_name_nb" => "Bokmål",
            "language_view" => "Bokmål",
        ]);


        \App\Models\Language::create([
            "language_code" => "nd",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ndebele",
            "language_name_nd" => "Ndebele",
            "language_view" => "Ndebele",
        ]);


        \App\Models\Language::create([
            "language_code" => "ne",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Nepali",
            "language_name_ne" => "Nepali",
            "language_view" => "Nepali",
        ]);


        \App\Models\Language::create([
            "language_code" => "ng",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ndonga",
            "language_name_ng" => "Ndonga",
            "language_view" => "Ndonga",
        ]);


        \App\Models\Language::create([
            "language_code" => "nl",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Dutch",
            "language_name_nl" => "Dutch",
            "language_view" => "Dutch",
        ]);


        \App\Models\Language::create([
            "language_code" => "nn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Norwegian",
            "language_name_nn" => "Norwegian",
            "language_view" => "Norwegian",
        ]);


        \App\Models\Language::create([
            "language_code" => "no",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Norwegian",
            "language_name_no" => "Norwegian",
            "language_view" => "Norwegian",
        ]);


        \App\Models\Language::create([
            "language_code" => "nr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ndebele",
            "language_name_nr" => "Ndebele",
            "language_view" => "Ndebele",
        ]);


        \App\Models\Language::create([
            "language_code" => "nv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Navajo",
            "language_name_nv" => "Navajo",
            "language_view" => "Navajo",
        ]);


        \App\Models\Language::create([
            "language_code" => "ny",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Chichewa",
            "language_name_ny" => "Chichewa",
            "language_view" => "Chichewa",
        ]);


        \App\Models\Language::create([
            "language_code" => "oc",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Occitan",
            "language_name_oc" => "Occitan",
            "language_view" => "Occitan",
        ]);


        \App\Models\Language::create([
            "language_code" => "oj",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ojibwa",
            "language_name_oj" => "Ojibwa",
            "language_view" => "Ojibwa",
        ]);


        \App\Models\Language::create([
            "language_code" => "om",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Oromo",
            "language_name_om" => "Oromo",
            "language_view" => "Oromo",
        ]);


        \App\Models\Language::create([
            "language_code" => "or",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Oriya",
            "language_name_or" => "Oriya",
            "language_view" => "Oriya",
        ]);


        \App\Models\Language::create([
            "language_code" => "os",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ossetian",
            "language_name_os" => "Ossetian",
            "language_view" => "Ossetian",
        ]);


        \App\Models\Language::create([
            "language_code" => "pa",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Panjabi",
            "language_name_pa" => "Panjabi",
            "language_view" => "Panjabi",
        ]);


        \App\Models\Language::create([
            "language_code" => "pi",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Pali",
            "language_name_pi" => "Pali",
            "language_view" => "Pali",
        ]);


        \App\Models\Language::create([
            "language_code" => "pl",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Polish",
            "language_name_pl" => "Polish",
            "language_view" => "Polish",
        ]);


        \App\Models\Language::create([
            "language_code" => "ps",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Pushto",
            "language_name_ps" => "Pushto",
            "language_view" => "Pushto",
        ]);


        \App\Models\Language::create([
            "language_code" => "pt",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Portuguese",
            "language_name_pt" => "Portuguese",
            "language_view" => "Portuguese",
        ]);


        \App\Models\Language::create([
            "language_code" => "qu",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Quechua",
            "language_name_qu" => "Quechua",
            "language_view" => "Quechua",
        ]);


        \App\Models\Language::create([
            "language_code" => "rm",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Romansh",
            "language_name_rm" => "Romansh",
            "language_view" => "Romansh",
        ]);


        \App\Models\Language::create([
            "language_code" => "rn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Rundi",
            "language_name_rn" => "Rundi",
            "language_view" => "Rundi",
        ]);


        \App\Models\Language::create([
            "language_code" => "ro",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Romanian",
            "language_name_ro" => "Romanian",
            "language_view" => "Romanian",
        ]);


        \App\Models\Language::create([
            "language_code" => "rw",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Kinyarwanda",
            "language_name_rw" => "Kinyarwanda",
            "language_view" => "Kinyarwanda",
        ]);


        \App\Models\Language::create([
            "language_code" => "sa",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Sanskrit",
            "language_name_sa" => "Sanskrit",
            "language_view" => "Sanskrit",
        ]);


//        \App\Languages::create([
//            "language_code" => "sc",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Sardinian",
//            "language_name_sc" => "Sardinian",
//            "language_view" => "Sardinian",
//        ]);


//        \App\Languages::create([
//            "language_code" => "sd",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Sindhi",
//            "language_name_sd" => "Sindhi",
//            "language_view" => "Sindhi",
//        ]);


        \App\Models\Language::create([
            "language_code" => "se",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Northern",
            "language_name_se" => "Northern",
            "language_view" => "Northern",
        ]);


//        \App\Languages::create([
//            "language_code" => "sg",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Sango",
//            "language_name_sg" => "Sango",
//            "language_view" => "Sango",
//        ]);


//        \App\Languages::create([
//            "language_code" => "si",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Sinhala",
//            "language_name_si" => "Sinhala",
//            "language_view" => "Sinhala",
//        ]);


        \App\Models\Language::create([
            "language_code" => "sk",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Slovak",
            "language_name_sk" => "Slovak",
            "language_view" => "Slovak",
        ]);


        \App\Models\Language::create([
            "language_code" => "sl",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Slovenian",
            "language_name_sl" => "Slovenian",
            "language_view" => "Slovenian",
        ]);


//        \App\Languages::create([
//            "language_code" => "sm",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Samoan",
//            "language_name_sm" => "Samoan",
//            "language_view" => "Samoan",
//        ]);


//        \App\Languages::create([
//            "language_code" => "sn",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Shona",
//            "language_name_sn" => "Shona",
//            "language_view" => "Shona",
//        ]);


//        \App\Languages::create([
//            "language_code" => "so",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Somali",
//            "language_name_so" => "Somali",
//            "language_view" => "Somali",
//        ]);


        \App\Models\Language::create([
            "language_code" => "sq",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Albanian",
            "language_name_sq" => "Albanian",
            "language_view" => "Albanian",
        ]);


        \App\Models\Language::create([
            "language_code" => "sr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Serbian",
            "language_name_sr" => "Serbian",
            "language_view" => "Serbian",
        ]);


//        \App\Languages::create([
//            "language_code" => "ss",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Swati",
//            "language_name_ss" => "Swati",
//            "language_view" => "Swati",
//        ]);


//        \App\Languages::create([
//            "language_code" => "st",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Sotho",
//            "language_name_st" => "Sotho",
//            "language_view" => "Sotho",
//        ]);


        \App\Models\Language::create([
            "language_code" => "su",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Sundanese",
            "language_name_su" => "Sundanese",
            "language_view" => "Sundanese",
        ]);


        \App\Models\Language::create([
            "language_code" => "sv",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Swedish",
            "language_name_sv" => "Swedish",
            "language_view" => "Swedish",
        ]);


//        \App\Languages::create([
//            "language_code" => "sw",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Swahili",
//            "language_name_sw" => "Swahili",
//            "language_view" => "Swahili",
//        ]);


//        \App\Languages::create([
//            "language_code" => "ta",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Tamil",
//            "language_name_ta" => "Tamil",
//            "language_view" => "Tamil",
//        ]);


//        \App\Languages::create([
//            "language_code" => "te",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Telugu",
//            "language_name_te" => "Telugu",
//            "language_view" => "Telugu",
//        ]);


        \App\Models\Language::create([
            "language_code" => "tg",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Tajik",
            "language_name_tg" => "Tajik",
            "language_view" => "Tajik",
        ]);


//        \App\Languages::create([
//            "language_code" => "th",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Thai",
//            "language_name_th" => "Thai",
//            "language_view" => "Thai",
//        ]);


//        \App\Languages::create([
//            "language_code" => "ti",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Tigrinya",
//            "language_name_ti" => "Tigrinya",
//            "language_view" => "Tigrinya",
//        ]);


        \App\Models\Language::create([
            "language_code" => "tk",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Turkmen",
            "language_name_tk" => "Turkmen",
            "language_view" => "Turkmen",
        ]);


//        \App\Languages::create([
//            "language_code" => "tl",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Tagalog",
//            "language_name_tl" => "Tagalog",
//            "language_view" => "Tagalog",
//        ]);


        \App\Models\Language::create([
            "language_code" => "tn",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Tswana",
            "language_name_tn" => "Tswana",
            "language_view" => "Tswana",
        ]);


//        \App\Languages::create([
//            "language_code" => "to",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Tonga",
//            "language_name_to" => "Tonga",
//            "language_view" => "Tonga",
//        ]);


        \App\Models\Language::create([
            "language_code" => "tr",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Turkish",
            "language_name_tr" => "Turkish",
            "language_view" => "Turkish",
        ]);


//        \App\Languages::create([
//            "language_code" => "ts",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Tsonga",
//            "language_name_ts" => "Tsonga",
//            "language_view" => "Tsonga",
//        ]);


        \App\Models\Language::create([
            "language_code" => "tt",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Tatar",
            "language_name_tt" => "Tatar",
            "language_view" => "Tatar",
        ]);


//        \App\Languages::create([
//            "language_code" => "tw",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Twi",
//            "language_name_tw" => "Twi",
//            "language_view" => "Twi",
//        ]);


        \App\Models\Language::create([
            "language_code" => "ty",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Tahitian",
            "language_name_ty" => "Tahitian",
            "language_view" => "Tahitian",
        ]);


        \App\Models\Language::create([
            "language_code" => "ug",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Uighur",
            "language_name_ug" => "Uighur",
            "language_view" => "Uighur",
        ]);


        \App\Models\Language::create([
            "language_code" => "uk",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Ukrainian",
            "language_name_uk" => "Ukrainian",
            "language_view" => "Ukrainian",
        ]);


//        \App\Languages::create([
//            "language_code" => "ur",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Urdu",
//            "language_name_ur" => "Urdu",
//            "language_view" => "Urdu",
//        ]);


        \App\Models\Language::create([
            "language_code" => "uz",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Uzbek",
            "language_name_uz" => "Uzbek",
            "language_view" => "Uzbek",
        ]);


//        \App\Languages::create([
//            "language_code" => "ve",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Venda",
//            "language_name_ve" => "Venda",
//            "language_view" => "Venda",
//        ]);


        \App\Models\Language::create([
            "language_code" => "vi",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Vietnamese",
            "language_name_vi" => "Vietnamese",
            "language_view" => "Vietnamese",
        ]);


//        \App\Languages::create([
//            "language_code" => "vo",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Volapük",
//            "language_name_vo" => "Volapük",
//            "language_view" => "Volapük",
//        ]);


//        \App\Languages::create([
//            "language_code" => "wa",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Walloon",
//            "language_name_wa" => "Walloon",
//            "language_view" => "Walloon",
//        ]);


//        \App\Languages::create([
//            "language_code" => "wo",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Wolof",
//            "language_name_wo" => "Wolof",
//            "language_view" => "Wolof",
//        ]);


//        \App\Languages::create([
//            "language_code" => "xh",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Xhosa",
//            "language_name_xh" => "Xhosa",
//            "language_view" => "Xhosa",
//        ]);


//        \App\Languages::create([
//            "language_code" => "yi",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Yiddish",
//            "language_name_yi" => "Yiddish",
//            "language_view" => "Yiddish",
//        ]);


//        \App\Languages::create([
//            "language_code" => "yo",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Yoruba",
//            "language_name_yo" => "Yoruba",
//            "language_view" => "Yoruba",
//        ]);


//        \App\Languages::create([
//            "language_code" => "za",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Zhuang",
//            "language_name_za" => "Zhuang",
//            "language_view" => "Zhuang",
//        ]);


        \App\Models\Language::create([
            "language_code" => "zh",
            "language_code3" => "",
            "language_code_n" => "045",
            "language_name" => "Chinese",
            "language_name_zh" => "Chinese",
            "language_view" => "Chinese",
        ]);


//        \App\Languages::create([
//            "language_code" => "zu",
//        "language_code3" => "",
//            "language_code_n" => "045",
//            "language_name" => "Zulu",
//            "language_name_zu" => "Zulu",
//            "language_view" => "Zulu",
//        ]);


    }
}


















