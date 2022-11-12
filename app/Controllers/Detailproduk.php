<?php

namespace App\Controllers;

class Detailproduk extends BaseController
{
    public function index()
    {
        $data['dataProduk'] = $this->objProduk->getAllData();
        $data['page'] = 'produk_list';

        return view('mainpage',$data);
    }

    function save($detailproductId=false)
    {
        if($detailproductId!=false)
        {
            $paramProduk = array('detailproductId'=>$detailproductId);
            $list = $this->objDetailroduk->getDataBy($paramProduk)->getRow();

            $data['detailproductId'] = $list->detailproductId;
            $data['idpproduct'] = $list->idproduct;
            $data['productPo'] = $list->productPo;
            $data['productSo' ]= $list->productSo;
            $data['productLineSKU'] = $list->productLineSKU;
            $data['productSKU'] = $list->productSKU;
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
            $idproduct = $this->request->getPost('idproduct');
            $color = $this->request->getPost('productColor');
            $size = $this->request->getPost('productSize');

            $paramProduct = array('idproduct'=>$idproduct);
            $paramColor = array('id'=>$color); 

            $product = $this->objProduk->getDataBy($paramProduct)->getResult();
            $color = $this->objPrint->getDataBy($paramColor)->getResult();

            $year = date('y');
            $prefix = $product[0]->prefix;
            $productName = str_replace(' ','',strtoupper($product[0]->productName));
            $prefixColor = $color[0]->printPrefix;
            $colorName = str_replace(' ','',strtoupper($color[0]->printName));

            $dataSave=array(
                'detailproductId' => $this->request->getPost('detailproductId'),
                'idproduct' => $idproduct,
                'productPo' => $this->request->getPost('productPo'),
                'productSo' => $this->request->getPost('productSo'),
                'productLineSKU' => 'R'.$year.$prefix.'0R4'.$prefixColor.$size.$productName.$colorName.$size.'1',
                'productSKU' => 'R'.$year.$prefix.'0R4'.$prefixColor.$size,
                'productFamily' => $this->request->getPost('productFamily'),
                'productFactory' => $this->request->getPost('productFactory'),
                'productSize' => $size,
                'productColor' => $color,
                'productBrand' => $this->request->getPost('productBrand'),
                'productQty' => $this->request->getPost('productQty'),
                'shipDate' => $this->request->getPost('shipDate'),
            );

            $detailproductId = $this->objDetailproduk->saveData($dataSave);

            dd($detailproductId);
        }
        else
        {
            $data['page'] = 'detailproduk_form';

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