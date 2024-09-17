<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAdvertisement extends Component
{
    use WithFileUploads;

    public $product;
    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $category_id;
    public $img = [];
    public $selectedCategoryName;
    public $user_id;
    public $type;
    public $video;
    public $phone_number;
    public $selectedRegion;
    public $selectedStane;

    public $productId;

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

    public $stanes = ['Вживане', 'Нове'];

    public function deleteImage($index)
    {
        if (isset($this->img[$index])) {
            // Якщо це рядок (існуючий шлях до зображення в базі даних)
            if (is_string($this->img[$index])) {
                $filePath = 'storage/' . $this->img[$index];

                // Видалення файлу з файлової системи
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }

                // Видалення зображення з таблиці product_images
                $imagePath = $this->img[$index];
                ProductImage::where('img', $imagePath)
                    ->where('product_id', $this->product->id)
                    ->delete();
            }

            // Видалення зображення з масиву
            unset($this->img[$index]);

            // Пересортування масиву для збереження порядку
            $this->img = array_values($this->img);
        }
    }

    public function mount($id)
    {
        // Завантажуємо товар з бази даних
        $this->product = Product::findOrFail($id);

        // Заповнюємо поля даними товару
        $this->name = $this->product->name;
        $this->short_description = $this->product->short_description;
        $this->description = $this->product->description;
        $this->regular_price = $this->product->regular_price;
        $this->category_id = $this->product->category_id;
        $this->selectedCategoryName = $this->product->category->name ?? null;
        $this->user_id = $this->product->user_id;
        $this->type = $this->product->type;
        $this->video = $this->product->video;
        $this->phone_number = $this->product->user->phone_number;
        $this->selectedRegion = $this->product->region;
        $this->selectedStane = $this->product->state;

        // Завантажуємо зображення товару
        foreach ($this->product->images as $image) {
            $this->img[] = $image->img;
        }
    }

    public function updatedImg($value, $index)
    {
        $this->validate([
            'img.' . $index => 'image|max:1024', // 1MB Max per image
        ]);
    }

    public function selectRegion($regionId)
    {
        // Встановлюємо значення вибраного регіону
        $this->selectedRegion = $regionId;
    }

    public function selectStane($stateId)
    {
        // Логіка для обробки вибору стану (state)
        $this->selectedStane = $stateId;

    }

    public function selectCategory($categoryId)
    {
        $this->category_id = $categoryId;
        $category = Category::find($categoryId);
        $this->selectedCategoryName = $category->name;
    }

    public function savedata()
    {
        $this->validate([
            'selectedRegion' => 'required',
        ]);

        if (strpos($this->video, 'youtu.be') !== false) {
            // Извлекаем ID видео
            $videoId = substr(parse_url($this->video, PHP_URL_PATH), 1);

            $this->video = "https://www.youtube.com/watch?v={$videoId}";
        }

        // Оновлюємо товар
        $this->product->update([
            'name' => $this->name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'category_id' => $this->category_id,
            'type' => $this->type,
            'video' => $this->video,
            'region' => $this->selectedRegion,
            'state' => $this->selectedStane,
        ]);



        // Оновлюємо номер телефону
        $user = $this->product->user;
        if ($this->phone_number) {
            $user->phone_number = $this->phone_number;
            $user->save();
        }

        // Оновлюємо зображення товару
        if (!empty($this->img)) {
            foreach ($this->img as $photo) {
                if (is_file($photo)) {
                    $imagename = $photo->store('photos', 'public');
                    ProductImage::create([
                        'img' => $imagename,
                        'product_id' => $this->product->id,
                    ]);
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Товар успішно оновлений!');
    }



    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.edit-advertisement', compact('categories'))
            ->layout('layouts.base');
    }
}
