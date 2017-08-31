<?php

namespace App\Http\Controllers;




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

    public function getAbout(){
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
