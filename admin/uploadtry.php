<?php
include '../db.php';
include 'menu.php';
class UploadPhoto{
    private $_pdo;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
			$this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
			echo $exception;
		}
    }
    public function upload($ime){
        $id = Session::getid();
        $upload = "INSERT INTO `slike`(`idpost`, `ime`) 
		VALUES ('{$id}','{$ime}')";
		$this->_pdo->query($upload);
    }
    public function writeFew(){
        $query = $this->_pdo -> query('SELECT * FROM slike');
        while($row = $query->fetch()){ 
            if(Session::getid() == $row['idpost']){ ?>
            <div id="onePicture">
                <form method="post">
                    <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="x">
                </form>
                <img src="../slike/<?php echo $row['ime']; ?>"></img>
            </div>
        <?php  }
        }
    }
    
    public function photos(){
        while($row = $query->fetch()){ 
            if(Session::getid() == $row['idpost']){
            $array[] = $row['ime'];
           }
        } return $array;
    }
    
    public function delete($ime){
        $delete = "DELETE FROM `slike` WHERE id = $ime";
		$this->_pdo->query($delete);
    }
}

$photo = new UploadPhoto();
if(!empty($_FILES['file'])){ ?>
        <script type="text/javascript">
            document.getElementById('wait').style.display='block';
        </script>
    <?php foreach($_FILES['file']['name'] as $key => $name){
        $ext = explode('.', $name);
        $time = time();
        $name = md5($name).$time.'.'.$ext[1];
        
        if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "../slikebez/{$name}")){
            $uploaded[] = $name;
            
            $stamp = imagecreatefrompng('../icon/meh.png');
            $im = imagecreatefromjpeg('../slikebez/'.$name);
            $save_watermark_photo_address = '../slike/'.$name;
            
            // Set the margins for the stamp and get the height/width of the stamp image
            
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);
            $imgx = imagesx($im);
            $imgy = imagesy($im);
            $centerX=round($imgx/2) - 150;
            $centerY=round($imgy/2) - 90;
            
            
            imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
            imagejpeg($im, $save_watermark_photo_address, 80); 
            $photo -> upload($name);
    }
    } ?>
        <script type="text/javascript">
            document.getElementById('wait').style.display='none';
        </script>
    <?php
}
if(!empty($_POST['delete'])){
    $photo -> delete($_POST['delete']);   
}
?>
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
    var imena;
    function call(){
        var fileInput = document.getElementById('file');
        imena = [<?php echo '"'.implode('","', $uploaded).'"' ?>];
        
        var length = fileInput.files.length;
        for(var i=0;i<imena.length;i++){
            console.log(imena[i]);
        }
        for(var i=0;i<imena.length;i++){
            var x = document.createElement("IMG");
            x.setAttribute("src", 'slike/'+imena[i]);
            x.setAttribute("width", "304");
            x.setAttribute("width", "228");
            x.setAttribute("alt", "The Pulpit Rock");
            document.getElementById('uploadedPhotos').appendChild(x);
        }
    }
    
    function deleteImage($id){
        for(var i=0; i < imena.length;i++){
            if(imena[i] == $id){
                imena.splice(i, 1);
                alert($id);
            }
        }
        for(var i=0;i<imena.length;i++){
            console.log(imena[i]);
        }
    }
    function hideForm(){ 
        document.getElementById('forma').style.display = 'none';
    }
    $(document).ready(function(){
        /*for(var i=0;i<imena.length;i++){
            var x = document.createElement("IMG");
            x.setAttribute("src", 'slike/'+imena[i]);
            x.setAttribute("width", "304");
            x.setAttribute("width", "228");
            x.setAttribute("alt", "The Pulpit Rock");
            document.body.appendChild(x);
        }
		setInterval(function(){
			$("#justNotifiMe").load("numofNot.php");
		},50);*/
	});
	function writePhotos(){
	    
	}
    
</script>
<style type="text/css">
    #forma{
        position:absolute;
        z-index:1000000;
    }
    
    #naslov{
        position:absolute;
        left:50px;
        font-size:30px;
    }
    #file{
        display:none;
    }
    #uploadedPhotos{
        position:absolute;
        left:50px;
        top:250px;
        width:calc(100% - 100px);
        height:500px;
    }
    
    #uploadedPhotos #onePicture{
        width:180px;
        height:100px;
        border:1px solid #333;
        display:inline-block;
        z-index:100000;
    }
    #uploadedPhotos #onePicture input{
        margin:0px;
        position:absolute;
        margin-left:150px;
        background:#333;
        font-size:20px;
        color:#fff;
        border:1px solid #fff;
        padding:0px 5px;
    }
    #uploadedPhotos img{
        margin-top:-15px;
        width:100%;
        height:100%;
    }
    
    #uploadedPhotos #bar{
        position:absolute;
        overflow-x:scroll;
        left:0px;
        top:0px;
        width:100%;
        height:100px;
        background:grey;
    }
    #dalje{
        position:absolute;
        width:200px;
        height:30px;
        border-radius:10px;
        background:#333;
        bottom:40px;
        padding-top:10px;
        left:40px;
        color:#fff;
        text-align:center;
    }
    #dalje a{
        color:#fff;
        font-size:18px;
        margin-top:10px;
    }
    #wait{
        display:none;
        position:fixed;
        left:0px;
        top:0px;
        width:100%;
        height:100%;
        z-index:10000000000;
        background:rgba(0,0,0,0.8);
        text-align:center;
    }
    #wait h4{
        color:#fff;
        font-size:50px;
        margin-top:200px;
    }
</style>


<section style="left:380px;">
    <h4 id="naslov">Unesite fotografije </h4>
    <div id="wait">
        <h4>Molimo pricekajte</h4>
    </div>
    <script type="text/javascript">
        function wait(){
            document.getElementById('wait').style.display='block';
        }
    </script>
    <div id="forma">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="wait();">
                <label for="file">Izaberite fotografije</label>
                <input type="file" id="file" name="file[]" multiple="multiple">
                <input id="submit" type="submit" value="upload">
            </form>
        </div>
    <div id="uploadedPhotos">
        <?php $photo -> writeFew(); ?>
        <div id="barr">
            
        </div>
        <a href="objava.php"><div id="dalje">Kraj</div></a>
        <?php
            if(!empty($uploaded)){ ?>
                <script type="text/javascript">
                    //hideForm();
                    //call();
                    writePhotos();
                </script>
                <?php 
                //$photo->writeFew();
            } 
        
        ?>
    </div>
</section>