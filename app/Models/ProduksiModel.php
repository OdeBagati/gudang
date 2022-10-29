<?php
namespace App\Models;
use CodeIgniter\Model;

class ProduksiModel extends Model
{
	protected $table      = 'transactionTable';
    protected $primaryKey = 'productionId';
    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('transactionTable');
    }

    function getAllData()
    {
        $this->builder->join('operatorTable','operatorTable.operatorId=transactionTable.productionOperator');
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->join('operatorTable','operatorTable.operatorId=transactionTable.productionOperator');
        $this->builder->where($param);

        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['productionId']>0)
        {
            $this->builder->where('productionId',$arrSave['productionId']);
            $this->builder->update($arrSave);
            return $arrSave['productionId'];
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