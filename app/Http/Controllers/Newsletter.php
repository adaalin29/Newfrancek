<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function do_subscribe(){
	
		if($_POST['email'] == "") echo "<div class='red'>".t("You did not completed the email!")."</div>";
		elseif($_POST['acord'] == "") echo "<div class='red'>".t("You must check to receive data ")."</div>";
		elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) echo "<div class='red'>".t("The email is not valid!")."</div>";
		else {
		
			echo "<div class='green'>".t("You were succesfully subscribed!")."</div>";
			
			$data = array(
				'email' => $_POST['email']
			);

			$this->db->insert('newsletter',$data);
			
		}

	}
	
}

?>