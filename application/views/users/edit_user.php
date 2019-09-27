    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Edit User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('users')?>"><i class="fa fa-user"></i>Users</a></li>
        <li class="active">Edit</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?= site_url('users')?>" class="btn btn-warning btn-flat"> <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?= form_error('name') ? "has-error" : null ?>">
                            <label for="name">Name *</label>
                            <input type="hidden" name="id" value="<?= $row->id?>">
                            <input type="text" class="form-control" name="name" value="<?= $this->input->post('name') ?? $row->name ?>">
                            <?= form_error('name')?>
                        </div>
                        <div class="form-group <?= form_error('email') ? "has-error" : null ?>">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email" value="<?= $this->input->post('email') ?? $row->email ?>">
                            <?= form_error('email')?>
                        </div>
                        <div class="form-group <?= form_error('password') ? "has-error" : null ?>">
                            <label for="password">Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" class="form-control" name="password" value="<?= $this->input->post('password')?>">
                            <?= form_error('password')?>
                        </div>
                        <div class="form-group <?= form_error('passwordconf') ? "has-error" : null ?>">
                            <label for="passwordconf">Password Confirmation</label>
                            <input type="password" class="form-control" name="passwordconf" value="<?= $this->input->post('passwordconf')?>">
                            <?= form_error('passwordconf')?>
                        </div>
                        <div class="form-group <?= form_error('level') ? "has-error" : null ?>">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? "selected" : null ?>>Kasir</option>
                            </select>
                            <?= form_error('level')?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning"> <i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reser" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>