<?php

error_reporting(E_ALL ^ E_NOTICE);

class base
{
    function ALPHABET()
    {
        $ALPHABET = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789-_";
        return $ALPHABET;
    }

    function encode64($num)
    {
        $base = 64;
        $out = "";
        for ($t = floor(log10($num) / log10($base)); $t >= 0; $t--) {
            $a = floor($num / pow($base, $t));
            $out = $out . substr($this->ALPHABET(), $a, 1);
            $num = $num - ($a * pow($base, $t));
        }
        return $out;
    }

    function decode64($val_str)
    {
        $nDec = 0;
        for ($i = 0; $i < strlen($val_str); $i++) {
            $char = substr($val_str, $i, 1);
            $nDec = $nDec * 64 + strpos($this->ALPHABET(), $char);
        }
        return $nDec;
    }
}


$b64 = new base();
echo $b->encode64(79715037088278);
echo $b->decode64('BEARD');
