<?php

Route::get(config('js-snippets.url') . '/{hash}.js', \Nanuc\JSSnippets\Http\Controllers\SnippetController::class);