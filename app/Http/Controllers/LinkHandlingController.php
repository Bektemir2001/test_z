<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iodev\Whois\Factory;

class LinkHandlingController extends Controller
{
    public function __invoke(Request $request){
        $whois = Factory::get()->createWhois();
        
        if ($whois->isDomainAvailable($request->link)) {
            return response(['link' => $request->link, 'message' => "Bingo! Domain is available! :)"]);
        }
        $info = $whois->loadDomainInfo($request->link);
        return response(['link' => $request->link, 'message' => date("Y-m-d", $info->creationDate)]);
    }
}
