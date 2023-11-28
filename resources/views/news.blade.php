<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>News</title>
</head>


<body>
<div class="container mt-5">
<table class="table">
  <thead>
    <tr >
      <th  scope="col">Title</th>
      <th   scope="col">Content</th>
      <th  scope="col">Author</th>
      <th  scope="col">Is Published ?</th>
      <th  scope="col">Show</th>
      <th  scope="col">Edit</th>
      <th  scope="col">Delete</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach ($news as $news)
    <tr>
   
      <td>{{ $news->title }}</td>
      <td>{{ $news->content }}</td>
      <td>{{ $news->author }}</td>
      <td>{{ $news->published ?"Yes ✅":"No ❌"}}</td>
      <td><a class="btn btn-primary" href="show-news/{{$news->id}}">Show </a></td>
      <td><a class="btn btn-success" href="edit-news/{{$news->id}}">Edit </a></td>
      <td><a class="btn btn-danger" href="delete-news/{{$news->id}}">Delete </a></td>
    
   
    </tr>
    @endforeach
  </tbody>
</table>


</div>


</body>
</html>


