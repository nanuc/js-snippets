<?php

namespace Nanuc\JSSnippets;

class Snippet
{
   public static function getViewPathForHash($hash)
   {
       return storage_path('framework/views/' . $hash . '.js');
   }
}
