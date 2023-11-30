<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'categories' => PortfolioCategory::latest()->paginate(10),
        ];

        // confirm delete
        $title = 'Delete Brand!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // --------------------------

        return view('backend.portfolio.category.indexCreate', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Category name must not be empty'
        ]);

        $data = $validated + [
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
        ];

        if ($request->description) {
            $data['description'] = $request->description;
        }

        PortfolioCategory::create($data);
        return redirect()->route('portfolio-categories.index')->withToastSuccess('Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        $data = [
            'category' => $portfolioCategory,
        ];
        return view('backend.portfolio.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Category name must not be empty'
        ]);
        $request->slug ? $request['slug'] = Str::slug($request->slug) : $request['slug'] = Str::slug($request->name );
        $portfolioCategory->update($request->except('_token','_method'));

        return redirect()->route('portfolio-categories.index')->withToastSuccess('Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();
        return redirect()->route('portfolio-categories.index')->withToastSuccess('Category deleted successfully!');
    }
}
