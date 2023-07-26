<?php

namespace App\Http\Livewire;

use App\Services\DateService;
use Exception;
use Livewire\Component;

class Filter extends Component
{
    /**
     * @var string
     */
    public string $filter = "day";

    /**
     * @param string $filter
     * @return void
     */
    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
        $this->dispatchBrowserEvent('initFlowbite');
    }

    /**
     * @throws Exception
     */
    public function render()
    {
        return view('livewire.filter', [
            'filter' => $this->filter
        ]);
    }
}
