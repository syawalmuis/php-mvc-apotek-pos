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
                    <td><?=$no++;?></td>
                    <td><?=$user['id'];?></td>
                    <td><?=$user['username'];?></td>
                    <td><?=$user['email'];?></td>
                    <td><?=$user['name'];?></td>
                    <td><?=$user['alamat'];?></td>
                    <td><a href="#" class="badge badge-secondary badge-sm modalEditAdmin" data-toggle="modal" data-target="#modalAdmin" data-id="<?=$user['id'];?>" id="editAdmin">Edit</a> <a href="#" class="badge badge-danger badge-sm" id="hapusAd">Hapus</a></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script>
    $(function(){
        $('#tb-respon').DataTable();
    })
</script>