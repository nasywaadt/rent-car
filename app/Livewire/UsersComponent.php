<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $name,$email,$password,$role, $id;
    public function render()
    {
        $data['user']=User::paginate(5);
        return view('livewire.users-component', $data);
    }
    public function create(){
        $this->reset();
        $this->addPage = true;
    }
    public function store(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required',
        ],[
            'name.required'=>'The username field is required',
            'email.email'=>'Email is invalid',
        ]);
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'role'=>$this->role,
        ]);
        session()->flash('success', 'Success added data');
        $this->reset();
    }
    public function destroy($id){
        $cari = User::find($id);
        $cari->delete();
        session()->flash('success', 'Success deleted data');
        $this->reset();
    }
    public function edit($id){
        $this->reset();
        $cari=User::find($id);
        $this->name=$cari->name;
        $this->email=$cari->email;
        $this->role=$cari->role;
        $this->id=$cari->id;
        $this->editPage = true;
    }
    public function update(){
        $cari = User::find($this->id);
        if ($this->password == ""){
            $cari->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ]);      
        } else {
            $cari->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
            ]);
        }
        session()->flash('success', 'Success updated data');
        $this->reset();
    }
}
