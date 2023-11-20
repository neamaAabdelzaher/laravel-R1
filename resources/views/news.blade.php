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
      <th class="bg-primary" scope="col">Title</th>
      <th  class ="bg-secondary" scope="col">Content</th>
      <th  class="bg-primary" scope="col">Author</th>
      <th class ="bg-secondary" scope="col">Is Published ?</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($news as $news)
    <tr>
   
      <td>{{ $news->title }}</td>
      <td>{{ $news->content }}</td>
      <td>{{ $news->author }}</td>
      <td>{{ $news->published  }}</td>
   
    </tr>
    @endforeach
  </tbody>
</table>


</div>


</body>
</html>


