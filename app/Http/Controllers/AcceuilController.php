<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
class AcceuilController extends Controller
{
    public function __construct (public ?string $message = null){
        $this->message = $message ?? 'hello';

    }
    function acceuil(){
        return view('welcome');
    }
    public function about( ?string $message = null ){
        return $message ?? $this->message;
    }
}
