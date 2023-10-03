<div>
    <h1>Hello World!</h1>

    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <button wire:click="decrement">-</button>
        <h1>{{ $count }}</h1>
        <p>{{ $error }}</p>
    </div>
</div>
