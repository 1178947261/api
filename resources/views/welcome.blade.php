<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<input type="button" onclick="acc()" id="loginButton">
<script>
    function acc() {

        $.ajax({
            type: 'post',
            url: 'http://127.0.0.1:8000/oauth/token',
            dataType: 'json',
            data: {
                'grant_type': 'password',
                'client_id': '3',
                'client_secret': '2frVUzggztZebhNxlJyD5CWOZcXXjpQ9c6EUEgZ4',
                'username': 'admin',
                'password': 'admin',
                'scope': ''
            },
            success: function (data) {
                console.log(data);
                alert(JSON.stringify(data));
            },
            error: function (err) {
                console.log(err);
                alert('statusCode:' + err.status + '\n' + 'statusText:' + err.statusText + '\n' + 'description:\n' + JSON.stringify(err.responseJSON));
            }
        });

    }
</script>
</body>

</html>
