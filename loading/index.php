<?php

$page="loading";
require_once "../_header.php";

// mengambil dara tipe plate dari database
$queryPlateType = mysqli_query($conn, "SELECT * FROM tbl_plate_types");

// mengambil data shift dari database
$queryShift = mysqli_query($conn, "SELECT * FROM tbl_shift");

// mengambil data lot pasting yg berstatus entered dari database
$queryLotPasting = mysqli_query($conn, "SELECT lot_pasting FROM tbl_plate_stocks WHERE plate_status_id = '4'");

//============================================================================
// if (isset($_POST["dataLoading"])) {
//     if (saveDataPlate($_POST) > 0) {
//         if (saveLoading($_POST) > 0) {
//             //$_SESSION["pesan"] = "sukses";
//             //header('Location: '.$_SERVER['PHP_SELF']);  
//             //exit;
//         //header("Location: index.php");
        
//         }  
//         echo mysqli_error($conn);
//     } else {
//         echo mysqli_error($conn);
//     }
// }

// membuat created date
date_default_timezone_set('Asia/Jakarta');
$tglSekarang = time();
$tglBerformat = date('d-m-Y H:i:s', $tglSekarang);

?>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Form Input Proses Loading </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Loading</a></li>
            <li class="active">Input</li>
        </ol>
        </section>
        <!-- Main content -->
        <section class="content">  
            <form role="form" id="formLoading" name="formLoading" class="form-horizontal" method="post" action="_model.php">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Data Loading :</h3>
                    </div>
                    <div class="box-body">
                         <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($_SESSION["flashdata"])) : ?>
                                    <div class="flash-data" data-flashdata="<?= $_SESSION["flashdata"]; ?>"></div>
                                    <?php unset($_SESSION["flashdata"]); ?>
                                <?php endif; ?>
                            </div>
                        </div>
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
                                <div class="form-group">
                                    <label for="plate_type" class="col-sm-3 control-label">Tipe Plate</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="plate_type_id" name="plate_type_id">
                                            <option value="pilih"> Pilih Tipe Plate</option>
                                            <?php while($row = mysqli_fetch_assoc($queryPlateType)) : ?>
                                                <option value="<?= $row['id']; ?>"> <?= $row['code']; ?> </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="lot_pasting" class="col-sm-3 control-label">Lot Pasting</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lot_pasting" name="lot_pasting" placeholder="Lot Pasting">
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qty_ori_ok" class="col-sm-3 control-label">Qty Original</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_ori_ok" name="qty_ori_ok" placeholder="Qty Original">
                                    </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="qty_ori_ng" class="col-sm-3 control-label">Qty Original NG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_ori_ng" name="qty_ori_ng" placeholder="Qty Original NG">
                                    </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="qty_reform" class="col-sm-3 control-label">Qty Reform</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_reform" name="qty_reform" placeholder="Qty Reform">
                                    </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="qty_reform_ng" class="col-sm-3 control-label">Qty Reform NG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="qty_reform_ng" name="qty_reform_ng" placeholder="Qty Reform NG">
                                    </div>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="qty_reform_ng" class="col-sm-3 control-label">Parent Lot Form.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="parent_lot_formation" name="parent_lot_formation" placeholder="Parent Lot Formation">
                                    </div>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="aksi" value="simpan"></input>
                        <button type="button" class="btn btn-primary pull-right submitLoading">Simpan</button>    
                    </div>
                </div> <!-- /.box-primary -->
            </form> <!-- /.form dataLoading -->
        </section> <!-- /.content -->
    </div> <!-- /.container -->
</div> <!-- /.content-wrapper -->


<!-- script javascript untuk mengolah form -->
<script>

    document.querySelector('.submitLoading').addEventListener('click', function(){
        //e.preventDefault();
        if(checkFormLoading()) {
            Swal.fire({
                title: 'Simpan data!',
                text: "Data yang sudah disimpan tidak dapat diubah. Lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, lanjutkan'
            }).then((result) => {
                if (result.value) {
                    document.getElementById("formLoading").submit();
                }
            })
        }
        
    });


    //===========================================================
    //fungsi cek inputan form, jika kosong munculkan pesan warning harus diisi
    function checkFormLoading() {
        var fshift = document.forms["formLoading"]["shift_id"].value;
        var fcircuit = document.forms["formLoading"]["circuit"].value;
        var fplatetype = document.forms["formLoading"]["plate_type_id"].value;
        var flot = document.forms["formLoading"]["lot_pasting"].value;
        var fqty = document.forms["formLoading"]["qty_ori_ok"].value;
        
        if(fshift == "pilih") {
            Swal.fire(
                'Shift harus diisi',
                '',
                'warning'
            );
            return false;
        }
        if(fcircuit == "pilih") {
            Swal.fire(
                'Circuit harus diisi',
                '',
                'warning'
            );
            return false;
        }
        if(flot == "") {
            Swal.fire(
                'Lot Pasting harus diisi',
                '',
                'warning'
            );
            return false;
        }
        if(fqty == "") {
            Swal.fire(
                'Qty Ori Ok harus diisi',
                '',
                'warning'
            );
            return false;
        }
        if(fplatetype == "pilih") {
            Swal.fire(
                'Tipe Plate harus diisi',
                '',
                'warning'
            );
            return false;
        }
        return true;
    }

</script>


<?php require_once "../_footer.php"; ?>