<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    #[Rule('required')]
    public $title = "";

    #[Rule('required')]
    public $description = "";
    public $id;
    public $error;
    public $success;
    public $comments = [];

    public $query = "";
    protected $paginationTheme = 'bootstrap';

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }


    public function submitForm(){
        $comment = \App\Models\Comments::where('title','=',$this->title)
            ->orWhere('description','=',$this->description)
            ->get();

        if(count($comment) > 0){
            $this->error = "Bunday malumot aval kiritilgan";
            $this->success = "";
        }

        else if ($this->title and $this->description){
            \App\Models\Comments::create([
                'title' => $this->title,
                'description' => $this->description
            ]);
            $this->success = "Muofaqiyatni qo'shildi";
            $this->error = "";
        }

        else{
            $this->error = "Malumotlar to'ldirishdagi xatolik";
        }

        $this->description = "";
        $this->title = "";
    }
    
    public function delete($id){
        \App\Models\Comments::find($id)->delete();
    }

    public function edit()
    {
        $this->closeModal();
    }
    
    public function render()
    {
        if (strlen($this->query) > 0){
            $this->comments = \App\Models\Comments::where('title',$this->query)
                ->orWhere('description',$this->query)
                ->get();
        }else{
            $this->comments = \App\Models\Comments::all();
        }
        return view('livewire.comments');
    }
}
