<?php

namespace Nanuc\JSSnippets\Http\Controllers;

use Nanuc\JSSnippets\Snippet;

class SnippetController
{
    public function __invoke($hash)
    {
        return response()->download(Snippet::getViewPathForHash($hash));
    }
}
