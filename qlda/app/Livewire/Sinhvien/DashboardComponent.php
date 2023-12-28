<?php

namespace App\Livewire\Sinhvien;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.sinhvien.dashboard-component')->layout('livewire.sinhvien.layouts.base');
    }
}
