<script>
// Mengambil data dari backend
fetch('/getIndustryData')
    .then(response => response.json())
    .then(data => {
        // Mengambil nama industri dan jumlah lulusan yang bekerja
        const industryLabels = data.map(item => item.industry);
        const industryCounts = data.map(item => item.total);

        // Membuat chart pie dengan Chart.js
        var ctx = document.getElementById('statusGraduation').getContext('2d');
        var statusGraduation = new Chart(ctx, {
            type: 'pie', // Jenis chart pie
            data: {
                labels: industryLabels, // Nama industri
                datasets: [{
                    label: 'Lulusan Berdasarkan Sektor',
                    data: industryCounts, // Jumlah lulusan di setiap industri
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
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
                        text: 'Lulusan yang Bekerja Berdasarkan Sektor Industri'
                    }
                }
            }
        });
    });
</script>
