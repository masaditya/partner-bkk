<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil data pendidikan dari backend
        fetch('/education-data')
            .then(response => response.json())
            .then(data => {
                // Memisahkan data menjadi labels (tingkat pendidikan) dan datasets (jumlah user)
                const labels = data.map(item => item.latest_degree);
                const userCounts = data.map(item => item.total);

                // Membuat polar area chart dengan Chart.js
                var ctx = document.getElementById('educationChart').getContext('2d');
                var educationChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah User Umum',
                            data: userCounts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true
                            },
                            title: {
                                display: true,
                                text: 'Tingkat Pendidikan User Umum'
                            }
                        }
                    }
                });
            });
    });
</script>