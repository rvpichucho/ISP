<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;
    public $active;
    public function render()
    {
        $items=Item::where('user_id',auth()->user()->id);

        return view('livewire.items',[
            'items' => Item::paginate(2),
        ]);
    }
}
