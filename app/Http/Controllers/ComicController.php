<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        // Rimuovi la validazione per ora
        $comic = [
            'id' => count(config('comics')) + 1,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumb' => $request->input('thumb'),
            'price' => $request->input('price'), // Aggiungi altri campi se necessari
            'series' => $request->input('series'),
            'sale_date' => $request->input('sale_date'),
            'type' => $request->input('type'),
        ];

        $comics = config('comics');
        $comics[] = $comic;

        // Salva il nuovo fumetto nel file di configurazione (se necessario)
        // Puoi implementare un metodo per scrivere nel file qui

        return redirect()->route('comics.index')->with('success', 'Fumetto creato con successo!');
    }

    public function update(Request $request, $index)
    {
        $comics = config('comics');
        if (!isset($comics[$index])) {
            return redirect()->route('comics.index')->with('error', 'Fumetto non trovato!');
        }

        // Aggiorna i campi senza validazione
        $comics[$index]['title'] = $request->input('title');
        // Aggiungi altri campi da aggiornare se necessario

        // Salva le modifiche nel file di configurazione (se necessario)
        // Puoi implementare un metodo per scrivere nel file qui

        return redirect()->route('comics.index')->with('success', 'Fumetto aggiornato con successo!');
    }

    public function destroy($index)
    {
        // Carica i fumetti dal file di configurazione
        $comics = config('comics');

        // Verifica se il fumetto esiste
        if (isset($comics[$index])) {
            // Rimuovi il fumetto dall'array
            unset($comics[$index]);

            // Salva i cambiamenti nel file di configurazione (opzionale)
            // Puoi implementare la logica per scrivere di nuovo nel file

            return redirect()->route('comics.index')->with('success', 'Fumetto eliminato con successo!');
        }

        return redirect()->route('comics.index')->with('error', 'Fumetto non trovato.');
    }
}
