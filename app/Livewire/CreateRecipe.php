<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Livewire\Attributes\Rule;  

class CreateRecipe extends Component
{
    use WithFileUploads;

    
    #[Rule('required|min:5')]
    public $title = '';

    #[Rule('required')]
    public $description = '';

    #[Rule('required')]
    public $ingredients = '';

    #[Rule('required')]
    public $instructions = '';


    #[Rule('nullable|image|max:2048')] 
    public $image;

    public function save()
    {
        
        $validated = $this->validate();


        $imagePath = null;
        if ($this->image) {
            
            $imagePath = $this->image->store('recipes', 'public');
        }

    
        Recipe::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'ingredients' => $validated['ingredients'],
            'instructions' => $validated['instructions'],
            'image' => $imagePath,
        ]);

       
        session()->flash('success', 'Recipe success created!');
        $this->reset();

        
        return $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}