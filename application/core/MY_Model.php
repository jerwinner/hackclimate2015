<?php

class MY_Model extends CI_Model{

    function insert_row($data, $table){
        return $this->db->insert($table, $data);
    }

    function delete_row($table, $filters = array()){
        $this->db->where($filters)
                 ->delete($table);
    }

    function update_row($data, $table, $filters = array()){
        return $this->db->where($filters)
            ->update($table, $data);
    }

	function get_last_id($id, $table, $filters = array()){
		$q = $this->db->select($id)
					  ->order_by($id, "desc")
					  ->limit('1')
					  ->get_where($table, $filters);
        return $q->num_rows() == 0 ? 0 : $q->row()->$id;
	}

    function increment_last_id($id, $table, $filters = array()){
        return 1 + $this->get_last_id($id, $table, $filters);
    }

	function get_count($table, $filters = array(), $like = '', $match = '', $like2 = '', $match2 = ''){
		if($like != '')
			$this->db->like($like, $match);
		if($like2 != '')
			$this->db->or_like($like2, $match2);
		$query = $this->db->get_where($table, $filters);
		return $query->num_rows();
	}



	public function get_value($column, $table, $filters = array()){
		$query = $this->db->select($column)
                          ->get_where($table, $filters);
		if($query->num_rows() == 0)
			return 0;
		$query = $query->row();
		return $query->$column;
	}

	public function get_dropdown($value, $text, $table, $filters = array(), $option = true){
		$rows = $this->db->select($value . ', ' . $text)
						 ->order_by($text, ASCENDING)
						 ->get_where($table, $filters)
						 ->result();
		if ($option)
			$array = array("" => "");
		else
			$array = array();
		foreach($rows as $row){
			$array[$row->$value] = $row->$text;
		}
		return $array;
	}

	public function get_list($column, $table, $filters = array()){
        $query = $this->db->select($column)
    					  ->from($table)
                          ->where($filters)
    					  ->get()->result();
		foreach ($query as $r)
		 	$array[] = $r->$column; 
    	return $array;
	}

	public function complete_query($select, $table, $filters = array(), $order_by = ''){
		$query = $this->db->select($select)
						 ->from($table)
						 ->where($filters);
		if($order_by != '')
			$query = $this->db->order_by($order_by);
		$query = $this->db->get()->result();
		return $query;
	}

	public function in_table($column, $table, $filters = array()){
		$query = $this->db->select($column)
                          ->get_where($table, $filters)
						  ->num_rows();
		return $query == 0 ? FALSE : TRUE ;
	}

    public function has_row($table, $filters = array()){
        $query = $this->db->get_where($table, $filters)
                          ->num_rows();
        return $query == 0 ? FALSE : TRUE ;
    }

}
	