<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Text2bin;

class Text2binController extends Controller
{


    /*
    * @var Text2bin
    */
    private $text2bin;

    public function __construct(TExt2bin $text2bin)
    {
        $this->text2bin = $text2bin;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('text2bin.text2bin_create');
    }

    public function show(Request $request)
    {
        $text2bin = $this->text2bin->str2bin($request->nome);
        return view('text2bin.text2bin_create',compact('text2bin'));
    }

}