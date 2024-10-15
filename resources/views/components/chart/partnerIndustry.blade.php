<script>
  fetch('/getPartnerIndustryData') // Sesuaikan dengan route yang sesuai
    .then(response => response.json())
    .then(data => {
      // Data yang diterima dari backend
      const years = data.years;
      const totals = data.totals;

      // Dapatkan elemen canvas
      var ctx = document.getElementById('partnerIndustry').getContext('2d');

      // Buat chart baru
      var partnerIndustry = new Chart(ctx, {
        type: 'bar', // Jenis chart yang ingin digunakan
        data: {
          labels: years, // Tahun pada sumbu X
          datasets: [{
            label: 'Jumlah Perusahaan yang Bermitra', // Label dataset
            data: totals, // Data pada sumbu Y
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna untuk semua bar
            borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1 // Ketebalan garis batas
            }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true // Memulai nilai Y dari 0
            }
          },
          responsive: true,
          plugins: {
            legend: {
              position: 'top' // Posisi legend di atas
            },
            title: {
              display: true,
              text: 'Pertumbuhan Jumlah Perusahaan Mitra (10 Tahun Terakhir)'
            }
          }
        }
      });
    });
</script>
