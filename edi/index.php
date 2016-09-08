<?php include('config.php');

$fichier = 'bigfid.csv';

$csv = new SplFileObject($fichier);
$csv->setFlags(SplFileObject::READ_CSV);
$csv->setCsvControl(';');

foreach($csv as $key => $value){
echo $value[$key]."<br/>";
	//print_r($ligne);
}

?>
