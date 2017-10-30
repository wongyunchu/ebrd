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
     */
    public function store(Request $request)
    {
        $medical = new medical();
        $medical->pernr = 12313;
        //$medical->tagetdate = $request->targetYear.$request->targetMonth;
        $medicalTargetYeaer = $request->targetYear.'-'.$request->targetMonth;
        $medical_tagetdate = date_create($medicalTargetYeaer.'-01');
        //$medical_tagetdate = date_create('2010-10-01');

        $medical->tagetdate = $medical_tagetdate->format('Y-m-d H:i:s'); //date는 디버깅에서만 됨
        $medical->categorySubject = $request->categorySubject;
        $medical->save();
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
