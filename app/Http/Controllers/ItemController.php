<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Events\UserLog;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('item.index', [
            'items' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'item_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $log_entry = auth()->user()->name.' has added an item to the list.';

        UserLog::dispatch($log_entry); //calling the UserLog event with dispatch method and passed the $log_entry as parameter

        Item::create($attributes);

        return redirect('/items')->with('success', 'Item has been added to the list.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        // dd($item);
        return view('item.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $attributes = $request->validate([
            'item_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'qty' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $log_entry = auth()->user()->name.' has updated an item from the list.';

        UserLog::dispatch($log_entry);

        $item->update($attributes);

        return redirect('/items')->with('success', 'Item has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        $log_entry = auth()->user()->name.' has removed an item from the list.';

        UserLog::dispatch($log_entry); //calling the UserLog event with dispatch method and passed the $log_entry as parameter

        return back()->with('success', 'Item has been removed from the list.');
    }
}
