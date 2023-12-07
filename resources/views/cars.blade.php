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
        
        
        @for($i=0; $i < count($cars); $i++)
        
      <tr>
        <td>{{$cars[$i]->carTitle}}</td>
        <td>{{$cars[$i]->description}}</td>
        <td>{{$cars[$i]->price}}</td>
        <td><img src="{{asset('assets/images/'.$cars[$i]->image)}}" alt="carImage"  height="50"width ="50"> </td>
       
        @if( $cars[$i]->published === 1)
        <td > Yes ✅</td>
        @else
        <td > No ❌ </td>

        @endif
        <td><a href="single-car/{{$cars[$i]->id}}">Show</a></td>
        <td><a href="edit-car/{{$cars[$i]->id}}">Edit</a></td>
        <!-- <td><a href="delete-car/{{$cars[$i]->id}}">Delete</a></td> -->
        <!-- anthor way to delete  -->
        <td>
<form action="{{ route('delete-car') }}" method="post">
@csrf
@method('DELETE')
<input type="hidden" name="id" value="{{ $cars[$i]->id }}">
<input type="submit" value="delete">
</form>
</td>

      </tr>
     
      @endfor
      
    </tbody>
  </table>
</div>

</body>
</html>
