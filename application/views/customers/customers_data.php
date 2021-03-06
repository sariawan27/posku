    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customers
        <small>Customers Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('customers')?>"><i class="fa fa-group"></i>Customers</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Customers Data</h3>
            <div class="pull-right">
                <a href="<?= site_url('customers/add')?>" class="btn btn-warning btn-flat"> <i class="fa fa-plus"></i> Create</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->name?></td>
                        <td class="text-center"><?= $data->address?></td>
                        <td class="text-center">
                        <a href="<?= site_url('customers/edit/'.$data->id)?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>
