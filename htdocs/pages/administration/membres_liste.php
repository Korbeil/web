<?php

$action = verifierAction(array('lister', 'detail', 'rechercher'));
$smarty->assign('action', $action);

//require_once dirname(__FILE__).'/../../../sources/Afup/AFUP_Liste_Membres.php';
//$tags = new AFUP_Liste_Membres($bdd);

require_once dirname(__FILE__).'/../../../sources/Afup/AFUP_Personnes_Physiques.php';
require_once dirname(__FILE__).'/../../../sources/Afup/AFUP_Personnes_Morales.php';
require_once dirname(__FILE__).'/../../../sources/Afup/AFUP_Pays.php';
$personnes_physiques = new AFUP_Personnes_Physiques($bdd);
$pays = new AFUP_Pays($bdd);
$personnes_morales = new AFUP_Personnes_Morales($bdd);

if ($action == 'lister') {
    $list_champs = '*';
    $list_ordre = 'nom, prenom';
    $list_sens = 'asc';
    $list_filtre = (isset($_POST["nom"])? $_POST["nom"] : false);
    $is_active = 1;
    $smarty->assign('membres', $personnes_physiques->obtenirListe($list_champs, $list_ordre, $list_filtre, false, false, false, $is_active));
    $smarty->assign('entreprises', $personnes_morales->obtenirListe('id, raison_sociale', 'raison_sociale', true));
    
    $smarty->assign('pays', $pays->obtenirPays());
	
    $formulaire = &instancierFormulaire();

	$formulaire->addElement('header'  , ''         , 'Rechercher un membre');
	
	$formulaire->addElement('static',   'note'     , ' '                , 'Tapez le nom ou la ville d\'un membre.');
	$formulaire->addElement('text'    , 'nom'      , 'Nom'           , array('size' => 40, 'maxlength' => 40));
	
	$formulaire->addElement('header'  , 'boutons'  , '');
	$formulaire->addElement('submit'  , 'soumettre', 'Rechercher');
	
	$formulaire->addRule('nom'      , 'Nom manquant'    , 'required');	
	
	$smarty->assign('formulaire', genererFormulaire($formulaire));
}
