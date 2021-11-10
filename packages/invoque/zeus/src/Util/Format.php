<?php

namespace Invoque\Zeus\Util;

class Format
{
    public static function moneyUS($valor)
    {
        return str_replace(['.', ',', 'R$ '], ['', '.', ''], $valor);
    }

    public static function moneyBR($valor)
    {
        return number_format($valor, 2, ',', '.');
    }

    public static function addressJson(Array $data)
    {
        $return = [];

        foreach (array_keys($data) as $key)
        {
            if(strstr($key, 'end_'))
            {
                $return[$key] = $data[$key];
            }
        }

        return $return;
    }

    public static function contactJson(Array $data)
    {
        $return = [];

        foreach (array_keys($data) as $key)
        {
            if(strstr($key, 'ctt_'))
            {
                $return[$key] = $data[$key];
            }
        }

        return $return;
    }
}
