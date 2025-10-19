<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Memory;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class FlashCardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cardType' => ['required', 'in:flashcard,text'],
            'question' => ['nullable', 'string'],
            'answer'   => ['required', 'string'],
        ]);

        Card::query()->create([
            'type'     => $request->cardType,
            'question' => $request->question,
            'answer'   => $request->answer,
            'user_id'  => $request->user()->id,

        ]);

        return back()->with('success', 'Flashcard created successfully!');
    }

    public function index(Request $request)
    {
        $cards = Card::query()
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return inertia('flashcard/Card', [
            'cards' => $cards,
        ]);
    }
}
