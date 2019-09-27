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
            <div class="pull-right">
              <a href="<?= site_url('transaction/detail/')?>" class="btn btn-primary btn-flat"> <i class="fa fa-info"></i> Detail</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Customer Id</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row->result() as $x => $data) {?>
                    <tr>
                        <td class="text-center"><?= $data->id?></td>
                        <td class="text-center"><?= $data->customer_id?></td>
                        <td class="text-center"><?= $data->total?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>
