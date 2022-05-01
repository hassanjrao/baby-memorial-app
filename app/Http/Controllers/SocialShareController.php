<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Share;
class SocialShareController extends Controller
{
    public function index()
    {
        $socialShare = Share::page(
            'sharelink.com',
            'Baby Page title',
        )
        ->facebook()
        ->twitter()->getRawLinks();
        dd($socialShare);
        // return view('baby', compact('shareComponent'));
    }
    
}