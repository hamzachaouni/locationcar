<?php

namespace App\Http\Controllers;

use App\Ourinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OurinformationResource;

class OurinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $information = Ourinformation::create([
            'address' => $request->address,
            //'slider_img_i' => time().'.'.$request->image->getClientOriginalExtension(),
            'slider_img_ii' => time().'.'.$request->imagei->getClientOriginalExtension(),
            //'slider_img_iii' => time().'.'.$request->imageii->getClientOriginalExtension(),
            'url_facebook'  => $request->url_facebook,
            'url_twitter' => $request->url_twitter,
            'url_instagrame' => $request->url_instagrame,
            'url_maps' => $request->url_maps,
            'email' => $request->email, 
            'about' => $request->about, 
            'telephone' => $request->telephone, 
            'start_work_from' => $request->start_work_from, 
            'end_work_to' => $request->end_work_to,  
        ]);

        

        $imageII = time().'.'.$request->imagei->getClientOriginalExtension();
        $request->imagei->move(public_path('images'), $imageII);

        /*$imageI = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageI);

        $imageIII = time().'.'.$request->imageiii->getClientOriginalExtension();
        $request->imageii->move(public_path('imagesss'), $imageIII);*/

        
        
        
        
        return response()->json(['success'=>'You have successfully upload image.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ourinformation  $ourinformation
     * @return \Illuminate\Http\Response
     */
    public function show(Ourinformation $ourinformation)
    {
        return new OurinformationResource(Ourinformation::where('id', 1)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ourinformation  $ourinformation
     * @return \Illuminate\Http\Response
     */
    public function edit(Ourinformation $ourinformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ourinformation  $ourinformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ourinformation $info)
    {
        //$infos = User::findOrFail($info);
        $info->update([
            'address' => $request->address,
            //'slider_img_i' => time().'.'.$request->image->getClientOriginalExtension(),
            //'slider_img_ii' => time().'.'.$request->imagei->getClientOriginalExtension(),
            //'slider_img_iii' => time().'.'.$request->imageii->getClientOriginalExtension(),
            'url_facebook'  => $request->url_facebook,
            'url_twitter' => $request->url_twitter,
            'url_instagrame' => $request->url_instagrame,
            'url_maps' => $request->url_maps,
            'email' => $request->email, 
            'about' => $request->about, 
            'telephone' => $request->telephone, 
            'start_work_from' => $request->start_work_from, 
            'end_work_to' => $request->end_work_to,
        ]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ourinformation  $ourinformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ourinformation $info)
    {
        $info->delete();
        return response('deleted', 204);
    }
}
