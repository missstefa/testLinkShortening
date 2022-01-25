<?php

namespace App\Http\Controllers;

use App\Http\Actions\ShorteningAction;
use App\Http\Requests\LinkStoreRequest;
use Illuminate\Routing\Controller;

class FormController extends Controller
{
    public function index() {
        return view('welcome', ['shortLink' => null]);
    }

    public function shorten(LinkStoreRequest $request) {
        return view('welcome', ['shortLink' => ShorteningAction::execute($request->getLink())]);
    }
}
