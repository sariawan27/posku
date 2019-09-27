    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaction
        <small>Transaction Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('customers')?>"><i class="fa fa-group"></i>Transaction</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Transaction Data</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Customer Id</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->customer_id?></td>
                        <td class="text-center"><?= $data->total?></td>
                        <td class="text-center">
                        <a href="<?= site_url('transaction/detail/'.$data->id)?>" class="btn btn-primary btn-xs"> <i class="fa fa-info"></i> Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>