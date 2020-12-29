const flashData = $('.flash-data').data('flashdata');
var msg = flashData.split("-")[1];
var type = flashData.split("-")[0];

if (flashData) {
    Swal.fire(
        msg,
        '',
        type
    )
}


// document.getElementById("submit-simpan").addEventListener("click", function(e){
//     e.preventDefault();
//     Swal.fire({
//         title: 'Simpan data!',
//         text: "Data yang sudah disimpan tidak dapat diubah. Lanjutkan?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya, lanjutkan'
//     }).then((result) => {
//         if (result.value) {
//             document.getElementById("form-simpan").submit();
//         }
//     })  
// });

