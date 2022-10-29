<?php
namespace App\Models;
use CodeIgniter\Model;

class PrintModel extends Model
{
	protected $table      = 'printTable';
    protected $primaryKey = 'id';
    protected $builder;
    protected $db;

    private $warna = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('printTable');
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

    function getWarna()
    {
        $warnalist = $this->builder->get();

        foreach($warnalist->getResult() as $listWarna)
        {
            $this->warna[]=array(
                'id'=>$listWarna->id,
                'printName'=>$listWarna->printName
            );
        }

        return $this->warna;
    }

    function saveData($arrSave)
    {
        if($arrSave['id']>0)
        {
            $this->builder->where('id',$arrSave['id']);
            $this->builder->update($arrSave);
            return $arrSave['id'];
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