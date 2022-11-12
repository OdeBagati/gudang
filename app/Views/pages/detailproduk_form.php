<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-5">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk Form</li>
        </ol>
    </nav>

    <div class="row mt-5">

        <div class="col-12 px-5 pb-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="span-title"><span>Produk Form</span></h4>
                    </div>

                    <div class="container">

                        <form action="<?= base_url(); ?>/save-detail-produk" method="post">

                        <?= csrf_field(); ?>
                        
                        <div class="row">

                            <input type="text" name="detailproductId" value="<?= isset($detailproductId)?$detailproductId:set_value('detailproductId'); ?>" class="form-control" placeholder="Input id DetailProduk" hidden>

                            <div class="col-5 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <select class="form-select" name="idproduct" id="floatingSelect" aria-label="Floating label select example">
                                        <?php
                                            use App\Models\ProdukModel;
                                            $this->objProduk=new ProdukModel;
                                            $dataProduk=$this->objProduk->getProduk();

                                            foreach ($dataProduk as $index => $listProduk)
                                            {
                                                if(isset($idproduct)&&$idproduct==$listProduk['idproduct'])
                                                {
                                                    echo '<option value="'.$listProduk['idproduct'].'" selected>'.$listProduk['productName'].'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$listProduk['idproduct'].'">'.$listProduk['productName'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Pilih Produk</label>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-floating my-3">
                                    <select class="form-select" name="productColor" id="floatingSelect" aria-label="Floating label select example">
                                    <?php
                                        use App\Models\PrintModel;
                                        $this->objPrint=new PrintModel;
                                        $dataWarna=$this->objPrint->getWarna();

                                        foreach ($dataWarna as $index => $listWarna)
                                        {
                                            if(isset($productColor)&&$productColor==$listWarna['id'])
                                            {
                                                echo '<option value="'.$listWarna['id'].'" selected>'.$listWarna['printName'].'</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="'.$listWarna['id'].'">'.$listWarna['printName'].'</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                    <label for="floatingSelect">Pilih Warna</label>
                                </div>
                            </div>

                            <div class="col-5 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productPo" value="<?= isset($productPo)?$productPo:set_value('productPo'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk PO">
                                    <label for="floatingInput">Produk PO</label>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-floating my-3">
                                    <select class="form-select" name="productSo" id="floatingSelect" aria-label="Floating label select example">
                                    <?php
                                        use App\Models\SoModel;
                                        $this->objSo=new SoModel;
                                        $dataSo=$this->objSo->getSo();

                                        foreach ($dataSo as $index => $listSo)
                                        {
                                            if(isset($productSo)&&$productSo==$listSo['idSo'])
                                            {
                                                echo '<option value="'.$listSo['idSo'].'" selected>'.$listSo['nomorSo'].'</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="'.$listSo['idSo'].'">'.$listSo['nomorSo'].'</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                    <label for="floatingSelect">Pilih Warna</label>
                                </div>
                            </div>

                            <div class="col-5 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productLineSKU" value="<?= isset($productLineSKU)?$productLineSKU:set_value('productLineSKU'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Line SKU">
                                    <label for="floatingInput">Produk Line SKU</label>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-floating my-3">
                                    <input type="text" name="productSKU" value="<?= isset($productSKU)?$productSKU:set_value('productSKU'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk SKU">
                                    <label for="floatingInput">Produk SKU</label>
                                </div>
                            </div>

                            <div class="col-5 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <select class="form-select" name="productFamily" id="floatingSelect" aria-label="Floating label select example">
                                        <?php
                                            use App\Models\FamilyModel;
                                            $this->objFamily=new FamilyModel;
                                            $dataFamily=$this->objFamily->getFamily();

                                            foreach ($dataFamily as $index => $listFamily)
                                            {
                                                if(isset($productFamily)&&$productFamily==$listFamily['id'])
                                                {
                                                    echo '<option value="'.$listFamily['id'].'" selected>'.$listFamily['familyName'].'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$listFamily['id'].'">'.$listFamily['familyName'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Pilih Produk Family</label>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-floating my-3">
                                    <input type="text" name="productFactory" value="<?= isset($productFactory)?$productFactory:set_value('productFactory'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Factory">
                                    <label for="floatingInput">Produk Factory</label>
                                </div>
                            </div>

                            <div class="col-5 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <select class="form-select" name="productBrand" id="floatingSelect" aria-label="Floating label select example">
                                        <?php
                                            use App\Models\ClientModel;
                                            $this->objClient=new ClientModel;
                                            $dataClient=$this->objClient->getClient();

                                            foreach ($dataClient as $index => $listClient)
                                            {
                                                if(isset($productBrand)&&$productBrand==$listClient['idClient'])
                                                {
                                                    echo '<option value="'.$listClient['idClient'].'" selected>'.$listClient['namaClient'].'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$listClient['idClient'].'">'.$listClient['namaClient'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Pilih Produk Brand</label>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-floating my-3">
                                    <select class="form-select" name="productSize" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="XS">XS</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                    <label for="floatingSelect">Size Produk</label>
                                </div>
                            </div>

                            <div class="col-3 offset-1">
                                <div class="form-floating ms-5 my-3">
                                    <input type="number" name="productQty" value="<?= isset($productQty)?$productQty:set_value('productQty'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Qty Produk</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-floating my-3">
                                    <input type="text" name="productStatus" value="<?= isset($productBrand)?$productBrand:set_value('productBrand'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Status Produk</label>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-floating my-3">
                                    <input type="date" name="shipDate" value="<?= isset($shipDate)?$shipDate:set_value('shipDate'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Ship Date</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="justify-content-center">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Save Data">
                                </div>
                            </div>

                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>