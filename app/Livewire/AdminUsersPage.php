<?php

namespace App\Livewire;
use App\Models\Conversation;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminUsersPage extends Component
{
    protected $listeners = ['userUpdated' => 'render'];

    public $users;
    public $selectedUserId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $utype;
    public $isEditModalOpen = false;
    public $showModal = false;

    public $searchTerm = '';

    public function getFilteredCategories()
    {
        return User::where('name', 'like', '%' . $this->searchTerm . '%')->get();
    }


//    protected $listeners = ['AdminUsersUpdated' => 'render'];

    public $roles = [
        'Приватна особа',
        'Бізнес',
        'Адміністратор',
    ];

    public $selectedRole = null;


    public function mount()
    {
        $this->users = User::all();
    }


    public function selectRole($role)
    {
        $this->selectedRole = $role;
    }

    public $roleMapping = [
        'Приватна особа' => 'PRV',
        'Бізнес' => 'BSN',
        'Адміністратор' => 'ADM',
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'selectedRole' => 'required|in:Приватна особа,Бізнес,Адміністратор',
    ];

    public function sms($id){
        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $id,
        ]);

        $conversationID = $conversation->id;

        return redirect()->route('chat.view', ['conversationID' => $conversationID]);
    }

    public function openDeleteConfirmation($id)
    {
        $this->selectedUserId = $id;
        $this->showModal = true;
    }

    public function deleteUser()
    {
        if ($this->selectedUserId) {
            $user = User::find($this->selectedUserId);
            if ($user) {
                $user->delete(); // Видалення оголошення
                $this->dispatch('AdminUsersUpdated');
                $this->showModal = false;
            }
        }
    }

    public function openModal()
    {
        $this->isEditModalOpen = true;
    }

    public function closeModal()
    {
        $this->isEditModalOpen = false;
        $this->render();
    }

    public function add_user(){
        $this->openModal();
    }

    public function saveUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'selectedRole' => 'required|in:Приватна особа,Бізнес,Адміністратор',
        ]);

        $roleMapping = $this->roleMapping;
        $userRole = $roleMapping[$this->selectedRole];

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'utype' => $userRole,
        ]);

        $this->reset(['name', 'email', 'password', 'password_confirmation', 'selectedRole']);
        $this->closeModal();
        $this->dispatch('AdminUsersUpdated');
    }

    public function selectUser($userId)
    {
        $this->selectedUserId = $userId;
    }

    public function deselectUser()
    {
        $this->selectedUserId = null;
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin-users-page', ['users' => $this->users])->layout("layouts.adminDashbord");
    }
}
