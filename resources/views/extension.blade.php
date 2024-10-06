@extends('layouts.public')

@section('content')

<div class="container">
    <h1>WhatsApp Sakupljač Dokaza - Uputstvo</h1>
    <p>Dobrodošli u uputstvo za korišćenje ekstenzije WhatsApp Sakupljač Dokaza. Ova ekstenzija vam omogućava da sačuvate i proverite vaše WhatsApp poruke, osiguravajući njihov integritet za buduću referencu ili pravne svrhe.</p>
    
    <h2>Kako Funkcioniše</h2>
    <p>WhatsApp Sakupljač Dokaza ekstenzija ekstrahuje vaše WhatsApp poruke i čuva ih kao fajl. Zatim izračunava jedinstveni "hash" (vrstu digitalnog otiska) za fajl. Ovaj hash se čuva u bazi podataka. Kasnije možete koristiti ovaj hash da proverite da li fajl nije izmenjen.</p>
    <p><strong>Napomena:</strong> Korisnici treba ručno da skroluju kroz chat da učitaju sve poruke koje žele da sačuvaju. Ekstenzija trenutno ne skroluje automatski.</p>

    <h2>Koraci za Korišćenje Ekstenzije</h2>
    <ol>
        <li>
            <strong>Instalirajte Ekstenziju:</strong>
            <p>Preuzmite i instalirajte WhatsApp Sakupljač Dokaza ekstenziju iz Chrome Web Store-a.</p>
        </li>
        <li>
            <strong>Otvorite WhatsApp Web:</strong>
            <p>Idite na <a href="https://web.whatsapp.com" target="_blank">WhatsApp Web</a> i prijavite se koristeći QR kod.</p>
        </li>
        <li>
            <strong>Skrolujte Kroz Vaše Poruke:</strong>
            <p>Ručnim skrolovanjem učitajte sve poruke koje želite da sačuvate. Ekstenzija će sačuvati samo one poruke koje su vidljive na ekranu.</p>
        </li>
        <li>
            <strong>Ekstrahujte i Sačuvajte Poruke:</strong>
            <p>Kliknite na ikonu WhatsApp Sakupljač Dokaza ekstenzije u Chrome alatnoj traci. Zatim kliknite na dugme "Preuzmi i Sačuvaj Poruke".</p>
            <div class="note">
                <p>Ekstenzija će ekstrahovati vidljive poruke, sačuvati ih kao JSON fajl i izračunati hash za fajl. Ovaj hash se šalje na backend server i čuva u bazi podataka.</p>
            </div>
        </li>
        <li>
            <strong>Proverite Validnost Poruka:</strong>
            <p>Ako kasnije želite da proverite integritet sačuvanih poruka, kliknite na dugme "Proveri Validnost Poruka". Otpremite sačuvani JSON fajl, i ekstenzija će proveriti da li je fajl izmenjen upoređivanjem njegovog hash-a sa hash-om u bazi podataka.</p>
            <div class="note">
                <p>Ako fajl nije izmenjen, videćete poruku da je validacija uspešna. U suprotnom, bićete obavešteni da je fajl izmenjen.</p>
            </div>
        </li>
    </ol>

    <h2>Rešavanje Problema</h2>
    <ul>
        <li><strong>Ekstenzija Ne Radi:</strong> Uverite se da ste prijavljeni na WhatsApp Web i da ste skrolovali kroz poruke koje želite da sačuvate.</li>
        <li><strong>Validacija Hash-a Neuspešna:</strong> Proverite da li otpremate ispravan JSON fajl koji je originalno sačuvan pomoću ekstenzije.</li>
        <li><strong>Ostali Problemi:</strong> Ako naiđete na druge probleme, kontaktirajte podršku za dodatnu pomoć.</li>
    </ul>
    
    <p>Hvala vam što koristite WhatsApp Sakupljač Dokaza ekstenziju. Nadamo se da vam ovo uputstvo pomaže da je efikasno koristite.</p>
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
        max-width: 1000px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #a5596a;
    }
    h2 {
        color: #903f5a;
    }
    p {
        margin: 10px 0;
        font-size: 18px;
    }
    ul, ol {
        margin: 20px 0;
        padding: 0 20px;
    }
    li {
        margin-bottom: 10px;
    }
    .note {
        background-color: #ffefc1;
        border-left: 6px solid #ffcd3c;
        padding: 10px;
        margin: 20px 0;
        border-radius: 4px;
    }
</style>

@endsection