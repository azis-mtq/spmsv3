<?php
session_start();
require_once "../_config.php"; 

if(isset($_REQUEST["aksi"])) {
    if($_REQUEST["aksi"] == "simpan") {
        saveDataPlate();
    }
}



//====================================================================================
// membuat fungsi simpan data loading
function saveDataPlate() {
    global $conn;
    global $lot_pasting;

    $lot_pasting = $_POST["lot_pasting"];
    $plate_type_id = $_POST["plate_type_id"];
    $circuit = $_POST["circuit"];
    $date_created = time();
    

    //$querySaveToPlateStock = "INSERT INTO tbl_plate_stocks VALUES('', '4', '', '$plate_type_id', '$circuit', '$lot_pasting', '', '', '$date_created', '1', '', '')";
    $querySaveToPlate = "INSERT INTO tbl_plate VALUES('', '$plate_type_id', '$circuit', '$lot_pasting', '', '$date_created', '1', '', '')";
    
    if(mysqli_query($conn, $querySaveToPlate)) {
        saveLoading();
    } else {
        echo mysqli_error($conn);
    }
    
}

function saveLoading() {
    global $conn;
    global $lot_pasting;

    // variabel untuk menyimpan id dari tabel plate stok sesuai dengan lot_pasting yg diinput di awal
    $plate_id;
    $shift_id = $_POST["shift_id"];
    $qty_ori_ok = $_POST["qty_ori_ok"];
    $qty_ori_ng = $_POST["qty_ori_ng"];
    $qty_reform = $_POST["qty_reform"];
    $qty_reform_ng = $_POST["qty_reform_ng"];
    $parent_lot_formation = $_POST["parent_lot_formation"];
    $date_created = time();
    
    // mencari id dari tabel plate stok sesuai dengan lot_pasting yg diinput di form
    $result = mysqli_query($conn, "SELECT id FROM tbl_plate WHERE lot_pasting = '$lot_pasting'");
    while( $row = mysqli_fetch_assoc($result)) { 
        // selama query tidak menghasilkan NULL, simpan id yg ketemu ke variabel $plate_stock_id
        $plate_id = $row["id"];
    }
    
    $querySaveToTransactions = "INSERT INTO tbl_transactions VALUES('', '$plate_id', '1', '$qty_ori_ok', '', '$qty_ori_ng', '', '$qty_reform', '$qty_reform_ng', '$parent_lot_formation', '$date_created', '1', '$shift_id', '', '')";
    if(mysqli_query($conn, $querySaveToTransactions)) {
        $_SESSION["flashdata"] = "success-Berhasil";
        header('Location: index.php');  
        exit;
    } else {
        $msg =  mysqli_error($conn);
        $_SESSION["flashdata"] = "error-".$msg;
        header('Location: index.php');  
        exit;
    }
}

?>