<?php
namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model
{
	protected $table      = 'productTable';
    protected $primaryKey = 'idproduct';
    protected $builder;
    protected $db;

    private $product = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('productTable');
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

    function getProduk()
    {
        $productlist = $this->builder->get();

        foreach($productlist->getResult() as $listProduct)
        {
            $this->product[]=array(
                'idproduct'=>$listProduct->idproduct,
                'productName'=>$listProduct->productName,
                'prefix'=>$listProduct->prefix,
            );
        }

        return $this->product;
    }

    function saveData($arrSave)
    {
        if($arrSave['idproduct']>0)
        {
            $this->builder->where('idproduct',$arrSave['idproduct']);
            $this->builder->update($arrSave);
            return $arrSave['idproduct'];
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