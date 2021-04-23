<?php

$maxcode = $data['max']['kodeTerbesar'];

$urutan = (int) substr($maxcode, 4, 3);

$urutan++;


$huruf = 'prdk';


$codeFix = $huruf . sprintf("%03s", $urutan);

?>
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs" width="100%">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Product Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Product Page
                    </li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <br>
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 mb-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm  mt-3  modalAdd" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus"></i> Add Product
                </button>
                <a href="<?= BASEURL ?>/pdf/product" class="btn btn-info btn-sm mt-3 " target="_blank">Print</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table id="tb-respon" class="table table-striped table-bordered table-sm" style="width:100%;">
                <thead class=" thead-dark">
                    <tr align="center">
                        <th>No.</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr align="center">
                        <th>No.</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>#</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach ($data['pr'] as $pr) : ?>
                        <tr align="center">
                            <td><?= $no++; ?>
                            </td>
                            <td><?= $pr['code']; ?>
                            </td>
                            <td><?= $pr['name']; ?>
                            </td>
                            <td><?= $pr['category']; ?>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="<?= $pr['info']; ?>">
                                    <?= $pr['type']; ?>
                                </a>
                            </td>
                            <td><?= $pr['unit']; ?>
                            </td>
                            <td><?= $pr['price']; ?>
                            </td>
                            <td><?= $pr['stock']; ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#formModal" class="badge  badge-primary modalEdit" data-id="<?= $pr['code']; ?>"><i class="far fa-edit"></i> Edit</a>
                                <a href="<?= BASEURL; ?>/home_a/hapus/<?= $pr['code']; ?>" onclick="return confirm('Yakin ingin hapus')" class="badge badge-danger "><span class="fas fa-trash-alt"></span> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <br>


        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModal">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/home_a/tambah" method="post" enctype="multipart/form-data">
                            <input type="text" value="<?= $codeFix; ?>" name="hide" id="hide" hidden>
                            <input type="text" name="img-hide" id="img-hide" hidden>
                            <!-- <input type="text" value="<?= $pr['image']; ?>"
                            name="img-hide" id="img-hide"> -->
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3">
                                    <div class="form-group">
                                        <label for="code">Code Product</label>
                                        <input type="text" class="form-control form-control-sm" name="code" id="code" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name Product</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control form-control-sm" id="category" name="category">
                                            <option value="Flu & Batuk">Flu & Batuk</option>
                                            <option value="Saluran Pencernaan">Saluran pencenaan</option>
                                            <option value="Vitamin & Suplemen">Vitamin & Suplemen</option>
                                            <option value="Demam">Demam</option>
                                            <option value="Herbal">Herbal</option>
                                            <option value="Mata">Mata</option>
                                            <option value="Kepala">Kepala</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group tes">
                                        <label for="type">Type</label>
                                        <select class="form-control form-control-sm" name="type" id="type" autocomplete="off">
                                            <option id="biru" value="Biru">Biru</option>
                                            <option id="hijau" value="Hijau">Hijau</option>
                                            <option id="merah" value="Merah">Merah</option>
                                            <option id="ungu" value="Ungu">Ungu</option>
                                            <option id="hitam" value="Hitam">Hitam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <select class="form-control form-control-sm" name="unit" id="unit" autocomplete="off">
                                            <option id="btol" value="Botol">Botol</option>
                                            <option id="tablet" value="Tablet">Tablet</option>
                                            <option id="sachet" value="Sachet">Sachet</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control form-control-sm" name="price" id="price" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ket">Information</label>
                                        <input type="text" name="info" id="info" class="form-control form-control-sm" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file" id="img" name="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <br>
</main>