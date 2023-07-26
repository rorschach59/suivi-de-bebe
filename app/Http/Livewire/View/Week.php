<?php

namespace App\Http\Livewire\View;

use App\Services\DateService;
use DateTime;
use Exception;
use Livewire\Component;

class Week extends Component
{
    /**
     * @var string
     */
    public string $criteria = "";

    /**
     * @var array|string
     */
    public array|string $week = [];

    public function mount()
    {
        $this->week = (new DateTime())->format('Y-m-d');
    }

    /**
     * @param array|string $week
     * @return void
     */
    public function setWeek(array|string $week): void
    {
        $this->week = $week;
    }

    /**
     * @throws Exception
     */
    public function render(DateService $dateService)
    {
        $this->week = $dateService->getWeek($this->week);

        return view('livewire.view.week', [
            'week' => $this->week
        ]);
    }
}
