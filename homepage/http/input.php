<?php
require_once '../../class/newdb.php';
require_once '../../class/estates.php';

$searchInput = $_POST['value'];
if(empty($searchInput)) return;

$estates = new Nekretnine();
$estates->filterEstates('Sve','blank',$searchInput);


for($i=0; $i<count($estates->_nizNekretnina['id']); $i++){ ?>
    <div class="sliderSearchedItemsItem" onclick="setSearchProperty('<?php echo $estates->_nizNekretnina['name'][$i] ?>');">
		<p><?php echo $estates->_nizNekretnina['name'][$i] ?>, <country><?php echo $estates->_nizNekretnina['location'][$i] ?></country></p>
	</div>

<?php    //echo $estates->_nizNekretnina['name'][$i].'<br>';
}