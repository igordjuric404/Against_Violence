@extends('layouts.public')

@section('content')
<div class="container">
    <h1>Tehnologija protiv nasilja nad ženama</h1>
    <p>Nasilje nad ženama je ozbiljan problem širom sveta. Milioni žena svakodnevno trpe različite oblike nasilja, uključujući fizičko, psihičko i seksualno nasilje. Ovaj problem utiče na žene svih starosnih doba, rasa, kultura i socioekonomskih statusa. Nasilje ima ozbiljne posledice po zdravlje, mentalno stanje i kvalitet života žena.</p>
    <p>Tehnologija može igrati ključnu ulogu u borbi protiv nasilja nad ženama pružajući alatke za pomoć žrtvama, prikupljanje dokaza i podizanje svesti. Naša digitalna platforma je razvijena kako bi se pomoglo ženama da na adekvatan i temeljan način prijave nasilje, dobiju podršku i zaštitu, i prikupe dokaze o zlostavljanju.</p>
    <p>Tehnologija može pomoći na mnogo načina, uključujući:</p>
    <ul>
        <li>Podizanje svesti i edukacija o problemu nasilja nad ženama, kako bi se stvorila kultura nulte tolerancije prema nasilju.</li>
        <li>Prikupljanje i čuvanje dokaza koji mogu biti korišćeni na sudu kako bi se zlostavljači odgovarali za svoje postupke.</li>
        <li>Pružanje anonimnih kanala komunikacije kako bi se stvorila zajednica koja pomaže i ohrabruje jedni druge.</li>
        <li>Povezivanje žrtava sa organizacijama koje pružaju podršku, omogućavajući im da dobiju potrebnu pomoć i zaštitu.</li>
    </ul>
    <p>Na našoj platformi postoje tri alatke koje smo razvili kako bi pomogli u borbi protiv nasilja nad ženama. Ove alatke koriste internet tehnologije za pružanje podrške žrtvama i osiguranje pravde.</p>

    <div class="section">
        <div class="tool" id="tool1">
            <a href="{{ route('extension') }}">
                <div class="tool-content">
                    <div class="tool-text">
                        <h2>Verifikacija WhatsApp poruka</h2>
                        <p>Ekstenzija za Google Chrome koja ekstrahuje poruke iz WhatsApp četa i generiše njihov hash, osiguravajući da svaka izmena u fajlovima bude primetena.</p>
                    </div>
                    <div class="tool-image">
                        <img src="{{ asset('img/extension.webp') }}" alt="Verifikacija WhatsApp poruka" />
                    </div>
                </div>
            </a>
        </div>

        <div class="tool" id="tool2">
            <a href="{{ route('evidence-file.index') }}">

                <div class="tool-content">
                    <div class="tool-text">
                        <h2>Moj kutak</h2>
                        <p>Digitalni sef koji enkriptuje fajlove koje korisnik unese koristeći enkripcioni ključ koji korisnik generiše.</p>
                    </div>
                    <div class="tool-image">
                        <img src="{{ asset('img/mojkutak.webp') }}" alt="Moj kutak" />
                    </div>
                </div>
            </a>
        </div>

        <div class="tool" id="tool3">
            <a href="{{ route('safe-spots') }}">
                <div class="tool-content">
                    <div class="tool-text">
                        <h2>Sigurna mesta</h2>
                        <p>Mapa svih policijskih stanica i zdravstvenih ustanova u Beogradu koje se mogu koristiti u hitnim slučajevima.</p>
                    </div>
                    <div class="tool-image">
                        <img src="{{ asset('img/sigurnamesta.webp') }}" alt="Sigurna mesta" />
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }
    .container {
        max-width: 1200px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
    }
    h1 {
        color: #a5596a;
        font-size: 28px;
    }
    h2 {
        color: #903f5a;
        font-size: 22px;
    }
    p {
        margin: 10px 0;
        font-size: 20px;
    }
    ul {
        margin: 10px 0;
        padding-left: 20px;
    }
    .section {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        gap: 10px;
    }
    .tool {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 60%;
        text-align: center;
    }
    .tool-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .tool-text {
        width: 70%;
        padding: 10px;

    }
    .tool-image {
        width: 30%;
        text-align: right;
    }
    .tool-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .tool h2 {
        color: #903f5a;
    }
    .tool p {
        color: #555;
    }
    a:hover{
        text-decoration: none;
    }
</style>
@endsection
