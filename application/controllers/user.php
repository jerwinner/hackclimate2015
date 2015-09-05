<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model("model");
    }

    function add_user(){
        $post = $this->get_data();
        $data["success"] = FAILED;
        $utype = get_post($post, "type");

        $insert = array(
            DB_USER_USERNAME    => get_post($post, "uname"),
            DB_USER_PASSWORD    => md5(get_post($post, "pass")),
            DB_USER_TYPE        => $utype,
            DB_USER_TITLE       => get_post($post, "title"),
            DB_USER_FNAME       => get_post($post, "fname"),
            DB_USER_MNAME       => get_post($post, "mname"),
            DB_USER_LNAME       => get_post($post, "lname"),
            DB_USER_ANAME       => get_post($post, "aname"),
            DB_USER_GENDER      => get_post($post, "sex"),
            DB_USER_AGE         => get_post($post, "age"),
            DB_USER_ADDRESS     => get_post($post, "address"),
            DB_USER_BDAY        => get_post($post, "bday"),
            DB_USER_LANDLINE    => get_post($post, "landline"),
            DB_USER_MOBILE      => get_post($post, "mobile"),
            DB_USER_EMAIL       => get_post($post, "email"),
            DB_USER_CPERSON     => get_post($post, "cperson"),
            DB_USER_CMOBILE     => get_post($post, "cmobile"),
            DB_USER_CEMAIL      => get_post($post, "cemail"),
            DB_USER_CDATE       => date("Y-m-d"),
            DB_USER_MDATE       => date("Y-m-d")
        );

        if( $this->model->insert_row($insert, TABLE_USERS) ){
            $data["id"] = $this->model->get_last_id(DB_USER_ID, TABLE_USERS);

            $filter[DB_USER_ID] = $data["id"];
            switch($utype){
                case USER_ADMIN     :
                    $data["success"] = SUCCESS;
                    break;

                case USER_PATIENT   :
                    $i = array(
                        DB_PATIENT_ID => $data["id"],
                        DB_PATIENT_AILMENT => get_post($post, "ailment")
                    );
                    if( $this->model->insert_row($i, TABLE_PATIENT) ){
                        $data["success"] = SUCCESS;
                    } else {
                        $this->model->delete_row(TABLE_USERS, array(DB_USER_ID => $data["id"]));
                    }
                    break;

                case USER_DOCTOR    :
                    $i = array(
                        DB_DOCTOR_ID => $data["id"],
                        DB_DOCTOR_KIND => get_post($post, "dkind")
                    );
                    if( $this->model->insert_row($i, TABLE_DOCTOR) ){
                        $data["success"] = SUCCESS;
                    } else {
                        $this->model->delete_row(TABLE_USERS, array(DB_USER_ID => $data["id"]));
                    }
                    break;
            }

        }

        return $data;
    }

    function update_user(){

    }

    function delete_user(){
        $post = $this->get_data();
        $uid = get_post($post, "id");
        $data["success"] = FAILED;

        $update = array(
            DB_USER_MDATE   => date("Y-m-d"),
            DB_USER_ACTIVE  => INACTIVE
        );

        if($this->model->update_row($update, TABLE_USERS, array(DB_USER_ID => $uid))){
            $data["success"] = SUCCESS;
        }

        echo json_encode($data);
    }

}