<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2 id="card-supp">Stock In Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Stock In</li>
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
                <div class="col-sm-4">
                    <div class="card shadow rounded bg-light">
                        <div class="card-body">
                            <form action="<?=BASEURL;?>/suplai/updateStock" method="post">
                                <h5 align="center" class="title mb-n1">Add Stock In</h5>
                                <hr class="mb-3">
                                <div class="form-group">
                                    <label for="supp-name">Supplier Store</label>
                                    <select name="supp-name" id="supp-name" style="text-align-last: center;"
                                        class="form-control form-control-sm supp-name" required>
                                        <option value="">---- Choose ----</option>
                                        <?php foreach ($data['supp-data'] as $supp_data) :?>
                                        <option value="<?=$supp_data['supp_name'];?>"><?=$supp_data['supp_name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="code-product">code Product</label>
                                            <select name="code-product" id="code-product"
                                                class="form-control form-control-sm code-product"
                                                style="text-align-last: center;" required>
                                                <option value="">---- Choose ----</option>
                                                <?php foreach ($data['code'] as $code) :?>
                                                <option value="<?=$code['code'];?>"><?=$code['code'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name-product">Name Product</label>
                                            <input style="text-align: center;" type="text"
                                                class="form-control form-control-sm" id="name-product"
                                                name="name-product" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control form-control-sm" id="stock"
                                                name="stock" required value="0" style="text-align: center;">
                                            <p id="err-stock" class="text-danger small mt-2 ml-2 err">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="date-supp">Date</label>
                                            <input type="date" class="form-control form-control-sm" id="date-supp"
                                                name="date-supp" required style="text-align: center;"
                                                value="<?=date("Y-m-d")?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="addr-supp">Address</label>
                                            <input type="text" class="form-control form-control-sm" id="addr-supp"
                                                name="addr-supp" style="text-align: center;" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="note-supp">Note</label>
                                            <input type="text" class="form-control form-control-sm" id="note-supp"
                                                name="note-supp" style="text-align: center;">
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="stock-awal"
                                    name="stock-awal" hidden>
                                <hr>
                                <div class="form-group float-right mr-1">
                                    <button class="btn btn-sm btn-info reset-supp" type="button">Reset</button>
                                    <button class="btn btn-sm btn-primary" id="save-supp" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card shadow rounded bg-light">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-respon" class="table table-striped table-bordered">
                                    <thead align="center" class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>*</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php
                                    $no = 1;
                                    foreach ($data['supp'] as $supp) : ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$supp['supp_name'];?></td>
                                            <td><?=$supp['supp_addr'];?></td>
                                            <td><a href="#" class="badge badge-info detail-supp"
                                                    data-id="<?=$supp['id_supp'];?>" data-toggle="modal"
                                                    data-target="#detail-modal">detail</a> <a href="#card-supp"
                                                    class="badge badge-success edit-supp" id="<?=$supp['code'];?>"
                                                    data-id="<?=$supp['id_supp'];?>" data-toggle="modal"
                                                    data-target="#detail-modal">Edit</a> <a href=" <?=BASEURL;?>/suplai/del/<?=$supp['id_supp']
                                                    ;?>" class="badge badge-danger" data-id="">delete</a></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade " id="detail-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=BASEURL;?>/suplai/editSupp" method="POST">
                        <div class="row">
                            <div class="col-sm-8 offset-2">
                                <input type="text" id="modal-id-supp" name="modal-id-supp" hidden>
                                <input type="number" id="modal-product-stock" name="modal-product-stock" hidden>
                                <input type="text" id="code_1" name="code_1" hidden>
                                <input type="text" id="stock-end" name="stock-end" hidden>
                                <div class="form-group">
                                    <label for="modal-supp-name">Store Name</label>
                                    <input type="text" class="form-control form-control-sm" id="modal-supp-name"
                                        name="modal-supp-name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code-product">code Product</label>
                                    <select name="modal-product-code" id="modal-product-code"
                                        class="form-control form-control-sm modal-product-code">
                                        <option value=""> ---- Choose ----</option>
                                        <?php foreach ($data['code'] as $code) :?>
                                        <option value="<?=$code['code'];?>"><?=$code['code'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal-product-name">Name Product</label>
                                    <input type="text" class="form-control form-control-sm" id="modal-product-name"
                                        name="modal-product-name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal-supp-stock">Stock In</label>
                                    <input type="text" class="form-control form-control-sm stock-in" id="modal-stock-in"
                                        name="modal-stock-in" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal-supp-date">Date</label>
                                    <input type="date" class="form-control form-control-sm" id="modal-supp-date"
                                        name="modal-supp-date" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal-supp-addr">Address</label>
                                    <input type="text" class="form-control form-control-sm" id="modal-supp-addr"
                                        name="modal-supp-addr" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal-supp-note">Note</label>
                                    <input type="text" class="form-control form-control-sm" id="modal-supp-note"
                                        name="modal-supp-note" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <input type="text" class=" form-control form-control-sm" id="stock-first"
                                        name="stock-first" hidden>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <input type="text" class=" form-control form-control-sm" id="stock-first-supp"
                                        name="stock-first-supp" hidden>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-save-supp">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</main><!-- End #main -->