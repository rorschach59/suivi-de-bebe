<?php

namespace App\Http\Livewire\View;

use App\Models\Activities;
use App\Models\Reminders;
use App\Services\DateService;
use Livewire\Component;

class Day extends Component
{
    /**
     * @var string
     */
    public string $criteria = "";

    /**
     * @var string
     */
    public string $date = "";

    public $reminder;

    /**
     * @return void
     * @throws \Exception
     */
    public function mount(): void
    {
        $dateService = new DateService();
        $this->date = $dateService->getDate($this->criteria);
    }

    /**
     * @param string $criteria
     * @return void
     */
    public function setCriteria(string $criteria): void
    {
        $this->criteria = $criteria;
    }

    /**
     * @param DateService $dateService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function render(DateService $dateService)
    {

        if (session()->has('date')) {
            $this->date = current(session()->get('date'));
            session()->forget('date');
        } else {
            $this->date = $dateService->getDate($this->criteria, $this->date);
        }

        $activities = Activities::query()
            ->where('status', '=', 1)
            ->where('date', 'like', '%' . $dateService->getDateTimeFromFormattedDate($this->date)->format('Y-m-d') . '%')
            ->orderBy('date', 'asc')
            ->get();

        $this->reminder = Reminders::query()
            ->where('date', 'like', '%' . $dateService->getDateTimeFromFormattedDate($this->date)->format('Y-m-d') . '%')
            ->first();

        if ($this->reminder) {
            $this->reminder = $this->reminder->text;
        }

        return view('livewire.view.day', [
            'date' => $this->date,
            'activities' => $activities,
        ]);
    }
}
