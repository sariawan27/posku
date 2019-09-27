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
            <h3 class="box-title"><?= ucfirst($page)?> Customers</h3>
            <div class="pull-right">
                <a href="<?= site_url('customers')?>" class="btn btn-warning btn-flat"> <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('customers/process')?>" method="post">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="hidden" name="id" value="<?= $row->id?>">
                            <input type="text" class="form-control" name="name" value="<?= $row->name?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <textarea class="form-control" name="address" required> <?= $row->address?> </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page?>" class="btn btn-warning"> <i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reser" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>