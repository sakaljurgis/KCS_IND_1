<?php

namespace KCS;

use KCS\Model\ToStringInterface;

class Render
{
    public function render($duom): void
    {
         $str = '';

         if ($duom instanceof ToStringInterface){
             echo $duom;
             return;
         }

        if (is_array($duom)) {
            foreach ($duom as $item) {
                if ($duom instanceof ToStringInterface){
                    $str .= $duom;
                } elseif(is_array($item)) {
                    $str .= "\n" . implode(',', $item);
                } elseif(is_string($item)) {
                    echo $item;
                } else {
                    echo "...";
                }
            }
            echo $str ?: 'Missing data.';
        } else {
            echo $duom;
        }
    }
}