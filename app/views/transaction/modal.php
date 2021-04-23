<div class="modal fade" id="code-product" tabindex="-1" aria-labelledby="code-productLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="code-productLabel">Search Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm" style="width:100%;">
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

                                <?php $no = 1;?>
                                <?php foreach ($data['product'] as $pr) : ?>
                                <tr align="center">
                                    <td><?=$no++;?>
                                    </td>
                                    <td><?=$pr['code'];?>
                                    </td>
                                    <td><?=$pr['name'];?>
                                    </td>
                                    <td><?=$pr['category'];?>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-toggle="tooltip" data-placement="top"
                                            title="<?=$pr['info'];?>">
                                            <?=$pr['type'];?>
                                        </a>
                                    </td>
                                    <td><?=$pr['unit'];?>
                                    </td>
                                    <td><?=$pr['price'];?>
                                    </td>
                                    <td><?=$pr['stock'];?>
                                    </td>
                                    <td>
                                        <a href="#" class="badge badge-primary select-code" data-dismiss="modal"
                                            data-id="<?=$pr['code']?>-<?=$pr['stock'];?>">Select</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?=BASEURL;?>/bootstrap/js/jquery-3.5.1.js"></script>
<script src="<?=BASEURL?>/costum/js/jsload.js"></script>