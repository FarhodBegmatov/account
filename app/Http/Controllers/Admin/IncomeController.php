<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::query()->where('tip_id', '1')->paginate(10);
        return view('admin.income.index', ['finances' => $finances]);
    }

    public function search(Request $request)
    {
        $i = $request->i;
        $finances = Finance::where('comment', 'LIKE', "%{$i}%")
            ->where('tip_id', '1')
            ->orderBy('id')->paginate(10);
        return view('admin.income.index', compact('finances'));
    }
}
