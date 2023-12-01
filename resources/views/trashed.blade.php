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
        <th >Published</th>
         <th >Restore</th>
        <th >Delete</th> 
      </tr>
    </thead>
    <tbody>
        
        @foreach ($cars as $car)
      <tr>
        <td>{{$car->carTitle}}</td>
        <td>{{$car->description}}</td>
        <td>{{$car->price}}</td>
        @if( $car->published === 1)
        <td > Yes ✅</td>
        @else
        <td > No ❌ </td>

        @endif
        <td><a href="restore-car/{{$car->id}}">Restore</a></td>
       <td><a href="forced-deleted/{{$car->id}}">Delete</a></td>

      </tr>
      @endforeach
      
      
    </tbody>
  </table>
</div>

</body>
</html>
