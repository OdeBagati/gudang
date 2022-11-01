<?php
namespace App\Models;
use CodeIgniter\Model;

class DetailprodukModel extends Model
{
	protected $table      = 'productdetailTable';
    protected $primaryKey = 'detailproductId';
    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('productdetailTable');
    }

    function getAllData()
    {
        $this->builder->join('familyTable','familyTable.id=productdetailTable.productFamily');
        $this->builder->join('printTable','printTable.id=productdetailTable.productColor');
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->join('familyTable','familyTable.id=productdetailTable.productFamily');
        $this->builder->join('printTable','printTable.id=productdetailTable.productColor');
        $this->builder->where($param);

        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['detailproductId']>0)
        {
            $this->builder->where('detailproductId',$arrSave['detailproductId']);
            $this->builder->update($arrSave);
            return $arrSave['detailproductId'];
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