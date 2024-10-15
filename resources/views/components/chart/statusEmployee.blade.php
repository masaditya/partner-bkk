<script>
fetch('/getStatusData')
    .then(response => response.json())
    .then(data => {
        // Proses data menjadi label dan persentase untuk chart
        const statusLabels = data.map(item => item.status);
        const statusPercentages = data.map(item => item.percentage); // Menggunakan persentase dari data

        // Buat chart pie dengan Chart.js
        var ctx = document.getElementById('statusEmployee').getContext('2d');
        var statusEmployee = new Chart(ctx, {
            type: 'pie', // Jenis chart pie
            data: {
                labels: statusLabels, // Nama status pekerjaan
                datasets: [{
                    label: 'Status Pekerjaan Lulusan',
                    data: statusPercentages, // Persentase user untuk setiap status
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',  // Warna Red
                        'rgba(54, 162, 235, 0.6)',  // Warna Blue
                        'rgba(255, 206, 86, 0.6)',  // Warna Yellow
                        'rgba(75, 192, 192, 0.6)',  // Warna Green
                        'rgba(153, 102, 255, 0.6)'  // Warna Purple
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Posisi legend di atas
                    },
                    title: {
                        display: true,
                        text: 'Persentase Status Alumni'
                    }
                }
            }
        });
    });

</script>
