<?php

namespace App\Controllers;

class Family extends BaseController
{
    public function index()
    {
        $data['dataFamily'] = $this->objFamily->getAllData();
        $data['page'] = 'family_list';

        return view('mainpage',$data);
    }

    function save($id=false)
    {
        if($id!=false)
        {
            $paramFamily = array('id'=>$id);
            $list = $this->objFamily->getDataBy($paramFamily)->getRow();

            $data['id'] = $list->id;
            $data['printName'] = $list->familyName;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'id' => '',
                'familyName' => $this->request->getPost('clientName'),
                'createdAt' => date('d-m-Y H:i:s'),
                'updatedAt' => date('d-m-Y H:i:s'),
            );

            $id = $this->objFamily->saveData($dataSave);

            dd($id);
        }
        else
        {
            $data['page'] = 'family_form';

            return view('mainpage',$data);
        }
    }

    function delete($id)
    {
        $paramFamily=array('id'=>$id);
        $this->objFamily->deleteData($paramFamily);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}