<?php
include dirname(__FILE__).'/config.php';
include dirname(__FILE__).'/valeurs.php';
include dirname(__FILE__).'/functions.php';

if(isset($_POST['clean_css'])){
	$indentation = '    ';
	
	$buffer = clean_css(strip_tags($_POST['clean_css']));
	
	$buffer = sort_css($buffer,$indentation);
	
	
	// Suppression des doubles lignes
	$buffer = str_replace("\n\n","\n",$buffer);
		
	if(isset($_POST['type_separateur']) && array_key_exists($_POST['type_separateur'],$listing_separateurs))
		$separateur = $_POST['type_separateur'];
		
	// Espacement entre propriété et valeur
	$buffer = str_replace(':', $listing_separateurs[$separateur], $buffer);
	
	$content = $buffer;
}