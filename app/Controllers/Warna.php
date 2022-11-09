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
            $list = $this->objPrint->getDataBy($paramWarna)->getRow();

            $data['id'] = $list->id;
            $data['printName'] = $list->printName;
            $data['printPrefix'] = $list->printPrefix;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'id' => $this->request->getPost('id'),
                'printName' => $this->request->getPost('printName'),
                'printPrefix' => $this->request->getPost('printPrefix'),
                'createdAt' => date('Y-m-d H:i:s'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );

            $id = $this->objPrint->saveData($dataSave);

            return redirect()->to(base_url().'/warna');
        }
        else
        {
            $data['page'] = 'warna_form';

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