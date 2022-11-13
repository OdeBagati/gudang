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
            $rules = [
                'familyName'=>[
                    'label' =>'Nama Family',
                    'rules'	=>'required',
                    'errors'	=>['required'=>'Nama family harus diisi']
                ],
            ];

            if($this->validate($rules))
			{
                $dataSave=array(
                    'id' => $this->request->getPost('id'),
                    'familyName' => $this->request->getPost('clientName'),
                    'createdAt' => date('d-m-Y H:i:s'),
                    'updatedAt' => date('d-m-Y H:i:s'),
                );
    
                $id = $this->objFamily->saveData($dataSave);
                $this->session->setFlashdata('message','Input data berhasil');
    
                dd($id);
            }
            else
            {
                $data['validation']	= $this->validator;
                $data['page'] = 'family_form';

                return view('mainpage',$data);
            }
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