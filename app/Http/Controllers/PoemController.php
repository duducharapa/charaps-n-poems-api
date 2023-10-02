<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Poem;
use App\Models\Stanza;
use App\Models\Verse;
use Illuminate\Http\Request;

class PoemController extends Controller
{

    public function index()
    {
        $poems = Poem::all();

        return PoemResource::collection($poems);
    }
    
    public function store(Request $request)
    {
        $stanzaNumber = 1;
        $input = $request->all();
        
        $poem = new Poem([
            'name' => $input['name']
        ]);
        $poem->saveOrFail();

        foreach ($input['stanzas'] as $stanzaVerses) {
            $verseNumber = 1;

            $stanza = new Stanza([
                'number' => $stanzaNumber,
                'poem_id' => $poem->id
            ]);
            $stanza->saveOrFail();

            foreach ($stanzaVerses as $verseText) {
                $verse = new Verse([
                    'number' => $verseNumber,
                    'text' => $verseText,
                    'stanza_id' => $stanza->id
                ]);
                $verse->saveOrFail();
                $verseNumber++;
            }

            $stanzaNumber++;
        }

        return new PoemResource($poem);
    }

}
