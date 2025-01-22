<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Riwayatparkir;
use Carbon\Carbon;

class Halbayarparkir extends Component
{
    public $nomorPlat, $parkirDitemukan, $catatan;
    public $noplat, $jeniskendaraanditemukan, $tarifperjam, $waktumasuk, $waktukeluar, $lamajam, $totalbiaya;
        public function cari()
        {
            $this->parkirDitemukan = Riwayatparkir::where('nomor_plat', $this->nomorPlat)->whereNull('waktu_keluar')->first();
            if($this->parkirDitemukan){
                $this->catatan = 'Parkir ditemukan';
                $this->noplat = $this->parkirDitemukan->nomor_plat;
                $this->jeniskendaraanditemukan = $this->parkirDitemukan->jeniskendaraan->nama;
                $this->tarifperjam = $this->parkirDitemukan->jeniskendaraan->tarif;
                $this->waktumasuk = $this->parkirDitemukan->waktu_masuk;
                $this->waktukeluar = now();
                $this->lamajam = (int)Carbon::parse($this->waktumasuk)->diffInHours($this->waktukeluar);
                if ($this->lamajam < 1) {
                    $this->totalbiaya = $this-> tarifperjam; 
                } else {
                    $this->totalbiaya = $this->lamajam * $this->tarifperjam;
                }
            } else {
                $this->catatan = 'Parkir tidak ditemukan';
            }
        }

    public function bayar() {
        $this->parkirDitemukan->update([
            'waktu_keluar' => $this->waktukeluar,
            'durasi' => $this->lamajam,
            'biaya' => $this->totalbiaya,
        ]);
        $this->reset();
    }

    public function render()
    {
        
        return view('livewire.halbayarparkir')->with([
            'riwayatParkir' => Riwayatparkir::whereNotNull('waktu_keluar')->get()
        ]);
    }
}
