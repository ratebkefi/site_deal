<?php

namespace Back\CommandeBundle\Constant;

class EtatCoupon
{
    public static $VENDUCOUPON = array(
        1 => "En attente",
        2 => "Payé",
        3 => "Délivré",
        4 => "En attente de remboursemment",
        5 => "Remboursé",
        6 => "Annulé",
        7 => "Rembourcemment Annulé"

    );
    public static $RECUCOUPON = array(
        1 => "Non Consommé",
        2 => "Consommé",
        3 => "Consommé et Facturé"
    );

    public static function getVenduCoupon()
    {
        return self::$VENDUCOUPON;
    }

    public static function getItemVenduCoupon($id)
    {
        $tab = self::$VENDUCOUPON;
        return $tab[$id];
    }

    public static function getRecuCoupon()
    {
        return self::$RECUCOUPON;
    }

    public static function getItemRecuCoupon($id)
    {
        $tab = self::$RECUCOUPON;
        return $tab[$id];
    }
}