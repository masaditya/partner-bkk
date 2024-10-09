<style>
    .dataTables_filter {
        display: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />

<script>
    $(document).ready(function () {
        var table = $('#dataTableBkk').DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 10,
            "language": {
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                },
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "lengthMenu": "Tampilkan _MENU_ entri"
            }
        });
        $('#customSearchInput').on('keyup', function () {
            table.search(this.value).draw();
        });
    });

</script>
