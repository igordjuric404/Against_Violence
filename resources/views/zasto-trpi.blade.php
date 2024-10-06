@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Zašto trpi nasilje?</h1>
    <p>
        Kada čujemo da se neko nalazi u situaciji nasilja, veoma često se pitamo: Zašto ga ne napusti?
    </p>
    <p>
        Nasilje u porodici i partnerskom odnosu obično se dešava po određenom obrascu ponašanja nasilnika koji utiče na žrtvu da ostane u nasilnom odnosu. Žene koje imaju ili su imale iskustvo nasilja prepoznaće ovaj obrazac.
    </p>
    <p>
        Nasilje se dešava u kružnim intervalima u kojima se smenjuju faze rasta tenzije, faza nasilja i faza medenog meseca. Na ovaj način nasilnici nastoje da uspostave kontrolu nad partnerkama i zadrže ih u nasilnoj vezi, ulivajući im osećaj nade da je nasilje privremeno i da će prestati. Vremenom nasilje postaje toliko izraženo da partnerke nisu sposobne da napuste nasilnika zbog mnogih razloga. Iscrpljenost, strah od odmazde, povreda ili ubistva su neki od razloga.
    </p>

    <div class="section">
        <h2>Ciklusi nasilja</h2>
        <h3>Faza rasta tenzije</h3>
        <p>
            U fazi rasta tenzije nasilnik je obično verbalno nasilan, ima izlive ljubomore i agresivan je prema partnerki. Ova faza je veoma zastrašujuća za one koje trpe nasilje. Žene obično pokušavaju da izbegnu sukob i da udovolje nasilniku jer osećaju da ako urade bilo šta pogrešno, on će eksplodirati. U ovoj fazi žene mogu pronalaziti različite izgovore ili razloge koji opravdavaju nasilnikovo ponašanje. Vremenom se trajanje ove faze skraćuje, a period akutnog nasilja povećava.
        </p>

        <h3>Faza akutnog nasilja</h3>
        <p>
            Nasilnik je izuzetno nepredvidljiv i veći deo vremena bez kontrole. Nasilnici veoma često krive svoje partnerke za nasilje. Nasilje ne mora nužno da bude fizičko – može biti verbalno, emocionalno, psihološko, uključujući i poniženja i zastrašivanja. Žene u ovoj fazi mogu trpeti nasilje, prihvatiti ga i umanjivati njegov značaj sebi i drugima.
        </p>

        <h3>Faza medenog meseca ili manipulacija</h3>
        <p>
            Nasilnici se u ovoj fazi obično izvinjavaju, kupuju poklone, pomažu u kućnim poslovima i daju obećanja da se nikad više neće povrediti svoje partnerke. Nasilnici takođe mogu pokušavati da pronađu izgovore za nasilje i da krive žrtvu ("Znaš, iznervira me kad mi govoriš...").
        </p>
        <p>
            Ovo je vrlo zbunjujući period za žene jer s jedne strane se osećaju povređene, a sa druge osećaju olakšanje što je nasilje prestalo. Intimnost među partnerima raste, a nasilje koje se dogodilo se ili poriče ili umanjuje. Žene u ovoj fazi obično osećaju grižu savesti i krivicu zbog pomisli da su htele da napuste nasilnika, nadajući se da će se on zaista promeniti.
        </p>
        <p>
            Vremenom ova faza postaje sve kraća i faza akutnog nasilja postaje sve učestalija ili dominantnija.
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
    border: 2px solid #a5596a;
    font-family: "Josefin Sans", sans-serif;
    line-height: 1.6;
}

.content h1 {
    color: #a5596a;
    text-align: center;
    margin-bottom: 1em;
}

.section {
    margin-bottom: 2em;
}

.section h2 {
    color: #a5596a;
    margin-bottom: 0.5em;
    border-bottom: 2px solid #a5596a;
    padding-bottom: 0.2em;
}

.section h3 {
    color: #a5596a;
    margin-top: 1em;
    margin-bottom: 0.5em;
}

.section p {
    margin: 0.5em 0;
}
</style>
@endsection
