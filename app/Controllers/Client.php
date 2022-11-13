<?php

namespace App\Controllers;

class Client extends BaseController
{
    public function index()
    {
        $data['dataWarna'] = $this->objClient->getAllData();
        $data['page'] = 'client_list';

        return view('mainpage',$data);
    }

    function save($idClient=false)
    {
        if($idClient!=false)
        {
            $paramClient = array('idClient'=>$idClient);
            $list = $this->objClient->getDataBy($paramClient)->getRow();

            $data['idClient'] = $list->idClient;
            $data['namaClient'] = $list->namaClient;
        }

        if($this->request->getMethod()=="post")
        {
            $rules = [
                'namaClient'=>[
                    'label' =>'Nama Client',
                    'rules'	=>'required',
                    'errors'	=>['required'=>'Nama client harus diisi']
                ],
            ];

            if($this->validate($rules))
			{
                $dataSave=array(
                    'idClient' => $this->request->getPost('idClient'),
                    'namaClient' => $this->request->getPost('namaClient'),
                    'createdAt' => date('d-m-Y H:i:s'),
                    'updatedAt' => date('d-m-Y H:i:s'),
                );
    
                $id = $this->objClient->saveData($dataSave);
                $this->session->setFlashdata('message','Input client berhasil');
    
                dd($id);
            }
            else
            {
                $data['validation']	= $this->validator;
                $data['page'] = 'client_form';

                return view('mainpage',$data);
            }
        }
        else
        {
            $data['page'] = 'client_form';

            return view('mainpage',$data);
        }
    }

    function delete($idClient)
    {
        $paramClient=array('idClient'=>$idClient);
        $this->objClient->deleteData($paramClient);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}