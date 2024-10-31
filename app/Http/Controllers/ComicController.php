<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    public function index()
    {
        $comics = config('comics');
        return view('comics.index', compact('comics'));
    }

    public function show($index)
    {
        $comics = config('comics');
        if (!isset($comics[$index])) {
            abort(404);
        }
        $comic = $comics[$index];
        return view('comics.show', compact('comic'));
    }

    public function edit($index)
    {
        $comics = config('comics');
        if (!isset($comics[$index])) {
            abort(404);
        }
        $comic = $comics[$index];
        return view('comics.edit', compact('comic', 'index'));
    }

    public function create()
    {
        return view('comics.create');
    }

    public function store(StoreComicRequest $request)
    {
        // Usa i dati validati dalla StoreComicRequest
        $comic = [
            'id' => count(config('comics')) + 1,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumb' => $request->input('thumb'),
            'price' => $request->input('price'),
            'series' => $request->input('series'),
            'sale_date' => $request->input('sale_date'),
            'type' => $request->input('type'),
        ];

        $comics = config('comics');
        $comics[] = $comic;

        return redirect()->route('comics.index')->with('success', 'Fumetto creato con successo!');
    }

    public function update(UpdateComicRequest $request, $index)
    {
        $comics = config('comics');
        if (!isset($comics[$index])) {
            return redirect()->route('comics.index')->with('error', 'Fumetto non trovato!');
        }


        $comics[$index]['title'] = $request->input('title');
        $comics[$index]['description'] = $request->input('description');
        $comics[$index]['thumb'] = $request->input('thumb');
        $comics[$index]['price'] = $request->input('price');
        $comics[$index]['series'] = $request->input('series');
        $comics[$index]['sale_date'] = $request->input('sale_date');
        $comics[$index]['type'] = $request->input('type');

        return redirect()->route('comics.index')->with('success', 'Fumetto aggiornato con successo!');
    }

    public function destroy($index)
    {
        $comics = config('comics');

        if (isset($comics[$index])) {
            unset($comics[$index]);

            return redirect()->route('comics.index')->with('success', 'Fumetto eliminato con successo!');
        }

        return redirect()->route('comics.index')->with('error', 'Fumetto non trovato.');
    }
}