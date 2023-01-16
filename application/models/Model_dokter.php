<?php
class Model_dokter extends CI_Model
{
    protected $table = 'dokter';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('user', 'dokter.id_user = user.id_user');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function edit_dokter($data, $id)
    {
        $this->db->update($this->table, $data, array('id_dokter' => $id));
    }
    public function delete_data($data)
    {
        $this->db->delete($this->table, $data);
    }
}
