<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Traits\Common;


class ExampleController extends Controller
{
  use Common;
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

     public function showUpload(){
      return view('upload');
     }
     public function upload( Request $request){
      //  dd($request->file('image') );
      $fileName=$this->uploadFile($request->image , 'assets/images');
      
      return $fileName;
      // $file_extension = $request->image->getClientOriginalExtension();
      // $file_name ="img".time() . '.' . $file_extension;
      // $path = 'assets/images';
      // $request->image->move($path, $file_name);
      // return 'Uploaded';
      // return dd($request->image);

     }


    //  session 9

    // public function showPlace(){


    //   return view ('place');
    // }
    public function showBlog(){


      return view ('blog');
    }


    public function mySession(){

      session()->put('test','first laravel session');
        // to end session

       session()->forget('test'); 
      $data=session('test');

      return view('session',compact('data'));
    }
}
