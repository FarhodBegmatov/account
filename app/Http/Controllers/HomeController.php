<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

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
        $finances = Finance::query()
            ->with(['tip', 'category'])
            ->orderBy('id')
            ->paginate(10);

        return view('home', compact('finances'));
    }
    public function search(Request $request)
    {
        $item = $request->item;
        $finances = Finance::where('comment', 'LIKE', "%{$item}%")
            ->orderBy('id')->paginate(10);
        return view('home', compact('finances'));
    }
}
