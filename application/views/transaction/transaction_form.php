    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        transaction
        <small>transaction Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('transaction')?>"><i class="fa fa-group"></i>transaction</a></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> transaction</h3>
            <div class="pull-right">
                <a href="<?= site_url('transaction')?>" class="btn btn-warning btn-flat"> <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('transaction/process')?>" method="post">
                        <div class="form-group">
                            <label for="qty">Qty *</label>
                            <input type="hidden" name="id" value="<?= $row->id?>">
                            <input type="number" class="form-control" name="qty" id="qty" value="<?= $y = $row->qty?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" class="form-control" name="price" id="price" value="<?= $x = $row->price?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subtotal">Sub Total *</label> <small>(Akan terisi otomatis ketika disave)</small>
                            <input type="number" class="form-control" name="subtotal" id="subtotal" value="<?= $row->subtotal?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="product">Product Id</label>
                            <select name="product" id="product" class="form-control">
                                <option value="">--Pilih--</option>
                                <?php foreach ($product->result() as $key => $data) { ?>
                                <option value="<?= $data->id?>"><?= $data->id?> -- <?= $data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transaction_id">Transaction Id</label>
                            <select name="transaction_id" id="transaction_id" class="form-control">
                                <option value="">--Pilih--</option>
                                <?php foreach ($transaction_id->result() as $key => $data) { ?>
                                <option value="<?= $data->id?>"><?= $data->id?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page?>" class="btn btn-warning"> <i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>