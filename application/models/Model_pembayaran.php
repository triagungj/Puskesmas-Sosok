<?php

class Model_pembayaran extends CI_Model
{
    protected $table = 'pembayaran';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function get_all_data()
    {
        return $this->db->get($this->table);
    }
    public function total_status_bayar()
    {
        return $this->db->query("SELECT 
        (SELECT COUNT(id_pembayaran) FROM pembayaran WHERE status = 'Lunas') as lunas,
        (SELECT COUNT(id_pembayaran) FROM pembayaran WHERE status = 'Lunas') as belum_lunas")->row();
    }
    public function select_data($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'pembayaran.id_tindakan = tindakan.id_tindakan');
        $this->db->join('pemeriksaan', 'tindakan.no_rm = pemeriksaan.no_rm');
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->where('id_pembayaran', $id);
        return $this->db->get()->row();
    }
    public function kandidat_pembayaran()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'pembayaran.id_tindakan = tindakan.id_tindakan', 'right');
        $this->db->join('pemeriksaan', 'tindakan.no_rm = pemeriksaan.no_rm', 'right');
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'right');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien', 'right');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli', 'right');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter', 'right');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli', 'right');
        $this->db->where('pembayaran.id_pembayaran IS NULL');
        $this->db->where('tindakan.no_rm IS NOT NULL');
        $this->db->order_by('tgl_tindakan', 'DESC');
        return $this->db->get();
    }
    public function select_data_by_month($per_page, $offset, $month)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'pembayaran.id_tindakan = tindakan.id_tindakan');
        $this->db->join('pemeriksaan', 'tindakan.no_rm = pemeriksaan.no_rm');
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->like('tgl_tindakan', $month, 'after');
        $this->db->order_by('tgl_tindakan', 'DESC');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'pembayaran.id_tindakan = tindakan.id_tindakan');
        $this->db->join('pemeriksaan', 'tindakan.no_rm = pemeriksaan.no_rm');
        $this->db->join('pendaftaran', 'pemeriksaan.id_pendaftaran = pendaftaran.id_pendaftaran');
        $this->db->join('pasien', 'pendaftaran.id_pasien = pasien.id_pasien');
        $this->db->join('dokter_poli', 'pendaftaran.id_dokter_poli = dokter_poli.id_dokter_poli');
        $this->db->join('dokter', 'dokter_poli.id_dokter = dokter.id_dokter');
        $this->db->join('poli', 'dokter_poli.id_poli = poli.id_poli');
        $this->db->order_by('tgl_tindakan', 'DESC');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function input_data($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        } else {
            return null;
        }
    }
    public function edit_pembayaran($data, $data_edit)
    {
        if ($this->db->update($this->table, $data, $data_edit)) {
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
