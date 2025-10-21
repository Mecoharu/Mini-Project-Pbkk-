<?php

namespace App\Livewire;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class EditRecipe extends Component
{
    use WithFileUploads;

    public Recipe $recipe;

    #[Rule('required')]
    public $title;
    
    #[Rule('required')]
    public $description;
    
    #[Rule('required')]
    public $ingredients;
    
    #[Rule('required')]
    public $instructions;
    
    #[Rule('nullable|image|max:2048')]
    public $newImage;

    
    public function mount(Recipe $recipe)
    {
    
        $this->authorize('update', $recipe);
        
        $this->recipe = $recipe;
        $this->title = $recipe->title;
        $this->description = $recipe->description;
        $this->ingredients = $recipe->ingredients;
        $this->instructions = $recipe->instructions;
    }

    public function update()
    {
        $validated = $this->validate();

        $imagePath = $this->recipe->image;
        
        if ($this->newImage) {
            
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            
            $imagePath = $this->newImage->store('recipes', 'public');
        }

        
        $this->recipe->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'ingredients' => $validated['ingredients'],
            'instructions' => $validated['instructions'],
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Resep berhasil diperbarui!');
        
        
        return $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-recipe')
            ->layout('components.layouts.app.sidebar');
    }
}

