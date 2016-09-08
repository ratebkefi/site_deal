<?php

namespace Back\DashBundle\Constant;

class NotifUser {

    public static $PLANNING = array(
        1 => "COMMERCIAL",
        2 => "PALAINER",
        3 => "ROLE_SUPER_ADMIN"
    );
    public static $LiaisonPLANNING = array(
        1 => "COMMERCIAL",
        2 => "PALAINER",
        3 => "ROLE_SUPER_ADMIN",
        4 => "REDACTEUR"
    );
    public static $RedactionDEAL = array(
        1 => "PALAINER",
        2 => "ROLE_SUPER_ADMIN"
    );
    public static $AjoutProtocole = array(
        1 => "PALAINER",
        2 => "ROLE_SUPER_ADMIN"
    );
    public static $ValidationDEAL = array(
        1 => "PALAINER",
        2 => "ROLE_SUPER_ADMIN",
        3 => "REDACTEUR"
    );
    public static $AjouterCollaborateur = array(
        1 => "ROLE_SUPER_ADMIN"
    );
    public static $ContratCollaborateur = array(
        1 => "ROLE_SUPER_ADMIN"
    );
    public static $RetraiCaisse = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "FINANCIER"
    );
    public static $CreateFacture = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "DAF"
    );
    public static $CreateFacture2 = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "DAF",
        3 => "FINANCIER"
    );
    public static $RappelCollab = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "DAF",
        3 => "FINANCIER"
    );
    public static $NouveauTicket = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "CHEFSERVICECLI",
        3 => "RESPONSABLECAISSE",
        4 => "DAF",
    );
    public static $OuvrirTicket = array(
        1 => "SERVICECLIENT",
        2 => "CHEFSERVICECLI"
    );
    public static $AucunRetrait = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "RESPONSABLECAISSE",
        3 => "DAF",
    );
    public static $DemandeRemboursement = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "CHEFSERVICECLI",
        3 => "DAF",
    );
    public static $DemandePaiement = array(
        1 => "ROLE_SUPER_ADMIN",
        2 => "FINANCIER",
        3 => "DAF",
        4 => "PALAINER",
    );

    public static function getRetraiCaisse() {
        return self::$RetraiCaisse;
    }

    public static function getAucunRetrait() {
        return self::$AucunRetrait;
    }

    public static function getNotifPlanning() {
        return self::$PLANNING;
    }

    public static function getNotifLivraisonPlanning() {
        return self::$LiaisonPLANNING;
    }

    public static function getRedactionDEAL() {
        return self::$RedactionDEAL;
    }

    public static function getValidationDEAL() {
        return self::$ValidationDEAL;
    }

    public static function getContratCollaborateur() {
        return self::$ContratCollaborateur;
    }

    public static function getCreateFacture() {
        return self::$CreateFacture;
    }

    public static function getRappelCollab() {
        return self::$RappelCollab;
    }

    public static function getNouveauTicket() {
        return self::$NouveauTicket;
    }

    public static function getOuvrirTicket() {
        return self::$OuvrirTicket;
    }

    public static function getCreateFacture2() {
        return self::$CreateFacture2;
    }

    public static function getAjoutProtocole() {
        return self::$AjoutProtocole;
    }

    public static function getDemandeRemboursement() {
        return self::$DemandeRemboursement;
    }

    public static function getDemandePaiement() {
        return self::$DemandePaiement;
    }

}
