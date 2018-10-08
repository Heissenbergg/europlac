<?php

//set sessions
//ako smo ušli iz menu-a u pregled nekretnina
if(!Input::get('page')){
	$_SESSION['currentPage'] = 1;
}else{
	//vraćamo se na određenu sesiju
	$_SESSION['currentPage'] = Input::get('page');
}

if(!Input::get('input')) $_SESSION['input'] = 'blank';
else $_SESSION['input'] = Input::get('input');

if(!Input::get('kategorija')) $_SESSION['category'] = 'Sve';
else $_SESSION['category'] = Input::get('kategorija');

$pageNumber = $_SESSION['currentPage'];
$input = $_SESSION['input'];
$category = $_SESSION['category'];

function numberOfPages($category){
	$counter = 0;
	$db = new DB();
	$articleQuery = $db->query("nekretnina");
	while($estate = $articleQuery -> fetch()){
		if($estate['nekretnina'] == $category && $estate['izdvojeno'] >= 5){
			$counter++;
		}else if($category == 'Sve' && $estate['izdvojeno'] >= 5){
		    $counter++;
		}
	}
	$number = ($counter / 8);
	if($number > (int)($number)) return ((int)($number+1));
	else return (int)$number;

}

$_nizNekretnina = array('id' => array(), 'name' => array(), 'location' => array(), 'surface' => array(), 'price' => array(), 'image' => array());

$estates = new Nekretnine();



function filterEstates($estates, $category, $page){
	for($i=0; $i<count($estates->_nizNekretnina['id']); $i++){
		if($i >= ($page-1)*8 && $i < ($page)*8){
			echo $estates->_nizNekretnina['id'][$i].' '.$estates->_nizNekretnina['name'][$i].'<br>';
		}
	}
}