<?php

namespace App\Http\Controllers;

use App\Events\RefreshApplicationEvent;
use App\Models\Reminders;
use App\Services\DateService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('home/index');
    }

    public function postReminder(Request $request, DateService $dateService): RedirectResponse
    {

        $reminderText = $request->get('reminder');
        $reminderDate = $request->get('date');

        $reminder = Reminders::query()
            ->where('date', 'like', '%' . $dateService->getDateTimeFromFormattedDate($reminderDate)->format('Y-m-d') . '%')
            ->first();

        if ($reminder) {
            $reminder->update([
                'text' => $reminderText
            ]);
            event(new RefreshApplicationEvent('Reminder updated'));
        } else {
            Reminders::create([
                'text' => $reminderText,
                'date' => $dateService->getDateTimeFromFormattedDate($reminderDate)->format('Y-m-d')
            ]);
            event(new RefreshApplicationEvent('Reminder created'));
        }

        session()->push('date', $reminderDate);

        return redirect()->route('home.index');
    }
}
