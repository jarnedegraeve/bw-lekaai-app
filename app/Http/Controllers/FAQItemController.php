<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategory;
use App\Models\FAQItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQCategoryRequest;
use App\Http\Requests\FAQItemRequest;

class FAQItemController extends Controller
{
    public function create(FAQCategory $category)
    {
        return view('faq.create_item', compact('category'));
    }

    public function store(Request $request, FAQCategory $category)
    {
        // Assuming your request contains the necessary fields for FAQItem
        $category->items()->create($request->all());
    
        return redirect()->route('faq.index')->with('success', 'FAQ item created!');
    }
    

    
    
    

    public function edit(FAQCategory $category, FAQItem $item)
    {
        return view('faq.edit_item', compact('category', 'item'));
    }

    public function update(Request $request, FAQCategory $category, FAQItem $item)
    {
        $item->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ item updated!');
    }

    public function destroy(FAQCategory $category, FAQItem $item)
    {
        $item->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ item deleted!');
    }
}


