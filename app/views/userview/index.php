<!-- idotomatis -->
<?php

$idOto = $data['idOto']['idmax'];

$urutan = (int) substr($idOto, 3, 4);

$urutan++;

$huruf = 'usr';



$idFix = $huruf . sprintf("%04s", $urutan);
?>


<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs" width="100%">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Product Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>User Page <?= $idFix; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php
                Flasher::flashAdmin();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 mb-3">
                <!-- Button trigger modal -->
                <button type="button" id="btn-add-admin" class="btn btn-primary btn-sm  mt-3 fas fa-plus modalAddAdmin" data-toggle="modal" data-target="#modalAdmin">
                    Add Admin
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tb-respon" class="table table-striped table-bordered table-sm" style="width:100%;">
                <thead class="thead-dark">
                    <tr align="center">
                        <th>#</th>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr align="center">
                        <th>#</th>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>*</th>
                    </tr>
                </tfoot>
                <?php
                $no = 1;
                ?>
                <tbody>
                    <?php foreach ($data['admin'] as $user) : ?>
                        <tr align="center">
                            <td><?= $no++; ?></td>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['alamat']; ?></td>
                            <td><a href="#" class="badge badge-secondary badge-sm modalEditAdmin" data-toggle="modal" data-target="#modalAdmin" data-id="<?= $user['id']; ?>" id="editAdmin">Edit</a> <a href="<?= BASEURL; ?>/user/deleteAdmin/<?= $user['id']; ?>" class="badge badge-danger badge-sm" id="hapusAd">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>

    <!-- Modal -->
    <div class="modal fade" id="modalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 23em;">
            <div class="modal-content bg-secondary text-light">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalTitleAdmin">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= BASEURL; ?>/user/addAdmin" class="form-ad" id="form-admin" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="form-group mb-1">
                                    <label for="id">Id</label>
                                    <!-- <input type="text" name="img-lama" id="img-lama"
                                        class="form-control form-control-sm" readonly> -->
                                    <input type="text" name="id" id="id" class="form-control form-control-sm" value="<?= $idFix; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 offset-2">
                                <hr style="background-color: white;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <div class="form-group mb-2">
                                    <label for="pass">Password</label>
                                    <input type="text" class="form-control form-contro-sm" id="pass" name="pass">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="img">Image</label>
                                    <input type="file" name="img" id="img" class="form-control-file form-control-sm">
                                    <input type="text" name="img-hide" id="img-hide" class="form-control-file form-control-sm" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div><input type="text" name="idhide" id="idhide" hidden value="<?= $idFix; ?>">
</main>