<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = config('comics');
        return view('index', compact('comics'));
    }



    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    public function create()
    {
        return view('comics.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'thumb' => 'required|url',
        'price' => 'required|numeric',
        'series' => 'nullable|string|max:255',
        'sale_date' => 'nullable|date',
        'type' => 'nullable|string|max:255',
    ]);

    Comic::create($data);
    return redirect()->route('comics.index')->with('success', 'Fumetto creato con successo!');
}


    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'series' => 'nullable|string',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|string',
        ]);

        $comic->update($data);
        return redirect()->route('comics.index')->with('success', 'Fumetto aggiornato con successo.');
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('success', 'Fumetto eliminato con successo.');
    }
}