<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-5">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Print Form</li>
        </ol>
    </nav>

    <div class="row mt-5">

        <div class="col-lg-10 offset-lg-1 col-md-12 px-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="span-title"><span>Print Form</span></h4>
                    </div>

                    <div class="container">

                        <form action="<?= base_url(); ?>/save-warna" method="post">

                        <?= csrf_field(); ?>
                        
                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($id)?$id:set_value('id'); ?>" name="id" class="form-control" id="floatingInput" placeholder="Input ID Print here" hidden>
                            <label for="floatingInput">ID Warna</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($printName)?$printName:set_value('printName'); ?>" name="printName" class="form-control" id="floatingInput" placeholder="Input Print Name here">
                            <label for="floatingInput">Nama Warna</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($printPrefix)?$printPrefix:set_value('printPrefix'); ?>" name="printPrefix" class="form-control" id="floatingInput" placeholder="Input Prefix here">
                            <label for="floatingInput">Prefix</label>
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