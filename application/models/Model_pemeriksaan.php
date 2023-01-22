<?php

class Model_pemeriksaan extends CI_Model
{
    protected $table = 'pemeriksaan';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function get_all_data()
    {
        return $this->db->get($this->table);
    }
    public function kandidat_pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'right');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien', 'right');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli', 'right');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter', 'right');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli', 'right');
        $this->db->where('pemeriksaan.no_rm IS NULL');
        $this->db->order_by('tgl_pendaftaran', 'DESC');
        return $this->db->get();
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->order_by('tgl_pemeriksaan', 'DESC');
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
    public function edit_pemeriksaan($data, $id)
    {
        if ($this->db->update($this->table, $data, array('no_rm' => $id))) {
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
