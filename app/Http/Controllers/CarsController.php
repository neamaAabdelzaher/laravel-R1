<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    private $columns=['carTitle','price','description','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view("cars", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("add-car");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $cars= new Car();
       $cars->carTitle=$request->carTitle;
       $cars->price=$request->price;
      $cars->description=$request->description;
      $request->published?$cars->published=1:$cars->published=0;
      $cars->save();
       return "data added successfully";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $car= Car::findOrFail($id);
       return view("single-car", compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car= Car::findOrFail($id);
        return view("update-car", compact("car"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);   
        $data['published'] = $request->has('published'); 
        Car::where('id', $id)->update($data);   
        // return "data updated successfully";

        return redirect ('cars');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::findOrFail($id)->delete();

        return redirect('cars');
    }
}
