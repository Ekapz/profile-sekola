$(document).ready(function() {    
    var table = $('table').DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "Tidak ada data yang tersedia pada tabel ini",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered":   "(disaring dari _MAX_ entri keseluruhan)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampilkan _MENU_ entri",
            "loadingRecords": "Loading...",
            "processing":     "Sedang memproses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ditemukan data yang sesuai",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            "aria": {
                "sortAscending":  ": aktifkan untuk mengurutkan kolom ascending",
                "sortDescending": ": aktifkan untuk mengurutkan kolom descending"
            }
        },     
        lengthChange: true,
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend: 'copy',
                text: 'Salin',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'excel',
                text: 'Export Excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },            
        ]
    } );    
} );
