<?php

namespace App\Http\Livewire\View;

use App\Models\Activities;
use App\Services\DateService;
use DateTime;
use Exception;
use Livewire\Component;

class Week extends Component
{

    /**
     * @var array|string
     */
    public array|string $week = [];

    public function mount(): void
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

        $activities = Activities::query()
            ->where('status', '=', 1)
            ->whereBetween('date', [$this->week['firstDateOfWeek'], $this->week['lastDateOfWeek']])
            ->orderBy('date', 'asc')
            ->get();

        $activitiesByWeek = [];
        foreach ($activities as $activity) {
            $activitiesByWeek[date('Y-m-d', strtotime($activity->date))][] = [
                'id' => $activity->id,
                'name' => $activity->name,
                'date' => date('H:i', strtotime($activity->date)),
            ];
        }

        return view('livewire.view.week', [
            'week' => $this->week,
            'activities' => $activitiesByWeek
        ]);
    }
}
