<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClothingItem;

class ClothingItemController extends Controller
{
    //
    public function index()
    {
        // Fetch all clothing items from the database
        // and pass them to the view
        // This will be used to display the list of items
        $items = ClothingItem::all();
        return view('clothing-items.index', compact('items'));
    }

    public function show(ClothingItem $clothingItem)
    {
        // Fetch a single clothing item by its ID
        // and pass it to the view
        return view('clothing-items.show', compact('clothingItem'));
    }


    public function create()
    {
        // Show the form to create a new clothing item
        // This will be used to display the form for adding a new item
        return view('clothing-items.create');
    }

    public function store(Request $request)
    {
        // Validate the request data will be needed
        // and create a new clothing item in the database
        // This will be used to save the new item
        ClothingItem::create($request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'color' => 'required',
        ]));

        return redirect()->route('clothing-items.index');
    }

    public function edit(ClothingItem $clothingItem)
    {
            // Show the form to edit an existing clothing item
            // The $clothingItem is automatically resolved by the route model binding
            return view('clothing-items.edit', compact('clothingItem'));
    }

    public function update(Request $request, ClothingItem $clothingItem)
    {
            // Validate the request data and update the clothing item in the database
            // This will be used to save the changes made to an existing item
            // The $clothingItem is automatically resolved by the route model binding
            $clothingItem->update($request->validate([
                'name' => 'required',
                'size' => 'required',
                'price' => 'required|numeric',
                'color' => 'required',
            ]));

            return redirect()->route('clothing-items.index');
    }


    public function destroy(ClothingItem $clothingItem)
    {
        $clothingItem->delete();
        return redirect()->route('clothing-items.index');
    }
}
