<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use Illuminate\Http\Request;

class IpAddressControler extends Controller
{
    public function list()
    {
        $ip_addresses = IpAddress::where('banned', 1)->get();
        return view('ip.list',[
            'title'=>'Banovane ip adrese',
            'ip_addresses'=>$ip_addresses
        ]);
    }
    public function unban($id=null)
    {
        $ip_address=IpAddress::find($id);
        if(!$ip_address) return abort(404);
        $ip_address->banned=0;
        $ip_address->save();
        
        return redirect()->back();
    }
}
