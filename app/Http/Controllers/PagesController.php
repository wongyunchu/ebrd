<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('pages.index');
    }

    public function test()
    {
        return view('pages.test');
    }

    public function getAbout(Request $request){
        $data = $request->session()->all();
        dd($data);

        $first = 'baek';
        $last = 'kwang hyoun';
        $full = $first. " ".$last;

        $email = 'silverjava@naver.com';

        $data['a'] = 'aaaa';
        $data['b'] = 'bbb';
        $data['c'] = 'cccc';

        return view('pages.about')->with('fullname', $full)->with('email', $email)->with('data', $data);
    }

}
