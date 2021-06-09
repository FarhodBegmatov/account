<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Finance;
use App\Models\Tip;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::query()
            ->with(['tip', 'category'])
            ->orderBy('id')->paginate(10);

        return view('admin.finance.index', ['finances' => $finances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tips = Tip::all();
        return view('admin.finance.create',['categories' => $categories, 'tips' => $tips]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'tip_id' => 'required|integer|exists:tips,id',
            'category_id' => 'required|integer|exists:categories,id',
            'date' => 'nullable|date',
            'summa' => 'required|integer',
            'comment' => 'nullable|string|max:255'
        ]);

        if($data['date'] == null){
            $data['date'] = date(now());
        }

        $finance = new Finance();
        $finance->fill($data);

        if($finance->save()){
            return redirect()->route('admin.finance.index')->with('success', 'Successfully added!');
        }

        return redirect()->route('admin.finance.create')->with('danger', 'There was an error for creating!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        $categories = Category::all();
        $tips = Tip::all();
        return view('admin.finance.edit',['categories' => $categories, 'tips' => $tips, 'finance' => $finance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        $data = $request->validate([
            'tip_id' => 'required|integer|exists:tips,id',
            'category_id' => 'required|integer|exists:categories,id',
            'date' => 'nullable|date',
            'summa' => 'required|integer',
            'comment' => 'nullable|string|max:255'
        ]);

        if($finance->update($data)){
            return redirect()->route('admin.finance.index')->with('success', 'Successfully updated!');
        }

        return redirect()->route('admin.finance.edit')->with('danger', 'There was an error for updating!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        if($finance->delete()){
            return redirect()->route('admin.finance.index')->with('success', 'Successfully deleted!');
        }
        return redirect()->route('admin.finance.index')->with('success', 'There was an error for deleting the category!');
    }

    public function search(Request $request)
    {
        $p = $request->p;
        $finances = Finance::where('comment', 'LIKE', "%{$p}%")
            ->orderBy('id')->paginate(10);
        return view('admin.finance.index', compact('finances'));
    }
}
