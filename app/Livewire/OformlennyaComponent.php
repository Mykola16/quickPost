<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;
use Livewire\Component;

class OformlennyaComponent extends Component
{
    public $product;
    public $cartitems;
    public $total = 0;

    public $regions = [
        'Вінницька область', 'Волинська область', 'Дніпропетровська область',
        'Донецька область', 'Житомирська область', 'Закарпатська область',
        'Запорізька область', 'Івано-Франківська область', 'Київська область',
        'Кіровоградська область', 'Луганська область', 'Львівська область',
        'Миколаївська область', 'Одеська область', 'Полтавська область',
        'Рівненська область', 'Сумська область', 'Тернопільська область',
        'Харківська область', 'Херсонська область', 'Хмельницька область',
        'Черкаська область', 'Чернівецька область', 'Чернігівська область',
        'АР Крим'
    ];

    public $first_name, $last_name, $phone,
        $Method_of_delivery, $Oblast, $number_viddilennya,
        $Method_of_payment, $messagePost, $email;

    public $selectedRegion= null;

    public function selectRegion($region)
    {
        $this->selectedRegion = $region;
    }

    public function placeOrder()
    {

        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'Method_of_delivery' => 'required|string',
            'selectedRegion' => 'required',
            'number_viddilennya' => 'required|string',
            'Method_of_payment' => 'required|string',
            'email' => 'nullable|email',
        ]);


        // Проходимо по кожному товару в кошику
        foreach ($this->cartitems as $item) {

            // Створюємо окреме замовлення для кожного товару
            Order::create([
                'user_id' => auth()->user()->id,
                'tracking_no' => 'quick-post-' . Str::random(10),
                'fullname' => $this->first_name . ' ' . $this->last_name,
                'phone' => $this->phone,
                'price' => $item->product->regular_price, // Ціна окремого товару
                'Method_of_delivery' => $this->Method_of_delivery,
                'Oblast' => $this->selectedRegion,
                'number_viddilennya' => $this->number_viddilennya,
                'Method_of_payment' => $this->Method_of_payment,
                'product_id' => $item->product_id, // Зберігаємо ідентифікатор товару
                'status' => 'У процесі',
                'messagePost' => $this->messagePost ? 1 : 0,
                'email' => $this->email
            ]);
        }



        // Очищаємо кошик після створення замовлень
        ShoppingCart::where('user_id', auth()->user()->id)->delete();

        return redirect()->route('History');

    }


    public function render()
    {
        if (auth()->check()) {
            $this->cartitems=ShoppingCart::with('product.images')
                ->where(['user_id'=>auth()->user()->id])
                ->get();
            $this->total = 0;
        } else {
            $this->cartitems = collect();
        }


        foreach ($this->cartitems as $item){
            $this->total += $item->product->regular_price;
        }



        return view('livewire.oformlennya-component', [
            'cartitems' => $this->cartitems])->layout("layouts.base");
    }
}
