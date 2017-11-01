<?php

namespace App\Http\Controllers;

use App\medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $medical = new medical();
        $medical->pernr = 12313;
        //$medical->tagetdate = $request->targetYear.$request->targetMonth;
        //$medicalTargetYeaer = $request->targetYear.'-'.$request->targetMonth;
        //echo "@@@@@@@@@@@@@@".$medicalTargetYeaer;
        //$medical_tagetdate = date_create($medicalTargetYeaer.'-01');
        $medical_tagetdate = date_create('2010-10-01');
        //dd($medical_tagetdate);
        echo "#################";
        $medical->tagetdate = $medical_tagetdate->format('Y-m-d H:i:s');
        //$medical->categorySubject = $request->categorySubject;
        $medical->save();
        Session::flash('success', '의료비가 저장되었습니다.'); //put은 영구적
        return redirect()->route('medicals.index');*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *  0 = {array} [4]
            select = ""
            tiDate = "2017-11-21"
            tiHsptName = "하나병원"
            tiAmt = "2345"
        1 = {array} [4]
            select = ""
            tiDate = "2017-05-01"
            tiHsptName = "System Architect"
            tiAmt = "5545"
         *
     */
    public function store(Request $request)
    {
        $p = $request->all();
        $oo = $p['medicalList'];
        $medicalList = json_decode ($oo, true);
        $medicalTargetYeaer = $p['targetYear'].'-'.$p['targetMonth'];

        $medical = new medical();
        $medical->pernr = 12313;
        $medical->tagetdate = date_create($medicalTargetYeaer.'-01')->format('Y-m-d H:i:s');
//        $medical->tagetdate = $medical_tagetdate->format('Y-m-d H:i:s'); //date는 디버깅에서만 됨
        $medical->categorySubject = $p['categorySubject'];
        $medical->save();


/*        $arTest = array(
            array("amount"=>"3000"),
            array("amount"=>"4000")
        );*/
        foreach ($medicalList as $row) {
            $medical->medicaldetail()->create($row);
        }

/*        $medical->medicaldetail()->create([
            "amount"=>"3000"
        ]);*/
        Session::flash('success', '의료비가 저장되었습니다.'); //put은 영구적
        return redirect()->route('medicals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function show(medical $medical)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function edit(medical $medical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medical $medical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function destroy(medical $medical)
    {
        //
    }
}
