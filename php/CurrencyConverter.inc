<?php
/*
    CurrencyConverter ver 1.0.0
    Author: Daniel Kushner
    Email: daniel@websapp.com
    Release: 1 Nov 2001
    Copyright 2001
    
    CurrencyConverter can convert from USD, CAD, EUR and GBP to 
    over 150 different currencies 
*/
class CurrencyConverter {
    
    /** A list of all the currencies with their codes is at the end of this file **/
    
    // The conversion rates
    var $conv;
    
    // The names of the currencies
    var $names;
    
    // A list that keeps the name of currencies that are realy 'aliases' to 
    // the same currency but with a different name
    var $blacklist = array('Nauru Island Dollar' => true,
                       'Christmas Island Dollar' => true,
                       'Cocoskeeling Island' => true,
                       'Norfolk Island Dollar' => true,
                       'Kiribati Dollar' => true,
                       'Tuvalu Dollar' => true,
                       'Heard & Mcdonald Island Dollar' => true,
                       'Liechtenstein Franc' => true,
                       'Faroe Island Krone' => true,
                       'North Africa Peseta' => true,
                       'French Guiana Franc' => true,
                       'Guadaloupe Franc' => true,
                       'St. Pierre Franc' => true,
                       'Miquelon Franc' => true,
                       'Andorran Franc' => true,
                       'Monaco Franc' => true,
                       'Martinique Franc' => true,
                       'Reunion Franc' => true,
                       'San Marino Lira' => true,
                       'Vatican City Lira' => true,
                       'Dronning Maudland Krone' => true,
                       'Bouvet Island Kroner' => true,
                       'Pitcairn Island Dollar' => true,
                       'Tokelau Dollar' => true,
                       'Nieue Dollar' => true,
                       'Azores Escudo' => true,
                       'Madeira Escudo' => true,
                       'Samoa American Dollar' => true,
                       'Johnston Island Dollar' => true,
                       'Midway Island Dollar' => true,
                       'Turks & Caicos Dollar' => true,
                       'Virgin Island Dollar' => true,
                       'Puerto Rico Dollar' => true,
                       'Brit. Indian Ocean Terr.' => true,
                       'Guam Dollar' => true,
                       'Cameroon Franc' => true,
                       'Congo Franc' => true,
                       'Equatorial Guinea' => true,
                       'Gabon Franc' => true,
                       'Chad Franc' => true,
                       'St. Lucia Dollar' => true,
                       'Dominica Dollar' => true,
                       'Grenada Dollar' => true,
                       'St. Kitts Dollar' => true,
                       'Montserrat Dollar' => true,
                       'St. Vincent Dollar' => true,
                       'East Caribbean Dollar' => true,
                       'Burkino Faso' => true,
                       'Senegal Franc' => true,
                       'Togo Republic Franc' => true,
                       'Ivory Coast Franc' => true,
                       'Mali Republic Franc' => true,
                       'Benin Franc' => true,
                       'Namibia Dollar' => true,
                       'South African Rand/fin' => true
                       );
    
    // Constants
    var $URL = "pacific.commerce.ubc.ca";
    var $URI = "/xr/rates.html";
    
    var $fp;
    
    
    /* 
        Constructs a new Converter and updates the 
        conversion and names arrays
    */
    function CurrencyConverter() {
        $this->fp = fsockopen($this->URL, 80, $errno, $errstr, 60);        
        if (!$this->fp) {
            echo "$errstr ($errno)<br>\n";
        } else {
            fputs ($this->fp, "GET $this->URI HTTP/1.0\r\n\r\n");
            
            while (!feof($this->fp)) {
                $line = fgets ($this->fp,1024);
                if(eregi("<tt>([[:alnum:]]+)</tt>", $line, $reg)) {
                    $currency = $reg[1];
                    
                    $line = fgets ($this->fp,1024);
                    eregi(">([^<]+)</", $line, $reg);
                    if($this->blacklist[$reg[1]]) continue;
                    $this->names[$currency] = $reg[1];
                    
                    $this->enterConvertion('CAD', $currency);
                    $this->enterConvertion('USD', $currency);
                    $this->enterConvertion('EUR', $currency);
                    $this->enterConvertion('GBP', $currency);
                }
            }
            fclose ($this->fp);
        }
    }
    
    /*
        Given two currency codes returns their exchange rate.
    */
    function convert($from, $to) {
        return $this->conv[$from][$to];
    }
    
    /*
        Given a curreny code returns it's full name.
    */
    function getName($currency) {
        return $this->names[$currency];
    }
    
    
    /*  PRIVATE FUNCTIONS   */
    
    function enterConvertion($from, $to) {
        $line = fgets ($this->fp,1024);
        eregi(">([^<]+)</", $line, $reg);
        $this->conv[$from][$to] = $reg[1];
    }
        
    
    
}
  

/*
    A list of currencies and thier codes
    ====================================
    
    ADP:Andorran Peseta
    AED:U.A.E. Dirham
    AFA:Afghanistan Afgani
    ALL:Albanian Lek
    AMD:Armenia Dram
    ANG:Netherland Antilles Guilder
    AOK:Angolan Kwanza
    ARS:Argentine Peso
    ATS:** Austrian Schilling
    AUD:Australian Dollar
    AZM:Azerbaijan Manat
    BBD:Barbados Dollar
    BDT:Bangladesh Taka
    BEF:** Belgian Franc
    BGL:Bulgarian Lev
    BHD:Bahraini Dinar
    BMD:Bermudian Dollar
    BND:Brunei Dollar
    BOP:Bolivian Boliviano
    BPS:Canton & Enderbury Island Pound
    BRL:Brazil Real
    BSD:Bahamas Dollar
    BTN:Bhutan Ngultrum
    BWP:Botswana Pula
    BYR:Belarus Rouble
    BZD:Belize Dollar
    CAD:Canadian Dollar
    CHF:Swiss Franc
    CLP:Chilean Peso
    CNY:China Renminbi
    COP:Colombian Peso
    CRC:Costa Rica Colon
    CUP:Cuban Peso
    CVE:Cape Verde Escudo
    CYP:Cypriot Pound
    CZK:Czech Koruna
    DEM:** German Mark
    DJF:Djibouti Franc
    DKK:Danish Krone
    DOP:Dominican Republic
    DZD:Algerian Dinar
    ECS:Ecuadoran Sucre
    EEK:Estonian Kroon
    EGP:Egyptian Pound
    ESP:** Balearic Island Peseta
    ETB:Ethiopian Birr
    EUR:European Euro
    FIM:** Finnish Markka
    FJD:Fiji Dollar
    FKP:Falkland Island Pound
    FRF:** Reunion Franc
    GBP:British Pound
    GEL:Georgian Lari
    GHC:Ghana Cedi
    GIP:Gibraltar Pound
    GMD:Gambian Dalasi
    GNS:Guinea Franc
    GRD:Greek Drachma
    GTQ:Guatemala Quetzal
    GWP:Guinea Bissau Peso
    GYD:Guyana Dollar
    HKD:Hong Kong Dollar
    HNL:Honduras Lempira
    HRK:Croatian Kuna
    HTG:Haiti Gourde
    HUF:Hungarian Forint
    IDR:Indonesian Rupiah
    IEP:** Irish Punt
    ILS:Israeli Shekel
    INR:Indian Rupee
    IQD:Iraqi Dinar
    IRR:Iranian Rial
    ISK:Iceland Krona
    ITL:** Italian Lira
    JMD:Jamaica Dollar
    JOD:Jordanian Dinar
    JPY:Japanese Yen
    KES:Kenyan Shilling
    KGS:Kyrgyzstan Som
    KMF:Comoros Franc
    KRW:South Korean Won
    KWD:Kuwaiti Dinar
    KYD:Cayman Islands
    KZT:Kazakhstan Tenge
    LAK:Laos New Kip
    LBP:Lebanese Pound
    LKR:Sri Lankan Rupee
    LRD:Liberian Dollar
    LSL:Lesotho Loti
    LTL:Lithuanian Lit
    LUF:** Luxembourg Franc
    LVL:Latvian Lat
    MAD:Moroccan Dirham
    MDL:Moldova Lei
    MMK:Myanmar Kyat
    MNT:Mongolia Tugrik
    MOP:Macau Pataca
    MRO:Mauritania Ouguiya
    MTL:Maltese Lira
    MUR:Mauritius Rupee
    MWK:Malawi Kwacha
    MXP:Mexican Peso
    MYR:Malaysian Ringgit
    MZM:Mozambique Metical
    NGN:Nigeria Naira
    NIC:Nicaragua Cordoba
    NLG:** Dutch Guilder
    NOK:Norwegian Krone
    NZD:New Zealand Dollar
    OMR:Omani Rial
    PAB:Panamanian Balboa
    PEN:Peruvian New Sol
    PGK:Papua New Guinea Kina
    PHP:Philippines Peso
    PKR:Pakistani Rupee
    PLZ:Polish Zloty
    PTE:** Madeira Escudo
    PYG:Paraguay Guarani
    QAR:Qatari Riyal
    ROL:Romanian Leu
    RUB:Russian Ruble
    RWS:Rwanda Franc
    SAR:Saudi Riyal
    SBD:Solomon Island Dollar
    SCR:Seychelles Rupee
    SDP:Sudanese Pound
    SEK:Swedish Krona
    SGD:Singapore Dollar
    SHP:St. Helena Pound
    SIT:Slovenia Tolar
    SKK:Slovakia Koruna
    SLL:Sierra Leone Leone
    SOS:Somali Schilling
    SRG:Surinam Guilder
    STD:Sao Tome Dobra
    SVC:El Salvador Colon
    SYP:Syrian Pound
    SZL:Swaziland Lilangeni
    THB:Thai Baht
    TJR:Tajikistan Ruble
    TMM:Turkmenistan Manat
    TND:Tunisian Dinar
    TRL:Turkish Lira
    TTD:Trinidad/tobago Dollar
    TWD:Taiwan Dollar
    TZS:Tanzanian Shilling
    UAH:Ukraine Hryvna
    UGX:Ugandan Shilling
    USD:United States Dollar
    UYP:Uruguay Peso
    UZS:Uzbekistan Sum
    VEB:Venezuelan Bolivar
    VND:Vietnam Dong
    VUV:Vanuatu Vatu
    XAF:Central African Republic
    XCD:Antigua Dollar
    XDS:St. Christopher Dollar
    XEU:European Currency Unit
    XOF:Niger Republic Franc
    XPF:French Pacific Island Franc
    YER:Yemeni Rial
    ZAR:South African Rand
    ZMK:Zambian Kwacha
    ZRN:Zaire Zaire
    ZWD:Zimbabwe Dollar
    
    ** Countries whose currencies have been replaced by the European euro.
*/
?>