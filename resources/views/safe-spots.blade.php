@extends('layouts.public')

@section('content')
<head>
  <title>Distance Calculator</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"
  />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
</head>

<div class="wrapper">
  <h1>Sigurna mesta za žene</h1>
  <div class="address-search">
    <label for="address">Vaša adresa:</label>
    <input type="text" id="address" />
    <button onclick="findNearestAndPlotRoute()">
      Pronađi najbliže sigurno mesto
    </button>
  </div>
  <div class="checkboxes">
    <p>Izaberite vrstu ustanove:</p>
    <input type="checkbox" id="policijaCheckbox" onchange="filterWaypoints()" checked/>
    <label for="policijaCheckbox">Policijska stanica</label>
    <input type="checkbox" id="medicinaCheckbox" onchange="filterWaypoints()" checked/>
    <label for="medicinaCheckbox">Medicinske ustanove</label>
  </div>
  <div id="mapid"></div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>


<script>
  var mymap;
  var userLocationMarker = null; // Marker za trenutnu lokaciju korisnika
  var routingControl = null; // Kontrola za iscrtavanje rute
  var waypointMarkers = []; // Array to keep track of waypoint markers
  

  var waypoints = [
    { name: "Uprava za strance", address: "Bulevar Mihajla Pupina 2, Beograd", phone: "3062-000", type: "policija" },
    { name: "Uprava Saobraćajne policije", address: "Ljermontovljeva 12a, Beograd", phone: "7452-645", type: "policija" },
    { name: "Uprava za vanredne situacije u Beogradu", address: "Mije Kovačevića 2-4, Beograd", phone: "193", type: "policija" },
    { name: "Policijska uprava", address: "Bulevar despota Stefana 107, Beograd", phone: "2798-101", type: "policija" },
    { name: "MUP Čukarica", address: "Lješka 17, Beograd", phone: "7452-545", type: "policija" },
    { name: "MUP Novi Beograd", address: "Bulevar Mihajla Pupina 165, Beograd", phone: "3008-140", type: "policija" },
    { name: "MUP Palilula", address: "Mije Kovačevića 15, Beograd", phone: "2751-630", type: "policija" },
    { name: "MUP Rakovica", address: "Patrijarha Joanikija 30, Beograd", phone: "2814-005", type: "policija" },
    { name: "MUP Savski venac", address: "Savska 35, Beograd", phone: "7452-245", type: "policija" },
    { name: "MUP Stari grad", address: "Majke Jevrosime 33, Beograd", phone: "3239-731", type: "policija" },
    { name: "MUP Voždovac", address: "Stefana Prvovenčanog 1, Beograd", phone: "2453-656", type: "policija" },
    { name: "MUP Vračar", address: "Radoslava Grujića 14, Beograd", phone: "3440-643", type: "policija" },
    { name: "MUP Zemun", address: "Veliki trg 2, Beograd", phone: "2811-011", type: "policija" },
    { name: "MUP Zvezdara", address: "Milana Rakića 50a, Beograd", phone: "2403-527", type: "policija" },
    { name: "MUP Lazarevac", address: "Branka Radičevića 1, Beograd", phone: "8123-458", type: "policija" },
    { name: "MUP Mladenovac", address: "Vojvode Putnika 2, Beograd", phone: "8233-295", type: "policija" },
    { name: "MUP Obrenovac", address: "Karađorđeva 5, Beograd", phone: "8723-948", type: "policija" },
    { name: "MUP Surčin", address: "Vojvođanska 86, Beograd", phone: "8440-346", type: "policija" },
    { name: "MUP Barajevo", address: "Miodraga Vukovića 14, Beograd", phone: "2816-003", type: "policija" },
    { name: "MUP Grocka", address: "Hajduk Veljkova 22, Beograd", phone: "2819-001", type: "policija" },
    { name: "MUP Sopot", address: "Rada Jovanovića 2, Beograd", phone: "8251-039", type: "policija" },
    { name: "MUP Beli potok", address: "Bulevar JNA 38, Beograd", phone: "2813-001", type: "policija" },
    { name: "MUP Vrčin", address: "Save Kovačevića 4b, Beograd", phone: "8054-422", type: "policija" },
    { name: "MUP Mirijevo", address: "Samjuela Beketa bb, Beograd", phone: "3430-411", type: "policija" },
    { name: "MUP Batajnica", address: "Pukovnika Milenka Pavlovića 7, Beograd", phone: "8480-322", type: "policija" },
    { name: "MUP Barič", address: "Obrenovački put bb, Beograd", phone: "8700-047", type: "policija" },
    { name: "MUP Borča", address: "Ivana Milutinovića 12d, Beograd", phone: "2818-001", type: "policija" },
    { name: "MUP Resnik", address: "Trinaestog oktobra, Beograd", phone: "2798-101 lok. 4506", type: "policija" },
    { name: "MUP Ralja", address: "Šumadijska 8, Beograd", phone: "8257-092", type: "policija" },
    { name: "MUP Železnik", address: "Darinke Radović 27a, Beograd", phone: "2570-096", type: "policija" },
    { name: "MUP Sremčica", address: "Beogradska 157, Beograd", phone: "2526-247", type: "policija" },
    { name: "Policijska stanica Aerodrom 'Nikola Tesla'", address: "Aerodrom Beograd 59, Beograd", phone: "2286-000", type: "policija" },
    { name: "Policijska stanica Železnička stanica Beograd", address: "Savski trg 2, Beograd", phone: "2645-764", type: "policija" },
    { name: "Policijska stanica Rečna policija", address: "Pristanište Beograd, Beograd", phone: "3002-003", type: "policija" },
    { name: "Dom zdravlja Barajevo", address: "Svetosavska 91, Barajevo, Beograd", phone: "011/8300-186", type: "medicina" },
    { name: "Dom zdravlja 'Vozdovac' Beograd", address: "Ustanicka 16, Beograd", phone: "011/3080-520", type: "medicina" },
    { name: "Dom zdravlja Vracar", address: "Bojanska 16, Beograd", phone: "011/3402-522", type: "medicina" },
    { name: "Dom zdravlja Grocka", address: "Srpsko-grckog prijateljstva 17, 11306 Grocka, Beograd", phone: "011/8501-661", type: "medicina" },
    { name: "Dom zdravlja Zvezdara", address: "Olge Jovanovic 11, Beograd", phone: "011/3041-400", type: "medicina" },
    { name: "Dom zdravlja Zemun", address: "Rade Koncara 46, Zemun, Beograd", phone: "011/2195-422", type: "medicina" },
    { name: "Dom zdravlja Lazarevac", address: "Dr Djordja Kovacevica 27, 11550 Lazarevac, Beograd", phone: "011/8123-141", type: "medicina" },
    { name: "Dom zdravlja Mladenovac", address: "Kraljice Marije 15, 11400 Mladenovac, Beograd", phone: "011/8231-980", type: "medicina" },
    { name: "Dom zdravlja Obrenovac", address: "Vojvode Misica 231, 11500 Obrenovac, Beograd", phone: "011/3534900", type: "medicina" },
    { name: "Dom zdravlja 'Novi Beograd'", address: "Goce Delceva 30, Beograd", phone: "011/2222-100", type: "medicina" },
    { name: "Dom zdravlja 'Dr Milutin Ivkovic' - Palilula", address: "Kneza Danila 16, Beograd", phone: "011/3224-321", type: "medicina" },
    { name: "Dom zdravlja Rakovica", address: "Kraljice Jelene 22, Beograd", phone: "011/3054-401", type: "medicina" },
    { name: "Dom zdravlja Savski Venac", address: "Pasterova 1, Beograd", phone: "011/2068-800", type: "medicina" },
    { name: "Dom zdravlja Sopot", address: "Jelice Milovanovic 12, Sopot, Beograd", phone: "011/8251-288", type: "medicina" },
    { name: "Dom zdravlja 'Stari grad'", address: "Simina 27, Beograd", phone: "011/3215-600", type: "medicina" },
    { name: "Dom zdravlja Dr Simo Milosevic", address: "Pozeska 82, Beograd", phone: "011/3538-300", type: "medicina" },
    { name: "Apoteka Beograd", address: "Bojanska 16/IV, Beograd", phone: "011/6452-648", type: "medicina" },
    { name: "Zavod za zdravstvenu zastitu studenata Beograd", address: "Krunska 57, Beograd", phone: "011/2433-488", type: "medicina" },
    { name: "Gradski Zavod za Hitnu Medicinsku Pomoc", address: "Franse d Eperea 5, Beograd", phone: "011/3615001", type: "medicina" },
    { name: "Gradski Zavod za gerontologiju i palijativno zbrinjavanje", address: "Kralja Milutina 52, Beograd", phone: "011/2067-800", type: "medicina" },
    { name: "Gradski Zavod za plucne bolesti i tuberkulozu", address: "Presevska 35, Beograd", phone: "011/3811-800", type: "medicina" },
    { name: "Gradski zavod za kozne i venericne bolesti", address: "Dorda Vasingtona 17, Beograd", phone: "011/324-91-92", type: "medicina" },
    { name: "Specijalna bolnica za endemsku nefropatiju", address: "Dr Djordja Kovacevica 27, 11550 Lazarevac, Beograd", phone: "011/8120-164", type: "medicina" },
    { name: "Specijalna bolnica za interne bolesti Mladenovac", address: "Vojvode Misica 2, 11400 Mladenovac, Beograd", phone: "011/82-31-988", type: "medicina" },
    { name: "Specijalna bolnica za prevenciju i lecenje CVB 'Sveti Sava'", address: "Nemanjina 2, Beograd", phone: "011/20 66 800", type: "medicina" },
    { name: "Specijalna bolnica za bolesti zavisnosti", address: "Teodora Drajzera 44, Savski venac, Beograd", phone: "011/3671-429", type: "medicina" },
    { name: "Klinika za psihijatrijske bolesti 'Dr Laza Lazarevic'", address: "Višegradska 26, Beograd", phone: "011/3636400", type: "medicina" },
    { name: "Specijalna bolnica za cerebralnu paralizu i razvojnu neurologiju", address: "Sokobanjska 17a, Beograd", phone: "011/2667-755", type: "medicina" },
    { name: "Specijalna bolnica za rehabilitaciju i ortopedsku protetiku", address: "Bulevar Vojvode Putnika 7, Beograd", phone: "011/3690069", type: "medicina" },
    { name: "KBC Bezanijska kosa", address: "Bezanijska kosa BB, Beograd", phone: "011/2606080", type: "medicina" },
    { name: "Klinicki bolnicki centar 'Zvezdara'", address: "Dimitrija Tucovica 161, Beograd", phone: "011/3806-969", type: "medicina" },
    { name: "Klinicki bolnicki centar Zemun - Beograd", address: "Vukova 9, 11080 Zemun, Beograd", phone: "011/3772 696", type: "medicina" },
    { name: "Klinicki centar Srbije", address: "Pasterova 2, Beograd", phone: "011/3617777", type: "medicina" },
    { name: "KBC 'Dr Dragisa Misovic' Dedinje", address: "Heroja Milana Tepica 1, Beograd", phone: "011/3630600", type: "medicina" },
    { name: "Institut za onkologiju i radiologiju Srbije", address: "Pasterova 14, Beograd", phone: "011/2067-100", type: "medicina" },
    { name: "Klinika za neurologiju decu i omladinu", address: "Dr Subotica 6 a, Beograd", phone: "011/2658355", type: "medicina" },
    { name: "Institut za zdravstvenu zastitu majke i deteta Srbije 'Dr Vukan Cupic'", address: "Radoja Dakica 6-8, Beograd", phone: "011/3108108", type: "medicina" },
    { name: "Univerzitetska decja klinika", address: "Tirsova 10, Beograd", phone: "011/2060600", type: "medicina" },
    { name: "Institut za neonatologiju", address: "Kralja Milutina 50, Beograd", phone: "011/3630100", type: "medicina" },
    { name: "GAK 'Narodni front'", address: "Kraljice Natalije 62, Beograd", phone: "011/2068250", type: "medicina" },
    { name: "Institut za kardiovaskularne bolesti 'Dedinje'", address: "Heroja Milana Tepica 1, Beograd", phone: "011/3601702", type: "medicina" },
    { name: "IOHB 'Banjica'", address: "Mihaila Avramovica 28, Beograd", phone: "011/666-0466", type: "medicina" },
    { name: "Institut za rehabilitaciju", address: "Sokobanjska 17, Savski venac, Beograd", phone: "011/2660266", type: "medicina" },
    { name: "Institut za mentalno zdravlje", address: "Palmoticeva 37, Beograd", phone: "011/3307500", type: "medicina" },
    { name: "Institut za reumatologiju", address: "Resavska 69, Beograd", phone: "011/3600800", type: "medicina" },
    { name: "Klinika za rehabilitaciju 'Dr Miroslav Zotovic'", address: "Sokobanjska 13, Beograd", phone: "011/2660755", type: "medicina" },
    { name: "Zavod za psihofizioloske poremecaje i govornu patologiju 'Prof. Dr Cvetko Brajovic'", address: "Kralja Milutina 52, Beograd", phone: "011/2686615", type: "medicina" },
    { name: "Institut za transfuziologiju krvi Srbije", address: "Svetog Save 39, Beograd", phone: "011/3812700", type: "medicina" },
    { name: "Zavod za zdravstvenu zastitu radnika Ministarstva unutrasnjih poslova", address: "Durmitorska 9, Beograd", phone: "011/3615665", type: "medicina" },
    { name: "Institut za medicinu rada Srbije 'Dr Dragomir Karajovic'", address: "Deligradska 29, Beograd", phone: "011/3400900", type: "medicina" },
    { name: "Zavod za biocide i medicinsku ekologiju", address: "Trebevićka 16, Beograd", phone: "011/3054000", type: "medicina" },
    { name: "Institut za javno zdravlje Srbije 'Dr Milan Jovanovic Batut'", address: "Dr Subotica 5, Beograd", phone: "011/2684566", type: "medicina" },
    { name: "Institut za virusologiju, vakcine i serume 'Torlak'", address: "Vojvode Stepe 458, Beograd", phone: "011/3976674", type: "medicina" },
    { name: "Gradski zavod za javno zdravlje", address: "Stari grad Bulevar despota Stefana 54a, Beograd", phone: "011/2078600", type: "medicina" }
  ];
  document.addEventListener("DOMContentLoaded", function () {
    mymap = L.map("mapid").setView([44.78996198723505, 20.466267089843704], 13);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(mymap);

    const checkboxes = document.querySelectorAll("input[type=checkbox]");
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", filterWaypoints);
    });

    loadWaypoints();
});

function loadWaypoints() {
    const cachedWaypoints = localStorage.getItem('waypoints');
    if (cachedWaypoints) {
        console.log('Using cached waypoints');
        waypoints = JSON.parse(cachedWaypoints);
        plotInitialWaypoints();
    } else {
        console.log('Caching waypoints');
        localStorage.setItem('waypoints', JSON.stringify(waypoints));
        plotInitialWaypoints();
    }
}

async function geocode(address) {
    const nominatimUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;
    const proxyUrl = "https://cors-proxy.fringe.zone/";

    try {
        const response = await fetch(proxyUrl + nominatimUrl, {
            headers: {
                // No need to add 'Origin' or 'X-Requested-With' as per the proxy's documentation
                // The proxy requires these headers, but they will be automatically added
            },
        });

        if (!response.ok) {
            throw new Error(`Geokodiranje neuspešno: ${response.statusText}`);
        }

        const data = await response.json();
        if (data && data.length > 0) {
            return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
        } else {
            throw new Error("Adresa nije pronađena: " + address);
        }
    } catch (error) {
        console.error(`Greška pri geokodiranju za adresu "${address}":`, error);
        return null;
    }
}


async function plotInitialWaypoints() {
    for (const waypoint of waypoints) {
        await delay(200); // Delay between requests to prevent rate limiting
        const latLng = await geocode(waypoint.address);
        
        // If latLng is null, skip this waypoint
        if (latLng) {
            const popupContent = `
                <div>
                    <h4>${waypoint.name}</h4>
                    <p>Adresa: ${waypoint.address}</p>
                    <p>Telefon: ${waypoint.phone}</p>
                </div>
            `;
            const marker = L.marker(latLng, { draggable: false })
                .bindPopup(popupContent)
                .addTo(mymap);
            waypoint.marker = marker;
            waypointMarkers.push(marker);
        } else {
            console.warn(`Skipping waypoint for address: ${waypoint.address}`);
        }
    }
}

// Helper function to introduce a delay
function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


function filterWaypoints() {
    const policijaChecked = document.getElementById("policijaCheckbox").checked;
    const medicinaChecked = document.getElementById("medicinaCheckbox").checked;

    waypointMarkers.forEach((marker) => mymap.removeLayer(marker));
    waypointMarkers = [];

    waypoints.forEach((waypoint) => {
        if (
            (policijaChecked && waypoint.type === "policija") ||
            (medicinaChecked && waypoint.type === "medicina")
        ) {
            const latLng = waypoint.marker.getLatLng();
            const popupContent = `
                <div>
                    <h4>${waypoint.name}</h4>
                    <p>Adresa: ${waypoint.address}</p>
                    <p>Telefon: ${waypoint.phone}</p>
                </div>
            `;
            const marker = L.marker(latLng, { draggable: false })
                .bindPopup(popupContent)
                .addTo(mymap);
            waypoint.marker = marker;
            waypointMarkers.push(marker);
        }
    });
}

async function findNearestAndPlotRoute() {
    const userAddress = document.getElementById("address").value; // Uzimanje adrese od korisnika

    // Uklanjanje prethodnog markera i rute, ako postoje
    if (userLocationMarker) {
        mymap.removeLayer(userLocationMarker);
        userLocationMarker = null;
    }
    if (routingControl) {
        mymap.removeControl(routingControl);
        routingControl = null;
    }

    try {
        const userLatLng = await geocode(userAddress); // Geokodiranje korisničke adrese
        let nearestMarker = null; // Marker najbliže tačke
        let nearestDistance = Infinity; // Inicijalna najveća udaljenost
        let nearestLatLng = null; // Koordinate najbliže tačke

        // Iteracija kroz sve markere na mapi i pronalaženje najbližeg
        mymap.eachLayer(function (layer) {
            if (layer instanceof L.Marker) {
                const distance = mymap.distance(layer.getLatLng(), userLatLng); // Izračunavanje udaljenosti
                if (distance < nearestDistance) {
                    // Ažuriranje najbliže tačke
                    nearestDistance = distance;
                    nearestMarker = layer;
                    nearestLatLng = layer.getLatLng();
                }
            }
        });

        // Uklanjanje svih markera osim najbližeg
        mymap.eachLayer(function (layer) {
            if (!(layer instanceof L.TileLayer) && layer !== nearestMarker) {
                mymap.removeLayer(layer);
            }
        });

        // Dodavanje markera za korisničku lokaciju
        userLocationMarker = L.marker([userLatLng[0], userLatLng[1]], {
            title: "Vaša lokacija",
        }).addTo(mymap);

        // Iscrtavanje rute do najbliže tačke
        if (nearestLatLng) {
            routingControl = L.Routing.control({
                waypoints: [L.latLng(userLatLng[0], userLatLng[1]), nearestLatLng],
                routeWhileDragging: false,
            }).addTo(mymap);
        }
    } catch (error) {
        alert(error.message); // Prikazivanje greške korisniku
    }
}
  </script>


<style>
  .wrapper{
    width: 100%!important;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .navbar {
  background-color: #419b45;
  width: 100%;
  display: flex;
  justify-content: center;
  padding: 10px 0;
}

.navbar a {
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 0 10px;
  border-radius: 10px;
}

.navbar a:hover {
  background-color: #317234;
  background-color: #ffe02d;
}

#mapid {
  height: 500px;
  width: 100%;
  max-width: 1200px;
  margin-top: 20px;
}

h1,
form,
.container {
  text-align: center;
  margin: 20px 0;
}

button {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 10px;
  border-radius: 5px;
  font-size: 16px;
}

button:hover {
  background-color: #218838;
}

input[type="text"] {
  padding: 10px;
  width: 300px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-top: 10px;
}

.checkboxes {
  margin-top: 20px;
}

.checkboxes p {
  display: inline;
  margin-right: 10px;
}

input[type="checkbox"] {
  display: none;
}

input[type="checkbox"] + label {
  background-color: #287fa7;
  color: white;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
}

input[type="checkbox"]:checked + label {
  background-color: #1b5870;
}
</style>
@endsection
