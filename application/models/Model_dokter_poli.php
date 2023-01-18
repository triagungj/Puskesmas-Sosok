<?php
class Model_dokter_poli extends CI_Model
{
    protected $table = 'dokter_poli';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function input_data($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_dokter_poli($data, $id)
    {
        if ($this->db->update($this->table, $data, array('id_dokter_poli' => $id))) {
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
