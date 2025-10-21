<div>
    <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Edit Recipe: {{ $title }}</h1>

        <form wire:submit="update" class="space-y-4">
            <div wire:loading wire:target="newImage" class="text-blue-500">
                Uploading image...
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                <input type="text" wire:model="title" class="block w-full mt-1 rounded-md ...">
                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm ...">Description</label>
                <textarea wire:model="description" class="block w-full mt-1 ..."></textarea>
                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm ...">Ingredients</label>
                <textarea wire:model="ingredients" class="block w-full mt-1 ..."></textarea>
                @error('ingredients') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm ...">Instruction</label>
                <textarea wire:model="instructions" class="block w-full mt-1 ..."></textarea>
                @error('instructions') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm ...">Upload Image</label>
                <input type="file" wire:model="newImage" class="block w-full mt-1 ...">
                @error('newImage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            
            <div class="mt-4">
                <p class="text-sm font-medium ...">Preview Image:</p>
                @if ($newImage)
                    <img src="{{ $newImage->temporaryUrl() }}" class="w-48 h-48 object-cover rounded-md mt-2">
                @elseif ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" class="w-48 h-48 object-cover rounded-md mt-2">
                @else
                    <span class="text-gray-400">No Image.</span>
                @endif
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg ...">
                    Save
                </button>
                <a href="/dashboard" wire:navigate class="text-gray-600 dark:text-gray-300 hover:underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

