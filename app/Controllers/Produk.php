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
            $paramProduct = array('idproduct'=>$idproduct);
            $list = $this->objProduk->getDataBy($paramProduk)->getRow();

            $data['idproduct'] = $list->idproduct;
            $data['productName'] = $list->productName;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'idproduct' => '',
                'productName' => $this->request->getPost('productName'),
                'prefix' => $this->request->getPost('prefix'),
            );

            $idproduct = $this->objProduk->saveData($dataSave);

            dd($idproduct);
        }
        else
        {
            $data['page'] = 'produk_form';

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