<?php

namespace App\Controllers;

class Produk extends BaseController
{
    public function index()
    {
        $data['dataProduk'] = $this->objProduk->getAllData();
        $data['page'] = 'produk_list';

        return view('mainpage',$data);
    }

    function save($idproduct=false)
    {
        if($idproduct!=false)
        {
            $paramProduk = array('idproduct'=>$idproduct);
            $list = $this->objProduk->getDataBy($paramProduk)->getRow();

            $data['idproduct'] = $list->idproduct;
            $data['productName'] = $list->productName;
            $data['prefix'] = $list->prefix;
        }

        if($this->request->getMethod()=="post")
        {
            $rules = [
                'productName'=>[
                    'label' =>'Nama Produk',
                    'rules'	=>'required',
                    'prefix'	=>['required'=>'Nama produk harus diisi']
                ],
                'prefix'=>[
                    'label' =>'Prefix Produk',
                    'rules'	=>'required',
                    'errors'	=>['required'=>'Prefix produk harus diisi']
                ],
            ];

            if($this->validate($rules))
			{
                $dataSave=array(
                    'idproduct' => $this->request->getPost('idproduct'),
                    'productName' => $this->request->getPost('productName'),
                    'prefix' => $this->request->getPost('prefix'),
                );
    
                $idproduct = $this->objProduk->saveData($dataSave);
                $this->session->setFlashdata('message','Input Produk Sukses');
    
                return redirect()->to(base_url().'/produk');
            }
            else
            {
                $data['validation']	= $this->validator;
                $data['page'] = 'produk_form';

                return view('mainpage',$data);
            }
        }
        else
        {
            $data['page'] = 'produk_form';

            return view('mainpage',$data);
        }
    }

    function delete($idproduct)
    {
        $paramProduct=array('idproduct'=>$idproduct);
        $this->objProduk->deleteData($paramProduct);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}