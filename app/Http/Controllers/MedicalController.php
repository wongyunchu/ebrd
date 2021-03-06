<?php

namespace App\Http\Controllers;

use App\medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicalController extends Controller
{


    public $_medical;

    public function __construct()
    {
        $this->middleware('auth');
        $this->_medical = new medical();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->_medical->orderByDesc('id')->get();
        
        //한번 불러야 셋팅됨
        foreach ($list as $item) {
            $item->medicaldetail;
        }

        return view('medicine.index')->with("list", $list);
//        return view('posts.index')->with('posts', $posts);
    }

    public function medicalDetails($item=null) {
        $p = null;
        return view('medicine.create')->with('p', $p);
    }

    public function medicalDetailsView(Request $request) {
        $p = $request->all();
        $p = json_decode($p['item']);
        foreach ($p->medicaldetail as $item) {
            $item->select = "";
        }

        return view('medicine.create')->with('p', $p);
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
