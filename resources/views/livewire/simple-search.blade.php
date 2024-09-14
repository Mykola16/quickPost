<div>
    <input type="search" wire:model="search" placeholder="Search for products..." autocomplete="off">
    <button wire:click="searchProducts">Пошук</button> <!-- Додаємо кнопку для пошуку -->

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>


</div>
