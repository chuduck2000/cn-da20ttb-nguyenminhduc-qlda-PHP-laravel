<?php

namespace App\Livewire\Giangvien;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.giangvien.dashboard-component')->layout('livewire.giangvien.layouts.base');
    }
}
