<?php

namespace App\Controllers;

class Barcode extends BaseController
{
    public function index()
    {
        $data['dataProduksi'] = $this->objProduksi->getAllData();
        $data['page'] = 'produksi_list';

        return view('mainpage',$data);
    }

    function save($productionId=false)
    {
        if($productionId!=false)
        {
            $paramProduction = array('productionId'=>$productionId);
            $list = $this->objProduksi->getDataBy($paramProduction)->getRow();

            $data['productionId'] = $list->productionId;
            $data['productionProcess'] = $list->productionProcess;
            $data['productionStatus' ]= $list->productionStatus;
            $data['productionCode'] = $list->productionCode;
            $data['productionOperator'] = $list->productionOperator;
            $data['productionDate'] = $list->productionDate;
        }

        if($this->request->getMethod()=="post")
        {
            $dataSave=array(
                'productionId' => $this->request->getPost('productionId'),
                'productionProcess' => $this->request->getPost('productionProcess'),
                'productionStatus' => $this->request->getPost('productionStatus'),
                'productionCode' => $this->request->getPost('productionCode'),
                'productionOperator' => intval($this->request->getPost('productionOperator')),
                'productionDate' => date('d-m-Y H:i:s')
            );

            $productionId = $this->objProduksi->saveData($dataSave);

            dd($productionId);
        }
        else
        {
            $data['page'] = 'main';

            return view('mainpage',$data);
        }
    }

    function preview()
    {
        if($this->request->getMethod()=="post")
        {
            $dataSearch = array('productPo'=>$this->request->getPost('productionCode'));

            $datapreview = $this->objProduk->getDataBy($dataSearch)->getRow();

            return json_encode($datapreview);
        }
        else
        {
            echo 'skip';
        }
    }

    function delete($productionId)
    {
        $paramProduction=array('productionId'=>$productionId);
        $this->objProduksi->deleteData($paramProduction);

        $this->session->setFlashdata('message','URL berhasil dihapus');
        return redirect()->back();
    }
}