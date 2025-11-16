<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login');
        }
        $items = Item::all();
        return view('main', compact('items'));
    }

    public function store(Request $request)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        Item::create($request->only('name', 'description'));
        return redirect('/main');
    }

    public function update(Request $request, $id)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);
        $item = Item::findOrFail($id);
        $item->update($request->only('name', 'description'));
        return redirect('/main');
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login');
        }
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('/main');
    }
} 