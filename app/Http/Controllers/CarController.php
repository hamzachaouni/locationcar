<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CarResource;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return CarResource::collection($cars);
    }

    public function cars_paginate_top()
    {
        $cars_top = DB::table('cars')->paginate(2);
        return new CarResource($cars_top);
    }

    public function cars_paginate_bottom()
    {
        $cars_bottom = DB::table('cars')->orderBy('id', 'desc')->paginate(5);
        return new CarResource($cars_bottom);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = Car::create([
            'name' => $request->name,
            'photo' => time().'.'.$request->image->getClientOriginalExtension(),
            'slug' => Str::slug($request->name, '-'),
            'price'  => $request->price,
            'places' => $request->places,
            'suitcase' => $request->suitcase,
            'portes' => $request->portes,
            'automatique' => $request->automatique, 
            'audio_input' => $request->audio_input, 
            'bluetouth' => $request->bluetouth, 
            'heatedseats' => $request->heatedseats, 
            'air_conditioner' => $request->air_conditioner, 
            'allwheeldrive' => $request->allwheeldrive, 
            'usb_input' => $request->usb_input, 
            'fm_radio' => $request->fm_radio,
            'date_entry' => $request->date_entry,
            'consumption_ratio' => $request->consumption_ratio, 
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        
        return response()->json(['success'=>'You have successfully upload image.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($car)
    {
        return new CarResource(Car::where('slug', $car)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->update([
            'name' => $request->name,
            'photo'  => time().'.'.$request->image->getClientOriginalExtension(),
            'slug' => Str::slug($request->name, '-'),
            'price'  => $request->price,
            'places' => $request->places,
            'suitcase' => $request->suitcase,
            'portes' => $request->portes,
            'automatique' => $request->automatique, 
            'audio_input' => $request->audio_input, 
            'bluetouth' => $request->bluetouth, 
            'heatedseats' => $request->heatedseats, 
            'air_conditioner' => $request->air_conditioner, 
            'allwheeldrive' => $request->allwheeldrive, 
            'usb_input' => $request->usb_input, 
            'fm_radio' => $request->fm_radio,
            'date_entry' => $request->date_entry,
            'consumption_ratio' => $request->consumption_ratio,
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        

        return response('updated', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response('deleted', 204);
    }
}
