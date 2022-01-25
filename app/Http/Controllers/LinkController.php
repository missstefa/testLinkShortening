<?php

namespace App\Http\Controllers;

use App\Actions\ShortenAction;
use App\Http\Requests\Link\ShortenRequest;
use Illuminate\Routing\Controller;

class LinkController extends Controller
{

    public function shorten(ShortenRequest $request)
    {
        try {
            return view('welcome', ['shortLink' => ShortenAction::execute($request->getLink())]);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }
}
