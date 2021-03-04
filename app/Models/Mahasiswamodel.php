<?php

namespace App\Models;

use CodeIgniter\Model;


class Mahasiswamodel extends Model
{

    protected $table = 'biodata';
    protected $allowedFields = ['nim', 'nama', 'alamat', 'umur', 'hobi'];

    public function getMahasiswa()
    {

        // if ($id == null) {
        return $this->findAll();
        // } else {
        //     return $this->getWhere(['id' => $id])->getRowArray();
        // }
    }

    public function getMahasiswaById($id)
    {
        return $this->getWhere(['id' => $id])->getRowArray();
    }

    public function addMahasiswa($data)
    {
        return $this->save($data);
    }

    public function updateMahasiswa($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}