<?php
class Model_pendaftaran extends CI_model
{
    protected $table = 'pendaftaran';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function get_all_data()
    {
        return $this->db->get($this->table);
    }
    public function select_data($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->where('id_pendaftaran', $id);
        return $this->db->get()->row();
    }
    public function select_data_by_month($month)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->where('id_pendaftaran', $month, 'after');
        return $this->db->get()->row();
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->order_by('id_pendaftaran', 'DESC');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function group_total_data()
    {
        $this->db->select('pendaftaran.id_pendaftaran, poli.nama_poli, COUNT(pendaftaran.id_pendaftaran) as total');
        $this->db->from($this->table);
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli', 'right');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->group_by('poli.id_poli');
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
    public function edit_pendaftaran($data, $id)
    {
        if ($this->db->update($this->table, $data, array('id_pendaftaran' => $id))) {
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
