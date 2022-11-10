<?php
namespace App\Models;
use CodeIgniter\Model;

class SoModel extends Model
{
	protected $table      = 'soTable';
    protected $primaryKey = 'idSo';
    protected $builder;
    protected $db;

    private $so = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('soTable');
    }

    function getAllData()
    {
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->where($param);

        return $this->builder->get();
    }

    function getSo()
    {
        $solist = $this->builder->get();

        foreach($solist->getResult() as $listSo)
        {
            $this->so[]=array(
                'idSo'=>$listSo->idSo,
                'nomorSo'=>$listSo->nomorSo
            );
        }

        return $this->client;
    }

    function saveData($arrSave)
    {
        if($arrSave['idSo']>0)
        {
            $this->builder->where('idSo',$arrSave['idSo']);
            $this->builder->update($arrSave);
            return $arrSave['idSo'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }
}