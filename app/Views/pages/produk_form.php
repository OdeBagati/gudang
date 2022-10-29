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

                        <form action="<?= base_url(); ?>/produk-form" method="post">

                        <?= csrf_field(); ?>
                        
                        <div class="row">

                            <input type="text" name="productId" value="<?= isset($productId)?$productId:set_value('productId'); ?>" class="form-control" placeholder="Input id Produk" hidden>

                            <div class="col-6">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productPo" value="<?= isset($productPo)?$productPo:set_value('productPo'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk PO">
                                    <label for="floatingInput">Produk PO</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating me-5 my-3">
                                    <input type="text" name="productSo" value="<?= isset($productSo)?$productSo:set_value('productSo'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk SO">
                                    <label for="floatingInput">Produk SO</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productLineSKU" value="<?= isset($productLineSKU)?$productLineSKU:set_value('productLineSKU'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Line SKU">
                                    <label for="floatingInput">Produk Line SKU</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating me-5 my-3">
                                    <input type="text" name="productSKU" value="<?= isset($productSKU)?$productSKU:set_value('productSKU'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk SKU">
                                    <label for="floatingInput">Produk SKU</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productName" value="<?= isset($productName)?$productName:set_value('productName'); ?>" class="form-control" id="floatingInput" placeholder="Input Nama Produk">
                                    <label for="floatingInput">Nama Produk</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating me-5 my-3">
                                    <input type="text" name="productFamily" value="<?= isset($productFamily)?$productFamily:set_value('productFamily'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Family">
                                    <label for="floatingInput">Produk Family</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating ms-5 my-3">
                                    <input type="text" name="productFactory" value="<?= isset($productFactory)?$productFactory:set_value('productFactory'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Factory">
                                    <label for="floatingInput">Produk Factory</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating me-5 my-3">
                                    <input type="text" name="productSize" value="<?= isset($productSize)?$productSize:set_value('productSize'); ?>" class="form-control" id="floatingInput" placeholder="Input Produk Size">
                                    <label for="floatingInput">Produk Size</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating ms-5 my-3">
                                    <select class="form-select" name="productSize" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <label for="floatingSelect">Size Produk</label>
                                </div>

                                <div class="form-floating ms-5 mb-3">
                                    <select class="form-select" name="productColor" id="floatingSelect" aria-label="Floating label select example">
                                    <?php
                                        use App\Models\PrintModel;
                                        $this->objPrint=new PrintModel;
                                        $dataWarna=$this->objPrint->getWarna();

                                        foreach ($dataWarna as $index => $listWarna)
                                        {
                                            if(isset($operatorId)&&$operatorId==$listWarna['id'])
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

                            <div class="col-6">
                                <div class="form-floating me-5 my-3">
                                    <input type="text" name="productBrand" value="<?= isset($productBrand)?$productBrand:set_value('productBrand'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Brand Produk</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-floating ms-5 my-3">
                                    <input type="number" name="productQty" value="<?= isset($productQty)?$productQty:set_value('productQty'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Qty Produk</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-floating my-3">
                                    <input type="text" name="productBrand" value="<?= isset($productBrand)?$productBrand:set_value('productBrand'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Status Produk</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-floating me-5 my-3">
                                    <input type="date" name="shipDate" value="<?= isset($shipDate)?$shipDate:set_value('shipDate'); ?>" class="form-control" id="floatingInput" placeholder="Input Brand Produk">
                                    <label for="floatingInput">Ship Date</label>
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