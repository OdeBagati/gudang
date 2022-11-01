<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <?= anchor('save-barcode','Add Data',array('class'=>'btn btn-info text-white')); ?>
        </div>

        <div class="card-body">

            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Pabrikan</th>
                        <th>Size</th>
                        <th>Warna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($dataProduk->getResult() as $listProduk)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $listProduk->productName; ?></td>
                                <td><?= $listProduk->productFactory; ?></td>
                                <td><?= $listProduk->productSize; ?></td>
                                <td><?= $listProduk->productColor; ?></td>
                                <td>
                                    <?= 
                                        anchor('save-produk'.'/'.$listProduk->productId,'Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "&nbsp;"; 
                                        echo anchor('delete-produk'.'/'.$listProduk->productId,'Delete',array('class'=>'btn btn-danger btn-sm'));
                                    ?>
                                </td>
                            </tr>
                        <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

</div>