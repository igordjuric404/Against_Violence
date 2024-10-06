<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SafeSpotsController extends Controller
{
    public function index()
    {
        $safeSpots = [
            [
                'name' => 'Autonomni ženski centar',
                'location' => 'Beograd',
                'phone' => '+381 11 266 2222'
            ],
            [
                'name' => 'Sigurna kuća u Beogradu',
                'location' => 'Beograd',
                'phone' => '+381 11 276 8788'
            ],
            [
                'name' => 'Sigurna Kuća u Novom Sadu',
                'location' => 'Novi Sad',
                'phone' => '+381 21 6624 111'
            ],
            [
                'name' => 'Sigurna Kuća u Nišu',
                'location' => 'Niš',
                'phone' => '+381 18 513 103'
            ],
            [
                'name' => 'SOS Ženski centar Novi Sad',
                'location' => 'Novi Sad',
                'phone' => '+381 21 422 740'
            ],
            [
                'name' => 'Ženski centar Užice',
                'location' => 'Užice',
                'phone' => '+381 31 522 555'
            ],
            [
                'name' => 'Centar za žrtve seksualnog nasilja',
                'location' => 'Novi Sad',
                'phone' => '+381 21 661 2222'
            ],
            [
                'name' => 'Centar za devojke',
                'location' => 'Niš',
                'phone' => '+381 18 514 430'
            ],
            [
                'name' => 'Udruženje Roma Novi Bečej',
                'location' => 'Novi Bečej',
                'phone' => '+381 23 771 300'
            ],
            [
                'name' => 'Centar za socijalni rad Vranje',
                'location' => 'Vranje',
                'phone' => '+381 17 421 350'
            ],
            [
                'name' => 'Centar za socijalni rad Kruševac',
                'location' => 'Kruševac',
                'phone' => '+381 37 427 902'
            ],
            [
                'name' => 'Centar za socijalni rad Čačak',
                'location' => 'Čačak',
                'phone' => '+381 32 221 212'
            ],
        ];

        return view('safe-spots-contact', [
            'title' => 'Kontakt sigurnih mesta',
            'safeSpots' => $safeSpots
        ]);    }
}
