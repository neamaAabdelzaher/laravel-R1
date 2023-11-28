<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;

class ExampleController extends Controller
{
    public function addCarForm(){
        return view("addCar");
       }

    public function storeData(Request $request){
  $car = new Car;
  $car->carTitle=$request->title;
  $car->price=$request->price;
  $car->description=$request->description;
  $published=$request->is_published;
    if ($published) {
     $car->published = 1;
} else {
    $car->published= 0;
}
 
  $car->save();
  return redirect('carDetails');
 

    }  

    public function showData(){
      $cars= Car::all();
      return view("carDetails",compact('cars'));
     }
}
