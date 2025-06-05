<?php

namespace App\Http\Controllers;

use App\Exports\EventsExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isEmpty;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:50',
            'body' => 'nullable|string|max:300',
            'place' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date' 
        ];

        $feedback = [
            'title.required' => 'Título é obrigatório!',
            'title.max' => 'Título deve ter no máximo 50 caracteres!',
            'body.max' => 'Descrição deve ter no máximo 300 caracteres!',
            'place.max' => 'Local deve ter no máximo 50 caracteres!',
            'start_date.required' => 'Data de início é obrigatória!',
            'start_date.date' => 'Data de início inválida!',
            'end_date.date' => 'Data de término inválida!'
        ];

        $request->validate($rules, $feedback);

        $end_date = $request->end_date;

        if (isEmpty($end_date)) {
            $end_date = $request->start_date;
        }

        Event::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('home')->with('new', 'Nova tarefa criada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        return view('show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        return view('edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $rules = [
            'title' => 'required|string|max:50',
            'body' => 'nullable|string|max:1000',
            'place' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date' 
        ];

        $feedback = [
            'title.required' => 'Título é obrigatório!',
            'title.max' => 'Título deve ter no máximo 50 caracteres!',
            'body.max' => 'Descrição deve ter no máximo 1000 caracteres!',
            'place.max' => 'Local deve ter no máximo 50 caracteres!',
            'start_date.required' => 'Data de início é obrigatória!',
            'start_date.date' => 'Data de início inválida!',
            'end_date.date' => 'Data de término inválida!'
        ];

        $request->validate($rules, $feedback);

        $end_date = $request->end_date;

        if (isEmpty($end_date)) {
            $end_date = $request->start_date;
        }

        $event->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('home')->with('new', 'Tarefa editada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('home');
    }

    public function excelExport() {
        return Excel::download(new EventsExport, 'agenda.xlsx');
    }
}
