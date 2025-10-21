<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeDetail extends Component
{
    
    public Recipe $recipe; 

  
    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function render()
    {
        return view('livewire.recipe-detail');
    }
}