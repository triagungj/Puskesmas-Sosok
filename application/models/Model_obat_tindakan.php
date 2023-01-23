<?php

class Model_obat_tindakan extends CI_Model
{
    protected $table = 'obat_tindakan';
    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function get_all_data()
    {
        return $this->db->get($this->table);
    }
    public function select_data($id_tindakan)
    {
        $this->db->select('obat.*, obat_tindakan.*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'obat_tindakan.id_tindakan = tindakan.id_tindakan');
        $this->db->join('obat', 'obat_tindakan.id_obat = obat.id_obat');
        $this->db->where('tindakan.id_tindakan', $id_tindakan);
        return $this->db->get();
    }
    public function tampil_data($per_page, $offset)
    {
        $this->db->select('obat.*, obat_tindakan.*');
        $this->db->from($this->table);
        $this->db->join('tindakan', 'obat_tindakan.id_tindakan = tindakan.id_tindakan');
        $this->db->join('obat', 'obat_tindakan.id_obat = obat.id_obat');
        $this->db->order_by('tgl_tindakan', 'DESC');
        $this->db->limit($offset, $per_page);
        return $this->db->get();
    }
    public function input_multi_data($data)
    {
        if ($this->db->insert_batch($this->table, $data)) {
            foreach ($data as $obat_tindakan) {
                $this->db->select('stok');
                $this->db->from('obat');
                $this->db->where('id_obat', $obat_tindakan['id_obat']);
                $obat = $this->db->get()->row();
                $stok_akhir = $obat->stok - $obat_tindakan['jumlah_obat'];
                $data_updated = array(
                    'stok' => $stok_akhir
                );

                $this->db->update('obat', $data_updated, array('id_obat' => $obat_tindakan['id_obat']));
            }
            return true;
        } else {
            return false;
        }
    }
    public function input_data($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_obat_tindakan($data, $data_edit)
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
