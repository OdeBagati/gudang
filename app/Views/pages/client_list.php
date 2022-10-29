<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <?= anchor('save-client','Add Data',array('class'=>'btn btn-info text-white')); ?>
        </div>

        <div class="card-body">

            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Client</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach($dataClient->getResult() as $listClient)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $listClient->namaClient; ?></td>
                                <td>
                                    <?= 
                                        anchor('save-client'.'/'.$listClient->idClient,'Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "&nbsp;"; 
                                        echo anchor('delete-client'.'/'.$listClient->idClient,'Delete',array('class'=>'btn btn-danger btn-sm'));
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