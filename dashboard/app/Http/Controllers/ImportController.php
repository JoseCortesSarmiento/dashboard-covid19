<?php

namespace App\Http\Controllers;

use App\State;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function getImport()
    {
        return view('import');
    }

    public function getData()
    {
        $dataStates=State::select('state')
                        ->orderBy('state', 'asc')
                        ->groupBy('state')
                        ->get();
        //$dataCases=State::latest()->take(55)->get()->sum('cases');
        $query = State::all();
        $count = ($query->count()) - 55;
        $dataCases=$query->skip($count)->sum('cases');
        $dataDeaths=$query->skip($count)->sum('deaths'); 

        $pieAlabama=State::select('cases')->where('state', '=', 'Alabama')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsAlabama=State::select('deaths')->where('state', '=', 'Alabama')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieAlaska=State::select('cases')->where('state', '=', 'Alaska')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsAlaska=State::select('deaths')->where('state', '=', 'Alaska')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieArizona=State::select('cases')->where('state', '=', 'Arizona')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsArizona=State::select('deaths')->where('state', '=', 'Arizona')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieArkansas=State::select('cases')->where('state', '=', 'Arkansas')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsArkansas=State::select('deaths')->where('state', '=', 'Arkansas')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieCalifornia=State::select('cases')->where('state', '=', 'California')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsCalifornia=State::select('deaths')->where('state', '=', 'California')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieColorado=State::select('cases')->where('state', '=', 'Colorado')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsColorado=State::select('deaths')->where('state', '=', 'Colorado')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieConneticut=State::select('cases')->where('state', '=', 'Connecticut')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsConneticut=State::select('deaths')->where('state', '=', 'Connecticut')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieDelaware=State::select('cases')->where('state', '=', 'Delaware')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsDelaware=State::select('deaths')->where('state', '=', 'Delaware')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieDistCol=State::select('cases')->where('state', '=', 'District of Columbia')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsDistCol=State::select('deaths')->where('state', '=', 'District of Columbia')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieFlorida=State::select('cases')->where('state', '=', 'Florida')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsFlorida=State::select('deaths')->where('state', '=', 'Florida')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieGeorgia=State::select('cases')->where('state', '=', 'Georgia')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsGeorgia=State::select('deaths')->where('state', '=', 'Georgia')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieGuam=State::select('cases')->where('state', '=', 'Guam')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsGuam=State::select('deaths')->where('state', '=', 'Guam')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieHawaii=State::select('cases')->where('state', '=', 'Hawaii')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsHawaii=State::select('deaths')->where('state', '=', 'Hawaii')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieIdaho=State::select('cases')->where('state', '=', 'Idaho')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsIdaho=State::select('deaths')->where('state', '=', 'Idaho')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieIllinois=State::select('cases')->where('state', '=', 'Illinois')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsIllinois=State::select('deaths')->where('state', '=', 'Illinois')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieIndiana=State::select('cases')->where('state', '=', 'Indiana')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsIndiana=State::select('deaths')->where('state', '=', 'Indiana')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieIowa=State::select('cases')->where('state', '=', 'Iowa')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsIowa=State::select('deaths')->where('state', '=', 'Iowa')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieKansas=State::select('cases')->where('state', '=', 'Kansas')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsKansas=State::select('deaths')->where('state', '=', 'Kansas')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieKentucky=State::select('cases')->where('state', '=', 'Kentucky')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsKentucky=State::select('deaths')->where('state', '=', 'Kentucky')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieLouisiana=State::select('cases')->where('state', '=', 'Louisiana')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsLouisiana=State::select('deaths')->where('state', '=', 'Louisiana')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMaine=State::select('cases')->where('state', '=', 'Maine')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMaine=State::select('deaths')->where('state', '=', 'Maine')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMaryland=State::select('cases')->where('state', '=', 'Maryland')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMaryland=State::select('deaths')->where('state', '=', 'Maryland')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMassachusetts=State::select('cases')->where('state', '=', 'Massachusetts')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsMassachusetts=State::select('deaths')->where('state', '=', 'Massachusetts')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieMichigan=State::select('cases')->where('state', '=', 'Michigan')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMichigan=State::select('deaths')->where('state', '=', 'Michigan')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMinnesota=State::select('cases')->where('state', '=', 'Minnesota')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMinnesota=State::select('deaths')->where('state', '=', 'Minnesota')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMississippi=State::select('cases')->where('state', '=', 'Mississippi')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsMississippi=State::select('deaths')->where('state', '=', 'Mississippi')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieMissouri=State::select('cases')->where('state', '=', 'Missouri')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMissouri=State::select('deaths')->where('state', '=', 'Missouri')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieMontana=State::select('cases')->where('state', '=', 'Montana')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsMontana=State::select('deaths')->where('state', '=', 'Montana')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNebraska=State::select('cases')->where('state', '=', 'Nebraska')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNebraska=State::select('deaths')->where('state', '=', 'Nebraska')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNevada=State::select('cases')->where('state', '=', 'Nevada')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNevada=State::select('deaths')->where('state', '=', 'Nevada')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNewHampshire=State::select('cases')->where('state', '=', 'New Hampshire')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNewHampshire=State::select('deaths')->where('state', '=', 'New Hampshire')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNewJersey=State::select('cases')->where('state', '=', 'New Jersey')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNewJersey=State::select('deaths')->where('state', '=', 'New Jersey')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNewMexico=State::select('cases')->where('state', '=', 'New Mexico')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNewMexico=State::select('deaths')->where('state', '=', 'New Mexico')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNewYork=State::select('cases')->where('state', '=', 'New York')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNewYork=State::select('deaths')->where('state', '=', 'New York')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNorthCarolina=State::select('cases')->where('state', '=', 'North Carolina')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNorthCarolina=State::select('deaths')->where('state', '=', 'North Carolina')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNorthDakota=State::select('cases')->where('state', '=', 'North Dakota')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNorthDakota=State::select('deaths')->where('state', '=', 'North Dakota')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieNorthMarianaIslands=State::select('cases')->where('state', '=', 'Northern Mariana Islands')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsNorthMarianaIslands=State::select('deaths')->where('state', '=', 'Northern Mariana Islands')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieOhio=State::select('cases')->where('state', '=', 'Ohio')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsOhio=State::select('deaths')->where('state', '=', 'Ohio')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieOklahoma=State::select('cases')->where('state', '=', 'Oklahoma')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsOklahoma=State::select('deaths')->where('state', '=', 'Oklahoma')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieOregon=State::select('cases')->where('state', '=', 'Oregon')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsOregon=State::select('deaths')->where('state', '=', 'Oregon')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $piePennsylvania=State::select('cases')->where('state', '=', 'Pennsylvania')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsPennsylvania=State::select('deaths')->where('state', '=', 'Pennsylvania')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $piePuertoRico=State::select('cases')->where('state', '=', 'Puerto Rico')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsPuertoRico=State::select('deaths')->where('state', '=', 'Puerto Rico')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieRhodeIsland=State::select('cases')->where('state', '=', 'Rhode Island')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsRhodeIsland=State::select('deaths')->where('state', '=', 'Rhode Island')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieSouthCarolina=State::select('cases')->where('state', '=', 'South Carolina')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsSouthCarolina=State::select('deaths')->where('state', '=', 'South Carolina')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieSouthDakota=State::select('cases')->where('state', '=', 'South Dakota')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsSouthDakota=State::select('deaths')->where('state', '=', 'South Dakota')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieTennessee=State::select('cases')->where('state', '=', 'Tennessee')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsTennessee=State::select('deaths')->where('state', '=', 'Tennessee')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieTexas=State::select('cases')->where('state', '=', 'Texas')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsTexas=State::select('deaths')->where('state', '=', 'Texas')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieUtah=State::select('cases')->where('state', '=', 'Utah')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsUtah=State::select('deaths')->where('state', '=', 'Utah')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieVermont=State::select('cases')->where('state', '=', 'Vermont')->orderByDesc('id')->limit(1)->get()->sum('cases'); 
        $deathsVermont=State::select('deaths')->where('state', '=', 'Vermont')->orderByDesc('id')->limit(1)->get()->sum('deaths'); 

        $pieVirginIslands=State::select('cases')->where('state', '=', 'Virgin Islands')->orderByDesc('id')->limit(1)->get()->sum('cases');
        $deathsVirginIslands=State::select('deaths')->where('state', '=', 'Virgin Islands')->orderByDesc('id')->limit(1)->get()->sum('deaths');

        $pieVirginia=State::select('cases')->where('state', '=', 'Virginia')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsVirginia=State::select('deaths')->where('state', '=', 'Virginia')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieWashington=State::select('cases')->where('state', '=', 'Washington')->orderByDesc('id')->limit(1)->get()->sum('cases');  
        $deathsWashington=State::select('deaths')->where('state', '=', 'Washington')->orderByDesc('id')->limit(1)->get()->sum('deaths');  

        $pieWestVirginia=State::select('cases')->where('state', '=', 'West Virginia')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsWestVirginia=State::select('deaths')->where('state', '=', 'West Virginia')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieWisconsin=State::select('cases')->where('state', '=', 'Wisconsin')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsWisconsin=State::select('deaths')->where('state', '=', 'Wisconsin')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        $pieWyoming=State::select('cases')->where('state', '=', 'Wyoming')->orderByDesc('id')->limit(1)->get()->sum('cases');   
        $deathsWyoming=State::select('deaths')->where('state', '=', 'Wyoming')->orderByDesc('id')->limit(1)->get()->sum('deaths');   

        //Lineal graph
        $dates = State::select('date')->orderBy('id')->groupBy('date')->get();
        $casesDay = State::select('cases')->orderBy('id')->groupBy('date')->get();

        $datesAlabama = State::select('date')->where('state', '=', 'Alabama')->orderBy('id')->groupBy('date')->get();
        $casesDayAlabama = State::select('cases')->where('state', '=', 'Alabama')->orderBy('id')->groupBy('date')->get();

        $datesCalifornia = State::select('date')->where('state', '=', 'California')->orderBy('id')->groupBy('date')->get();
        $casesDayCalifornia = State::select('cases')->where('state', '=', 'California')->orderBy('id')->groupBy('date')->get();
        //panel 3
        /*$statesArr = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", 
        "Delaware", "District of Columbia", "Florida", "Georgia", "Guam", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa",
        "Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri",
        "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Northern Mariana Islands",
        "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Puerto Rico", "Rhode Island", "South Carolina", "South Dakota",
        "Tennessee", "Texas", "Utah", "Vermont", "Virgin Islands", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming");

        $Wyoming=State::select('cases')->whereIn('state',$statesArr)->orderByDesc('id')->get()->sum('cases');   */
        //$WyomingQuery = State::sum('cases')->whereIn('state', $statesArr)->orderByDesc('id');
        //$Wyoming = $WyomingQuery->get();

        return view('import', compact('dataStates', 'dataCases','dataDeaths', 'pieAlabama', 'pieAlaska', 'pieArizona', 'pieArkansas', 'pieCalifornia', 'pieColorado', 'pieConneticut', 
                                    'pieDelaware', 'pieDistCol', 'pieFlorida', 'pieGeorgia', 'pieGuam', 'pieHawaii', 'pieIdaho', 'pieIllinois', 'pieIndiana', 'pieIowa',
                                    'pieKansas','pieKentucky','pieLouisiana','pieMaine','pieMaryland','pieMassachusetts','pieMichigan','pieMinnesota','pieMississippi','pieMissouri',
                                    'pieMontana', 'pieNebraska', 'pieNevada', 'pieNewHampshire', 'pieNewJersey', 'pieNewMexico', 'pieNewYork', 'pieNorthCarolina', 'pieNorthDakota', 'pieNorthMarianaIslands',
                                    'pieOhio', 'pieOklahoma', 'pieOregon', 'piePennsylvania', 'piePuertoRico', 'pieRhodeIsland', 'pieSouthCarolina', 'pieSouthDakota',
                                    'pieTennessee', 'pieTexas', 'pieUtah', 'pieVermont', 'pieVirginIslands', 'pieVirginia', 'pieWashington', 'pieWestVirginia', 'pieWisconsin', 'pieWyoming',
                                    'dates', 'casesDay', 'deathsAlabama', 'deathsAlaska','deathsArizona', 'deathsArkansas', 'deathsCalifornia', 'deathsColorado', 'deathsConneticut', 'deathsDelaware',
                                    'deathsDistCol','deathsFlorida','deathsGeorgia','deathsGuam','deathsHawaii','deathsIdaho',
                                    'deathsIllinois','deathsIndiana','deathsIowa','deathsKansas','deathsKentucky','deathsLouisiana',
                                    'deathsMaine','deathsMaryland','deathsMassachusetts','deathsMichigan','deathsMinnesota','deathsMississippi',
                                    'deathsMissouri','deathsMontana','deathsNebraska','deathsNevada','deathsNewHampshire','deathsNewJersey',
                                    'deathsNewMexico','deathsNewYork','deathsNorthCarolina','deathsNorthDakota','deathsNorthMarianaIslands','deathsOhio',
                                    'deathsOklahoma','deathsOregon','deathsPennsylvania','deathsPuertoRico','deathsRhodeIsland','deathsSouthCarolina',
                                    'deathsSouthDakota','deathsTennessee','deathsTexas','deathsUtah','deathsVermont','deathsVirginIslands',
                                    'deathsVirginia','deathsWashington','deathsWestVirginia','deathsWisconsin','deathsWyoming', 'datesAlabama','casesDayAlabama', 'datesCalifornia','casesDayCalifornia'
                                ));
    }

    public function parseImport(CsvImportRequest $request)
    {
        $dataStates=State::select('state')
                        ->orderBy('state', 'asc')
                        ->groupBy('state')
                        ->get();

        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            //$data = Excel::load($path, function($reader) {})->get()->toArray();
            //$data = Excel::toArray(new UsersImport,request()->file(‘csv_file’))[0];
            $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file', 'dataStates'));

    }

    public function processImport(Request $request)
    {
        $dataStates=State::select('state')
                        ->orderBy('state', 'asc')
                        ->groupBy('state')
                        ->get();
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        $request->fields = array_flip($request->fields);
        set_time_limit(0);
        foreach ($csv_data as $row) {
            $state = new State();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $state->$field = $row[$request->fields[$field]];
                } else {
                    $state->$field = $row[$request->fields[$index]];
                }
            }
            $state->save();
        }

        return view('import_success',compact('dataStates'));
    }
}
