<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil data pertumbuhan user dari backend
        fetch('/user-growth-data')
            .then(response => response.json())
            .then(data => {
                // Memisahkan data menjadi labels (tahun) dan datasets (jumlah user)
                const labels = data.map(item => item.year);
                const userCounts = data.map(item => item.total);

                // Membuat line chart dengan Chart.js
                var ctx = document.getElementById('userGrowthChart').getContext('2d');
                var userGrowthChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pengguna Umum',
                            data: userCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: true,
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                            display: true,
                            text: 'Pertumbuhan Jumlah User Umum'
                            }
                        },
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah Pengguna'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tahun'
                                }
                            }
                        }
                    }
                });
            });
    });
</script>