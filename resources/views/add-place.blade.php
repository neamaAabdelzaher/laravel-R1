<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Place</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" >
  <h2>Add Place</h2>
  <div>

  <form  action="{{route('store-place')}}" method="post" enctype="multipart/form-data">
  @csrf
  <!-- title  -->
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
      @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
<!-- description -->
<div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" rows="5" id="description">{{old('description')}}</textarea>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div> 
      <!-- price from  -->
    <div class="form-group">
      <label for="price-from">Price From</label>
      <input type="number" class="form-control" id="price-from" placeholder="Enter Price" name="priceFrom" value="{{old('price-from')}}">
      @error('priceFrom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>

        <!-- price to  -->
        <div class="form-group">
      <label for="price-from">Price To</label>
      <input type="number" class="form-control" id="price-to" placeholder="Enter Price" name="priceTo" value="{{old('price-to')}}">
      @error('priceTo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    </div>
   <!-- image -->
      <div class="form-group">
      <label for="description">Upload Image:</label>
        <input type="file" class="form-control" id="image"  name="image">
        @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

      </div>

    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  </div>
</div>

</body>
</html>

</html>