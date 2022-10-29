<?php
namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model
{
	protected $table      = 'produkTable';
    protected $primaryKey = 'productId';
    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('produkTable');
    }

    function getAllData()
    {
        $this->builder->join('familyTable','familyTable.id=produkTable.productFamily');
        $this->builder->join('printTable','printTable.id=produkTable.productColor');
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->join('familyTable','familyTable.id=produkTable.productFamily');
        $this->builder->join('printTable','printTable.id=produkTable.productColor');
        $this->builder->where($param);

        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['productId']>0)
        {
            $this->builder->where('productId',$arrSave['productId']);
            $this->builder->update($arrSave);
            return $arrSave['productId'];
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