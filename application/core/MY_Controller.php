<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

	public function get_data(){
        $post = $this->test(); // = $this->input->post("data");
        $decrypt = decrypt($post, ENCRYPTION_KEY);
        return json_decode($decrypt, TRUE);
	}

    function test(){
        $post["uname"] = "Manrick.Capotolan";// = $this->input->post("data");
        $post["passa"] = "manrick";
        return encrypt(json_encode($post), ENCRYPTION_KEY);

    }
}