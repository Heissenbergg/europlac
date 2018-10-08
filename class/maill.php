<?php

class Mail{
	private static $_instance = null;

	public $_pdo, $_to, $_header, $_message, $_headers;
	public function __construct(){

	}
	public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new Mail();
        }
        return self::$_instance;
    }

    public function send($to, $header, $msg){
		/* SEND MAIL */

		//Headers need's to be set

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: SERVER <info@europlac-nekretnine.com>'."\r\n".
		            'Reply-To: <info@europlac-nekretnine.com>'."\r\n" .
		            'X-Mailer: PHP/' . phpversion();            
		$message = '<html><body>';
		$message .= '<p>'.$msg.'</p> <br><br>';
		$message .= '<br> <h1 style="color:#402311">';
		$message .='SERVER </h1>';
		$message .= '<p style="color:#402311">';
		$message .= 'e-Mail  : info@europlac-nekretnine.com <br></p>';
		/* $message .= 'Telefon :+38762/130-013<br></p>';
		$message .= 'Adresa  : Kolodvorska 11A, 71000 Sarajevo, Bosna i Hercegovina<br>'; */
		$message .= '</body></html>';        


		if(@mail($to, $header, $message,$headers)){
		  echo "Mail Sent Successfully";
		}else{
		  echo "Mail Not Sent";
		}
    }
}