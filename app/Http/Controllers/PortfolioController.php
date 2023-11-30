<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use App\Http\Traits\ImageSaveTrait;

class PortfolioController extends Controller
{
    use ImageSaveTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['portfolios'] = Portfolio::with('category')->latest()->paginate(10);

        // confirm delete
        $title = 'Delete Item!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // --------------------------
        return view('backend.portfolio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = PortfolioCategory::all();
        return view('backend.portfolio.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail_image' => 'required|image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'thumbnail_image' => $this->saveImage('portfolio/thumbnail_image',$request->thumbnail_image, 940, 560),
            'category_id' => $request->category_id,
            'description' => $request->description
        ];

        Portfolio::create($data);

        return redirect()->route('portfolios.index')->withToastSuccess('Portfolio Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('backend.portfolio.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $data['item'] = $portfolio;
        $data['categories'] = PortfolioCategory::all();
        return view('backend.portfolio.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except('_token', '_method' , 'thumbnail_image');

        if ($request->thumbnail_image) {
            $request->validate([
                'thumbnail_image' => 'image|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // storing the name
            $data['thumbnail_image'] = $this->updateImage('portfolio/thumbnail_image',$request->thumbnail_image, $portfolio->thumbnail_image , 940, 560);
        }

        $portfolio->update($data);

        return redirect()->route('portfolios.index')->withToastSuccess('Portfolio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->deleteFile($portfolio->thumbnail_image);
        $portfolio->delete();
        return redirect()->route('portfolios.index')->withToastSucess('Item deleted successfully');
    }
}
