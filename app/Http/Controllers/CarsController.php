<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;

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
    public function store(Request $request): RedirectResponse
    {

        // validate
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        $request->validate([
       "carTitle"=> 'required|string',
       'price'=> 'required',
       'description'=> 'required|string|max:100|lowercase'

        ]);

       
        Car::create($data);  
    //    $cars= new Car();
    //    $cars->carTitle=$request->carTitle;
    //    $cars->price=$request->price;
    //   $cars->description=$request->description;
    //   $request->published?$cars->published=1:$cars->published=0;
    //   $cars->save();
    //    return "data added successfully";
        return redirect('cars');

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
    public function update(Request $request, string $id):RedirectResponse
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
    // public function destroy( string $id):RedirectResponse
    // {
        
    //     Car::findOrFail($id)->delete();

    //     return redirect('cars');
    // }

    // another way to delete car 
    public function destroy(Request $request  ):RedirectResponse
    {
        $id=$request->id;
        
        $car=Car::findOrFail($id);
        $car->where('id',$id)->delete();

        return redirect('cars');
    }

    // restore deleted recorded

    public function trashed(){
       $cars= Car::onlyTrashed()->get();
       return view('trashed', compact('cars'));
    }
    public function restore(string $id) : RedirectResponse
    {
      Car::where('id',$id)->restore();
       return redirect('cars');
    
    }

   public function forcedDeleted(string $id){
    car::where('id', $id)->forceDelete();
    return redirect('cars');

    }



}
