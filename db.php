<?php
session_start();

class Input{
    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }else if(isset($_GET[$item])){
            return $_GET[$item];
        }
    }
}

class Redirect{
    public static function to($location=null){
        if($location){
            header('Location: ' .$location);
            exit();
        }
    }
}

class Session{
    public static function set($username, $mail){
        if(!isset($_SESSION['name'])){
            $_SESSION['name'] = $username;
            $_SESSION['mail'] = $mail;
            return true;
        }return false;
    }
    public static function id($id){
        $_SESSION['id'] = $id;
        return true;
    }
    public static function getid(){
        if(isset($_SESSION['id'])) return $_SESSION['id'];
        return false;
    }
    public static function search($item){
        $_SESSION['search'] = $item;
        return true;
    }
    public static function getsearch(){
        if(isset($_SESSION['search'])) return $_SESSION['search'];
        return false;
    }
    public static function isitset(){
        if(isset($_SESSION['name'])) return $_SESSION['name'];
        return false;
    }
    public static function destroy(){
        session_destroy();
        Redirect::to('index.php');
    }
}


class Notification{

    public $_pdo;
    private $_querry;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
            $this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_querry = $this->_pdo->query("SELECT * FROM notifikacije");
        }catch (PDOException $exception){
            echo $exception;
        }
    }

    public function insert($user, $action, $link = null){
        $time = time();
        //$insert = "INSERT INTO `notifikacije`(`date`,`user`,`action`,`link`) VALUES ('{$time}','{$user}','{$action}','{$link}'";
        //$this->_pdo->query($insert);
    }

    public function numOfNotifications(){
        $num = $this->_pdo->query('SELECT * FROM brojNotifikacija');
        while($row = $num -> fetch()){
            return $row['number'];
        }
    }

    public function reset($id = 1){
        $number = 0;
        $update = "UPDATE `brojNotifikacija` SET `number` = '{$number}' WHERE id = $id ";
        $this->_pdo->query($update);
    }

    public function upiti($id){
        $num = $this->_pdo->query('SELECT * FROM brojNotifikacija');
        while($row = $num -> fetch()){
            if($row['id'] == $id) return $row['ime'];
        }
    }


    public function resetRest($id){
        $number = 0;
        $update = "UPDATE `brojNotifikacija` SET `ime` = '{$number}' WHERE id = $id ";
        $this->_pdo->query($update);
    }

    public function updateMails($naslov, $poruka, $counter){
        $id = 1;
        $time = time();
        $update = "UPDATE `groupmail` SET `naslov` = '{$naslov}',
                                          `poruka` = '{$poruka}',
                                           `time` = '{$time}',
                                           `brojPoslanih` = '{$counter}'
                  WHERE id = $id ";
        $this->_pdo->query($update);    
    }
    public function resetMails(){
        $id = 1;
        $broj = 0;
        $poruka = "Novi mail";
        $update = "UPDATE `groupmail` SET `brojPoslanih` = '{$broj}', `poruka` = '{$poruka}' WHERE id = $id ";
        $this->_pdo->query($update);    
    }
    public function numberOfSentMails(){
        $num = $this->_pdo->query('SELECT * FROM groupmail');
        while($row = $num -> fetch()){
            return $row['brojPoslanih'];   
        }
    }
    public function message(){
        $num = $this->_pdo->query('SELECT * FROM groupmail');
        while($row = $num -> fetch()){
            return $row['poruka'];
        }
    }

    public function time(){
        $num = $this->_pdo->query('SELECT * FROM groupmail');
        while($row = $num -> fetch()){
            return $row['time'];
        }   
    }
    public function allusers(){
        $i = 0;
        $num = $this->_pdo->query('SELECT * FROM users');
        while($row = $num -> fetch()){
            $i++;
        }
        return $i;
    }

}

class DB{
    public $_pdo;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','#','#');
            $this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception;
        }
    }
    public function users(){
        return $this->_pdo->query('SELECT * FROM users');
    }
    public function deletePost($id, $redirect){
        $delete = "DELETE FROM `nekretnina` WHERE id = $id";
        $this->_pdo->query($delete);
        Redirect::to($redirect);
    }


        public function deleteUser($id, $redirect){
        $delete = "DELETE FROM `users` WHERE id = $id";
    
                $this->_pdo->query($delete);
                Redirect::to($redirect);
    }

    public function IspisiUpite(){
        $upiti = $this->_pdo->query('SELECT * FROM upiti ORDER BY id DESC');
        while($row = $upiti ->fetch()){ ?>
            <tr>
                <td style="border:none; height:35px;">
                    <p style="color:red"><?php echo $row['ime']; ?> - <?php echo $row['mail']; ?> ( <?php echo $row['date']; ?>)</p>
                </td>
            </tr>
            <tr>
                <td style="border:none; margin-top:-30px;">
                    <p style="font-size:20px"> <?php echo $row['naslov']; ?> </p>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 30px;">
                    <p><?php echo $row['poruka']; ?></p>
                </td><br><br><br>
            </tr> 
    <?php }
    }
    public function storeContact($name, $phone, $naslov, $message){
        $date = date('Y-m-d H:i:s');
        $register = "INSERT INTO `upiti`(`date`,`ime`,`mail`,`naslov`,`poruka`) 
        VALUES ('{$date}','{$name}','{$phone}','{$naslov}','{$message}')";
        $this->_pdo->query($register);

        $time = time();
        $link = '';
        $action = 'vam je poslao upit. ';
        $insertNotification = "INSERT INTO `notifikacije`(`date`,`user`,`action`,`link`) 
        VALUES ('{$time}','{$name}','{$action}','{$link}')";
        $this->_pdo->query($insertNotification);

        $query = $this->_pdo -> query('SELECT * FROM brojNotifikacija');
        while($row = $query -> fetch()){
            $broj = $row['number'];
        }$broj++;
        $id = 1;
        $update = "UPDATE `brojNotifikacija` SET `number` = '{$broj}' WHERE id = $id ";
        $this->_pdo->query($update);
        $id = 2;
        $update = "UPDATE `brojNotifikacija` SET `ime` = '{$name}' WHERE id = $id ";
        $this->_pdo->query($update);

    }

    public function updateSliderLink($id, $link){
        $update = "UPDATE `slider` SET `link` = '{$link}' WHERE id = $id ";
        $this->_pdo->query($update);
        Redirect::to('editslider.php?id='.$id);
    }

    public function updateSliderPhoto($id, $name){
        $update = "UPDATE `slider` SET `slika` = '{$name}' WHERE id = $id ";
        $this->_pdo->query($update);
        Redirect::to('editslider.php?id='.$id);
    }
    public function izdvojiPost($id, $redirect){
        $nekretnine = $this->_pdo->query('SELECT * FROM nekretnina');
        while($row = $nekretnine ->fetch()){
            if($row['id'] == $id){
                $broj = 1;
                $update = "UPDATE `nekretnina` SET `izdvojeno` = '{$broj}' WHERE id = $id ";
                $this->_pdo->query($update);
            }
        }
        Redirect::to($redirect);
    }

    public function query($table){
        return $this->_pdo ->query("SELECT * FROM ". $table); 
    }
    public function action($action){
        $this->_pdo->query($action);
    }
}


class User{
    private $_pdo,$_id, $_ime, $_adresa, $_telefon, $_mail, $_krediti, $_slika;
    public function __construct($mail = null){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
            $this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception;
        }
        $query = $this->_pdo -> query('SELECT * FROM users');
        if($mail == null){
            
        }else{
            while($row = $query->fetch()){
                if($row['ime'] == $mail){
                    $this->_id = $row['id'];
                    $this->_ime = $row['ime'];
                    $this->_adresa = $row['adresa'];
                    $this->_telefon = $row['telefon'];
                    $this->_krediti = $row['krediti'];
                    $this->_mail = $row['mail'];   
                    $this->_slika = $row['slika'];
                    $this->_admin = $row['admin'];
                }
            }    
        }
    }
    public function register($ime, $adresa = null, $telefon = null, $mail = null, $sifra = null){
        $register = "INSERT INTO `users`(`ime`, `adresa`, `telefon`, `mail`, `sifra`) 
        VALUES ('{$ime}','{$adresa}', '{$telefon}', '{$mail}', '{$sifra}')";
        $this->_pdo->query($register);


        $time = time();
        $link = '';
        $action = 'se pridruzio mrezi.';
        $insertNotification = "INSERT INTO `notifikacije`(`date`,`user`,`action`,`link`) 
        VALUES ('{$time}','{$ime}','{$action}','{$link}')";
        $this->_pdo->query($insertNotification);

        $query = $this->_pdo -> query('SELECT * FROM brojNotifikacija');
        while($row = $query -> fetch()){
            $broj = $row['number'];
        }$broj++;
        $id = 1;
        $update = "UPDATE `brojNotifikacija` SET `number` = '{$broj}' WHERE id = $id ";
        $this->_pdo->query($update);
        $id = 3;
        $update = "UPDATE `brojNotifikacija` SET `ime` = '{$ime}' WHERE id = $id ";
        $this->_pdo->query($update);

        $id = 4;
        $update = "UPDATE `brojNotifikacija` SET `ime` = '{$ime}' WHERE id = $id ";
        $this->_pdo->query($update);

        Redirect::to('login.php');
    }
    public function login($mail, $password){
        $query = $this->_pdo -> query('SELECT * FROM users');
        while($row = $query->fetch()){
            if($row['mail'] == $mail && $row['sifra'] == $password){
                $this->_ime = $row['ime'];
                $this->_adresa = $row['adresa'];
                $this->_telefon = $row['telefon'];
                $this->_krediti = $row['krediti'];
                $this->_mail = $row['mail'];
                Session::set($this->_ime, $this->_mail);
                if($row['admin'] == 1){
                    Redirect::to('admin/index.php');
                }
                Redirect::to('index.php');
            }
        }
    }
    public function admin(){
        if($this->_admin == 1) return true;
        return false;
    }
    public function username(){
        echo $this->_ime;
    }
    public function adresa(){
        echo $this->_adresa;
    }
    public function telefon(){
        echo $this->_telefon;
    }
    public function maill(){
        echo $this->_mail;
    }
    public function id(){
        return $this->_id;
    }
    
    public function slika(){
        return $this->_slika;
    }
    public function postUser($id){
        $query = $this->_pdo -> query('SELECT * FROM users');
        while($row = $query->fetch()){
            if($row['id'] == $id){
                return $row['ime'];
            }
        }
    }
}
