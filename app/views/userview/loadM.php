<div class="table-responsive">
    <table id="tb-respon" class="table table-striped table-bordered table-sm" style="width:100%;">
        <thead class="thead-dark" align="center">
            <th>#</th>
            <th>Id</th>
            <th>Username</th>
            <th>email</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>*</th>
        </thead>
        <tfoot align="center">
            <th>#</th>
            <th>Id</th>
            <th>Username</th>
            <th>email</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>*</th>
        </tfoot>
        <tbody align="center">
            <tr>
                <?php 
                $no = 1;
                foreach ($data['member'] as $user) : ?>
                <td><?=$no++;?></td>
                <td><?=$user['id'];?></td>
                <td><?=$user['username'];?></td>
                <td><?=$user['email'];?></td>
                <td><?=$user['name'];?></td>
                <td><?=$user['alamat'];?></td>
                <td><a href="#" class="badge badge-secondary badge-sm" data-toggle="modal" data-target="#modalMember" data-id="<?=$user['id'];?>" id="editm">Edit</a> <a href="#" class="badge badge-danger badge-sm" id="hapusm">Hapus</a></td>
                <?php endforeach;?>
            </tr>
        </tbody>
    </table>
    </div>
    <script>
        $(function(){
            $('#tb-respon').DataTable();
        })
    </script>