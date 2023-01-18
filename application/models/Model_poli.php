<?php
class Model_poli extends CI_Model
{
    protected $table = 'poli';

    public function count()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->num_rows();
    }
    public function get_all_data()
    {
        return $this->db->get($this->table);
    }
    public function tampil_data($per_page, $offset)
    {
        $sql = "SELECT * FROM $this->table LIMIT $per_page OFFSET $offset";
        return $this->db->query($sql);
    }
    public function input_data($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_poli($data, $id)
    {
        if ($this->db->update($this->table, $data, array('id_poli' => $id))) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_data($data)
    {
        if ($this->db->delete($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
}
