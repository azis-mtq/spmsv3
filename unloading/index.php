<?php
$page="unloading";
require_once "../_header.php";

// mengambil data shift dari database
$queryShift = mysqli_query($conn, "SELECT * FROM tbl_shift");

?>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Form Input Proses Unloading
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Unloading</a></li>
            <li class="active">Input</li>
        </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-danger">
                <form role="form" class="form-horizontal" method="post" action="">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cari Data Loading Berdasarkan :</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="tanggal" class="col-sm-4 control-label">Tanggal Loading</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker">
                                        </div>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-5 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="circuit" class="col-sm-3 control-label">Circuit</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="circuit" name="circuit">
                                            <option value="pilih">Pilih Circuit</option>
                                            <option value="1">Circuit 1</option>
                                            <option value="2">Circuit 2</option>
                                            <option value="3">Circuit 3</option>
                                            <option value="4">Circuit 4</option>
                                            <option value="5">Circuit 5</option>
                                            <option value="6">Circuit 6</option>
                                            <option value="7">Circuit 7</option>
                                            <option value="8">Circuit 8</option>
                                            <option value="9">Circuit 9</option>
                                            <option value="10">Circuit 10</option>
                                            <option value="11">Circuit 11</option>
                                            <option value="12">Circuit 12</option>
                                            <option value="13">Circuit 13</option>
                                            <option value="14">Circuit 14</option>
                                        </select>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-4 -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Cari</button>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-2 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.box-body -->
                </form>
            </div> <!-- /.box-danger -->
            
            <div class="box box-primary">
                <form class="form-horizontal" action="">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Unloading :</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pic" class="col-sm-3 control-label">PIC</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pic" name="pic" placeholder="<?= $_SESSION["fullname"]; ?>" readonly>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="shift_id" class="col-sm-3 control-label">Shift</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="shift_id" name="shift_id">
                                            <option value="pilih"> Pilih Shift</option>
                                                <?php while($row = mysqli_fetch_assoc($queryShift)) : ?>
                                                    <option value="<?= $row['id']; ?>"> <?= $row['code']; ?> </option>
                                                <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="lot_formation" class="col-sm-3 control-label">Lot Formation</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lot_formation" name="lot_formation" placeholder="Lot Formation" readonly>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="qty_total_ok" class="col-sm-3 control-label">Qty Total Ok</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_total_ok" name="qty_total_ok" placeholder="Total Qty Plate OK" readonly>
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qty_ori_ok" class="col-sm-3 control-label">Qty Original OK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_ori_ok" name="qty_ori_ok" placeholder="Qty Original Ok" readonly>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="qty_ori_ng" class="col-sm-3 control-label">Qty Original RF</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_ori_rf" name="qty_ori_rf" placeholder="Qty Original Reform">
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="qty_ori_ng" class="col-sm-3 control-label">Qty Original NG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_ori_ng" name="qty_ori_ng" placeholder="Qty Original NG">
                                    </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="qty_ori_ok" class="col-sm-3 control-label">Qty Reform OK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_rf_ok" name="qty_rf_ok" placeholder="Qty Reform Ok" readonly>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="qty_ori_ng" class="col-sm-3 control-label">Qty Reform RF</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_rf_rf" name="qty_rf_rf" placeholder="Qty Reform Reform">
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="qty_ori_ng" class="col-sm-3 control-label">Qty Reform NG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_rf_ng" name="qty_rf_ng" placeholder="Qty Reform NG">
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="aksi" value="simpan"></input>
                        <button type="button" class="btn btn-primary pull-right submitLoading">Simpan</button>    
                    </div>
                </form>
            </div>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button> 
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


        </section>
        <!-- /.content -->

        


    </div>
    <!-- /.container -->
</div>

<?php require_once "../_footer.php"; ?>