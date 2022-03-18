<h1>Módosítsd a kívánt adatokat</h1>

<form action="update-dolgozo" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $dolgozo->id }}">
    <p>
        <label for=""> Név: </label>
        <input type="text" name="nev" value="{{ $dolgozo->nev }}">
        <br>
    </p>
    <p>
        <label for=""> Város: </label>
        <input type="text" name="varos" value="{{ $dolgozo->varos }}">
        <br>
    </p>
    <p>
        <label for=""> Születés: </label>
        <input type="text" name="szuletes" value="{{ $dolgozo->szuletes }}">
    </p>
    <p>
        <label for=""> Fizetés: </label>
        <input type="text" name="fizetes" value="{{ $dolgozo->fizetes }}">
    </p>
    <p>
        <button type="submit">Frissítés</button>
    </p>
</form>