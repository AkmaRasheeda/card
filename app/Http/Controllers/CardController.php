<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function distribute(Request $request) {
        $cards = [];
        if ($request->number_of_people) {
            $numberOfPeople = $request->number_of_people;
            $suits = ['S', 'H', 'D', 'C']; // Spade = S, Heart = H, Diamond = D, Club = C

            for ($i = 1; $i <= $numberOfPeople; $i++) {
                foreach ($suits as $suit) {
                    for ($j = 1; $j <= 13; $j++) {
                        $cards[$i][] = "$suit-" . ($j > 1 && $j <= 9 ? $j : ($j == 1 ? 'A' : ($j == 10 ? 'X' : ($j == 11 ? 'J' : ($j == 12 ? 'Q' : 'K')))));
                    }
                }
                shuffle($cards[$i]); // Shuffle the cards for each person
            }
        }
        return view('card', compact('cards'))->with(['filters' => $request->all()]);
    }
}
