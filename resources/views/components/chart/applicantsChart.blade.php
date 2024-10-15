<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil data pelamar dari backend
        fetch('/applicants-data')
            .then(response => response.json())
            .then(data => {
                // Memisahkan data menjadi labels (tahun) dan datasets (jumlah pelamar)
                const labels = data.map(item => item.year);
                const applicantsCounts = data.map(item => item.total);

                // Membuat bar chart dengan Chart.js
                var ctx = document.getElementById('applicantsChart').getContext('2d');
                var applicantsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah User Umum yang Apply',
                            data: applicantsCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                            display: true,
                            text: 'Statistik User Umum yang Melakukan Apply Lamaran per Tahun'
                            }
                        },
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah Pelamar'
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