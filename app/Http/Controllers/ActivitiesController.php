<?php

namespace App\Http\Controllers;

use App\Events\RefreshApplicationEvent;
use App\Http\Requests\ActivitiesRequest;
use App\Models\Activities;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivitiesController extends Controller
{
    /**
     * @return View
     */
    public function create(): View
    {
        $activities = new Activities();
        $activitiesNames = $this->getActivitiesNames();

        return view('activities.create', [
            'activities' => $activities,
            'activitiesNames' => $activitiesNames,
        ]);
    }

    /**
     * @param ActivitiesRequest $request
     * @return RedirectResponse
     */
    public function postCreate(ActivitiesRequest $request): RedirectResponse
    {
        $activities = Activities::create($request->validated());
        event(new RefreshApplicationEvent('Activity created'));

        return redirect()->route('home.index')->with('activity', 'Activité ajoutée');
    }


    public function update(Activities $activity): View
    {
        $activitiesNames = $this->getActivitiesNames();

        return view('activities.update', [
            'activity' => $activity,
            'activitiesNames' => $activitiesNames,
        ]);
    }

    public function postUpdate(Activities $activity, ActivitiesRequest $request): RedirectResponse
    {
        $activity->update($request->validated());
        event(new RefreshApplicationEvent('Activity updated'));

        return redirect()->route('home.index')->with('activity', 'Activité modifiée');
    }

    public function delete(Activities $activity): RedirectResponse
    {
        $activity->update(['status' => 0]);
        event(new RefreshApplicationEvent('Activity deleted'));

        return redirect()->route('home.index')->with('activity', 'Activité supprimée avec succès');
    }

    private function getActivitiesNames(): Collection|array
    {
        return Activities::query()
            ->where('status', '=', 1)
            ->groupBy('name')
            ->get();
    }

}
