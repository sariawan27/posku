    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Users Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('users')?>"><i class="fa fa-user"></i>Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Users Data</h3>
            <div class="pull-right">
                <a href="<?= site_url('users/add')?>" class="btn btn-warning btn-flat"> <i class="fa fa-user-plus"></i> Create</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->name?></td>
                        <td class="text-center"><?= $data->email?></td>
                        <td class="text-center"><?= $data->password?></td>
                        <td class="text-center"><?php if($data->level==1) {
                            echo "Admin";
                        } elseif ($data->level==2) {
                            echo "Kasir";
                        }?></td>
                        <td class="text-center">
                            <form action="<?= site_url('users/delete/')?>" method="post">
                                <a href="<?= site_url('users/edit/'.$data->id)?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                                    <input type="hidden" name="id" value="<?= $data->id?>">
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure for delete this user ?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>