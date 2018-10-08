<div id="estatesBody">
    <?php 
    $estateID = Input::get('id');
    $searchInput = Input::get('input');
    
    if($estateID){
        $estates->filterEstates($category,$estateID);   
    }else if($searchInput){
        $estates->filterEstates($category,'blank',$searchInput);
    }else{
        $estates->filterEstates($category);
    }
    //var_dump($estates->_nizNekretnina);
    //echo count($estates->_nizNekretnina['id']);
    //echo $estates->_nizNekretnina['name'][0];
    //filterEstates($estates, $category, $pageNumber);
    
    //set number of page
    if(!$searchInput){
        //if we have classic search, then show numbers of page
        $from = ($pageNumber-1)*8; $to = ($pageNumber*8);  
    }else{
        //put it in single page
        $from = 0; $to = 100000;
    }
    ?>
        <?php 
        for($i=0; $i<count($estates->_nizNekretnina['id']); $i++){
    		if($i >= $from && $i < $to){
    		    ?>
    		    <div class="singleEstate">
                    <div class="singleEstateImage">
                        <img src="slike/<?php echo $estates->_nizNekretnina['image'][$i]; ?>"></img>
                    </div>
                    <div class="singleEstateDesc">
                        <div class="singleEstateDescValue">
                            <h4>
                                <a href="nekretnina.php?key=<?php echo $estates->_nizNekretnina['id'][$i]; ?>">
                                    <?php echo $estates->_nizNekretnina['name'][$i]; ?>
                                </a>
                            </h4>
                        </div>
                        <div class="singleEstateDescDes">
                            <div class="aditionalOptions">
                                <img src="images/place.png"></img>
                                <p>
                                    <?php echo $estates->_nizNekretnina['location'][$i]; ?>
                                </p>
                            </div>
                            <div class="aditionalOptions">
                                <img src="images/engineering.png"></img>
                                <p>
                                    <?php echo $estates->_nizNekretnina['surface'][$i]; ?>
                                    m^2
                                </p>
                            </div>
                            <div class="aditionalOptions">
                                <img src="images/rich.png"></img>
                                <p><?php echo $estates->_nizNekretnina['price'][$i].' '.$estates->_nizNekretnina['valuta'][$i]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
    		    <?php 
    		}
    	}
        ?>
    <!-- <div class="singleEstate">
        <div class="singleEstateImage">
            <img src="images/image.JPG"></img>
        </div>
        <div class="singleEstateDesc">
            <div class="singleEstateDescValue">
                <h4>
                    <a href="nekretnina.php">
                        Trosoban stan u Cazinu
                    </a>
                </h4>
            </div>
            <div class="singleEstateDescDes">
                <div class="aditionalOptions">
                    <img src="images/place.png"></img>
                    <p>Cazin</p>
                </div>
                <div class="aditionalOptions">
                    <img src="images/engineering.png"></img>
                    <p>150 m^2</p>
                </div>
                <div class="aditionalOptions">
                    <img src="images/rich.png"></img>
                    <p>36 000 KM</p>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="pages">
        <?php 
        if(!$estateID and !$searchInput){
            for($i=$numberOfPages; $i>0; $i--){
                if($i == $pageNumber) echo '<div class="pagesNumber activePage">'.'<p><a href="nekretnine.php?kategorija='.$category.'&page='.$i.'">'. $i .'</a></p>'.'</div>';
                else echo '<div class="pagesNumber">'.'<p><a href="nekretnine.php?kategorija='.$category.'&page='.$i.'">'. $i .'</a></p>'.'</div>';
            }   
        }
        ?>
    </div>
</div>