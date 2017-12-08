<?php

namespace App\Http\Controllers;

//require "../../vendor/autoload.php";
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use silver\config;
use silverUtil\numberUtil;
class TopbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $client = new Client();
            $response = $client->request('POST', config::sapUrl(),
                [
                    'form_params'=>[
                    'SERVER'=> 'STC',
                    'FID' =>'Z_HR_TB01',
                    'import' =>'{"I_PERNR":"2950001"}'
                    ]
                ]
            );
            $res = json_decode($response->getBody(), true);
        }
        catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return view('topbank.index')->with('res', $res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('topbank.create')->with('param', $request->inputData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
