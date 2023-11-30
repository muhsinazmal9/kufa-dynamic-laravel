<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Traits\ImageSaveTrait;

class BrandController extends Controller
{
    // `trait` for ease of saving, updating or deleting images by image intervantion
    use ImageSaveTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['brands'] = Brand::latest()->paginate(10); // with pagination 😉
        // confirm delete
        $title = 'Delete Brand!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // --------------------------

        return view('backend.brands.indexCreate', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // for simplicity, avoided this
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_url' => 'required|active_url'
        ]);

        // store in a variable as array
        $data = [
            // saving the image to storage by trait
            'image_url' => $this->saveImage('brands', $request->image_url, 150,69),
            'brand_url' => $request->brand_url
        ];

        // finally, create a new brand
        Brand::create($data);

        return redirect()->back()->withToastSuccess('Brand added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $data['brand'] = $brand;
        return view('backend.brands.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_url' => 'active_url'
        ]);

        $data = $request->except('image_url', '_token', '_method');

        if($request->hasFile('image_url')) {
            $data['image_url'] = $this->updateImage('brands', $request->image_url, $brand->image_url, 150, 69);
        }
        $brand->update($data);

        return redirect()->route('brands.index')->withToastSuccess('Updated successfully');
        // dd($data);
        // dd($request, $brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // delete from storage
        $this->deleteFile($brand->image_url);

        $brand->delete();
        return redirect()->route('brands.index')->withToastSucess('Brand deleted successfully');
    }
}
