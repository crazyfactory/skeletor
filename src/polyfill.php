<?php
if (!function_exists('readline')) {
    function readline($string)
    {
        echo $string;
        $line = fgets(STDIN);
        $line = rtrim($line, "\n");
        return $line;
    }
}
