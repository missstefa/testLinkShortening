<?php

namespace App\Http\Controllers;

use App\Actions\ShorteningAction;
use App\Http\Requests\Link\ShortenRequest;
use Illuminate\Routing\Controller;

class LinkController extends Controller
{
    public function shorten(ShortenRequest $request) {
        return view('welcome', ['shortLink' => ShorteningAction::execute($request->getLink())]);
    }
}
