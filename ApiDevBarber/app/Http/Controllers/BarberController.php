<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Barber;

class BarberController extends Controller
{

    private $loggedUser;

    public function __construct() {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function list(Request $request) {
        $array = ['error' => ''];
        $barbers = Barber::all();
        
        $array['data'] = $barbers;
        $array['loc'] = 'São Paulo';

        return $array;
    }
}
