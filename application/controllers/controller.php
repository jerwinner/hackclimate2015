<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("model");
    }

	public function index(){
        $data["uname"] = "manrick.capotolan";
        $data["passa"] = "icompass";

        $t = json_encode($data);
    echo $t . "<br>";
	    $e = encrypt($t, ENCRYPTION_KEY);
//        $d = decrypt($e, ENCRYPTION_KEY);
//        $t = json_decode($d, TRUE);
//        print_r($t);
//        echo $t["has1"];
        $this->authenticate_user($e);
    }

    public function add_user(){
        $post = $this->get_data();

        $insert = array(
            DB_USER_USERNAME => $post["uname"],
            DB_USER_PASSWORD => md5($post["pass"]),
            DB_USER_TYPE => $post["type"],
            DB_USER_TITLE => $post["title"],
            DB_USER_FNAME => $post["fname"],
            DB_USER_MNAME => $post["mname"],
            DB_USER_LNAME=> $post["lname"],
            DB_USER_GENDER => $post["sex"],
            DB_USER_AGE => $post["age"],
            DB_USER_ADDRESS => $post["address"],
            DB_USER_BDAY => $post["bday"],
            DB_USER_CDATE => $post["cdate"],
            DB_USER_MDATE => $post["mdate"]
        );

        if( $this->model->insert_row($insert, TABLE_USERS) ){
            $data["success"] = SUCCESS;
            $data["id"] = $this->model->get_last_id(DB_USER_ID, TABLE_USERS);
        } else {
            $data["success"] = FAILED;
        }

        echo(json_encode($data));
    }

    public function has_username(){
        $post = $this->get_data();

        $uname = get_post($post, "uname");

        $filter = array(
            DB_USER_USERNAME => $uname
        );

        if($this->model->has_row(TABLE_USERS, $filter)){
            $data["result"] = TRUE;
        } else {
            $data["result"] = FALSE;
        }

        echo(json_encode($data));
    }

    public function authenticate_user(){
        $post = $this->get_data();

        $uname = get_post($post, "uname");
        $pass = md5(get_post($post, "pass"));

        $filter = array(
            DB_USER_USERNAME => $uname,
            DB_USER_PASSWORD => $pass
        );

        if($this->model->has_row(TABLE_USERS, $filter)){
            $data["result"] = TRUE;
        } else {
            $data["result"] = FALSE;
        }

        echo(json_encode($data));
    }

    public function add_doctor(){

        $insert = array(
            DB_USER_USERNAME => $this->input->post("uname"),
            DB_USER_PASSWORD => md5($this->input->post("pass")),
            DB_USER_TYPE => $this->input->post("type"),
            DB_USER_TITLE => $this->input->post("title"),
            DB_USER_FNAME => $this->input->post("fname"),
            DB_USER_MNAME => $this->input->post("mname"),
            DB_USER_LNAME=> $this->input->post("lname"),
            DB_USER_GENDER => $this->input->post("gender"),
            DB_USER_AGE => $this->input->post("age"),
            DB_USER_ADDRESS => $this->input->post("address"),
            DB_USER_BDAY => $this->input->post("bday"),
            DB_USER_CDATE => $this->input->post("cdate"),
            DB_USER_MDATE => $this->input->post("mdate"),
            DB_USER_ACTIVE => $this->input->post("active")
        );

        if($this->model->insert_row($insert, TABLE_USERS)){
            $data["success"] = SUCCESS;
            $data["id"] = $this->model->get_last_id(DB_USER_ID, TABLE_USERS);
        } else {
            $data["success"] = FAILED;
        }

        echo(json_encode($data));
    }

}
