<!DOCTYPE html>
<html lang="en">

<head>
  <title>update Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Update Car</h2>
    <form action="{{route('update-car',$car->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" value="{{old('carTitle', $car->carTitle)}} "
          placeholder="Enter title" name="carTitle">
        @error('carTitle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" value="{{old('price' ,$car->price)}}" id="price"
          placeholder="Enter Price" name="price">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" rows="5"
          id="description"> {{old('description',$car->description)}}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="description">Upload Image:</label>
        <input type="file" class="form-control" id="image" name="image">
        <img src="/assets/images/{{$car['image']}}" alt="carImg" width="100" height="100">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="form-group">

        <label for="cat_id">Category Name</label>
       
        <select name="category_id" id="cat_id" class="form-select" aria-label="Default select example">
        <option >{{$car->category->categoryName}} </option>

          @foreach($categories as $cat )
          <option value="{{$car->category->id}}" > {{$cat->categoryName}}
            
          </option>

          @endforeach
        </select>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="published" @checked($car->published)> Published

      </div>
      <button type="submit" class="btn btn-default">Update</button>
    </form>
  </div>

</body>

</html>