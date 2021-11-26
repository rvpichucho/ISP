<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;
class Clientes extends Component
{
    use WithPagination;
    public $active;
    public $q;
    public $sortBy='id';
    public $sortAsc=true;
    public $item;
    
    public $confirmingItemDeletion=false;
    public $confirmingItemAdd=false;

    protected $queryString=[
        'active'=>['except'=>false],
        'q'=>['except'=>''],
        'sortBy'=>['except'=>'id'],
        'sortAsc'=>['except'=>true],
    ];

    protected $rules =[
        'item.cedula'=>'required|string|min:4',
        'item.nombre'=>'required|string|min:4',
        'item.apellido'=>'required|string|min:4',
        'item.direccion'=>'required|string|min:4',
        'item.celular'=>'required|string|min:4',
        'item.plan'=>'required|string|min:4',
        'item.ip'=>'required|string|min:4',
        'item.estado'=>'boolean'
    ];

    public function render()
    {
        $items=Item::where('user_id', auth()->user()->id)
        ->when($this->q,function($query){
            return $query->where(function($query){
                $query->where('nombre','like','%'.$this->q .'%')
                ->orWhere('apellido','like','%'. $this->q .'%');
            });
        })

        ->when($this->active,function($query){
            return $query->active();
        })
        ->orderBy($this->sortBy,$this->sortAsc ? 'ASC' : 'DESC');

      //  $query = $items->toSql();
        $items = $items->paginate(6);
        return view('livewire.clientes',[
            'items'=>$items,
            //'query'=>$query
            
        ]);

    }
    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function sortBy($field){
       
       if($field==$this->sortBy){
           $this->sortAsc=!$this->sortAsc;
       }
        $this->sortBy=$field;
    }

    public function confirmItemDeletion($id)
    {
        //$item->delete();
        $this->confirmingItemDeletion=$id;

    }

    public function deleteItem( Item $item)
    {
        $item->delete();
        $this->confirmingItemDeletion=false;
        session()->flash('message','Cliente eliminado satisfactoriamente');

    }

    
    public function confirmingItemAdd()
    {
        $this->reset(['item']);
        $this->confirmingItemAdd=true;
    }

    public function confirmItemEdit( Item $item){
        $this->item=$item;
        $this->confirmingItemAdd=true;
    }

    public function saveItem()
    {
        $this->validate();

        if(isset($this->item->id)){
            $this->item->save();
            session()->flash('message','Actualización satisfactoria');
        }else{

        
        auth()->user()->items()->create([
            'cedula'=>$this->item['cedula'],
            'nombre'=>$this->item['nombre'],
            'apellido'=>$this->item['apellido'],
            'direccion'=>$this->item['direccion'],
            'celular'=>$this->item['celular'],
            'plan'=>$this->item['plan'],
            'ip'=>$this->item['ip'],
            'estado'=>$this->item['estado'] ?? 0
        ]);
        session()->flash('message','cliente guardado con exito');
    }
        $this->confirmingItemAdd=false;
    }


}
