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
  <h2>Add Car</h2>
  <form action="{{route('store-car')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value="{{old('carTitle')}}">
      @error('carTitle')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{old('price')}}">
      @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" rows="5" id="description">{{old('description')}}</textarea>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div> 
      <div class="form-group">
      <label for="description">Upload Image:</label>
        <input type="file" class="form-control" id="image"  name="image">
        @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div>
   <div class="form-group">

   <label for="cat_id">Category Name</label>
    <select name="category_id" id="cat_id" class="form-select" aria-label="Default select example">
  <option disabled selected>Open this select menu</option>
   @foreach($categories as $cat )
  <option value="{{$cat->id}}">{{$cat->categoryName}}</option>


  @endforeach
</select>
   </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" > Published</label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
