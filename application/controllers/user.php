<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function view_profile($uid){
        $name = $this->model->get_value("name", "users", array("id" => $uid));

        $data = array(
            'name' => $name
        );

        $this->load->view('viewprofile', $data);
    }

    function add_score($user_id, $category_id){
        $user_filter = array(
            "user_id" => $user_id,
            "category_id" => $category_id
        );
        $prev_score = $this->model->get_value("score", "user_score", $user_filter);

        $score_update = array(
            "score" => $prev_score + 1
        );
        $this->model->update_row($score_update, "user_score", $user_filter);
    }

    function add_point($user_id){
        $user_filter = array(
            "user_id" => $user_id
        );
        $prev_point = $this->model->get_value("points", "user_points", $user_filter);

        $score_update = array(
            "points" => $prev_point + 1
        );
        $this->model->update_row($score_update, "user_points", $user_filter);
    }

    function subtract_point($user_id, $points){
        $user_filter = array(
            "user_id" => $user_id
        );
        $prev_point = $this->model->get_value("points", "user_points", $user_filter);

        if($points > $prev_point){
            return;
        }

        $score_update = array(
            "points" => $prev_point - $points
        );
        $this->model->update_row($score_update, "user_points", $user_filter);
    }

    function add_badge(){

    }

    function use_coupon($code){
        $uid = $this->get_user_id();
        $filter = array(
            "coupon_code" => $code
        );
        $this->model->delete_row("user_coupon", $filter);
        redirect("user/view_coupons/" . $uid);
    }

    function exchange_point($coupon_id){
        $this->load->helper("keygen");
        $uid = $this->get_user_id();
        $insert = array(
            "user_id" => $uid,
            "coupon_id" => $coupon_id,
            "coupon_code" => generateRandomString()
        );
        $this->model->insert_row($insert, "user_coupon");
        $point = $this->model->get_value("points_needed", "coupons", array("id"=>$coupon_id));

        $this->subtract_point($uid, $point);
        redirect("user/view_coupons/" . $uid);
    }

    function view_coupons($user_id){
        $data["coupons"] = $this->model->get_my_coupons($user_id);
        $this->load->view("coupons/mine", $data);
    }

    function view_all_coupons(){
        $data["coupons"] = $this->model->get_coupons();
        $this->load->view("coupons/all", $data);
    }

    function view_badges($user_id){

    }

    function insert_coupon(){
        $this->load->helper("keygen");
        for($i = 10; $i<20; $i++){
            $data = array(
                "company" => "HP",
                "text" => "Free " . $i . " Tablets"
            );
            $this->model->insert_row($data, "coupons");
            print_r($data);
        }
        echo "complete";
    }

}