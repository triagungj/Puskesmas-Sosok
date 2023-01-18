<?php
class Model_user extends CI_Model
{
    protected $table = 'user';
    public function login($data)
    {
        return $this->db->get_where($this->table, $data);
    }

    public function count()
    {
        $sql = "SELECT * FROM $this->table WHERE jabatan != 'dokter'";
        return $this->db->query($sql)->num_rows();
    }
    public function tampil_data($per_page, $offset)
    {
        $sql = "SELECT * FROM $this->table WHERE jabatan != 'dokter' LIMIT $per_page OFFSET $offset";
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
    public function edit_user($data, $id)
    {
        if ($this->db->update($this->table, $data, array('id_user' => $id))) {
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
