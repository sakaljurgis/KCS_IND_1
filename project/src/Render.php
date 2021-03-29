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
                if ($item instanceof ToStringInterface){
                    $str .= "<br>" . $item;
                } elseif(is_array($item)) {
                    $str .= "<br>" . implode(',', $item);
                } elseif(is_string($item)) {
                    echo $item;
                } else {
                    echo "Unknown data provided<br>";
                }
            }
            echo $str ?: 'Missing data.';
        } else {
            echo $duom;
        }
    }
}