<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::where('user_id', Auth::id())->orderBy('start_date')->paginate(10);

        return view('home', compact('events'));
    }

    public function search(Request $request) {
        $search = $request->search;
        $events = Event::where('title', 'LIKE', "%{$search}%")->paginate(10);

        return view('home', compact('events'));
    }
}
