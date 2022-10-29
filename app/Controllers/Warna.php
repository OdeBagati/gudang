<?php

namespace App\Controllers;

class Warna extends BaseController
{
    public function index()
    {
        $data['dataWarna'] = $this->objPrint->getAllData();
        $data['page'] = 'warna_list';

        return view('mainpage',$data);
    }

    function save($id=false)
    {
        if($id!=false)
        {
            $paramWarna = array('id'=>$id);
            $list = $this->objWarna->getDataBy($paramWarna)->getRow();

            $data['id'] = $list->id;
            $data['printName'] = $list->printName;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'id' => '',
                'printName' => $this->request->getPost('printName'),
                'createdAt' => date('d-m-Y H:i:s'),
                'updatedAt' => date('d-m-Y H:i:s'),
            );

            $id = $this->objPrint->saveData($dataSave);

            dd($id);
        }
        else
        {
            $data['page'] = 'produk_form';

            return view('mainpage',$data);
        }
    }

    function delete($id)
    {
        $paramWarna		=array('id'=>$id);
        $this->objWarna->deleteData($paramWarna);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}