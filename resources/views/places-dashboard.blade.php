<!DOCTYPE html>
<html lang="en">
<head>
  <title>Places Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Places Dashboard</h2>
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th >Created At</th>
         <th >Edit</th> 
        <th >Delete</th> 
      </tr>
    </thead>
    <tbody>
        
        
        @for($i=0; $i < count($places); $i++)
        
      <tr>
        <td>{{$i+1}}</td>
        <td>{{$places[$i]->title}}</td>
        <td>{{$places[$i]->created_at}}</td>
           
        <td><a class="btn btn-primary" href="edit-place/{{$places[$i]->id}}">Edit</a></td>
        <td><a class="btn btn-danger" href="delete-place/{{$places[$i]->id}}">Delete</a></td>
   

</td>

      </tr>
     
      @endfor
      
    </tbody>
  </table>
</div>

</body>
</html>
