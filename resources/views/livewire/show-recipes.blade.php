<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
    @forelse($recipes as $recipe)
        
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md overflow-hidden flex flex-col">
            
            
            <a href="/recipe/{{ $recipe->id }}" wire:navigate>
                @if($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-zinc-700 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </a>

            <div class="p-4 flex-grow">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white truncate">
                    <a href="/recipe/{{ $recipe->id }}" wire:navigate class="hover:text-indigo-600">
                        {{ $recipe->title }}
                    </a>
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">By: {{ $recipe->user->name }}</p>
                <p class="text-gray-600 dark:text-gray-300 mt-2 text-sm">
                    {{ Str::limit($recipe->description, 100) }}
                </p>
            </div>

         
            @can('update', $recipe)
            <div class="p-4 bg-gray-50 dark:bg-zinc-900/50 border-t border-gray-200 dark:border-zinc-700 flex items-center justify-end gap-2">
                <a href="/recipe/{{ $recipe->id }}/edit" wire:navigate class="px-3 py-1 text-sm font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600 transition-colors">
                    Edit
                </a>
                <button 
                    wire:click="delete({{ $recipe->id }})" 
                    wire:confirm="Are You Sure Hrn O_O?"
                    class="px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors">
                    Delete
                </button>
            </div>
            @endcan
        </div>
      
    @empty
    
    @endforelse
</div>
