@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Kako prijaviti nasilje tužiocu u Srbiji</h1>
    <p>
        Ako ste žrtva nasilja ili znate nekoga ko je žrtva nasilja, prijavljivanje tužiocu može biti ključan korak ka pravnoj zaštiti i pokretanju krivičnog postupka. 
        Evo kako možete prijaviti nasilje tužiocu u Srbiji:
    </p>
    <div class="steps">
        <h2>Koraci za prijavu nasilja</h2>
        <ol>
            <li>Posetite najbliže javno tužilaštvo ili sud.</li>
            <li>Objasnite tužiocu situaciju i prirodu incidenta, uključujući sve relevantne detalje.</li>
            <li>Pružite informacije o počiniocu, ako su vam poznate, uključujući ime, izgled i bilo koje druge relevantne podatke.</li>
            <li>Ponesite sve relevantne dokaze kao što su fotografije, video zapisi ili medicinska dokumentacija.</li>
            <li>Tužioc će vam objasniti sledeće korake u postupku i može pokrenuti istragu.</li>
        </ol>
    </div>
    <div class="additional-info">
        <h2>Prijava putem telefona</h2>
        <p>
            Nasilje možete prijaviti i putem telefona pozivanjem broja najbližeg javnog tužilaštva. Informacije o brojevima telefona možete naći na zvaničnoj internet stranici vašeg lokalnog tužilaštva.
        </p>
    </div>
    <div class="important-note">
        <h2>Važna napomena</h2>
        <p>
            Važno je da znate da su sve prijave nasilja shvaćene ozbiljno i da će tužilaštvo preduzeti sve potrebne mere da zaštiti žrtvu i pokrene odgovarajući pravni postupak.
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
    border: 2px solid #a5596a; /* Border za .content */
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
