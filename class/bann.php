<?php
class Ban{
    private $_pdo, $_query, $_banned;
    public function __construct($first = null, $second = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("bannedusers");
        if($first){
            while($user = $this->_query -> fetch()){
                if($user['ip'] == $first || $user['ip2'] == $first || $user['ip'] == $second || $user['ip2'] == $second){
                    $this->_banned = 12;
                }
            }
            if($this->_banned != 12) $this->_banned = 7;   
        }
    }
    
    public function checkBanned(){return $this->_banned;}
    
    public function insertBan($first, $second){
        $this->_pdo -> action("INSERT into `bannedusers` (`ip`,`ip2`) VALUES ('{$first}','{$second}') ");
    }
}