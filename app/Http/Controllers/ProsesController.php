<?php

namespace App\Http\Controllers;

use App\Models\KI;
use App\Models\Saham;
use App\Models\User;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    protected $totalNominals = [];

    public function totalnominal() {
        $pemegangsahams = User::all();

        foreach ($pemegangsahams as $pemegangsaham) {
            $totalNominal = Saham::where('nama', $pemegangsaham->name)->sum('nominal');
            $this->totalNominals[$pemegangsaham->name] = $totalNominal;
        }
    }

    public function getTotalNominals() {
        return $this->totalNominals;
    }

    public function progresinvestasi() {
        // Memanggil metode totalnominal untuk mengupdate totalNominals
        $this->totalnominal();

        // Mengambil kewajiban investasi berdasarkan nama
        $kewajibaninvestasi = KI::whereIn('nama', array_keys($this->totalNominals))->get();

        // Inisialisasi array untuk menyimpan persentase
        $persentase = [];

        // Menghitung persentase untuk setiap pemegang saham
        foreach ($this->totalNominals as $namaPemegangSaham => $totalNominal) {
            // Mengambil kewajiban investasi sesuai dengan nama
            $kewajiban = $kewajibaninvestasi->where('nama', $namaPemegangSaham)->first();

            if ($kewajiban) {
                $totalKewajibanInvestasi = $kewajiban->nominal;

                if ($totalKewajibanInvestasi > 0) {
                    $persentase[$namaPemegangSaham] = ($totalNominal / $totalKewajibanInvestasi) * 100;
                } else {
                    $persentase[$namaPemegangSaham] = 0;
                }
            } else {
                // Handle jika kewajiban investasi tidak ditemukan
                $persentase[$namaPemegangSaham] = 0;
            }
        }

        // Mengembalikan array persentase
        return $persentase;
    }

    public function hutanginvestasi() {
        // Memanggil metode totalnominal untuk mengupdate totalNominals
        $this->totalnominal();

        // Mengambil kewajiban investasi berdasarkan nama
        $kewajibaninvestasi = KI::whereIn('nama', array_keys($this->totalNominals))->get();

        // Inisialisasi array untuk menyimpan hutang investasi
        $hutangInvestasi = [];

        // Menghitung hutang investasi untuk setiap pemegang saham
        foreach ($this->totalNominals as $namaPemegangSaham => $totalNominal) {
            // Mengambil kewajiban investasi sesuai dengan nama
            $kewajiban = $kewajibaninvestasi->where('nama', $namaPemegangSaham)->first();

            if ($kewajiban) {
                $totalKewajibanInvestasi = $kewajiban->nominal;

                // Menghitung hutang investasi (selisih antara kewajiban dan total nominal)
                $hutangInvestasi[$namaPemegangSaham] = max(0, $totalKewajibanInvestasi - $totalNominal);
            } else {
                // Handle jika kewajiban investasi tidak ditemukan
                $hutangInvestasi[$namaPemegangSaham] = 0;
            }
        }

        // Mengembalikan array hutang investasi
        return $hutangInvestasi;
    }

}
