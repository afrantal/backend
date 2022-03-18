<!DOCTYPE html>
<html lang="hu">
 
<head>
  <title>Dolgozó lista</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

<h1>Töltsd ki a mezőket</h1>

@if( session()->has( "success "))
    <h3>{{ session( "success" ) }}</h3>
@endif

<a href="/home"><button>Főoldal</button></a>

<form class="form-group" action="store" method="post">
@csrf

    <p>
        <label for=""> Név: </label>
        <input type="text" name="nev">
        <br>
    </p>
    <p>
        <label for=""> Város: </label>
        <input type="text" name="varos">
        <br>
    </p>
    <p>
        <label for=""> Születés: </label>
        <input type="text" name="szuletes">
    </p>
    <p>
        <label for=""> Fizetés: </label>
        <input type="text" name="fizetes">
    </p>
    <p>
        <button type="submit">Mentés</button>
    </p>
</form>

</div>
</body>
</html>