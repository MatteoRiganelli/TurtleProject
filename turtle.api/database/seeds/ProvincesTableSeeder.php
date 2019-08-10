<?php

use App\Model\Province;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $provinces = [
            ['initial' => 'XX', 'name' => 'EMPTY', 'region_id'=>'EMPTY'],
            ['initial' => 'AG', 'name'=>'Agrigento',        'region_id'=>'Sicilia'],
            ['initial' => 'AL', 'name'=>'Alessandria'    ,  'region_id'=>'Piemonte'],
            ['initial' => 'AN', 'name'=>'Ancona'         ,  'region_id'=>'Marche'],
            ['initial' => 'AO', 'name'=>'Aosta'          ,  'region_id'=>'Valle d\'Aosta'],
            ['initial' => 'AQ', 'name'=>'L\'Aquila'       ,  'region_id'=>'Abruzzo'],
            ['initial' => 'AR', 'name'=>'Arezzo'         ,  'region_id'=>'Toscana'],
            ['initial' => 'AP', 'name'=>'Ascoli Piceno'  ,  'region_id'=>'Marche'],
            ['initial' => 'AT', 'name'=>'Asti'           ,  'region_id'=>'Piemonte'],
            ['initial' => 'AV', 'name'=>'Avellino'       ,  'region_id'=>'Campania'],
            ['initial' => 'BA', 'name'=>'Bari'           ,  'region_id'=>'Puglia'],
            ['initial' => 'BT', 'name'=>'Barletta Andria Trani', 'region_id'=>'Puglia'],
            ['initial' => 'BL', 'name'=>'Belluno'          , 'region_id'=>'Veneto'],
            ['initial' => 'BN', 'name'=>'Benevento'        , 'region_id'=>'Campania'],
            ['initial' => 'BG', 'name'=>'Bergamo'          , 'region_id'=>'Lombardia'],
            ['initial' => 'BI', 'name'=>'Biella'           , 'region_id'=>'Piemonte'],
            ['initial' => 'BO', 'name'=>'Bologna'          , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'BZ', 'name'=>'Bolzano'          , 'region_id'=>'Trentino Alto Adige'],
            ['initial' => 'BS', 'name'=>'Brescia'          , 'region_id'=>'Lombardia'],
            ['initial' => 'BR', 'name'=>'Brindisi'         , 'region_id'=>'Puglia'],
            ['initial' => 'CA', 'name'=>'Cagliari'         , 'region_id'=>'Sardegna'],
            ['initial' => 'CL', 'name'=>'Caltanissetta'    , 'region_id'=>'Sicilia'],
            ['initial' => 'CB', 'name'=>'Campobasso'       , 'region_id'=>'Molise'],
            ['initial' => 'CI', 'name'=>'Carbonia Iglesias', 'region_id'=>'Sardegna'],
            ['initial' => 'CE', 'name'=>'Caserta'          , 'region_id'=>'Campania'],
            ['initial' => 'CT', 'name'=>'Catania'          , 'region_id'=>'Sicilia'],
            ['initial' => 'CZ', 'name'=>'Catanzaro'        , 'region_id'=>'Calabria'],
            ['initial' => 'CH', 'name'=>'Chieti'           , 'region_id'=>'Abruzzo'],
            ['initial' => 'CO', 'name'=>'Como'             , 'region_id'=>'Lombardia'],
            ['initial' => 'CS', 'name'=>'Cosenza'          , 'region_id'=>'Calabria'],
            ['initial' => 'CR', 'name'=>'Cremona'          , 'region_id'=>'Lombardia'],
            ['initial' => 'KR', 'name'=>'Crotone'          , 'region_id'=>'Calabria'],
            ['initial' => 'CN', 'name'=>'Cuneo'            , 'region_id'=>'Piemonte'],
            ['initial' => 'EN', 'name'=>'Enna'             , 'region_id'=>'Sicilia'],
            ['initial' => 'FM', 'name'=>'Fermo'            , 'region_id'=>'Marche'],
            ['initial' => 'FE', 'name'=>'Ferrara'          , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'FI', 'name'=>'Firenze'          , 'region_id'=>'Toscana'],
            ['initial' => 'FG', 'name'=>'Foggia'           , 'region_id'=>'Puglia'],
            ['initial' => 'FC', 'name'=>'Forli Cesena'     , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'FR', 'name'=>'Frosinone'        , 'region_id'=>'Lazio'],
            ['initial' => 'GE', 'name'=>'Genova'           , 'region_id'=>'Liguria'],
            ['initial' => 'GO', 'name'=>'Gorizia'          , 'region_id'=>'Friuli Venezia Giulia'],
            ['initial' => 'GR', 'name'=>'Grosseto'         , 'region_id'=>'Toscana'],
            ['initial' => 'IM', 'name'=>'Imperia'          , 'region_id'=>'Liguria'],
            ['initial' => 'IS', 'name'=>'Isernia'          , 'region_id'=>'Molise'],
            ['initial' => 'SP', 'name'=>'La Spezia'        , 'region_id'=>'Liguria'],
            ['initial' => 'LT', 'name'=>'Latina'           , 'region_id'=>'Lazio'],
            ['initial' => 'LE', 'name'=>'Lecce'            , 'region_id'=>'Puglia'],
            ['initial' => 'LC', 'name'=>'Lecco'            , 'region_id'=>'Lombardia'],
            ['initial' => 'LI', 'name'=>'Livorno'          , 'region_id'=>'Toscana'],
            ['initial' => 'LO', 'name'=>'Lodi'             , 'region_id'=>'Lombardia'],
            ['initial' => 'LU', 'name'=>'Lucca'            , 'region_id'=>'Toscana'],
            ['initial' => 'MC', 'name'=>'Macerata'         , 'region_id'=>'Marche'],
            ['initial' => 'MN', 'name'=>'Mantova'          , 'region_id'=>'Lombardia'],
            ['initial' => 'MS', 'name'=>'Massa Carrara'    , 'region_id'=>'Toscana'],
            ['initial' => 'MT', 'name'=>'Matera'           , 'region_id'=>'Basilicata'],
            ['initial' => 'VS', 'name'=>'Medio Campidano'  , 'region_id'=>'Sardegna'],
            ['initial' => 'ME', 'name'=>'Messina'          , 'region_id'=>'Sicilia'],
            ['initial' => 'MI', 'name'=>'Milano'           , 'region_id'=>'Lombardia'],
            ['initial' => 'MO', 'name'=>'Modena'           , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'MB', 'name'=>'Monza Brianza'    , 'region_id'=>'Lombardia'],
            ['initial' => 'NA', 'name'=>'Napoli'           , 'region_id'=>'Campania'],
            ['initial' => 'NO', 'name'=>'Novara'           , 'region_id'=>'Piemonte'],
            ['initial' => 'NU', 'name'=>'Nuoro'            , 'region_id'=>'Sardegna'],
            ['initial' => 'OG', 'name'=>'Ogliastra'        , 'region_id'=>'Sardegna'],
            ['initial' => 'OT', 'name'=>'Olbia Tempio'     , 'region_id'=>'Sardegna'],
            ['initial' => 'OR', 'name'=>'Oristano'         , 'region_id'=>'Sardegna'],
            ['initial' => 'PD', 'name'=>'Padova'           , 'region_id'=>'Veneto'],
            ['initial' => 'PA', 'name'=>'Palermo'          , 'region_id'=>'Sicilia'],
            ['initial' => 'PR', 'name'=>'Parma'            , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'PV', 'name'=>'Pavia'            , 'region_id'=>'Lombardia'],
            ['initial' => 'PG', 'name'=>'Perugia'          , 'region_id'=>'Umbria'],
            ['initial' => 'PU', 'name'=>'Pesaro Urbino'    , 'region_id'=>'Marche'],
            ['initial' => 'PE', 'name'=>'Pescara'          , 'region_id'=>'Abruzzo'],
            ['initial' => 'PC', 'name'=>'Piacenza'         , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'PI', 'name'=>'Pisa'             , 'region_id'=>'Toscana'],
            ['initial' => 'PT', 'name'=>'Pistoia'          , 'region_id'=>'Toscana'],
            ['initial' => 'PN', 'name'=>'Pordenone'        , 'region_id'=>'Friuli Venezia Giulia'],
            ['initial' => 'PZ', 'name'=>'Potenza'          , 'region_id'=>'Basilicata'],
            ['initial' => 'PO', 'name'=>'Prato'            , 'region_id'=>'Toscana'],
            ['initial' => 'RG', 'name'=>'Ragusa'           , 'region_id'=>'Sicilia'],
            ['initial' => 'RA', 'name'=>'Ravenna'          , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'RC', 'name'=>'Reggio Calabria'  , 'region_id'=>'Calabria'],
            ['initial' => 'RE', 'name'=>'Reggio Emilia'    , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'RI', 'name'=>'Rieti'            , 'region_id'=>'Lazio'],
            ['initial' => 'RN', 'name'=>'Rimini'           , 'region_id'=>'Emilia Romagna'],
            ['initial' => 'RM', 'name'=>'Roma'             , 'region_id'=>'Lazio'],
            ['initial' => 'RO', 'name'=>'Rovigo'           , 'region_id'=>'Veneto'],
            ['initial' => 'SA', 'name'=>'Salerno'          , 'region_id'=>'Campania'],
            ['initial' => 'SS', 'name'=>'Sassari'          , 'region_id'=>'Sardegna'],
            ['initial' => 'SV', 'name'=>'Savona'           , 'region_id'=>'Liguria'],
            ['initial' => 'SI', 'name'=>'Siena'            , 'region_id'=>'Toscana'],
            ['initial' => 'SR', 'name'=>'Siracusa'         , 'region_id'=>'Sicilia'],
            ['initial' => 'SO', 'name'=>'Sondrio'          , 'region_id'=>'Lombardia'],
            ['initial' => 'TA', 'name'=>'Taranto'          , 'region_id'=>'Puglia'],
            ['initial' => 'TE', 'name'=>'Teramo'           , 'region_id'=>'Abruzzo'],
            ['initial' => 'TR', 'name'=>'Terni'            , 'region_id'=>'Umbria'],
            ['initial' => 'TO', 'name'=>'Torino'           , 'region_id'=>'Piemonte'],
            ['initial' => 'TP', 'name'=>'Trapani'          , 'region_id'=>'Sicilia'],
            ['initial' => 'TN', 'name'=>'Trento'           , 'region_id'=>'Trentino Alto Adige'],
            ['initial' => 'TV', 'name'=>'Treviso'          , 'region_id'=>'Veneto'],
            ['initial' => 'TS', 'name'=>'Trieste'          , 'region_id'=>'Friuli Venezia Giulia'],
            ['initial' => 'UD', 'name'=>'Udine'            , 'region_id'=>'Friuli Venezia Giulia'],
            ['initial' => 'VA', 'name'=>'Varese'           , 'region_id'=>'Lombardia'],
            ['initial' => 'VE', 'name'=>'Venezia'          , 'region_id'=>'Veneto'],
            ['initial' => 'VB', 'name'=>'Verbania'         , 'region_id'=>'Piemonte'],
            ['initial' => 'VC', 'name'=>'Vercelli'         , 'region_id'=>'Piemonte'],
            ['initial' => 'VR', 'name'=>'Verona'           , 'region_id'=>'Veneto'],
            ['initial' => 'VV', 'name'=>'Vibo Valentia'    , 'region_id'=>'Calabria'],
            ['initial' => 'VI', 'name'=>'Vicenza'          , 'region_id'=>'Veneto'],
            ['initial' => 'VT', 'name'=>'Viterbo'          , 'region_id'=>'Lazio']
        ];

        foreach($provinces as $province){

            $regionId = DB::table('region')->where('name', $province['region_id'])->value('id');
            $province['region_id'] = $regionId;
            Province::create($province);
        }
    }
}
