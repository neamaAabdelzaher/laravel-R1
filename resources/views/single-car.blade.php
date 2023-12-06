<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>news Details</title>
</head>
<body>
 
<div class="container m-5">
    
<div class="card" style="width: 18rem;">
 <img src="/assets/images/{{$car['image']}}" class="card-img-top" alt="..."> 
  <div class="card-body">
    Title:<h5 class="card-title text-primary"> {{ $car->carTitle}}</h5>
   Description: <p class="card-text">{{ $car->description}}</p>
  Price: <p>{{ $car->price }}</p>
   Is_Published: <p>{{$car->published ?"published":"not published"}}</p> 
  </div>
</div>
</div>
    
    
    
    
</body>
</html>