<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cars Details</h2>
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th >Description</th>
        <th>Price</th>
        <th>Image</th>
        <th >Published</th>
         <th >Show</th>
         <th >Edit</th> 
        <th >Delete</th> 
      </tr>
    </thead>
    <tbody>
        
        @foreach ($cars as $car)
      <tr>
        <td>{{$car->carTitle}}</td>
        <td>{{$car->description}}</td>
        <td>{{$car->price}}</td>
        <td><img src="/assets/images/{{$car['image']}}" alt="carImage"  height="50"width ="50"> </td>
        @if( $car->published === 1)
        <td > Yes ✅</td>
        @else
        <td > No ❌ </td>

        @endif
        <td><a href="single-car/{{$car->id}}">Show</a></td>
        <td><a href="edit-car/{{$car->id}}">Edit</a></td>
        <!-- <td><a href="delete-car/{{$car->id}}">Delete</a></td> -->
        <!-- anthor way to delete  -->
        <td>
<form action="{{ route('delete-car') }}" method="post">
@csrf
@method('DELETE')
<input type="hidden" name="id" value="{{ $car->id }}">
<input type="submit" value="delete">
</form>
</td>

      </tr>
      @endforeach
      
      
    </tbody>
  </table>
</div>

</body>
</html>
