<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Card;
use App\Events\CardRegistered;

class CardController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'card_name' => 'required',
            'card_number' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvc' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 401);
        }

        $card = Card::create($request->all());

        event(new CardRegistered($card, $request->user_id));

        return response()->json(compact('card'), 200);
    }
}
