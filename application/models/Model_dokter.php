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
    public function input_data($dataUser, $dataDokter)
    {
        $dataUser = $this->db->insert('user', $dataUser);
        $idUser = $this->db->insert_id();
        $dataDokter['id_user'] = $idUser;
        if ($idUser != null && $this->db->insert($this->table, $dataDokter)) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_dokter($dataUser, $dataDokter, $id)
    {
        $updateUser = $this->db->update('user', $dataUser, array('id_user' => $dataDokter['id_user']));
        if ($updateUser && $this->db->update($this->table, $dataDokter, array('id_dokter' => $id))) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_data($data)
    {
        $this->db->delete($this->table, $data);
    }
}
