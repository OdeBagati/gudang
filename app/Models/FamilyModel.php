<?php
namespace App\Models;
use CodeIgniter\Model;

class FamilyModel extends Model
{
	protected $table      = 'familyTable';
    protected $primaryKey = 'id';
    protected $builder;
    protected $db;

    private $family = array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('familyTable');
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

    function getFamily()
    {
        $familylist = $this->builder->get();

        foreach($familylist->getResult() as $listFamily)
        {
            $this->family[]=array(
                'id'=>$listFamily->id,
                'familyName'=>$listFamily->familyName
            );
        }

        return $this->family;
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