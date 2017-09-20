<?php

class MY_Model extends CI_Model {
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract';
    const DB_TABLE_SEQ = 'abstract';

    /**
     * Create record.
     */
    private function insert() {
        $this->{$this::DB_TABLE_PK} = $this->getSequence();
        $this->db->insert($this::DB_TABLE, $this);
    }

    /**
     * Update record.
     */
    private function update() {
        error_log($this::DB_TABLE_PK,0);
        $this->db->update($this::DB_TABLE, $this, array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},
        ));
    }

	/**
     * Update record.
     */
    private function updateShowQuery($showQuery) {
        error_log($this::DB_TABLE_PK,0);
        $this->db->update($this::DB_TABLE, $this, array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},
        ));
		if($showQuery == 't'){		
			error_log('REVIEWED NO CHANGE --> '.$this->db->last_query());
		}
    }

    /**
     * Populate from an array or standard class.
     * @param mixed $row
     */
    public function populate($row) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Load from the database.
     * @param int $id
     */
    public function load($id) {
        $query = $this->db->get_where($this::DB_TABLE, array(
            $this::DB_TABLE_PK => $id,
        ));
        $this->populate($query->row());
    }

    /**
     * Load from the database.
     * @param int $id
     * @param character varying $column
     */
    public function loadWithColumn($id, $column) {
        $query = $this->db->get_where($this::DB_TABLE, array("$column = " => $id,));
        $this->populate($query->row());
    }
    
     /**
     * Load from the database.
     * @param int $id
     * @param character varying $column
     */
    public function loadWithTwoColumns($id, $column, $id2, $column2) {
       $query = "select * from ".$this::DB_TABLE."  where $column=? and $column2 = ?";
        $sql = $this->db->query($query, array($id,$id2));
        $this->populate($sql->row());
    }
    
    /**
     * Delete the current record.
     */
    public function delete() {
        $this->db->delete($this::DB_TABLE, array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},
        ));
        unset($this->{$this::DB_TABLE_PK});
    }

    /**
     * Save the record.
     */
    public function save() {
    	error_log("primary key!!!".$this->{$this::DB_TABLE_PK});
        if (isset($this->{$this::DB_TABLE_PK})) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }

    /**
     * Save the record.
     */
    public function saveShowQuery($showQuery) {
        if (isset($this->{$this::DB_TABLE_PK})) {
            $this->updateShowQuery($showQuery);
        }
        else {
            $this->insert();
        }
    }

    /**
     * Get an array of Models with an optional limit, offset.
     *
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function get($limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get($this::DB_TABLE, $limit, $offset);
        }
        else {
            $query = $this->db->get($this::DB_TABLE);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }

    private function getSequence(){
        $sql = sprintf("SELECT nextval('%s') as new_id", $this::DB_TABLE_SEQ);
        error_log("currrrrdfsadfsfassssssssssssssssssssssssssssssss val",0);
        error_log($sql,0);
        error_log("currrrrdfsadfsfassssssssssssssssssssssssssssssss val",0);
        $query = $this->db->query($sql);
        $row = $query->row();

        error_log($sql,0);
        error_log($row->new_id,0);
        return $row->new_id;
    }


    /**
     * Get an array of Models with an optional limit, offset.
     *
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function loadbyqueryone($query) {
        foreach ($query->result() as $row) {
            $this->populate($row);
        }
    }

    /**
     * Get an array of Models with an optional limit, offset.
     *
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function selectbyquery($query) {
        $ret_val = array();
		$class = get_class($this);
       foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
       }
       return $ret_val;
               
    }
    
    
}

