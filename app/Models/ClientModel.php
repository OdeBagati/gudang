<?php
namespace App\Models;
use CodeIgniter\Model;

class ClientModel extends Model
{
	protected $table      = 'clientTable';
    protected $primaryKey = 'idClient';
    protected $builder;
    protected $db;

    private $client = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('clientTable');
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
        $clientlist = $this->builder->get();

        foreach($clientlist->getResult() as $listClient)
        {
            $this->client[]=array(
                'idClient'=>$listClient->idClient,
                'clientName'=>$listClient->printName
            );
        }

        return $this->client;
    }

    function saveData($arrSave)
    {
        if($arrSave['idClient']>0)
        {
            $this->builder->where('idClient',$arrSave['idClient']);
            $this->builder->update($arrSave);
            return $arrSave['idClient'];
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