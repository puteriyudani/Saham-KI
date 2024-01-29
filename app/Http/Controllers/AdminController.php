<?php

namespace App\Http\Controllers;

use App\Models\ModalDasar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $modaldasars = ModalDasar::get();
        return view('admin', compact('modaldasars'));
    }

    public function adminuser()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }
}
