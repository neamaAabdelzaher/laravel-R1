<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Trashed News</h2>
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th >Description</th>
        <th>Content</th>
        <th >Author</th>
         <th >Restore</th>
        <th >Delete</th> 
      </tr>
    </thead>
    <tbody>
        
        @foreach ($news as $news)
      <tr>
        <td>{{$news->title}}</td>
        <td>{{$news->content }}</td>
        <td>{{$news->author}}</td>
        <td>{{ $news->published ?"Yes ✅":"No ❌"}}</td>
        <td><a class="btn btn-success" href="restore-news/{{$news->id}}">Restore</a></td>
        <td><a class="btn btn-danger" href="forced-d-news/{{$news->id}}">Delete</a></td>

      </tr>
      @endforeach
      
      
    </tbody>
  </table>
</div>

</body>
</html>
