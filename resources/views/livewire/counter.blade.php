
<div>
     In work, do what you enjoy.
     <span>
        {{$num}}
     </span>


    <button wire:click="increament">+</button>


    <button wire:click="decreament">-</button>

    <input type="text" wire:model.debounce.500ms="name">

    {{$name}}
</div>

