<?php
namespace App\Models;
use CodeIgniter\Model;

class OperatorModel extends Model
{
	protected $table      = 'operatorTable';
    protected $primaryKey = 'operatorId';
    protected $builder;
    protected $db;

    private $operator = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('operatorTable');
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

    function getOperator()
    {
        $operatorlist = $this->builder->get();

        foreach($operatorlist->getResult() as $listOperator)
        {
            $this->operator[]=array(
                'operatorId'=>$listOperator->operatorId,
                'operatorCode'=>$listOperator->operatorCode,
                'operatorName'=>$listOperator->operatorName,
            );
        }

        return $this->operator;
    }

    function saveData($arrSave)
    {
        if($arrSave['operatorId']>0)
        {
            $this->builder->where('operatorId',$arrSave['operatorId']);
            $this->builder->update($arrSave);
            return $arrSave['operatorId'];
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