<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use Illuminate\Http\Request;
use Share;
class BabyRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("user.baby-requests.index");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.baby-requests.create");
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
    public function show($id,$firstName)
    {
        $baby=Baby::findorfail($id);
        $next = Baby::where('id', '>', $id)->orderBy('id')->first();
        $previous = Baby::where('id', '<', $id)->orderBy('id','desc')->first();
        
        // SHARING CODE: BEGINS
        $shareLink = url('/').'/baby/'.$baby->id."/".$baby->first_name;
        $babyName = $baby->first_name . ' ' . $baby->middle_name. ' ' . $baby->last_name;
        $socialShare = Share::page(
            'http://127.0.0.1:8001/baby/2/Te',
            $babyName,
            )
            ->facebook()
            ->twitter()->getRawLinks();
        // SHARING CODE: ENDS

        // VIEW COUNT CODE:BEGINS
        Baby::where('id', $id)->increment('view_count', 1);
        // VIEW COUNT CODE:ENDS
        return view("baby",compact("baby","next","previous", "socialShare"));
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
