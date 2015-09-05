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

    function get_badges($user_id){
        $ret = $this->db->select("badges.*")
                        ->join("user_badge", "user_badge.badge_id = badges.id")
                        ->join("users", "users.id = user_badge.user_id")
                        ->get_where("badges", array("user_id" => $user_id))
                        ->result_array();
        return $ret;
    }
}
?>