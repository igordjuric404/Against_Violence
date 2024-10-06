@extends('layouts.public')

@section('content')

<div class="container">
    <h1>ICanProve: digitalno potpisani snimci ekrana i dnevnici sesija za pravne dokaze</h1>
    <p>Da biste dokazali da je nešto prikazano na veb stranici, obično pravite snimak ekrana - ali nema načina da dokažete da ga niste sami izmenili. www.icanprove.com deluje kao treća strana koja rešava ovaj problem. Probajte sada!</p>
    
    <h2>Ideja:</h2>
    <p><strong>Pogrešan način:</strong></p>
    <p>Kada sami surfujete i pravite snimke ekrana, postoji mogućnost da ih naknadno izmenite, zbog čega ljudi ne mogu verovati u njihovu autentičnost.</p>
    <p><strong>Pravi način:</strong></p>
    <p>Naš sistem surfuje umesto vas, pravi snimke ekrana i beleži sve aktivnosti. Rezultati su kriptografski potpisani i ne mogu se menjati, što ih čini pouzdanim dokazima.</p>
    
    <h2>Funkcije:</h2>
    <ul>
        <li>Daljinski kontrolisani pregledač za kreiranje snimaka ekrana sa detaljnim beleženjem korisničkih akcija i prenosa podataka.</li>
        <li>Kreiranje dokumenta sa vremenskom oznakom i digitalnim potpisom koji služi kao pouzdan dokaz sadržaja veb stranice.</li>
        <li>Mogućnost selektivnog isključivanja osetljivih informacija i transparentno dekodiranje SSL (https) sesija.</li>
        <li>Podrška za SNI.</li>
        <li>Podrška za LTV i PDF A/1-B standarde.</li>
    </ul>
    
    <h2>Tipični scenariji upotrebe:</h2>
    <ul>
        <li>Dokazivanje da je slika ponuđena pod licencom Creative Commons.</li>
        <li>Pokazivanje profesoru da ste pravilno citirali određenu veb stranicu.</li>
        <li>Dokazivanje vaših postignuća u igri koja ih prikazuje na veb stranici.</li>
        <li>Dokazivanje da je neko napisao nešto neprimereno na društvenoj mreži pre nego što to obriše.</li>
        <li>Dokazivanje tehničkoj podršci veb stranice da se određeni problem može reprodukovati.</li>
        <li>Drugi tipovi prikupljanja dokaza ili generisanja digitalnih zapisa.</li>
    </ul>
    
    <h2>Često postavljana pitanja:</h2>
    <h3>Šta je digitalno potpisan dokument?</h3>
    <p>Digitalno potpisan dokument sadrži dodatne informacije: digitalni potpis. To je matematička konstrukcija koja je čvrsto povezana sa dokumentom i uništava se ako se dokument izmeni.</p>
    
    <h3>Kako prepoznati digitalno potpisane dokumente?</h3>
    <p>Mnogi PDF pregledači, kao što je AdobeReader, verifikuju i prikazuju digitalne potpise. PDF fajl potpisan od strane ICanProve izgleda ovako:</p>
    
    <h3>Da li da verujem ovoj stranici sa mojim lozinkama?</h3>
    <p>Ne treba. Implementirali smo mnoge sigurnosne mehanizme, ali svaka veb stranica može biti hakovana, i vi me ne poznajete. Ako morate da unesete tajne lozinke, promenite ih odmah nakon toga. Nikada ne unosite transakcione kodove.</p>
    
    <h2>Korak po korak uputstvo:</h2>
    <br>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove0.png') }}" alt="">
        <li>Na početnoj stranici sa desne je prikazano kada koristiti ICanProve autentifikaciju kao i kako funkcionise i često postavljana pitanja</li>
        <li>Sa leve strane možete započeti sesiju klikom na dugme "Start a session"</li>
    </div>
    <hr>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove1.png') }}" alt="">
        <li>Na sledećoj stranici sa desne strane je dodatno objasnjeno kako ceo proces ide</li>
        <li>Na levoj strani možete ukucati koji sajt želite da posetite</li>
    </div>
    <hr>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove3.png') }}" alt="">
        <li>Otvoriće se stranica gde se sa leve strane prikazuje izabran sajt dok sa desne strane stoje dodatne opcije kao i informacije o sesiji, npr. broj snimaka ekrana</li>
        <li>Sajtom možete najnormalnije navigirati i u svakom trenutku možete snimiti ekran klikom na dugme "Add Screenshot"</li>
        <li>Kada ste zabeležili sve što ste hteli klikom na dugme "Create Signed Document" kreirate potpisani fajl i bićete preusmereni na sledeću stranicu</li>
    </div>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove5.png') }}" alt="">
        <li>Na ovoj stranici imate opciju da preuzmete Vaš digitalno potpisan PDF fajl kao i da donirate autorima sajta</li>
    </div>
    <hr>
    <div class="mb-4">
        <li>Sledeće 4 slike prikazuju kako preuzeti PDF fajl izgleda. U njemu se nalazi ime sajta kao i datum pristupa, snimci ekrana, detaljne beleške poreta miša i pritiska tastera tastature i na kraju hash podaci za ostale fajlove</li>
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove6.png') }}" alt="">
    </div>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove7.png') }}" alt="">
    </div>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove8.png') }}" alt="">
    </div>
    <div class="mb-4">
        <img class="mb-3" src="{{ asset('img/icanprove/icanprove9.png') }}" alt="">
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
        font-size: 18px;
    }
    .note {
        background-color: #ffefc1;
        border-left: 6px solid #ffcd3c;
        padding: 10px;
        margin: 20px 0;
        border-radius: 4px;
    }

    img{
        width: 100%;
    }
</style>
@endsection