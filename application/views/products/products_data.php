    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Category Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('products')?>"><i class="fa fa-group"></i>Products</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <h3 class="box-title">Category Product</h3>
        <?php foreach($row->result() as $x => $data) {?>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"></span>

                <div class="info-box-content">
                <span class="info-box-text text-center"><?= $data->name?></span>
                <span class="info-box-number text-center">90<small>%</small></span>
                <a href="<?= site_url('products')?>"> <p class="text-center"> (View) </p></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
        <?php } ?>

    </section>