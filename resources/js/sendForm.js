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
