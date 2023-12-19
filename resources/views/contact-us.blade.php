<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<!-- task 12  -->
<div class="w-50">
    <h1 class="text-primary m-2">Contact Us</h1>
    @if (session('alert'))
    <div class="alert alert-success">{{session('alert')}}</div>

    @endif
<form action="{{route ('send-mail')}}" method="post" class=" border border-secondary p-3" enctype="multipart/form-data" >
@csrf
<div class="form-group">
    <label for="Username">Your Name: </label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-label="Username" aria-describedby="basic-addon1">
    @error('uName')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Your Email: </label>
    <input type="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" name="email">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" class="form-control" value="{{old('subject')}}" name="subject" aria-label="subject" aria-describedby="basic-addon1">
    @error('subject')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Your Message:</label>
    <textarea class="form-control"  name="message" id="exampleFormControlTextarea1" rows="4">{{old('message')}}</textarea>
    @error('message')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <button  type="submit" class="btn btn-primary m-3">Send</button>
  </div>
</form>
</div>
    
</body>
</html>