<?php

namespace App\Http\Controllers;

use App\Models\ModalDasar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $modaldasar = ModalDasar::get();
        return view('dashboard', compact('modaldasar'));
    }
}
