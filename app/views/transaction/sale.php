<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Page Poin of Sale</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <section class="content">
        <div class="container-sm">
            <form>
                <!-- <div class="form-group d-flex justify-content-between mb-n3"> -->
                <h1 class="mb-n3">Store
                    <small>Transaction</small>
                </h1>
            </form>
            <div class="row">
                <div class="col-sm-6 mt-5">
                    <?php Flasher::flash(); ?>
                </div>
            </div>
            <hr>
            <h3>

            </h3>

            <br>
            <div class="row mb-2">
                <div class="col-sm-2 offset-8 mb-2 ">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <input style="text-align:center;" type="text" id="date" name="date" class="form-control date-i form-control-sm" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 mb-2 ">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <input style="text-align:center;" type="text" class="form-control  form-control-sm" value="Kasir : <?= $_SESSION['name']; ?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div id="scan-produk" class="mb-3"></div>
            <div class="row mb-4 mouse-move">
                <div class="col-sm-6 mb-2">
                    <div class="card shadow bg-light rounded">
                        <div class="card-body">
                            <form action="" id="form-add-tr">
                                <div class="form-group row mb-1">
                                    <label for="code" class="col-sm-4 col-form-label">Code </label>
                                    <input type="text" name="cek" id="cek" hidden>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Code" name="code" id="code" readonly>
                                            <div class="input-group-append input-group-sm">
                                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" data-toggle="modal" data-target="#code-product">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <label for="qty" class="col-sm-4 col-form-label">Qty</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control form-control-sm" id="qty-check" name="qty-check" hidden>
                                        <input type="number" class="form-control form-control-sm" id="qty" name="qty" value="0">
                                        <p class="text-danger" id="qty-error"></p>
                                        <input type="text" id="inv_1" name="inv_1" hidden>
                                    </div>
                                </div>
                                <div class=" form-group row mb-1">
                                    <div class="col-sm-4 offset-4">
                                        <button type="button" class="btn btn-primary btn-sm btn-add-tr mb-1"><i class="fas fa-shopping-cart"></i>
                                            Add</button>
                                        <button type="button" class="btn btn-primary btn-sm mb-1" id="btn-scan-pr"><i class="fas fa-shopping-cart"></i>
                                            Scan</button>
                                    </div>
                                    <div class="col-sm-4 offset-4">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- load ttl1 -->
                <div class="col-sm-6 mb-2" id="ttl1">
                </div>
                <!-- end load ttl1 -->
            </div>
            <!-- load table -->
            <div id="load-table" class="load-table"></div>
            <!-- end load table -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="card shadow bg-light rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Member?</p>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-addon btn-sm btn-info mb-1 scan-member" id="scan-member" name="scan-member">Scan</button>
                                    <button class="btn btn-addon btn-sm btn-dark mb-1 customer" id="customer" name="customer">No</button>
                                </div>
                            </div>
                            <!-- <div class="form-group row mb-1">
                                <label for="date" class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                    <a id="date" name="date"></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- load ttl2 -->
                <div class="col-sm-3 ttl2">
                </div>
                <!-- end load ttl2 -->
                <div class="col-sm-3">
                    <div class="card shadow rounded bg-light">
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="cash">Cash</label>
                                    <input type="text" class="form-control form-control-sm cash" name="cash" id="cash">
                                </div>
                                <div class="form-group">
                                    <label for="change">Change</label>
                                    <input type="text" class="form-control form-control-sm" name="change-i" id="change-i" hidden>
                                    <p><b><span>Rp. </span><span id="change"></span></b></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-5 mt-5">

                    <!-- <form action="<?= BASEURL ?>/sale/proses"
                    method="POST">
                    -->
                    <form name="form-proses" id="form-proses" action="<?= BASEURL ?>/sale/print" method="POST" class="mb-1">
                        <input type="text" name="invoice" id="invoice" hidden>
                        <input type="text" name="dsc-fix" id="dsc-fix" hidden>
                        <input type="text" name="cash-fix" id="cash-fix" hidden>
                        <input type="text" name="csm-fix" id="csm-fix" hidden>
                        <input type="text" name="ttl-fix" id="ttl-fix" hidden>
                        <!-- <button type="submit" class="btn btn-primary btn-sm re-load" onclick="load('<?= BASEURL ?>/sale')"
                        formtarget="_blank">Proses</button> -->
                        <button type="button" class="btn btn-sm btn-primary btn-proses shadow rounded">Proses</button>
                        <!-- <button type="button" class="btn btn-sm btn-primary btn-success" >Print</button> -->
                        <!-- <a href="<?= BASEURL ?>/" class="btn
                        btn-sm
                        btn-success"></a> -->
                        <button type="submit" class="btn btn-sm btn-success print-inv shadow rounded" formtarget="_blank" hidden>Print</button>
                    </form>
                    <a href="<?= BASEURL ?>/Sale/delAll" class="btn btn-sm btn-danger shadow rounded">Cancel</a>
                </div>
            </div>
        </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- Modal -->
<p>

</p>
<div class="modal-load" id="modal-load">

</div>