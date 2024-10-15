<script>

  var ctx = document.getElementById('alumniBarChart').getContext('2d');

  var alumniBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['2019', '2020', '2021', '2022', '2023'],
        datasets: [
            {
            label: 'Total Lulusan', // Label dataset
            data: @json(array_column($alumniGrads, 'totalLulusan')),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1 // Ketebalan garis batas
            },
            {
            label: 'Lulusan Yang Bekerja', // Label dataset
            data: @json(array_column($alumniGrads, 'lulusanBekerja')),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1 // Ketebalan garis batas
            },
            {
            label: 'Wirausaha', // Label dataset
            data: @json(array_column($alumniGrads, 'lulusanWirausaha')),
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1 // Ketebalan garis batas
            },
            {
            label: 'Melanjutkan Pendidikan', // Label dataset
            data: @json(array_column($alumniGrads, 'lulusanKuliah')),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1 // Ketebalan garis batas
            }
        ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Memulai nilai Y dari 0
        }
      },
      plugins: {
            title: {
                display: true,
                text: 'Statistik Lulusan Tiap Angkatan'
            }
        }
    }
  });
</script>