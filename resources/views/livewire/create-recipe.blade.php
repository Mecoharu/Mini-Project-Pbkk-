<div>
    <form wire:submit="save">
        
        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        
        <div wire:loading wire:target="image" style="color: rgba(0, 0, 255, 0.782);">
            Mengupload gambar...
        </div>

        <div>
            <label>Title </label>
            <input type="text" wire:model="title">
            @error('title') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 15px;">
            <label>Description</label>
            <textarea wire:model="description"></textarea>
            @error('description') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 15px;">
            <label>Ingredients</label>
            <textarea wire:model="ingredients"></textarea>
            @error('ingredients') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 15px;">
            <label>Instructions</label>
            <textarea wire:model="instructions"></textarea>
            @error('instructions') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

<div style="margin-top: 15px;">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Image</label>


    @if ($image)
        <div class="mt-2">
            <img src="{{ $image->temporaryUrl() }}" class="w-full max-w-sm h-64 object-cover rounded-lg shadow-md">
            <button type="button" wire:click="$set('image', null)" class="mt-2 text-sm text-red-500 hover:text-red-700 font-semibold">
                Delete Image
            </button>
        </div>
    @else
     
        <label for="image-upload" class="mt-2 flex justify-center w-full max-w-sm h-48 px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-zinc-600 border-dashed rounded-md cursor-pointer hover:border-indigo-500 dark:hover:border-indigo-400 transition-colors">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600 dark:text-gray-300">
                    <p class="pl-1">Clik to upload or drag the image </p>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG up to 2MB</p>
            </div>
    
            <input id="image-upload" wire:model="image" type="file" class="sr-only">
        </label>
    @endif
    
    @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    
    <div wire:loading wire:target="image" class="mt-2 text-sm text-gray-500 dark:text-gray-300 font-semibold">
        Uploading image...
    </div>
</div>

        <button type="submit" style="margin-top: 20px;">Upload Recipe</button>
    </form>
</div>