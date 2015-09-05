<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function index(){

    }

    function get_posts(){
        $data["posts"] = $this->model->get_posts();

    }

    function filter_by_loc(){

    }

    function filter_by_category(){

    }

    function load_view_add(){
        //dropdown arrays
        $data["categories"] = $this->model->get_dropdown();
        $data["locations"] = $this->model->get_dropdown();
        $this->load->view("filename");
    }

    function add_post(){
        $insert = array(
            "user_id" => $this->get_user_id(),
            "category_id" => $this->input->post("category"),
            "location_id" => $this->input->post("location"),
            "text" => $this->input->post("texts")
        );

        $this->model->insert_row($insert, "posts");

//        redirect("controller");
    }

    function add_up($post_id){
        $post_filter = array(
            "id" => $post_id
        );

        $uid = $this->model->get_value("user_id", "posts", $post_filter);
        $category = $this->model->get_value("category_id", "posts", $post_filter);

        //ADD UP SCORE OF THE POST

        $prev_up = $this->model->get_value("ups", "posts", $post_filter);
        $post_update = array(
            "ups" => $prev_up + 1
        );
        $this->model->update_row($post_update, "posts", $post_filter);

        //ADD SCORE OF USER IN CATEGORY
        $user_filter = array(
            "user_id" => $uid,
            "category_id" => $category
        );
        $prev_score = $this->model->get_value("score", "user_score", $user_filter);

        $score_update = array(
            "score" => $prev_score + 1
        );
        $this->model->update_row($score_update, "user_score", $user_filter);

//        redirect("controller");
    }

    function add_down($post_id){
        $post_filter = array(
            "id" => $post_id
        );

        //ADD UP SCORE OF THE POST

        $prev_down = $this->model->get_value("ups", "posts", $post_filter);
        $post_update = array(
            "downs" => $prev_down + 1
        );
        $this->model->update_row($post_update, "posts", $post_filter);

//        redirect("controller");
    }

    function resolve_post(){

    }

}