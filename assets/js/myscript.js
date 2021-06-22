//  Sweet alert flash data
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Berhasil',
        text: "" + flashData,
        icon: 'success'
    });
}

// tombol hapus
$('.batal').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

