<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;

use Livewire\WithFileUploads;

class CreateAdvertisementPRV extends Component
{
    use WithFileUploads;

    public $category;
    public $products;

    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $category_id;

    public $img = [];
    public $product_id;

    public $selectedCategoryName;

    public $user_id;

    public $type;

    public $video;

    public $phone_number;

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

    public $stanes = [
        'Вживане',
        'Нове',
    ];

    public $selectedStane= null;
    public $selectedRegion= null;

    public function selectStane($stane)
    {
        $this->selectedStane = $stane;
    }

    public function selectRegion($region)
    {
        $this->selectedRegion = $region;
    }

//    protected $rules = [
//        'video' => 'required|url|regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/',
//    ];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = $category->products;

        $this->user_id = auth()->id();

        $this->type = null;

        $this->phone_number = auth()->user()->phone_number;
    }


    public function updatedType($value)
    {

        if ($value) {
            $this->type = 'VIP';
        } else {
            $this->type = null;
        }
    }


    public function updatedImg($value, $index)
    {
        $this->validate([
            'img.' . $index => 'image|max:1024', // 1MB Max per image
        ]);
    }


    public function selectCategory($categoryId)
    {
        $this->category_id = $categoryId;

        $category = Category::find($categoryId);
        $this->selectedCategoryName = $category->name;
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.create-advertisement-p-r-v', compact('categories'))->layout("layouts.base");
    }

    public function savedata()
    {


        $this->validate([
            'selectedRegion' => 'required',
        ]);

        // Создание товара
        $product = new Product;
        $product->name = $this->name;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->category_id = $this->category_id;
        $product->user_id = auth()->id();

        $user = auth()->user();
        if ($this->phone_number) {
            $user->phone_number = $this->phone_number;
            $user->save();
        }

        $product->type = $this->type;


        if (strpos($this->video, 'youtu.be') !== false) {
            // Извлекаем ID видео
            $videoId = substr(parse_url($this->video, PHP_URL_PATH), 1);

            $this->video = "https://www.youtube.com/watch?v={$videoId}";
        }

        $product->video = $this->video;

        $product->region = $this->selectedRegion;

        $product->state = $this->selectedStane;

//        $user->phone = $this ->phone;

        $product->save();

        // Получаем ID созданного продукта
        $this->product_id = $product->id;

        // Проверка наличия изображений перед сохранением
        if (!empty($this->img)) {
            foreach ($this->img as $photo) {
                $imagename = $photo->store('photos', 'public');
                $productImage = new ProductImage;
                $productImage->img = $imagename;
                $productImage->product_id = $this->product_id;
                $productImage->save();
            }
        }

        $this->resetdata();
        return redirect()->route('dashboard')->with('success', 'Товар успішно створений!');
    }

    public function resetdata()
    {

        $this->reset(['name', 'short_description', 'description', 'regular_price', 'category_id']);
        $this->reset(['img', 'product_id', 'selectedCategoryName']);
    }
}
