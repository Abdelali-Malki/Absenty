<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404</title>
    <style>
        .container{
            position: relative;
            width: 100%;
            height: 100%;
        }
        .container img{
            width: 100%;
            height: 100%;
        }
        .container .btn{
            position: absolute;
            top: 70%;
            left: 53.5%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: black;
            font-size: 16px;
            padding: 10px 50px;
            border: #1b9ad9 solid 4px;
            cursor: pointer;
            border-radius: 20px;
            text-align: center;
        }
        .container .btn:hover{
            background-color: #1b9ad9;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/404.png" alt="404" height="100%" width="100%">
        <a href="{{url('/accueil')}}"><button class="btn">Home</button></a>
    </div>
</body>
</html>