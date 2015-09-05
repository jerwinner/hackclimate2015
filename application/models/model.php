<?php

class Model extends MY_Model{
    function get_posts(){
        $ret = $this->db->select("posts.*,
                                  users.name,
                                  locations.descriptions,
                                  categories.description")
                        ->from("posts")
                        ->join("users", "users.id = posts.user_id")
                        ->join("locations", "locations.id = posts.location_id")
                        ->join("categories", "categories.id = posts.category_id")
                        ->get()->result_array();
        return $ret;
    }
}

?>