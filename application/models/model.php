<?php

class Model extends MY_Model{
    function get_posts($filter = array()){
        $ret = $this->db->select("posts.*,
                                  users.name,
                                  locations.descriptions,
                                  categories.description")
                        ->join("users", "users.id = posts.user_id")
                        ->join("locations", "locations.id = posts.location_id")
                        ->join("categories", "categories.id = posts.category_id")
                        ->get_where("posts", $filter)->result_array();
        return $ret;
    }
}

?>