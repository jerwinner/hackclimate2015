<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->load_view_add();
    }

    function get_posts(){
        $data["posts"] = $this->model->get_posts();
        $this->load->view("posts/feed", $data);
    }

    function filter_by_loc($id){
        $data["posts"] = $this->model->get_posts(array("location_id" => $id));
        $this->load->view("posts/feed", $data);
    }

    function filter_by_category($id){
        $data["posts"] = $this->model->get_posts(array("category_id" => $id));
        $this->load->view("posts/feed", $data);
    }

    function load_view_add(){
        //dropdown arrays
        $data["categories"] = $this->model->get_dropdown("id", "description", "categories");
        $data["locations"] = $this->model->get_dropdown("id", "descriptions", "locations");
        $this->load->view("posts/add-post", $data);
    }

    function add_post(){
        $insert = array(
            "user_id" => $this->get_user_id(),
            "category_id" => $this->input->post("category"),
            "location_id" => $this->input->post("location"),
            "text" => $this->input->post("content")
        );

        $this->model->insert_row($insert, "posts");
        redirect("posts/get_posts");
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

        $this->get_posts();
    }

    function add_down($post_id){
        $post_filter = array(
            "id" => $post_id
        );

        //ADD UP SCORE OF THE POST

        $prev_down = $this->model->get_value("downs", "posts", $post_filter);
        $post_update = array(
            "downs" => $prev_down + 1
        );
        $this->model->update_row($post_update, "posts", $post_filter);

        $this->get_posts();
    }

    function resolve_post(){

    }

}