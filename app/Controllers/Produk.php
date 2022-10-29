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

    function save($productId=false)
    {
        if($productId!=false)
        {
            $paramProduk = array('productId'=>$productId);
            $list = $this->objProduk->getDataBy($paramProduk)->getRow();

            $data['productId'] = $list->productId;
            $data['productPo'] = $list->productPo;
            $data['productSo' ]= $list->productSo;
            $data['productLineSKU'] = $list->productLineSKU;
            $data['productSKU'] = $list->productSKU;
            $data['productName'] = $list->productName;
            $data['productFamily'] = $list->productFamily;
            $data['productFactory'] = $list->productFactory;
            $data['productSize' ]= $list->productSize;
            $data['productColor'] = $list->productColor;
            $data['productBrand'] = $list->productBrand;
            $data['productQty'] = $list->productQty;
            $data['shipDate'] = $list->shipDate;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'productId' => '',
                'productPo' => $this->request->getPost('productPo'),
                'productSo' => $this->request->getPost('productSo'),
                'productLineSKU' => $this->request->getPost('productLineSKU'),
                'productSKU' => $this->request->getPost('productSKU'),
                'productName' => $this->request->getPost('productName'),
                'productFamily' => $this->request->getPost('productFamily'),
                'productFactory' => $this->request->getPost('productFactory'),
                'productSize' => $this->request->getPost('productSize'),
                'productColor' => $this->request->getPost('productColor'),
                'productBrand' => $this->request->getPost('productBrand'),
                'productQty' => $this->request->getPost('productQty'),
                'shipDate' => $this->request->getPost('shipDate'),
            );

            $productId = $this->objProduk->saveData($dataSave);

            dd($productId);
        }
        else
        {
            $data['page'] = 'produk_form';

            return view('mainpage',$data);
        }
    }

    function delete($productId)
    {
        $paramProduk=array('productId'=>$productId);
        $this->objProduk->deleteData($paramProduk);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}