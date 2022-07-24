<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponentnt extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-componentnt')->layout('layouts.base');
    }
}
