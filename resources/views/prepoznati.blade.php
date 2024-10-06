@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Prepoznaj nasilje</h1>
    <p>
        "Muž je pretio da će se ubiti, ali da će prethodno napisati da sam ja za to kriva."
        Iako postoje različita iskustva nasilja, neka od ponašanja nasilnika mogu se prepoznati u mnogim nasilnim vezama. Prepoznavanje ovih znakova je važno kako bi se nasilje sprečilo i zaustavilo.
    </p>
    
    <div class="section">
        <h2>Verbalno i Emotivno Nasilje</h2>
        <p>
            Konstantno kritikovanje i verbalno zlostavljanje kao što je vikanje, optuživanje, nazivanje pogrdnim imenima, pretenje, ismevanje Vaše inteligencije, izgleda, ponašanja, urušavanje samopouzdanja, govori Vam da ste loša majka, da ste nesposobni, poređenje sa drugima i slična ponašanja.
        </p>
    </div>
    
    <div class="section">
        <h2>Vršenje pritiska i pretnje</h2>
        <ul>
            <li>Zlovolja i mrgođenje</li>
            <li>Prebacivanje da ga ne volite, ako ne radite ono što on želi</li>
            <li>Pretnja da će Vam oduzeti novac</li>
            <li>Ukidanje ili ograničavanje korišćenja telefona i interneta</li>
            <li>Oduzimanje ili uništavanje mobilnog telefona, tableta, laptopa ili kompjutera</li>
            <li>Oduzimanje automobila</li>
            <li>Pretnja da Vam neće dati razvod braka</li>
            <li>Pretnja da će Vam oduzeti ili da nikad nećete videti decu</li>
            <li>Pretnja da će Vas prijaviti policiji, socijalnoj službi ili institucijama za mentalno zdravlje ukoliko se ne priklonite njegovim zahtevima</li>
            <li>Pretnja da ima "veze" u policiji, tužilaštvu, sudu, centru za socijalni rad i drugim institucijama</li>
            <li>Pretnja ili pokušaj samopovređivanja i samoubistva</li>
            <li>Primoravanje da uzimate alkohol, lekove ili drogu</li>
            <li>Pričanje neistina o Vama porodici i prijateljima</li>
            <li>Govori deci da ste loša majka</li>
            <li>Nagovara decu da Vas ne viđaju (ako žive s njim)</li>
            <li>Kada Vam govori da nemate prava da odlučujete i da se pitate o bilo čemu</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Nepoštovanje i bezobzirno ponašanje</h2>
        <ul>
            <li>Ponižavanje i omalovažavanje pred drugim ljudima</li>
            <li>Vređa Vas kao roditelja, pred decom i/ili drugim ljudima</li>
            <li>Većina stvari koje Vi uradite, nije dobra</li>
            <li>Ignoriše Vas, ne sluša šta Vi pričate ili ne odgovara na Vaša pitanja</li>
            <li>Ima vezu sa drugom osobom ili osobama</li>
            <li>Krši obećanja i ne drži se dogovora</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Izolacija</h2>
        <ul>
            <li>Prati, prisluškuje ili blokira pozive na Vašem telefonu</li>
            <li>Zahteva da zatvorite profile na društvenim mrežama (Facebook, Instagram i sl.)</li>
            <li>Govori Vam gde smete, a gde ne smete da idete</li>
            <li>Sprečava Vas da se viđate sa prijateljima i porodicom</li>
            <li>Sprečava Vas da uspostavljate nova prijateljstva</li>
            <li>Zatvara Vas u kuću</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Uznemiravanje i kontrola</h2>
        <ul>
            <li>Prati Vas i stalno proverava</li>
            <li>Optužuje Vas za neverstvo i flertovanje s drugima</li>
            <li>Ne dozvoljava Vam da imate privatnost (pregleda Vašu poštu, kompjuter, telefon, neprestano gleda ko Vas je zvao)</li>
            <li>Čita Vaše imejlove i prati šta radite na društvenim mrežama (Facebook i sl.)</li>
            <li>Prati Vas gde god da krenete i ne dozvoljava Vam da samostalno idete van kuće</li>
            <li>Sramoti Vas i ponižava u javnosti</li>
            <li>Govori Vam i odlučuje šta da kupite i šta da obučete</li>
            <li>Kontroliše šta jedete i koliko jedete</li>
            <li>Kontroliše kako trošite novac</li>
            <li>Traži da mu opravdate svaki trošak</li>
            <li>Traži od Vas da mu se pravdate, da "priznate krivicu", da ste "loša supruga/majka"</li>
            <li>"Drži Vam lekcije" satima, traži da ga pažljivo slušate, ponavljate ono što je rekao</li>
            <li>Uskraćuje Vam pravo na religiju</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Pretnje i zastrašivanja</h2>
        <ul>
            <li>Pravi preteće pokrete i zastrašuje Vas</li>
            <li>Ućutkuje Vas</li>
            <li>Uništava Vaše stvari</li>
            <li>Lomi stvari</li>
            <li>Udara zidove</li>
            <li>Poseduje nož, pištolj ili drugo oružje</li>
            <li>Preti da će ubiti ili povrediti Vas, decu ili druge članove Vaše porodice</li>
            <li>Preti da će povrediti ili ubiti kućne ljubimce</li>
            <li>Preti samoubistvom</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Seksualno nasilje</h2>
        <ul>
            <li>Koristi silu, pretnje ili zastrašivanje da bi Vas primorao na sekusalni odnos</li>
            <li>Primorava Vas i ima seks sa Vama onda kad Vi to ne želite</li>
            <li>Uskraćuje Vam korišćenje kontracepcije</li>
            <li>Primorava Vas na trudnoću</li>
            <li>Primorava Vas na abortus</li>
            <li>Primorava Vas da gledate pornografiju</li>
            <li>Primorava Vas da imate seks sa drugim ljudima</li>
            <li>Primorava Vas na seksualne aktivnosti koje Vi ne želite</li>
            <li>Vrši seksualno nasilje različitim predmetima</li>
            <li>Ponižava Vas i ismeva Vašu seksualnost, ma kog ste seksulanog opredeljenja</li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Poricanje</h2>
        <ul>
            <li>Poricanje da se nasilje dogodilo</li>
            <li>Optužuje Vas da ste ga izazvali ili da je Vaše ponašanje uzrokovalo nasilje</li>
            <li>Govori da ne može da kontroliše ljutnju i bes</li>
            <li>U javnosti je pažljiv i nežan</li>
            <li>Plače i moli Vas za oproštaj</li>
            <li>Govori da se nikad više neće ponoviti</li>
        </ul>
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
    
    .important-note {
        margin-top: 2em;
    }
    
    .important-note h2 {
        color: #a5596a;
        margin-bottom: 0.5em;
        border-bottom: 2px solid #a5596a;
        padding-bottom: 0.2em;
    }
    
    .important-note p {
        margin: 0.5em 0;
    }
    
    strong {
        color: #a5596a;
    }
    </style>

    @endsection