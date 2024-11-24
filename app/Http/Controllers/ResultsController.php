<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Results;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class ResultsController extends Controller
{
    /**
     * Store the data from results input form.
     */
    public function create(string $id)
    {
        
            $results = DB::insert('insert into * results where id = ? limit 1', [$id]);
            return response($results);

    }

    /**
     * Handle an incoming diagnostics request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //$results = $request->input('selectedIndividualId');
        // $selectedIndividualId = IndividualTest::first()->IndividualId;
        $usermail = $request->email;

        $results = Results::create([
            'id' => $request->id,
            'patientNo' => $request->patientNo,
            'requestNo' => $request->requestNo,
            'patientName' => $request->patientName,
            'orNo' => $request->orNo,
            'age'=> $request->age,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'reqDoctor'=> $request->reqDoctor,
            'dateTimerequested'=> $request->dateTimerequested,
            'hematocrit' => $request->hematocrit,
            'hgb' => $request->hgb,
            'neutro' => $request->neutro,
            'lympho' => $request->lympho,
            'mono' => $request->mono,
            'eosino' => $request->eosino,
            'baso' => $request->baso,
            'cbcWbc' => $request->cbcWbc,
            'cbcRbc'=> $request->cbcRbc, 
            'platelet' => $request->platelet, 
            'bloodType' => $request->bloodType,
            'cbcRemarks' => $request->cbcRemarks, 
            'uaColor' => $request->uaColor, 
            'transparency' => $request->transparency, 
            'ph' => $request->ph,
            'sgravity' > $request->sgravity,
            'protein' > $request->protein,
            'glucose' > $request->glucose,
            'ec' > $request->ec,
            'mt' > $request->mt,
            'bacteria' > $request->bacteria,
            'cast' > $request->cast,
            'crystal' > $request->crystal,
            'amorphous' > $request->amorphous,
            'microOrganism' > $request->microOrganism,
            'others' > $request->others,
            'uaRbc' > $request->uaRbc,
            'uaWbc' > $request->uaWbc,
            'seColor' > $request->seColor,
            'seConsistency' > $request->seConsistency,
            'seWbc' > $request->seWbc,
            'seRbc' > $request->seRbc,
            'amoeba' > $request->amoeba,
            'eColi' > $request->eColi,
            'eHistolica' > $request->eHistolica,
            'hookworm' > $request->hookworm,
            'whipworm' > $request->whipworm,
            'pinworm' > $request->pinworm,
            'yeastCells' > $request->yeastCells,
            'ascaris' > $request->ascaris,
            'giardiaLamblia' > $request->giardiaLamblia,
            'seOthers' > $request->seOthers,
            'occultBlood' > $request->occultBlood,
            'seRemark' > $request->seRemark,
            'hepaB' > $request->hepaB,
            'hepaA' > $request->hepaA,
            'hiv' > $request->hiv,
            'hssAgQualitative' > $request->hssAgQualitative,
            'hBsAgQuantitative' > $request->hBsAgQuantitative,
            'hBsAgValueQuantitative' > $request->hBsAgValueQuantitative,
            'syphilis' > $request->syphilis,
            'pTSerum' > $request->pTSerum,
            'pTUrine' > $request->pTUrine,
            'rATest' > $request->rATest,
            'fbs' > $request->fbs,
            'rbs' > $request->rbs,
            'HPPS2' > $request->HPPS2,
            'hBA1C' > $request->hBA1C,
            'oGTT50g' > $request->oGTT50g,
            'oGTT75gFullFasting' > $request->oGTT75gFullFasting,
            'oGTT75gAfter1hour' > $request->oGTT75gAfter1hour,
            'oGTT75gAfter2hours' > $request->oGTT75gAfter2hours,
            'alp' > $request->alp,
            'cholines' > $request->cholines,
            'sGPT' > $request->sGPT,
            'sGOT' > $request->sGOT,
            'sodium' > $request->sodium,
            'potasium' > $request->potasium,
            'ica' > $request->ica,
            'chloride' > $request->chloride,
            'cholesterol' > $request->cholesterol,
            'triglyceride' > $request->triglyceride,
            'hdl' > $request->hdl,
            'ldl' > $request->ldl,
            'vldl' > $request->vldl,
            'bua' > $request->bua,
            'bun' > $request->bun,
            'creatine' > $request->creatine,
            'tProtein' > $request->tProtein,
            'albumin' > $request->albumin,
            'globulin' > $request->globulin,
            'chemNote' > $request->chemNote,
            'timeReceived1' > $request->timeReceived1,
            'timeReleased1' > $request->timeReleased1,
            'unit1' > $request->unit1,
            'timeReleased2' > $request->timeReleased2,
            'timeReceived2' > $request->timeReceived2,
            'unit2' > $request->unit2,
            'noteSputum' > $request->noteSputum,
            'tSH' > $request->tSH,
            'fT4' > $request->fT4,
            'fT3' > $request->fT3,
            't3' > $request->t3,
            't4' > $request->t4,
            'noteThyroid' > $request->noteThyroid,
        ]);
         
        
        if (DB::table('results')->where('email', $usermail)->doesntExist()) {
            $users = User::create([
                'name' => $request->name,
                'email' => $usermail
            ]);
        }

        return redirect(route('results', absolute: false))->with('success', 'Results Sucessfully Saved!');
    }

    // public function packagesList()
    // {
    
    //     $packages = DB::table('packages')->select('id', 'packageName')->get();
    //     $individualTest = DB::table('individualtest')->select('id', 'individualTest')->get();

    //     return view('express-diagnostics', [
    //         'packages'=>$packages, 'individualTest'=>$individualTest
    //     ]);

    // }

    // public function individualTestList()
    // {
    //     $individualTest = DB::table('individualtest')->select('id', 'individualTest')->get();

    //     return view('express-diagnostics', [
    //         'individualTest'=>$individualTest
    //     ]);

    // }

    /**
     * Display the packages list.
     */
    public function search(Request $request): Response
    {
        if(!empty($request->id))
        {
            $id = $request->id;
            $patientInfo = DB::select('select * from diagnostics where id = ? limit 1', [$request->id]);
            return response($patientInfo);
        }

        if(!empty($request->name))
        {
            $id = $request->id;
            $patientInfo = DB::select('select * from diagnostics where name = ? limit 1', [$request->name]);
            return response($patientInfo);
        }

        return response(''); // Return a response
  
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $packages = DB::select('select * from packages where id = ? limit 1', [$id]);
        // return response($packages);

        // $packages = Packages::where('status', 1)->get();
        //         foreach ($packages as $data){
        //             $data->status = 0;
        //             $data->update();
        //         }
    }

}
