<?php

namespace App\Http\Livewire\Detailpatient;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners = ['patientDeleted'];
    protected $paginationTheme = 'bootstrap';
    public $sortType;
    public $sortColumn;
    public function patientDeleted(){
        $this->dispatchBrowserEvent('show-message', [
            'type' => 'error',
            'message' => 'Data Pasien Berhasil Di Hapus'
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
            $patients = Patient::query();
            $patients->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('nik', 'like', '%'.$this->search.'%')
            ->orWhere('gender', 'like', '%'.$this->search.'%')
            ->orWhere('address', 'like', '%'.$this->search.'%')
            ->orWhere('blood_type', 'like', '%'.$this->search.'%')
            ->orWhere('no_rekam_medis', 'like', '%'.$this->search.'%')
            ->orWhere('phone_number', 'like', '%'.$this->search.'%');

            if($this->sortColumn){
                $patients->orderBy($this->sortColumn, $this->sortType);
            }else{
                $patients->latest('id');
            }
            $patients = $patients->paginate(10);
            return view('livewire.detailpatient.index', compact('patients'));
        }
    }
