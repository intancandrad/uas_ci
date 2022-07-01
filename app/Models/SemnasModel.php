<?php

namespace App\Models;

use CodeIgniter\Model;

class SemnasModel extends Model
{
    //Inisialisasi
    protected $table = 'semnas';
    protected $allowedFields = ['email','nama','insek','wa'];

    //Query Read
    public function getData()
    {
        $query = $this->table('semnas')->query('select * from semnas');
        return $query->getResult();
    }

    public function getReset()
    {
        $query = $this->table('semnas')->query('set @num := 0;');
        $query = $this->table('semnas')->query('update semnas set id = @num := (@num+1);');
        $query = $this->table('semnas')->query('alter table semnas AUTO_INCREMENT =1;');
        return $query->getResult();
    }

    public function search($keyword){
        $query = $this->table('semnas')->like('nama', $keyword);
        return $query;
    }


    public function searchAdmin($key)
    {
        $query = $this->table('semnas')->like('nama', $key);
        return $query;
    }
}

?>