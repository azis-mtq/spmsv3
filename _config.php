<?php

// membuat baseurl
define('BASEURL', 'http://localhost/spmsv3/');

// membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbplatecontrol");
$lot_pasting;
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi registrasi user baru
function register($data) {
    global $conn;

    $fullname = $data["fullname"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tbl_users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');
             </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sama!');
             </script>";
    } else {
        echo mysqli_error($conn);
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO tbl_users VALUES('', '1', '$fullname', '$username', '$password')");
    return mysqli_affected_rows($conn);

/*
$shift_id = $data["shift_id"];
        $qty_ori_ok = $data["qty_ori_ok"];
        $qty_ori_ng = $data["qty_ori_ng"];
        $qty_reform = $data["qty_reform"];
        $qty_reform_ng = $data["qty_reform_ng"];
        $parent_lot_formation = $data["parent_lot_formation"];
        $date_created = time();
*/
}

//====================================================================================
// membuat fungsi simpan data loading
// function saveDataPlate($data) {
//     global $conn;
//     global $lot_pasting;

//     $lot_pasting = $data["lot_pasting"];
//     $plate_type_id = $data["plate_type_id"];
//     $circuit = $data["circuit"];
//     $date_created = time();
    

//     $querySaveToPlateStock = "INSERT INTO tbl_plate_stocks VALUES('', '4', '', '$plate_type_id', '$circuit', '$lot_pasting', '', '', '$date_created', '1', '', '')";
//     //$querySaveToTransaction = "INSERT INTO tbl_transactions VALUES('', )";
//     //mysqli_query($conn, $querySaveToPlateStock);
//     //return mysqli_affected_rows($conn);
// }

// function saveLoading($data) {
//     global $conn;
//     global $lot_pasting;

//     // variabel untuk menyimpan id dari tabel plate stok sesuai dengan lot_pasting yg diinput di awal
//     $plate_stock_id;
//     $shift_id = $data["shift_id"];
//     $qty_ori_ok = $data["qty_ori_ok"];
//     $qty_ori_ng = $data["qty_ori_ng"];
//     $qty_reform = $data["qty_reform"];
//     $qty_reform_ng = $data["qty_reform_ng"];
//     $parent_lot_formation = $data["parent_lot_formation"];
//     $date_created = time();
    
//     // mencari id dari tabel plate stok sesuai dengan lot_pasting yg diinput di form
//     $result = mysqli_query($conn, "SELECT id FROM tbl_plate_stocks WHERE lot_pasting = '$lot_pasting'");
//     while( $row = mysqli_fetch_assoc($result)) { 
//         // selama query tidak menghasilkan NULL, simpan id yg ketemu ke variabel $plate_stock_id
//         $plate_stock_id = $row["id"];
//     }
    
//     $querySaveToTransactions = "INSERT INTO tbl_transactions VALUES('', '$plate_stock_id', '1', '$qty_ori_ok', '', '$qty_ori_ng', '', '$qty_reform', '$qty_reform_ng', '$parent_lot_formation', '$date_created', '1', '$shift_id', '', '')";
//     //mysqli_query($conn, $querySaveToTransactions);
//     //return mysqli_affected_rows($conn);
// }