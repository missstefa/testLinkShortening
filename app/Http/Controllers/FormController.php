<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use Illuminate\Routing\Controller;

class FormController extends Controller
{
    public function index() {
        return view('welcome', ['shortLink' => null]);
    }

    public function store(LinkStoreRequest $request) {
        $shortLink = file_get_contents("http://tinyurl.com/api-create.php?url=".$request->getLink());
        return view('welcome', ['shortLink' => $shortLink]);
    }
}
