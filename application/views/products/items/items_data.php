    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Items
        <small>Items Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('items')?>"><i class="fa fa-group"></i>Items</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('messages')?>
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Items Product</h3>
            <div class="pull-right">
                <a href="<?= site_url('items/add')?>" class="btn btn-warning btn-flat"> <i class="fa fa-plus"></i> Create</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Category Id</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->name?></td>
                        <td class="text-center"><?= $data->price?></td>
                        <td class="text-center"><?= $data->category_id?></td>
                        <td class="text-center">
                        <a href="<?= site_url('items/edit/'.$data->id)?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?= site_url('items/delete/'.$data->id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure for delete this item ?')"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>