<?php

namespace App\Http\Livewire\Immunization;

// use Immunization;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Immunization;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['immunizationDeleted'];
    protected $paginationTheme = 'bootstrap';
    public $sortType;
    public $sortColumn;
    public function immunizationDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => 'Data Imunisasi Berhasil Di Hapus'
        ]);
    }

    /**
     * @var mixed
     */
    public $search;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */

    public function render()
    {
        $immunizations = Immunization::query();
        $immunizations->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('age', 'like', '%'.$this->search.'%')
        ->orWhere('address', 'like', '%'.$this->search.'%')
        ->orWhere('birth_place', 'like', '%'.$this->search.'%')
        ->orWhere('birth_date', 'like', '%'.$this->search.'%')
        ->orWhere('weight', 'like', '%'.$this->search.'%')
        ->orWhere('temperature', 'like', '%'.$this->search.'%')
        ->orWhere('description', 'like', '%'.$this->search.'%');
        if($this->sortColumn){
            $immunizations->orderBy($this->sortColumn, $this->sortType);
        }else{
            $immunizations->latest('id');
        }
        $immunizations = $immunizations->paginate(10);
        return view('livewire.immunization.index',['immunizations' => $immunizations]);
    }
}
