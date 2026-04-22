<?php

namespace EvMak;

class Utils
{
    public static function generateHash($username)
    {
        $date = date('d-m-Y');
        return md5($username . '|' . $date);
    }
}