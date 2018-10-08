<?php

class SixofThem{
    private $_pdo, $query;
    public $slika, $lokacija, $linkk, $naslov, $povrsina, $cijena;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
			$this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
			echo $exception;
		}
	    $this->query = $this->_pdo -> query('SELECT * FROM naslovna');
    }
    
    public function write(){
        $qveri = $this->_pdo -> query('SELECT * FROM naslovna');
        while($row = $qveri ->fetch()){ ?>
            <tr>
                <td> <img src="slikeNaslovne/<?php echo $row['slika']; ?>"></img> </td>
                <td><?php echo $row['naslov']; ?> </td>
                <td> <a style="width:200px; height:40px; background:red; padding:8px 20px; text-decoration:none; color:#fff;" href="edithome.php?id=<?php echo $row['id']; ?>">Uredite</a> </td>
            </tr>
        <?php }
    }
    public function writeBanner(){
        $qveri = $this->_pdo -> query('SELECT * FROM baner');
        while($row = $qveri ->fetch()){ ?>
            <tr>
                <td> <img src="slikeNaslovne/<?php echo $row['slika']; ?>"></img> </td>
                <td><?php echo $row['naslov']; ?> </td>
                <td> <a style="width:200px; height:40px; background:red; padding:8px 20px; text-decoration:none; color:#fff;" href="editbanner.php?id=<?php echo $row['id']; ?>">Uredite</a>                  </td>
                <td>
                   <form method="post">
                     <input type="hidden" value="<?php echo $row['id']; ?>" name="deletBaner" >
                     <input style="width:100px; height:40px; background:red; padding:8px 20px; text-decoration:none; color:#fff;" type="submit" value="Obriši">
                   </form>
                <td>
            </tr>
        <?php }
    }
    public function updatePic($id, $slika){
        $update = "UPDATE `naslovna` SET `slika` = '{$slika}' WHERE id = $id ";
        $this->_pdo->query($update);
    }
    public function updaterest($id, $lokacija, $link, $naslov, $povrsina, $cijena){
        $update = "UPDATE `naslovna` SET `naslov` = '{$naslov}', `lokacija` = '{$lokacija}', `link` = '{$link}', `povrsina` = '{$povrsina}', `cijena` = '{$cijena}' WHERE id = $id ";
        $this->_pdo->query($update);
        Redirect::to('edithome.php?id='.$id);
    }
    public function updaterestbaner($id, $link, $naslov){
        $update = "UPDATE `baner` SET `naslov` = '{$naslov}', `link` = '{$link}' WHERE id = $id ";
        $this->_pdo->query($update);
        Redirect::to('editbanner.php?id='.$id);
    }
    public function edithome($id){
        $qveri = $this->_pdo -> query('SELECT * FROM naslovna');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                <li> Naslov:  <input type="text" name="naslov" value="<?php echo $row['naslov'];; ?>"/> </li>
                <li> Link:  <input type="text" name="link" value="<?php echo $row['link']; ?>"/> </li>
                <li> Lokacija: <input type="text" name="lokacija" value="<?php echo $row['lokacija']; ?>"/> </li>
                <li> Povrsina: <input type="text" name="povrsina" value="<?php echo $row['povrsina']; ?>"/> </li>
                <li> Cijena: <input type="text" name="cijena" value="<?php echo $row['cijena']; ?>"/> </li>
            <?php }
        }
    }
    public function editBaner($id){
        $qveri = $this->_pdo -> query('SELECT * FROM baner');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                <li> Naslov:  <input type="text" name="naslov" value="<?php echo $row['naslov'];; ?>"/> </li>
                <li> Link:  <input type="text" name="link" value="<?php echo $row['link']; ?>"/> </li>
            <?php }
        }
    }
    
    public function slika($id){
        $qveri = $this->_pdo -> query('SELECT * FROM naslovna');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                <img id="slika" src="slikeNaslovne/<?php echo $row['slika']; ?>"></img>
            <?php }
        }
    }
    
    public function slikaBaner($id){
        $qveri = $this->_pdo -> query('SELECT * FROM baner');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                <img id="slika" src="slikeNaslovne/<?php echo $row['slika']; ?>"></img>
            <?php }
        }
    }
    
    public function writeonhomepage($id){
        $qveri = $this->_pdo -> query('SELECT * FROM naslovna');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                <div class="imagePart">
                    <img src="admin/slikeNaslovne/<?php echo $row['slika']; ?>"></img>
                </div>
                <ul>
                    <li><a href="singlepost.php?id=<?php echo $row['link']; ?>"> <h4 class="wijuhu" id="naslovMalihsekcija"><?php echo $row['naslov']; ?></h4></a></li>
                    <li><h4 style="margin-top:20px">Lokacija : <?php echo $row['lokacija']; ?></h4></li>
                    <li>
                        <h4>
                            Površina: <?php echo $row['povrsina']; ?>
                            <span>Cijena : <?php echo $row['cijena']; ?></span>
                        </h4>
                    </li>
                </ul>
            <?php }
        }
    }


    public function writeonhomepageNew($id){
        $qveri = $this->_pdo -> query('SELECT * FROM naslovna');
        while($row = $qveri ->fetch()){
            if($row['id'] == $id){ ?>
                
                    <div class="nineBest">
                        <div class="imagePart">
                            <a href="singlepost.php?id=<?php echo $row['link']; ?>"><img src="admin/slikeNaslovne/<?php echo $row['slika']; ?>"> </a>
                        </div>
                        <a href="singlepost.php?id=<?php echo $row['link']; ?>">
                        <div class="restOfPart">
                            <div class="headerOfRestOfPart">
                                <h4><?php echo $row['naslov']; ?></h4>
                            </div>
                            <div class="locationOfThis">
                                <p>Lokacija : <?php echo $row['lokacija']; ?></p>
                            </div>
                            <div class="povrsina">
                                <p>Površina : <?php echo $row['povrsina']; ?> m2</p>
                            </div>
                            <div class="cijena">
                                <p>Cijena : <?php echo $row['cijena']; ?></p>
                            </div>
                        </div>
                        </a>
                    </div>
            <?php }
        }
    }
}

?>