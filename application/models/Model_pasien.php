<?php
class Model_pasien extends CI_Model
{
    protected $table = 'pasien';

    public function count()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->num_rows();
    }
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('nama_pasien', 'ASC');
        return $this->db->get();
    }
    public function tampil_data($per_page, $offset)
    {
        $sql = "SELECT * FROM $this->table ORDER BY id_pasien DESC LIMIT $per_page OFFSET $offset";
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
    public function edit_pasien($data, $id)
    {
        if ($this->db->update($this->table, $data, array('id_pasien' => $id))) {
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
