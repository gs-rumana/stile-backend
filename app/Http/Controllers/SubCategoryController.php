<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('id', 'desc')->paginate(20);
        return view('pages.dashboard.sub-categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('pages.dashboard.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('sub-categories', $imageName, 'public');

        $slug = Str::slug($request->name, '-');

        $originalSlug = $slug;
        $counter = 1;

        while (SubCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $subCategory = SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => 'sub-categories/' . $imageName,
            'slug' => $slug
        ]);

        return redirect()->route('sub-categories.index')->with(['success' => "Sub Category Created Successfully", "id" => $subCategory->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

    public function subCategoriesOfCategory(Category $category) {
        $subCategories = $category->subCategories()->get();
        return response()->json($subCategories);
    }
}
