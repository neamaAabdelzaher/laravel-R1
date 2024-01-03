<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div>
    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
  </div>
  <h2>{{__('messages.add-car-title')}}</h2>
  <form action="{{route('store-car')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="title">{{__('messages.title')}}</label>
      <input type="text" class="form-control" id="title" placeholder="{{__('messages.title-placeholder')}}" name="carTitle" value="{{old('carTitle')}}">
      @error('carTitle')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
    <div class="form-group">
      <label for="price">{{__('messages.price')}}</label>
      <input type="number" class="form-control" id="price" placeholder="{{__('messages.price-placeholder')}}" name="price" value="{{old('price')}}">
      @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
    <div class="form-group">
        <label for="description">{{__('messages.description')}}</label>
        <textarea class="form-control" name="description" rows="5" id="description">{{old('description')}}</textarea>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div> 
      <div class="form-group">
      <label for="description">{{__('messages.image')}}</label>
        <input type="file" class="form-control" id="image"  name="image">
        @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div>
   <div class="form-group">

   <label for="cat_id">{{__('messages.category')}}</label>
    <select name="category_id" id="cat_id" class="form-select" aria-label="Default select example">
    <option disabled selected >{{__('messages.selectCategory')}}</option>
   @foreach($categories as $cat )
  <option value="{{$cat->id}}">{{$cat->categoryName}}</option>


  @endforeach
</select>
   </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" >{{__('messages.published')}} </label>
    </div>
    <button type="submit" class="btn btn-default">{{__('messages.add-car')}}</button>
  </form>
</div>

</body>
</html>
