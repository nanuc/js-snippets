## Installation
`composer require nanuc/js-snippets`

Publish config (optionally): 
`php artisan vendor:publish --provider="Nanuc\JSSnippets\JSSnippetsServiceProvider" --tag=config`


## Usage
```
<x-js-snippet>
    <script>
        console.log('Hello');
        console.log('I will');
        console.log('get minified');
        console.log('and downloaded as a plain Javascript file');
    </script>
</x-js-snippet>
```

Scripts in the `js-snippet` component will get minified (thanks to https://github.com/tedious/JShrink) and loaded as separate Javascript source.

You need to define the stack that the script tag will be pushed to (default: `scripts`).

By default this will only be run in the `production` environment (you can change this in the config).

## Behind the scenes
The component will minify its content and put it in a file in the view cache. 
It will also generate a key based on the content.

Then it will create a script tag with a link that downloads this file as a plain Javascript source.