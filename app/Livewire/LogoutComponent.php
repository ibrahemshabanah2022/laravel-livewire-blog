<?php

namespace App\Http\Livewire;

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

class LogoutComponent extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        redirect('/', 302);
    }

    public function render()
    {
        return view('livewire.logout-component');
    }
}
