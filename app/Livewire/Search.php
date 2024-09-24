<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public $search = '';
    public $selectedRegion = '';

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

    public function mount(Request $request)
    {
        $this->search = $request->query('search', '');
        $this->selectedRegion = $request->query('region');
    }

    public function searchProducts()
    {
        $query = [
            'search' => $this->search,
            'region' => $this->selectedRegion
        ];

        return redirect()->route('categories.index', $query);
    }

    public function render()
    {
        return view('livewire.search');
    }
}


