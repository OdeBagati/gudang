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
                        <th>Proses</th>
                        <th>Status</th>
                        <th>Operator</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($dataProduksi->getResult() as $listProduksi)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $listProduksi->productionProcess; ?></td>
                                <td><?= $listProduksi->productionStatus; ?></td>
                                <td><?= $listProduksi->productionOperator; ?></td>
                                <td><?= $listProduksi->productionDate; ?></td>
                                <td>
                                    <?= 
                                        anchor('save-barcode'.'/'.$listProduksi->productionId,'Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "&nbsp;"; 
                                        echo anchor('delete-barcide'.'/'.$listProduksi->productionId,'Delete',array('class'=>'btn btn-danger btn-sm'));
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