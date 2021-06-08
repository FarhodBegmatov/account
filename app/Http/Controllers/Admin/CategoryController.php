<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $categories = Category::query()->orderBy('id')->paginate('10');

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $tips = Tip::all();
        return view('admin.categories.create', ['tips' => $tips]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tip_id' => 'required|integer|exists:tips,id',
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->fill($data);
        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'The category is added successfully!');
        }
        return redirect()->route('admin.categories.create')->with('danger', 'The category is not added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $tips = Tip::all();
        return view('admin.categories.edit', ['tips' => $tips, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'tip_id' => 'required|integer|exists:tips,id',
            'category_name' => 'required|string|max:255',
        ]);

        if ($category->update($data)) {
            return redirect()->route('admin.categories.index')->with('success', 'The category is edited successfully!');
        }
        return redirect()->route('admin.categories.create')->with('danger', 'There was an error for editing the category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('admin.categories.index')->with('success', 'The category is deleted successfully!');
        }
        return redirect()->route('admin.categories.index')->with('success', 'There was an error for deleting the category!');
    }

    public function search(Request $request){

        $s = $request->s;
        $categories = Category::where('category_name', 'LIKE', "%{$s}%")->orderBy('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
}
