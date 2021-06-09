<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::query()->where('tip_id', '2')->paginate(10);
        return view('admin.consumption.index', ['finances' => $finances]);
    }

    public function search(Request $request)
    {
        $c = $request->c;
        $finances = Finance::where('comment', 'LIKE', "%{$c}%")
            ->where('tip_id', '2')
            ->orderBy('id')->paginate(10);
        return view('admin.consumption.index', compact('finances'));
    }
}
