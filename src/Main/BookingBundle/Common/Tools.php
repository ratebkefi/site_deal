<?php

namespace Main\BookingBundle\Common;

class Tools
{
    public static function dropNull($array)
    {
        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                if ($value == "") {
                    unset($array[$key]);
                }else{
                    $array[$key]=trim($value);
                }
            }
            return $array;
        }else{
            return array();
        }

    }

    public static function generatecodeCoupon($dealid, $orderItemId, $qte)
    {
        $name = $dealid;
        $name .= $orderItemId;
        $name .= $qte + 1;
        // get random number
        $length = 5;
        $characters = '0123456789';
        $string = '';
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[rand(0, 9)];
        }
        //$name.="-".$string;
        $name .= $string;
        return $name;
    }

    public static function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@{}[]()+-*c";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public static function array_sort($array, $on, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

    public static function encrypt($data)
    {
        $key = "secret";  // Clé de 8 caractères max
        $data = serialize($data);
        $td = mcrypt_module_open(MCRYPT_DES, "", MCRYPT_MODE_ECB, "");
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = base64_encode(mcrypt_generic($td, '!' . $data));
        mcrypt_generic_deinit($td);
        return $data;
    }

    public static function decrypt($data)
    {
        $key = "secret";
        $td = mcrypt_module_open(MCRYPT_DES, "", MCRYPT_MODE_ECB, "");
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = mdecrypt_generic($td, base64_decode($data));
        mcrypt_generic_deinit($td);

        if (substr($data, 0, 1) != '!')
            return false;

        $data = substr($data, 1, strlen($data) - 1);
        return unserialize($data);
    }

    public static function string2url($str)
    {
        $str = trim($str);
        $str = strtolower($str);
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = str_replace(" ", "_", $str);
        $str = str_replace("'", "_", $str);
        $str = str_replace(":", "", $str);
        $str = str_replace(";", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace("’", "", $str);
        $str = str_replace("(", "", $str);
        $str = str_replace(")", "", $str);
        $str = str_replace('"', '', $str);
        $str = str_replace("/", "-", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace("#", "", $str);
        $str = str_replace("{", "", $str);
        $str = str_replace("}", "", $str);
        $str = str_replace("‘", "", $str);
        $str = str_replace(">", "", $str);
        $str = str_replace("<", "", $str);
        $str = str_replace("?", "", $str);
        $str = str_replace("!", "", $str);
        $str = str_replace('$', "", $str);
        $str = str_replace('&', "-", $str);
        $str = str_replace('*', "-", $str);
        $str = str_replace('@', "-", $str);
        $str = str_replace("|", "-", $str);
        $str = str_replace("%", "", $str);
        $str = str_replace("__", "-", $str);
        $str = str_replace("_", "-", $str);
        $str = str_replace("---", "-", $str);
        $str = str_replace("--", "-", $str);
        $str = preg_replace("#[^a-zA-Z-_]#", "", $str);
        $str = str_replace("_", "-", $str);
        $str = str_replace("---", "-", $str);
        $str = str_replace("--", "-", $str);
        return strtolower($str);
    }

    public static function dump($data, $tst = FALSE)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if ($tst)
            exit;
    }

    public static function reformatDate($str)
    {
        $date = explode("/", $str);
        $dt = new \DateTime();
        $dt->setDate($date[2], $date[1], $date[0]);
        return $dt;
    }

    public static function reformatDateTime($time)
    {
        $tab = explode(' ', $time);
        $heur = explode(':', $tab[1]);
        $date = explode("/", $tab[0]);
        $dt = new \DateTime();
        $dt->setDate($date[2], $date[1], $date[0]);
        $dt->setTime($heur[0], $heur[1]);
        return $dt;
    }

    public static function reformatTime($time)
    {
        $tab = explode(":", $time);
        if (strlen($tab[0]) == 1) {
            $tab[0] = "0" . $tab[0];
        }
        $dt = new \DateTime();
        $dt->setTime($tab[0], $tab[1]);
        return $dt;
    }

}
