<?php

$idmax = $data['idOto']['idmax'];

$urutan = (int) substr($idmax, 4, 3);

$urutan++;

$char = 'Supp';

$idfix = $char.sprintf("%03s", $urutan);



?>

<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Supplier Data Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Supplier Data <?=$idfix;?> <?=$idmax;?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php Flasher::flash();?>
                </div>
            </div>
            <div class="row">
                <!-- table data supplier -->
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="tb-respon">
                                    <thead align="center">
                                        <tr>
                                            <th>#</th>
                                            <th>Name Store</th>
                                            <th>Address</th>
                                            <th>Email/Mobile</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php
                                        $no = 1;
                                        foreach ($data['supp'] as $supp):
                                        ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$supp['supp_name']?></td>
                                            <td><?=$supp['supp_addr']?></td>
                                            <td><?=$supp['supp_contact'];?></td>
                                            <td><a href="#" class="badge badge-success edit-supp-data"
                                                    data-id="<?=$supp['id'];?>" data-toggle="modal"
                                                    data-target="#modal-supp-data">edit</a> <a
                                                    href="<?=BASEURL;?>/supp_data/del/<?=$supp['id'];?>"
                                                    class="badge badge-danger"
                                                    onclick="return confirm('Yakin ingin hapus?')">delete</a></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end table data supplier -->

                <!-- form add data supllier -->
                <div class="col-sm-4" id="data-supp">
                    <div class="card bg-light shadow rounded">
                        <div class="card-body">
                            <div class="row mb-n2">
                                <div class="col-sm-8 offset-2">
                                    <center>
                                        <h7 class=" title">ADD DATA SUPPLIER</h7>
                                    </center>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-8 offset-2">
                                    <hr style="border-top: 1px solid black;">
                                </div>
                            </div>
                            <form action="<?=BASEURL;?>/supp_data/add" method="POST">
                                <input type="text" value="<?=$idfix;?>" name="id-hidden" id="id-hidden" hidden>
                                <div class="form-group row mb-2">
                                    <label for="name-supp" class="col-sm-4 col-form-label-sm">Name Store</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form form-control-sm " name="name-supp"
                                            id="name-supp" placeholder="Input Name Store Supplier">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="addr-supp" class="col-sm-4 col-form-label-sm">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form form-control-sm" name="addr-supp"
                                            id="addr-supp" placeholder="Input Address Store Supplier">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="email-supp" class="col-sm-4 col-form-label-sm">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form form-control-sm" name="email-supp"
                                            id="email-supp" placeholder="Input Email Store Supplier">
                                    </div>
                                </div>
                                <hr style="border-top: 0.1rem solid #404040">
                                <div class="form-group float-right mr-1 mb-0">
                                    <button class="btn btn-sm btn-info">Reset</button>
                                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end form add data supllier -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-supp-data">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal-supp-data" tabindex="-1" aria-labelledby="modal-supp-data-title" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-light shadow rounded">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <center>
                    <h5 class="modal-title" id="modal-supp-data-title">Edit Data</h5>
                </center>
                <form action="<?=BASEURL;?>/supp_data/editsave" method="POST">
                    <input type="text" name="modal-supp-data-id" id="modal-supp-data-id" hidden>
                    <div class="form-group mt-3">
                        <label for="modal-supp-data-name">Name Store</label>
                        <input type="text" class="form-control form-control-sm" name="modal-supp-data-name"
                            id="modal-supp-data-name">
                    </div>
                    <div class="form-group">
                        <label for="modal-supp-data-addr">Address</label>
                        <input type="text" class="form-control form-control-sm" name="modal-supp-data-addr"
                            id="modal-supp-data-addr">
                    </div>
                    <div class="form-group">
                        <label for="modal-supp-data-email">Email</label>
                        <input type="text" class="form-control form-control-sm" name="modal-supp-data-email"
                            id="modal-supp-data-email">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>