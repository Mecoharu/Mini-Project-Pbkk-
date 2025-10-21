<div>
    @if($recipe->image)
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" style="width: 100%; max-height: 400px; object-fit: cover;">
    @endif

    <h1>{{ $recipe->title }}</h1>
    <p>Oleh: {{ $recipe->user->name }}</p>

    <p>{{ $recipe->description }}</p>

    <hr style="margin: 20px 0;">

    <h2>Ingredients</h2>
    <p>{!! nl2br(e($recipe->ingredients)) !!}</p>

    <h2 style="margin-top: 20px;">Instructions</h2>
    <p>{!! nl2br(e($recipe->instructions)) !!}</p>

    <a href="/" wire:navigate style="margin-top: 20px; display: inline-block;">
        &larr; Back to Recipes
    </a>
</div>