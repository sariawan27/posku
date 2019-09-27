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
      <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> Items</h3>
            <div class="pull-right">
                <a href="<?= site_url('items')?>" class="btn btn-warning btn-flat"> <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('items/process')?>" method="post">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="hidden" name="id" value="<?= $row->id?>">
                            <input type="text" class="form-control" name="name" value="<?= $row->name?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" class="form-control" name="price" value="<?= $row->price?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category Id</label>
                            <select name="category" id="category" class="form-control">
                                <?php foreach ($category->result() as $key => $data) { ?>
                                <option value="<?= $data->id?>"><?= $data->name?></option>
                                <?php } ?>
                            </select>
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