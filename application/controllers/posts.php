<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function index(){

    }

    function get_posts(){

    }

    function filter_by_loc(){

    }

    function filter_by_category(){

    }

    function add_post(){
        $insert = array(
            "user_id" => $this->session->userdata("user_id"),
            "category_id" => $this->input->post("category"),
            "location_id" => $this->input->post("location"),
            "text" => $this->input->post("text")
        );

        $this->model->insert_row("posts", $insert);
    }



}