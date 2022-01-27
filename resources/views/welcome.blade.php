<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script> src='/resources/js/sendForm' </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container"
     style=" position: absolute; width: 300px; height: 200px;  z-index: 15;  top: 50%;  left: 50%;  margin: -100px 0 0 -150px;">
    <form method="POST" name="formLink" id="formLink">
        @csrf
        <div class="form-group">
            <label for="link">Link for shortening</label>
            <input type="url" class="form-control" id="link" name="link" value='https://www.google.ru/'
                   placeholder="Enter link">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="container"
         style="position: absolute; width: 300px; height: 200px;  z-index: 15;  top: 70%;  left: 50%;  margin: -100px 0 0 -150px;">
        <form>
            <div class="form-group">
                <a href="{{ session()->get('success') }}">{{  session()->get('success') }}</a>
            </div>
        </form>
    </div>
@endif


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
