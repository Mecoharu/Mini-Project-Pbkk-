<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowRecipes extends Component
{
    public function delete(Recipe $recipe)
    {
        
        $this->authorize('delete', $recipe);

    
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        
        session()->flash('success', 'Recipe deleted!');
    }
    
    public function render()
{
    
    $recipes = Recipe::with('user')->latest()->paginate(5);
    
    return view('livewire.show-recipes', [
        'recipes' => $recipes
    ])->layout('components.layouts.app.sidebar'); 
}

}