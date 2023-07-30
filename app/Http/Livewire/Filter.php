<?php

namespace App\Http\Livewire;

use App\Models\Activities;
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
     * @var string
     */
    public string $query = "";

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
        $activities = [];
        if ($this->query !== "") {
            $activities = Activities::query()
                ->where('name', 'like', '%' . $this->query . '%')
                ->orderBy('date', 'asc')
                ->get();
        }

        return view('livewire.filter', [
            'filter' => $this->filter,
            'activities' => $activities,
        ]);
    }
}
