<?php

namespace App\Http\Controllers;

use App\Models\KI;
use App\Models\ModalDasar;
use App\Models\Saham;
use App\Models\User;
use Illuminate\Http\Request;

class KomisarisUtamaController extends Controller
{
    protected $prosesController;

    public function __construct(ProsesController $prosesController)
    {
        $this->prosesController = $prosesController;
    }

    public function index() {
        $modaldasar = ModalDasar::get();
        $saham = Saham::paginate(100);
        $pemegangsahams = User::whereIn('role', ['pemegang_saham', 'komisaris_utama'])->get();
        $kewajibaninvestasi = KI::get();

        $this->prosesController->totalnominal();
        $totalNominals = $this->prosesController->getTotalNominals();
        $persentase = $this->prosesController->progresinvestasi();
        $hutangInvestasi = $this->prosesController->hutanginvestasi();

        return view('komisarisutama.dashboard', compact('modaldasar', 'saham', 'pemegangsahams', 'kewajibaninvestasi', 'totalNominals', 'persentase', 'hutangInvestasi'));
    }
}
