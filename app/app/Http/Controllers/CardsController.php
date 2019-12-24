<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::orderBy('id', 'asc')->get();

        return view('cards.index', compact('cards'));
    }
}
