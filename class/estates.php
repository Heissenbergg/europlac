<?php


class Nekretnina{
	private $_pdo, $_query, $_imageQuery;
	public $_id, $_ime, $_cijena, $_valuta, $_kategorija, $_svrha, $_lokacija, $_vrstaNekretnine, $_stanje, $_povrsinaObjekta, $_povrsinaZemljista,
	       $_brojSoba, $_brojKupatila, $_voda, $_struja, $_garaza, $_klima, $_plin, $_internet, $_kanalizacija,$_parking,
	       $_ostava, $_namjestaj, $_kablovska, $_videoNadzor, $_objavljeno, $_brojPregleda, $_opis, $_xKoordinate, $_yKoordinata,
	       $_video, $_pdf, $_slike = array();
	
	public $_drzava, $_grad;

	public function __construct($id = null){
		$this->_pdo  = DB::getInstance();
		if($id){
			$this->_query = $this->_pdo->query("nekretnina");
			while($nekretnina = $this->_query -> fetch()){
				if($nekretnina['id'] == $id){
					$this->_id = $nekretnina['id'];
					$this->_ime = $nekretnina['naziv'];
					$this->_cijena = $nekretnina['cijena'];
					$this->_valuta = $nekretnina['valuta'];
					$this->_kategorija = $nekretnina['izdvojeno'];
					$this->_svrha = $nekretnina['svrha'];
					$this->_lokacija = $nekretnina['lokacija'];
					$this->_vrstaNekretnine = $nekretnina['nekretnina'];
					$this->_stanje = $nekretnina['stanje'];
					$this->_povrsinaObjekta = $nekretnina['povObjekta'];
					$this->_povrsinaZemljista = $nekretnina['povZemljista'];
					$this->_brojSoba = $nekretnina['brojSoba'];
					$this->_brojKupatila = $nekretnina['brojkupatila'];
					
					if($nekretnina['voda']) $this->_voda = "DA";
					else $this->_voda = "NE";
					
					if($nekretnina['struja']) $this->_struja = "DA";
					else $this->_struja = "NE";
					
					if($nekretnina['garaza']) $this->_garaza = "DA";
					else $this->_garaza = "NE";
					
					if($nekretnina['klima']) $this->_klima = "DA";
					else $this->_klima = "NE";
					
					if($nekretnina['plin']) $this->_plin = "DA";
					else $this->_plin = "NE";
					
					if($nekretnina['internet']) $this->_internet = "DA";
					else $this->_internet = "NE";
					
					if($nekretnina['kanalizacija']) $this->_kanalizacija = "DA";
					else $this->_kanalizacija = "NE";
					
					if($nekretnina['parking']) $this->_parking = "DA";
					else $this->_parking = "NE";

					if($nekretnina['ostava']) $this->_ostava = "DA";
					else $this->_ostava = "NE";

					if($nekretnina['namjestaj']) $this->_namjestaj = "DA";
					else $this->_namjestaj = "NE";

					if($nekretnina['kablovska']) $this->_kablovska = "DA";
					else $this->_kablovska = "NE";

					if($nekretnina['videonadzor']) $this->_videoNadzor = "DA";
					else $this->_videoNadzor = "NE";


					$this->_objavljeno = $nekretnina['time'];
					$this->_brojPregleda = $nekretnina['brojPregleda'];
					$this->_opis = $nekretnina['opis'];
					$this->_xKoordinate = $nekretnina['sirina'];
					$this->_yKoordinata = $nekretnina['visina'];
					$this->_video = $nekretnina['video'];
					$this->_pdf = $nekretnina['pdf'];
					
					$this->_imageQuery = $this->_pdo -> query("slike");
                    while($slika = $this->_imageQuery -> fetch()){
                        if($slika['idpost'] == $nekretnina['id']){
                            array_push($this->_slike, $slika['ime']);
                        }
                    }
					
				}
			}
		}
	}
	
	public function update_views($id){
	    $this->_pdo  = DB::getInstance();
		$this->_query = $this->_pdo->query("nekretnina");
		while($estate = $this->_query -> fetch()){
		    if($estate['id'] == $id){
		        $numOfVisitors = $estate['brojPregleda'];
		        break;
		    }
		}
		$numOfVisitors += 1;
		
		$visitors = "UPDATE `nekretnina` SET `brojPregleda` = '{$numOfVisitors}' WHERE id = $id";
        $this->_pdo ->action($visitors);
	}

	
}


class Nekretnine{
	private $_pdo, $_query, $_imageQuery;
	public $_nizNekretnina = array('id' => array(), 'name' => array(), 'location' => array(), 'surface' => array(), 'price' => array(), 'valuta' => array(), 'image' => array());
	
	public function __construct($id = null){
		$this->_pdo  = DB::getInstance();
		$this->_query = $this->_pdo->DESCCustonQuery("nekretnina", "izdvojeno");
		if($id){
		    while($nekretnina = $this->_query -> fetch()){
		    	
		        array_push($this->_nizNekretnina['id'], $nekretnina['id']);
                array_push($this->_nizNekretnina['name'], $nekretnina['naziv']);
                array_push($this->_nizNekretnina['location'], $nekretnina['lokacija']);
                array_push($this->_nizNekretnina['surface'], $nekretnina['povObjekta']);
                array_push($this->_nizNekretnina['price'], $nekretnina['cijena']);
                $this->_imageQuery = $this->_pdo -> query("slike");
                while($slika = $this->_imageQuery -> fetch()){
                    if($slika['idpost'] == $nekretnina['id']){
                        array_push($this->_nizNekretnina['image'], $slika['ime']);
                        break;
                    }
                }
    		}
		}
	}
	
	public function getPercentageMatch($totalWords, $machedWords){
		if($machedWords / $totalWords > 0.49) return true;
		return false;
	}
	
	public function doWeMatch($input, $string){
		$input = mb_strtolower($input);
		$string = mb_strtolower($string);
		
		/*
		for($i=0; $i<strlen($input); $i++){
			if(ord($input[$i]) == 267 or $input[$i] == 'Ć') echo $input[$i];
			echo ord($input[$i]).'<br>';
		}
		*/
		
		$words = array();
		$words = explode(' ', $input);
		
		$wordCounter = 0;
		//echo '<br><br>';
		for($i=0; $i< count($words); $i++){
			if(!empty($words[$i])){
				if(strstr($string, $words[$i])){
					//echo $words[$i];
					$wordCounter++;
				}	
			}
		}
		
		if($this->getPercentageMatch(count($words), $wordCounter)) return true;
		return false;
	}
	
	public function filterEstates($category, $id = null, $input = null){
		$this->_pdo  = DB::getInstance();
		$this->_query = $this->_pdo->DESCCustonQuery("nekretnina", "izdvojeno");
		
		while($nekretnina = $this->_query -> fetch()){
			if($id && !$input){
				if($id == $nekretnina['id']){
					array_push($this->_nizNekretnina['id'], $nekretnina['id']);
		            array_push($this->_nizNekretnina['name'], $nekretnina['naziv']);
		            array_push($this->_nizNekretnina['location'], $nekretnina['lokacija']);
		            array_push($this->_nizNekretnina['surface'], $nekretnina['povObjekta']);
		            array_push($this->_nizNekretnina['price'], $nekretnina['cijena']);
		            array_push($this->_nizNekretnina['valuta'], $nekretnina['valuta']);
		            $this->_imageQuery = $this->_pdo -> query("slike");
		            while($slika = $this->_imageQuery -> fetch()){
		                if($slika['idpost'] == $nekretnina['id']){
		                    array_push($this->_nizNekretnina['image'], $slika['ime']);
		                    break;
		                }
		            }
		            break;
				}
			}else if($id == 'blank' && $input){
				if($nekretnina['nekretnina'] == $category && $nekretnina['izdvojeno'] >= 5){
					// could be done later :D
				}else if($category == 'Sve' && $nekretnina['izdvojeno'] >= 5){
					if($this->doWeMatch($input, $nekretnina['naziv'])){
						array_push($this->_nizNekretnina['id'], $nekretnina['id']);
			            array_push($this->_nizNekretnina['name'], $nekretnina['naziv']);
			            array_push($this->_nizNekretnina['location'], $nekretnina['lokacija']);
			            array_push($this->_nizNekretnina['surface'], $nekretnina['povObjekta']);
			            array_push($this->_nizNekretnina['price'], $nekretnina['cijena']);
			            array_push($this->_nizNekretnina['valuta'], $nekretnina['valuta']);
			            $this->_imageQuery = $this->_pdo -> query("slike");
			            while($slika = $this->_imageQuery -> fetch()){
			                if($slika['idpost'] == $nekretnina['id']){
			                    array_push($this->_nizNekretnina['image'], $slika['ime']);
			                    break;
			                }
			            }
					}
				}
			}else if(!$input && !$id){
				if($nekretnina['nekretnina'] == $category && $nekretnina['izdvojeno'] >= 5){
					array_push($this->_nizNekretnina['id'], $nekretnina['id']);
		            array_push($this->_nizNekretnina['name'], $nekretnina['naziv']);
		            array_push($this->_nizNekretnina['location'], $nekretnina['lokacija']);
		            array_push($this->_nizNekretnina['surface'], $nekretnina['povObjekta']);
		            array_push($this->_nizNekretnina['price'], $nekretnina['cijena']);
		            array_push($this->_nizNekretnina['valuta'], $nekretnina['valuta']);
		            $this->_imageQuery = $this->_pdo -> query("slike");
		            while($slika = $this->_imageQuery -> fetch()){
		                if($slika['idpost'] == $nekretnina['id']){
		                    array_push($this->_nizNekretnina['image'], $slika['ime']);
		                    break;
		                }
		            }
				}else if($category == 'Sve' && $nekretnina['izdvojeno'] >= 5){
					array_push($this->_nizNekretnina['id'], $nekretnina['id']);
		            array_push($this->_nizNekretnina['name'], $nekretnina['naziv']);
		            array_push($this->_nizNekretnina['location'], $nekretnina['lokacija']);
		            array_push($this->_nizNekretnina['surface'], $nekretnina['povObjekta']);
		            array_push($this->_nizNekretnina['price'], $nekretnina['cijena']);
		            array_push($this->_nizNekretnina['valuta'], $nekretnina['valuta']);
		            $this->_imageQuery = $this->_pdo -> query("slike");
		            while($slika = $this->_imageQuery -> fetch()){
		                if($slika['idpost'] == $nekretnina['id']){
		                    array_push($this->_nizNekretnina['image'], $slika['ime']);
		                    break;
		                }
		            }
				}
			}
		}
	}
	
}

class Homepageestates{
	private $_pdo, $_query, $_imageQuery;
	public $estate_array = array("id" => array(), "name" => array(), "link" => array(), "image" => array());
	
	public $topRated = array("id" => array(), "name" => array());
	
	public $_name, $_image;
	
	public function __construct($id = null){
		$this->_pdo  = DB::getInstance();
		$this->_query = $this->_pdo->query("naslovna");
	}
	
	public function getEstate($id){
		$this->_query = $this->_pdo->query("naslovna");
		while($est = $this->_query -> fetch()){
			if($est['id'] == $id){
				array_push($this->estate_array['id'], $est['link']);
				array_push($this->estate_array['name'], $est['naslov']);
				array_push($this->estate_array['link'], $est['link']);
				array_push($this->estate_array['image'], $est['slika']);
			}
		}
	}
	
	public function topRated(){
		$this->_query = $this->_pdo->DESCCustonQuery("nekretnina", "brojPregleda");
		$counter = 0;
		while($est = $this->_query -> fetch()){
			array_push($this->topRated['id'], $est['id']);
			array_push($this->topRated['name'], $est['naziv']);
			if($counter++ == 4) break;
		}
	}
	
	public function getName($id){
		$this->_query = $this->_pdo->query("naslovna");
		while($est = $this->_query -> fetch()){
			if($est['id'] == $id){
				return $est['naslov'];
			}
		}
	}
	
	public function getImage($id){
		$this->_query = $this->_pdo->query("naslovna");
		while($est = $this->_query -> fetch()){
			if($est['id'] == $id){
				return $est['slika'];
			}
		}
	}
	
	public function getLink($id){
		$this->_query = $this->_pdo->query("naslovna");
		while($est = $this->_query -> fetch()){
			if($est['id'] == $id){
				return $est['link'];
			}
		}
	}
}

