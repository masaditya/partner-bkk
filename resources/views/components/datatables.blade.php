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
            pagingType: 'simple',
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 10,
            language: {
                paginate: {
                    previous: '<span class="dark:text-gray-400">Sebelumnya</span>',
                    next: '<span class="dark:text-gray-400">Selanjutnya</span>'
                },
                info: '<span class="dark:text-gray-400">Menampilkan _START_ sampai _END_ dari _TOTAL_ entri</span>',
                lengthMenu: '<span class="dark:text-gray-400">Tampilkan _MENU_ entri</span>'
            },
        });

        table.on('draw.dt', function () {
            window.HSStaticMethods.autoInit();
        });
        
        $('#customSearchInput').on('keyup', function () {
            table.search(this.value).draw();
        });
    });

</script>
