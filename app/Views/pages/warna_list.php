<div class="cover align-items-center d-flex justify-content-center">
    <h1>PT. MORATOBALI JAYARAYA</h1>
</div>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <?= anchor('save-client','Add Data',array('class'=>'btn btn-info text-white')); ?>
        </div>

        <div class="card-body">

            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
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
                        foreach($dataWarna->getResult() as $listWarna)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $listWarna->printName; ?></td>
                                <td>
                                    <?= 
                                        anchor('save-warna'.'/'.$listClient->id,'Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "&nbsp;"; 
                                        echo anchor('delete-warna'.'/'.$listClient->id,'Delete',array('class'=>'btn btn-danger btn-sm'));
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