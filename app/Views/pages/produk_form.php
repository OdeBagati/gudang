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

        <div class="col-lg-10 offset-lg-1 col-md-12 px-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="span-title"><span>Produk Form</span></h4>
                    </div>

                    <div class="container">

                        <form action="<?= base_url(); ?>/save-produk" method="post">

                        <?= csrf_field(); ?>
                        
                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($idproduct)?$idproduct:set_value('idproduct'); ?>" name="idproduct" class="form-control" id="floatingInput" placeholder="Input ID Product here" hidden>
                            <label for="floatingInput">ID Produk</label>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" value="<?= isset($productName)?$productName:set_value('productName'); ?>" name="productName" class="form-control" id="floatingInput" placeholder="Input Product Name here">
                                    <label for="floatingInput">Nama Produk</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" value="<?= isset($prefix)?$prefix:set_value('prefix'); ?>" name="prefix" class="form-control" id="floatingInput" placeholder="Input Product Prefix here">
                                    <label for="floatingInput">Prefix</label>
                                </div>
                            </div>
                        </div>

                        <div class="justify-content-center">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save Data">
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>