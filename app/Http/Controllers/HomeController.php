<?php

namespace App\Http\Controllers;

use App\Models\Reminders;
use App\Services\DateService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home/index');
    }

    public function postReminder(Request $request, DateService $dateService)
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
        } else {
            Reminders::create([
                'text' => $reminderText,
                'date' => $dateService->getDateTimeFromFormattedDate($reminderDate)->format('Y-m-d')
            ]);
        }

        session()->push('date', $reminderDate);

        return redirect()->route('home-index');
    }
}
