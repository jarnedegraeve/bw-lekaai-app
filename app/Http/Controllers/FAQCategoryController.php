<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategory;
use App\Http\Controllers\Controller;
use app\Models\FAQItem;


class FAQCategoryController extends Controller
{
    public function index()
    {
        $categories = FAQCategory::with('catagory')->get();
        return view('faq.index', compact('categories'));
    }
    
    
    

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        FAQCategory::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ category created!');
    }

    public function edit(FAQCategory $category)
    {
        return view('faq.edit', compact('category'));
    }

    public function update(Request $request, FAQCategory $category)
    {
        $category->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ category updated!');
    }

    public function destroy(FAQCategory $category)
    {
        $category->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ category deleted!');
    }
}
