<?php

namespace App\Http\Livewire\View;

use App\Models\Activities;
use App\Services\DateService;
use DateTime;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class Month extends Component
{

    /**
     * @var string
     */
    protected string $month;

    /**
     * @var string
     */
    protected string $day;

    /**
     * @param string $month
     * @return void
     */
    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    /**
     * @param string $day
     * @return void
     */
    public function setDay(string $day): void
    {
        $day = explode('-', $day);
        $this->setMonth($day[0] . '-' . $day[1]);
        $this->day = $day[2];
    }

    public function boot(): void
    {
        $datetime = new DateTime();
        $this->month = $datetime->format('Y-m');
        $this->day = $datetime->format('d');
    }

    /**
     * @throws Exception
     */
    public function render(DateService $dateService)
    {
        $month = $dateService->getMonth($this->month);
        $searchingDate = '%' . $month['year'] .'-'. $month['currentMonth'] . '-' . $this->day . '%';

        $activities = Activities::query()
            ->where('status', '=', 1)
            ->where('date', 'LIKE', $searchingDate)
            ->orderBy('date', 'asc')
            ->get();

        return view('livewire.view.month', [
            'month' => $month,
            'activities' => $activities,
            'day' => $this->day,
        ]);
    }
}
