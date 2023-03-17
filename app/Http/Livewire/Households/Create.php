<?php

namespace App\Http\Livewire\Households;

use Livewire\Component;

use App\Models\Household;
use App\Models\StateRegion;
use App\Models\District;
use App\Models\Township;
use App\Models\WardVillageTract;
use App\Models\Village;
use App\Models\User;

class Create extends Component
{
    public $StateRegion;
    public $District;
    public $Township;
    public $WardVillageTract;
    public $Village;
    public $User;
   
    public $selectedStateRegion = NULL;

    public function mount()
    {
        $this->state_regions = StateRegion::all();
        $this->districts = collect();
    }
    
    public function render()
    {
        return view('livewire.households.create');
    }

    public function updatedSelectedStateRegion($state_region)
    {
        if (!is_null($state_region)) {
            $this->districts = District::where('state_region_id', $state_region)->get();
        }
    }
}
