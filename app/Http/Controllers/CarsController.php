<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

class CarsController extends Controller
{
    use Common;
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
        $messages=[
            'carTitle.required'=>'title is required',
            'carTitle.max'=>'title should be less than 50 letter',
            'price.required'=>'price is required',
            'description.required'=>'description is required',
            'description.lowercase'=>'description should be lowercase',
            'description.min'=>'description should not be  less than 20 letter',
            'image.required'=>'choose image',
            'image.mimes'=>'image extension must be png,jpg or jpeg ',
            'image.max'=>'image max size 2GB',


        ];
      
      $data= $request->validate([
       "carTitle"=> 'required|max:50',
       'price'=> 'required',
       'description'=> 'required|min:20|lowercase',
       'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ],$messages);
        $fileName=$this->uploadFile($request->image , 'assets/images');
        $data['image']=$fileName;
        $data['published'] = isset($request['published']);
        Car::create($data); 
        return redirect('cars');

    //    $cars= new Car();
    //    $cars->carTitle=$request->carTitle;
    //    $cars->price=$request->price;
    //   $cars->description=$request->description;
    //   $request->published?$cars->published=1:$cars->published=0;
    //   $cars->save();
    //    return "data added successfully";

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
    {// update  with validation 
        // task 8
     $updateMessages=[
            'carTitle.required'=>'title is required',
            'carTitle.max'=>'title should be less than 50 letter',
            'price.required'=>'price is required',
            'description.required'=>'description is required',
            'description.lowercase'=>'description should be lowercase',
            'description.min'=>'description should not be less than 20 letter',
            // 'image.required'=>'choose image',
            'image.mimes'=>'image extension must be png,jpg or jpeg ',
            'image.max'=>'image max size 2GB',
        ];
      $data= $request->validate([
       "carTitle"=> 'required|max:50',
       'price'=> 'required',
       'description'=> 'required|min:20|lowercase',
       'image' => 'mimes:png,jpg,jpeg|max:2048',
        ],$updateMessages);

        $image = $request->file('image');
        // if image is selected ,it will be moved to destination path and stored at DB
        if($image)
        
        {
        $destinationPath='assets/images';
        $fileName=$this->uploadFile($image ,$destinationPath);
        $data['image']="$fileName";

        }
        // if not selected --> store the old image 
        else{
        $car= Car::findOrFail($id);
        $data['image']=$car->image;
           
        }
      
        $data['published'] = isset($request['published']);
        Car::where('id', $id)->update($data);   
        return redirect('cars');

        ///// update first method /////
        // $data = $request->only($this->columns);   
        // $data['published'] = $request->has('published'); 
        // Car::where('id', $id)->update($data);   
        // // return "data updated successfully";

        // return redirect ('cars');
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
