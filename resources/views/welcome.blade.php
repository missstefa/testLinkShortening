<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        window.onload = function () {
            var form = document.getElementsByName('formLink');

            form.onsubmit = function (e) {
                e.preventDefault();
                var link = document.getElementById("link").value;
                var xhr = new XMLHttpRequest();
                xhr.open("POST", " {{ route('store') }} ", true);
                var body = "link=" + encodeURIComponent(link);

                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token()}}');
                xhr.send(body);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var data = (xhr.responseText);
                        var res = JSON.parse(data);
                        for (prop in res) {
                            var div = document.createElement('div');
                            var p = document.createElement('p');
                            var parentEl = document.getElementById('comments');
                            div.className = 'commentItem';
                            p.innerHTML = res[prop];
                            div.appendChild(p);
                            parentEl.appendChild(div);

                        }
                    }
                }
            }
        }


    </script>

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

@if($shortLink == null)
    <div class="container"
         style="visibility: hidden; position: absolute; width: 300px; height: 200px;  z-index: 15;  top: 70%;  left: 50%;  margin: -100px 0 0 -150px;">
        <form>
            <div class="form-group">
                <a href="{{ $shortLink }}">{{ $shortLink }}</a>
            </div>
        </form>
    </div>
@endif
<div class="container"
     style="position: absolute; width: 300px; height: 200px;  z-index: 15;  top: 70%;  left: 50%;  margin: -100px 0 0 -150px;">
    <form method='POST'>
        <div class="form-group">
            <a href="{{ $shortLink }}">{{ $shortLink }}</a>
        </div>
    </form>
</div>

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