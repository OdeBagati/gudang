<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-5">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form</li>
        </ol>
    </nav>

    <div class="row mt-5">

        <div class="col-lg-6 col-md-12 px-5 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="span-title"><span>Form</span></h4>
                    </div>

                    <div class="container">

                        <form method="post">

                        <?= csrf_field(); ?>
                        
                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($productionId)?$productionId:set_value('productionId'); ?>" name="productionId" class="form-control" id="floatingInput" placeholder="Input ID Number here">
                            <label for="floatingInput">ID Production</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" value="<?= isset($productionCode)?$productionCode:set_value('productionCode'); ?>" id="idproduksi" onchange="preview()" name="productionCode" class="form-control" id="floatingInput" placeholder="Input ID Number here">
                            <label for="floatingInput">Production Code</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="productionProcess" id="floatingSelect" aria-label="Floating label select example">
                                <option value="Cutting">Cutting</option>
                                <option value="Finishiing">Finishiing</option>
                                <option value="Folding">Folding</option>
                                <option value="Ironing">Ironing</option>
                                <option value="Packaging">Packaging</option>
                                <option value="QC">QC</option>
                                <option value="Sew-Back">Sew-Back</option>
                                <option value="Sew-Bottom">Sew-Bottom</option>
                                <option value="Sew-Collar">Sew-Collar</option>
                                <option value="Sew-Front">Sew-Front</option>
                                <option value="Sew-Frontstrap">Sew-Frontstrap</option>
                                <option value="Sewing">Sewing</option>
                                <option value="Sew-Sleeve">Sew-Sleeve</option>
                                <option value="Sew-Special">Sew-Special</option>
                            </select>
                            <label for="floatingSelect">Process</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="productionStatus" id="floatingSelect" aria-label="Floating label select example">
                                <option value="Done">Done</option>
                                <option value="InProgress">InProgress</option>
                                <option value="Repair">Folding</option>
                                <option value="Transfer">Ironing</option>
                            </select>
                            <label for="floatingSelect">Status</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="productionOperator" id="floatingSelect" aria-label="Floating label select example">
                            <?php
                                use App\Models\OperatorModel;
                                $this->objOperator=new OperatorModel;
                                $dataOp=$this->objOperator->getOperator();

                                foreach ($dataOp as $index => $listOp)
                                {
                                    if(isset($operatorId)&&$operatorId==$listOp['operatorId'])
                                    {
                                        echo '<option value="'.$listOp['operatorId'].'" selected>'.$listOp['operatorCode'].' - '.$listOp['operatorName'].'</option>';
                                    }
                                    else
                                    {
                                        echo '<option value="'.$listOp['operatorId'].'">'.$listOp['operatorCode'].' - '.$listOp['operatorName'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                            <label for="floatingSelect">Operator</label>
                        </div>

                        <div class="row">
                            <div class="col-12 align-items-center d-flex justify-content-center">
                                <button type="submit" formaction="<?= base_url(); ?>/save-barcode" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 px-5 mb-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="span-title"><span>Preview</span></h4>
                    </div>

                    <div class="row m-3">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Nama Produk</b></td>
                                    <td id='productName'></td>
                                </tr>
                                <tr>
                                    <td><b>Size</b></td>
                                    <td id='productSize'></td>
                                </tr>
                                <tr>
                                    <td><b>Warna</b></td>
                                    <td id='printName'></td>
                                </tr>
                                <tr>
                                    <td><b>Client</b></td>
                                    <td>Testing 123</td>
                                </tr>
                                <tr>
                                    <td><b>Waktu</b></td>
                                    <td id='time'></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    function preview(){
        var id = $('#idproduksi').val();
        // console.log(id);
        $.ajax({
            type:"post",
            url: "http://localhost:8080/preview",
            data: {
                'productionCode' : id
            },
            //dataType: "json",
            success: function(response){
                var response = $.parseJSON(response)
                // console.log(response);
                $('#productName').html(response.productName)
                $('#productSize').html(response.productSize)
                $('#printName').html(response.printName)
                $('#time').html(new Date().getHours()+"."+new Date().getMinutes())
            },
            error: function(response){
                console.log(response);
            },
        });
    };
</script>