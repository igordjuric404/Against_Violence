@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Kako prijaviti nasilje Centru za socijalni rad u Srbiji</h1>
    <p>
        Ako ste žrtva nasilja ili znate nekoga ko je žrtva nasilja, prijavljivanje Centru za socijalni rad može biti ključan korak ka zaštiti i podršci. 
        Evo kako možete prijaviti nasilje Centru za socijalni rad u Srbiji:
    </p>
    <div class="steps">
        <h2>Koraci za prijavu nasilja</h2>
        <ol>
            <li>Posetite najbliži Centar za socijalni rad.</li>
            <li>Razgovarajte sa socijalnim radnikom i objasnite situaciju, uključujući sve relevantne detalje o incidentu.</li>
            <li>Pružite informacije o počiniocu, ako su vam poznate, uključujući ime, izgled i bilo koje druge relevantne podatke.</li>
            <li>Ponesite sve relevantne dokaze kao što su fotografije, video zapisi ili medicinska dokumentacija.</li>
        </ol>
    </div>
    <div class="additional-info">
        <h2>Prijava putem telefona</h2>
        <p>
            Nasilje možete prijaviti i putem telefona pozivanjem broja najbližeg Centra za socijalni rad. Informacije o brojevima telefona možete naći na zvaničnoj internet stranici vašeg lokalnog centra.
        </p>
    </div>
    <div class="important-note">
        <h2>Važna napomena</h2>
        <p>
            Važno je da znate da su sve prijave nasilja shvaćene ozbiljno i da će Centar za socijalni rad preduzeti sve potrebne mere da zaštiti žrtvu.
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
