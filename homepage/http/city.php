<?php
require_once '../../class/newdb.php';
require_once '../../class/estates.php';

$searchInput = mb_strtolower($_POST['value']);
if(empty($searchInput)) return;

$db = new DB();
$cityQuery = $db->query("gradovi");
while($city = $cityQuery-> fetch()){
    $queryCity = mb_strtolower($city['grad']);
    if(strstr($queryCity, $searchInput)){ ?>
        <div class="sliderSearchedItemsItem" onclick="setSearchProperty('<?php echo $city['grad']; ?>');">
    		<p><?php echo $city['grad']; ?>, <country><?php echo $city['drzava']; ?></country></p>
    	</div>    
    <?php     
    }
}
