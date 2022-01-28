<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\ShortenRequest;
use App\Models\Link;
use App\Services\LinkService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class LinkController extends Controller
{

    public function shorten(ShortenRequest $request, LinkService $service): RedirectResponse
    {
        $sourceLink = $request->getLink();

        $urlPostfix = $service->linkPostfixGenerate();

        $linkFromDb = Link::query()
            ->where('source_link', $sourceLink)
            ->first();

        if ($linkFromDb) {
            return back()->with('success', route('away', ['postfix' => $linkFromDb->url_postfix]));
        }

        $shortLink = Link::query()
            ->create([
            'source_link' => $sourceLink,
            'url_postfix' => $urlPostfix
        ]);

        if ($shortLink) {
            return back()->with('success', route('away', ['postfix' => $urlPostfix]));
        }

        return back()->with('errors', 'Failed to save link');
    }

    public function away(string $postfix): RedirectResponse
    {
        $link = Link::query()
            ->where('url_postfix', $postfix)
            ->firstOrFail();

        return redirect()->away($link->source_link);
    }
}
