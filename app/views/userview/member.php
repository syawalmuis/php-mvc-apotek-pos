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
                    <li>User Page</li>
                    <li>Member</li>
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
                <!-- <h3 style="transform:rotateX(180deg)">TES</h3> -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 mb-3 ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm  mt-3 fas fa-plus add-member" id="add-member" data-toggle="modal" data-target="#modalMember">
                    Add Member
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tb-respon" class="table table-striped table-bordered table-sm" style="width:100%;">
                <thead class="thead-dark" align="center">
                    <th>#</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>*</th>
                </thead>
                <tfoot align="center">
                    <th>#</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>*</th>
                </tfoot>
                <?php $no = 1; ?>
                <tbody align="center">
                    <?php
                    foreach ($data['member'] as $user) : ?>
                        <tr>
                            <td><?= $no++; ?>
                            </td>
                            <td><?= $user['id']; ?>
                            </td>
                            <td><?= $user['username']; ?>
                            </td>
                            <td><?= $user['email']; ?>
                            </td>
                            <td><?= $user['name']; ?>
                            </td>
                            <td><?= $user['alamat']; ?>
                            </td>
                            <?php
                            $url = base64_encode(md5($user['id']));
                            $decode = base64_decode(md5($url));

                            ?>
                            <form action="<?= BASEURL; ?>/pdf/cardget/" method="POST">
                                <td>
                                    <input type="text" name="id-print" value="<?= $user['id'] ?>" hidden>
                                    <button type="submit" class="btn btn-info btn-sm" formtarget="_blank">Cetak</button>
                                    <!-- <a href="<?= BASEURL; ?>/pdf/cardget/<?= $url; ?>/<?= $decode ?>"
                                class="btn btn-info btn-sm" data-id="<?= $user['id']; ?>"
                                id="print-member-58">Print</a> -->
                                    <a href="#" class="btn btn-secondary btn-sm edit-member" data-toggle="modal" data-target="#modalMember" data-id="<?= $user['id']; ?>" id="edit-member">Edit</a> <a href="<?= BASEURL; ?>/user/deleteMember/<?= $user['id']; ?>" class="btn btn-danger btn-sm" id="hapusMember" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="modalMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 23em;">
            <div class="modal-content bg-secondary text-light">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalTitle">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form-member" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="form-group mb-1">
                                    <!-- <input type="text" name="img-lama" id="img-lama"
                                        class="form-control form-control-sm" readonly> -->

                                    <label for="id">Id</label>
                                    <input type="text" name="id" id="id" class="form-control form-control-sm" readonly>
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
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control form-control-sm">
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
                                <label for="pass">Password</label>
                                <input type="password" class="form-control form-control-sm" name="pass" id="pass">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="img">Image</label>
                                <input type="file" name="img" id="img" class="form-control-file form-control-sm">
                            </div>
                        </div>
                        <input type="text" name="img-hide" id="img-hide" class="form-control form-control-sm" hidden>
                        <input type="text" value="<?= $idFix; ?>" id="hide-id" name="hide-id" hidden>
                        <input type="text" name="usr-hide" id="usr-hide" hidden>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>