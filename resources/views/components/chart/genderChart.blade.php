<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil data distribusi gender dari backend
        fetch('/gender-distribution')
            .then(response => response.json())
            .then(data => {
                // Memisahkan data menjadi labels (gender) dan datasets (jumlah user)
                const labels = data.map(item => item.gender === 'male' ? 'Laki - Laki' : 'Perempuan');
                const genderCounts = data.map(item => item.total);

                // Membuat pie chart dengan Chart.js
                var ctx = document.getElementById('genderChart').getContext('2d');
                var genderChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pengguna Umum Berdasarkan Gender',
                            data: genderCounts,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)', // Laki - Laki
                                'rgba(255, 99, 132, 0.6)'  // Perempuan
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
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
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + ' pengguna';
                                    }
                                }
                            }
                        }
                    }
                });
            });
    });
</script>