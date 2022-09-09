<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../">
    <title>Puslapis nerastas</title>
    <style>
    body {
        margin: 0;
        padding: 0;
    }
        .root{
            margin: 0;
            padding: 0;
            font-family: "montserrat",sans-serif;
            min-height: 100vh;
            background-image: linear-gradient(45deg, #2e3192,#1bffff);
            font-size: 16px;;

        }

        .container{
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: #343434
        }

        .container h1{
            font-size: 160px;
            margin: 0;
            font-weight: 900;
            letter-spacing: 20px;
            background: url(../../assets/bg2a.jpg) center no-repeat;
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
        }

        .btnClose {
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            background-color: #fa1918;
            padding: 1% 3%;
            border-radius: 20px;
            font-size: 14px;
            margin-top: 15px;
            max-width: 380px;
        }

        .container h2{
            display: block;
            font-size: 1.5em;
            font-weight: bold;

        }
        .btnClose:hover{
            background-color: #45145a;
            text-shadow: -5px 5px 20px -5px #010101 ;
            max-width: 380px;
        }

    </style>
</head>
<body>

<div class="root">
    <div class="container">
        <h2>Upsss! Puslapis nerastas.</h2>
        <h1>404</h1>
        <p>Ieškomo puslapio nėra.</p>

        <button class="btnClose" onclick="window.location='{{ url("/") }}'">
            Pereiti į pagrindinį puslapį
        </button>
    </div>
</div>


</body>
</html>

