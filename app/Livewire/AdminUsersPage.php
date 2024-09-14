<?php

namespace App\Livewire;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminUsersPage extends Component
{
    public $users;
    public $selectedUserId;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $utype;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'utype' => 'required|in:PRV,BSN,ADM',
    ];

    protected $listeners = ['Add_userUpdated' => 'render'];

    public function saveUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'utype' => $this->utype,
        ]);

        // Очистка полей после успешного добавления
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'utype']);

        $this->render();
    }

    public function selectUser($userId)
    {
        $this->selectedUserId = $userId;
    }

    public function deselectUser()
    {
        $this->selectedUserId = null;
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin-users-page', ['users' => $this->users])->layout("layouts.adminDashbord");
    }
}
