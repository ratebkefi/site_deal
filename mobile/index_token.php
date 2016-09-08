<?php
header('Access-Control-Allow-Origin: *');
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

if(isset($_GET['action']) && !empty($_GET['action'])) 
{
    $action = $_GET['action'];
    
    switch($action) 
    {
        case 'auth' : Gateway::auth(); break;
        case 'refresh' : Gateway::refresh(); break;
        case 'reception' : Gateway::reception(); break;
        case 'demandePay' : Gateway::demandePay(); break;
        
    }
}

class Gateway
{
    private static $db_host = "localhost";
    private static $db_name = "bigdealc_bigdealv2";
    private static $db_user = "bigdealc_admin";
    private static $db_password = 'bigdealv2';
    private static $login = "";
    private static $idM = "0";
	private static $canPayedDeals = array();
	private static $canPayedDealsString = "";
	private static $lastCanPayedDeals = array();
    
    public static function connect_to_db()
    {
       mysql_connect(self::$db_host, self::$db_user, self::$db_password) or die("erreur de connexion au serveur");
       mysql_select_db(self::$db_name) or die("erreur de connexion a la base de donnees");
    }

    public static function auth()
    { 
        Gateway::connect_to_db();
        $datas = false;
        if(Gateway::isValidUser($_POST["login"], $_POST["pwd"]))
        {
                
                $datas = Gateway::getDatas($_POST["login"]);			
        }

        echo json_encode($datas);		
    }
	
    public static function refresh()
    {    
        Gateway::connect_to_db();
        $datas = false;
        if(Gateway::isValidToken($_POST["login"], $_POST["token"]))
        {
            $datas = Gateway::getDatas($_POST["login"]);			
        }

        echo json_encode($datas);		
    }
	
    public static function reception()
    {       
        Gateway::connect_to_db();
        $datas = false;
		
        if(Gateway::isValidToken($_POST["login"], $_POST["token"]))
        {
            // Les Coupons dont la commande est 'Delivered'	:		
            $sql = "SELECT received_at, coupon_validity_start, coupon_validity_end FROM tibh5_enmasse_invty i, tibh5_enmasse_deal d, tibh5_enmasse_order_item oi, tibh5_enmasse_order o, tibh5_enmasse_merchant_branch m WHERE i.name = '". $_POST["couponId"] . "' and i.pdt_id = d.id and i.order_item_id = oi.id and oi.order_id = o.id and o.status='Delivered' and d.merchant_id = m.id and m.login = '". $_POST["login"] . "'";
            $res = mysql_query($sql)  or  die(mysql_error()); 
            $row = mysql_fetch_array($res);            
            if($row)
            {
				$validityStart = $row[1];
				$validityEnd = $row[2];
                $sql = "SELECT received_at FROM tibh5_enmasse_invty WHERE name = '". $_POST["couponId"] . "' and (received_at = '0000-00-00 00:00:00' or received_at IS NULL)";
                $res = mysql_query($sql)  or  die(mysql_error()); 
                $row = mysql_fetch_array($res);
                if($row)
                {
					
					$valid = true;
					if($validityStart != "" and $validityStart != "0000-00-00")
					{
						$now = date("Y-m-d");
						if($now < $validityStart)
							$valid = false;
					}
					
					
					
					if($validityEnd != "" and $validityStart != "0000-00-00")
					{
						$now = date("Y-m-d");
						if($now > $validityEnd)
							$valid = false;
					}
					
					if($valid)
                    {
						$sql = "UPDATE tibh5_enmasse_invty SET received_at = CURRENT_TIMESTAMP WHERE name = '". $_POST["couponId"] . "'";
						$res = mysql_query($sql)  or  die(mysql_error()); 
						$datas = Gateway::getDatas($_POST["login"]);
					}
					else
						$datas = 3;
                }
                else
                    $datas = 2;    
            }
            else
                $datas = 1;
            
        }
        
        echo json_encode($datas);	
    }
    
    public static function demandePay()
    {
        Gateway::connect_to_db();
        $datas = false;
        if(Gateway::isValidToken($_POST["login"], $_POST["token"]))
        {
			$sql = "INSERT INTO tibh5_enmasse_demande_pay values('',". $_POST["dealId"] . ",". $_POST["qte"]. ",". CURRENT_TIMESTAMP .",0,'','')";
			$res = mysql_query($sql)  or  die(mysql_error());             
			$datas = Gateway::getDatas($_POST["login"]);            			
        }

        echo json_encode($datas);		
    }
    
    public static function getDatas($login)
    {
        $datas = array();
        
        $datas["me"] = Gateway::getMe($login);        
        $datas["deals"] = Gateway::getDeals($datas["me"]["id"]);        
        $datas["contacts"] = Gateway::getContacts();        
        $datas["alerts"] = Gateway::getAlerts($datas["me"]["id"]);
		$datas["canPayedDeals"] = self::$canPayedDealsString;
        $datas["token"] = Gateway::getToken($login);
        return $datas;
    }
	
    public static function isValidUser($login, $pwd)
    {
        
        $sql = "SELECT * FROM tibh5_enmasse_merchant_branch WHERE login = '". $login ."' and password = '". $pwd ."'";
        
        $res = mysql_query($sql)  or  die(mysql_error());       
		$row = mysql_fetch_array($res);
        if($row)
        {
            self::$login = $row["login"];
            return true;
            
        }
        return false;
    }

    public static function isValidToken($login, $token)
    {
        $valid = false;
        $last_token = Gateway::getLastToken($login);
        $str = "_*_!BANHUJ.;" . $last_token. "KOLP!?.";
        $trueToken = md5($str);
    
        if($token == $trueToken)
            $valid = true;
        
        return $valid;
    }
        
    
    public static function getLastToken($login)
    {
        $token = "";
        $sql = "SELECT last_token, id FROM tibh5_enmasse_merchant_branch WHERE login = '". $login ."'";
        $res = mysql_query($sql)  or  die(mysql_error());       
        $row = mysql_fetch_array($res);
        
        if($row)
        {
            $token = $row[0];
            self::$idM = $row[1];
        }
        return $token;
    }
    

    public static function getMe($login)
    {   
        $me = array();
        $sql = "SELECT m.id, m.name, p.name, p.address, p.phone FROM tibh5_enmasse_merchant_branch m, tibh5_enmasse_sales_person p WHERE m.login = '". $login ."' and p.id = m.sales_person_id";
        $res = mysql_query($sql)  or  die(mysql_error());       
		$row = mysql_fetch_array($res);
        if($row)
        {
            $me = array(
            "id" => $row[0],
            "societe" => $row[1],
            "name" => $row[2],            
            "adr" => $row[3],
            "tel" => $row[4]
            );
            
        }
        
        return $me;

    }
    
    public static function getSumQtePayementRequest($deal_id)
    {
        $nbr = false;
        $sql = "SELECT SUM(qte) FROM tibh5_enmasse_demande_pay WHERE deal_id = ". $deal_id;
        $res = mysql_query($sql)  or  die(mysql_error());       
        $row = mysql_fetch_array($res);
        if($row)
            return $row[0];
		else
			return 0;
    }
        
    public static function getDeals($merchant_id)
    {
        $deals = array();
        $sql = "SELECT id, deal_code, payment_quota FROM tibh5_enmasse_deal WHERE merchant_id = ". $merchant_id;
        
        $res = mysql_query($sql)  or  die(mysql_error());       

        while($row = mysql_fetch_array($res))
        {
            $sumCoupons = Gateway::getSumCoupons($row[0]);
				
			$payed = Gateway::getSumQtePayementRequest($row[0]);
			$notPayed = $sumCoupons["recu"] - $payed;
			$quota = $row[2];
			$can = "no";
			if($notPayed >= $quota)
				$can = "can";
            $deals[] = array(
            "id" => $row[0],
            "name" => $row[1],
            "vendu" => $sumCoupons["vendu"],
            "recu" => $sumCoupons["recu"],
			"notPayed" => $notPayed,
            "quota" => $quota,
            "canPay" => $can
            );
			
			if($can == "can")
			{
				self::$canPayedDeals[] = $row[0];
				if(self::$canPayedDealsString == "")
					self::$canPayedDealsString = self::$canPayedDealsString. $row[0];
				else
					self::$canPayedDealsString = ";". self::$canPayedDealsString. $row[0];
			}
        }
        
        return $deals;

    }
    
    public static function getSumCoupons($deal_id)
    {
        $sumCoupons = array("vendu" => 0, "recu" => 0);
        
       
		$sql = "SELECT count(*) FROM tibh5_enmasse_invty i, tibh5_enmasse_order_item oi, tibh5_enmasse_order o WHERE i.pdt_id = ". $deal_id . " and i.order_item_id = oi.id and oi.order_id = o.id and o.status = 'Delivered'";
        $res = mysql_query($sql)  or  die(mysql_error());       
        $row = mysql_fetch_array($res);
        if($row[0])
            $sumCoupons["vendu"] = $row[0];

		$sql = "SELECT count(*) FROM tibh5_enmasse_invty i, tibh5_enmasse_order_item oi, tibh5_enmasse_order o WHERE i.pdt_id = ". $deal_id . " and (i.received_at = '0000-00-00 00:00:00' or i.received_at IS NULL) and i.order_item_id = oi.id and oi.order_id = o.id and o.status = 'Delivered'";
        $res = mysql_query($sql)  or  die(mysql_error());       
        $row = mysql_fetch_array($res);

        if($row[0])		
            $sumCoupons["recu"] = $sumCoupons["vendu"] - $row[0];
        else 
            $sumCoupons["recu"] = $sumCoupons["vendu"];
        
        return $sumCoupons;

    }

    public static function getContacts()
    {
        $contacts = array();
        $sql = "SELECT contact_number, 	customer_support_email, skype_id, mobile_refresh_time FROM tibh5_enmasse_setting WHERE id = 1";
        $res = mysql_query($sql)  or  die(mysql_error());       
        $row = mysql_fetch_array($res);
        
        $contacts = array(
        "tel" => $row[0],
        "mail" => $row[1],
        "skype" => $row[2],
        "refresh" => $row[3]
        );

        return $contacts;
    }

    public static function getToken($login)
    {                    
        $token = md5(date("h/a-s/M-G_i"));
        
        $sql = "update tibh5_enmasse_merchant_branch set last_token = '". $token ."' WHERE login = '". $login. "'" ;
        $res = mysql_query($sql)  or  die(mysql_error()); 
        return $token;
    }

    public static function getAlerts($login)
    {
		$alerts = array();
		
		/* Quota atteinte */
		if(isset($_POST["lastCanPayedDeals"]))
		{
			self::$lastCanPayedDeals = explode(";", $_POST["lastCanPayedDeals"]);
		}
		
		$t = false;
		if(count(self::$canPayedDeals) > 0)
		{
			foreach(self::$canPayedDeals as $dealId)
			{
				if(Gateway::isNewCanPayedDeal($dealId))
					$t = true;
			}
		}
		
		if($t)
			$alerts[] = "QUOTA_ATTEINT";
		return $alerts;
    }
	
	public static function isNewCanPayedDeal($dealId)
    {
				
		$t = true;
		if(count(self::$lastCanPayedDeals) > 0)
		{
			foreach(self::$lastCanPayedDeals as $lastDealId)
			{
				if($lastDealId == $dealId)
					$t = false;
			}
		}
		
		return $t;
    }
	
}
    
?>