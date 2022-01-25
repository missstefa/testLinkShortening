<?php

namespace App\Http\Controllers;

use App\Actions\ShorteningAction;
use App\Http\Requests\LinkStoreRequest;
use Illuminate\Routing\Controller;

class FormController extends Controller
{
    public function shorten(LinkStoreRequest $request) {
        return view('welcome', ['shortLink' => ShorteningAction::execute($request->getLink())]);
    }
}
