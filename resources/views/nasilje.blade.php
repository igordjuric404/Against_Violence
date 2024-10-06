@extends('layouts.public')

@section('content')
<div class="content">
    <h1>Kako prepoznati nasilje u vezi</h1>
    <p>
        Ako osećate strah od svog partnera zbog sitnih nesuglasica ili se stalno brinete da ćete ga naljutiti, to može biti znak nasilne veze. Nasilnici često kontroliraju svoje partnere, čineći ih nesigurnima, izolovanima i zavisnima.
    </p>
    <p>
        Nije uvek lako prepoznati nasilje, naročito ako partner nije bio nasilan na početku veze. Verbalno i emotivno nasilje često prethode fizičkom nasilju, uključujući vređanje, ponižavanje i izolaciju od prijatelja i porodice.
    </p>
    <p>
        Tokom života, žene mogu iskusiti različite vrste nasilja. Fizičko nasilje obično nastupa kada nasilnik oseti da je partnerka izolovana i bez podrške. Znakovi nasilja uključuju ljubomoru, posesivnost, omalovažavanje, pretnje i različite vrste nasilja - fizičko, psihološko, seksualno, ekonomsko, kontrolu i izolaciju.
    </p>
    <p>
        Nasilnici koriste različite taktike manipulacije, često skrivajući svoje ponašanje od drugih i pronalazeći izgovore za nasilje. Čak i kada napuste nasilnika, žene mogu biti izložene daljem nasilju preko zloupotrebe institucija i društvenih mreža.
    </p>
    <div class="important-note">
        <h2>Važno je zapamtiti</h2>
        <p>
            Ne postoje "bolji" ili "gori" oblici nasilja. Za nasilje je odgovoran isključivo nasilnik. Nasilje se vremenom pogoršava, a žrtve postaju sve slabije da mu se odupru. Prepoznavanje znakova nasilja je prvi korak ka zaustavljanju i sprečavanju nasilja.
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
