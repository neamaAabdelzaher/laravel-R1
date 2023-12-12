<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Traits\Common;
use App\Models\Place;

class placesController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get place data using query builder
        // $places = DB::table("places")->get();
        $places = DB::table("places")->paginate(2);
        // dd($places);

        return view("place", ["places"=> $places]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add-place");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // task 9
        //validation
        $messages=$this->validationMessages();
         $placeData=$request->validate([
        "title"=> "required|max:20",
        "description"=> "required|min:50",
        "priceFrom"=> "required",
        "priceTo"=> "required",
        "image"=> "required|mimes:png,jpg,jpeg|max:2048",
         ],$messages);

        //  upload image 
        $image=$request->image;
        $destinationPath='assets/images';
        $placeImage=$this->uploadFile($image,$destinationPath);
        $placeData['image']=$placeImage;
        // store data using query builder
        DB::table('places')->insert($placeData);
        return "data added ";


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Place::findOrFail($id)->delete();

        return redirect('places-dashboard');
    }

    public function validationMessages(){

        return [
            "title.required"=> "place title is required",
            "title.max"=> "write title less than 20 letters",
            "description.required"=> " place description is required",
            "description.min"=> " description is short! , write 40 letters at least ",
             "priceForm.required"=> "price from is required",
             "priceTo.required"=> "price to is required",
             'image.required'=>'choose image',
             'image.mimes'=>'image extension must be png,jpg or jpeg ',
             'image.max'=>'image max size 2GB',

        ];
    }

    public function placesDashboard(){
           $places = DB::table("places")->get();
           return view("places-dashboard", compact("places"));
    }
}
