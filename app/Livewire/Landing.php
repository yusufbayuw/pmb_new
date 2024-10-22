<?php

namespace App\Livewire;

use App\Models\M001MasterGelombang;
use Livewire\Component;

class Landing extends Component
{
    public function render()
    {
        $gelombang = M001MasterGelombang::where('status', 1)->first()->nama;
        return view('livewire.landing', [
            'gelombang' => $gelombang,
        ]);
    }
}
