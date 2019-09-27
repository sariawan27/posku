    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaction
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('customers')?>"><i class="fa fa-group"></i>Transaction</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Detail Transaction</h3>
            <div class="pull-right">
                <a href="<?= site_url('transaction/add')?>" class="btn btn-warning btn-flat"> <i class="fa fa-plus"></i> Create</a>
                <a href="<?= site_url('transaction')?>" class="btn btn-default btn-flat"> <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Product Id</th>
                        <th class="text-center">Transaction Id</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->qty?></td>
                        <td class="text-center"><?= $data->price?></td>
                        <td class="text-center"><?= $data->subtotal?></td>
                        <td class="text-center"><?= $data->product_id?></td>
                        <td class="text-center"><?= $data->sale_id?></td>
                        <td class="text-center">
                        <a href="<?= site_url('transaction/edit/'.$data->id)?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                        <a href="<?= site_url('transaction/delete/'.$data->id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure for delete this customer ?')"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>