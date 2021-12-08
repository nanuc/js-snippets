<?php

namespace Nanuc\JSSnippets\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;
use JShrink\Minifier;

class Snippet extends Component
{
    public function render()
    {
        return function (array $data) {
            if(!in_array(app()->environment(), config('js-snippets.environments'))) {
                return '@push("' . config('js-snippets.stack') . '")' . $data['slot'] . PHP_EOL . '@endpush';
            }

            $hash = md5($data['slot']);
            $filepath = \Nanuc\JSSnippets\Snippet::getViewPathForHash($hash);

            if(!File::exists($filepath)) {
                $minifiedJavascript = Minifier::minify(str_replace(['<script>', '</script>'], '', $data['slot']));
                file_put_contents($filepath, $minifiedJavascript);
            }

            return '@push("' . config('js-snippets.stack') . '")<script src="' . url(config('js-snippets.url') . '/' . $hash . '.js') . '"></script>' . PHP_EOL . '@endpush';
        };
    }
}
