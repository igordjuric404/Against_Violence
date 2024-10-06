@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Kako prijaviti nasilje policiji u Srbiji</h1>
    <p>
        Ako ste žrtva nasilja ili znate nekoga ko je žrtva nasilja, prijavljivanje policiji može biti prvi korak ka zaštiti. 
        Evo kako možete prijaviti nasilje policiji u Srbiji:
    </p>
    <div class="steps">
        <h2>Koraci za prijavu nasilja</h2>
        <ol>
            <li>Pozovite broj <strong>192</strong> koji je broj za hitne slučajeve.</li>
            <li>Objasnite situaciju kratko i jasno, navedite tačnu lokaciju i prirodu incidenta.</li>
            <li>Pružite informacije o počiniocu, ako su vam poznate, uključujući ime, izgled i bilo koje druge relevantne podatke.</li>
            <li>Ostanite na liniji dok policija ne stigne ili dok ne dobijete dalja uputstva od operatera.</li>
        </ol>
    </div>
    <div class="additional-info">
        <h2>Prijava u policijskoj stanici</h2>
        <p>
            Pored poziva, nasilje možete prijaviti i lično odlaskom u najbližu policijsku stanicu. Prilikom prijave ponesite sve 
            relevantne dokaze kao što su fotografije, video zapisi ili medicinska dokumentacija.
        </p>
    </div>
    <div class="important-note">
        <h2>Važna napomena</h2>
        <p>
            Važno je da znate da su sve prijave nasilja shvaćene ozbiljno i da će policija preduzeti sve potrebne mere da zaštiti žrtvu.
        </p>
    </div>
</div>
<style>
.content {
    padding: 2em;
    background-color: #ffffff;
    border-radius: 5px;
    max-width: 800px;
    margin: 2em auto;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border: 2px solid #a5596a; /* Dodan border */
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

.content h1 {
    color: #a5596a;
    text-align: center;
    margin-bottom: 1em;
}

.steps, .additional-info, .important-note {
    margin-bottom: 2em;
}

.steps h2, .additional-info h2, .important-note h2 {
    color: #a5596a;
    margin-bottom: 0.5em;
    border-bottom: 2px solid #a5596a;
    padding-bottom: 0.2em;
}

.steps ol {
    list-style: decimal inside;
    margin: 1em 0;
    padding-left: 1em;
}

.steps ol li {
    margin-bottom: 0.5em;
}

.additional-info p, .important-note p {
    margin: 0.5em 0;
}

strong {
    color: #a5596a;
}

</style>
@endsection