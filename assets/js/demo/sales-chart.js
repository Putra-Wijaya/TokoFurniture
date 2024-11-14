// sales-chart.js
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('myAreaChart').getContext('2d');

    // Mengambil data dari PHP
    var salesData = <?= json_encode($sales) ?>; // Ganti dengan cara Anda mengambil data

    var labels = salesData.map(function(e) {
        return e.month; // Ambil bulan dari data
    });
    var data = salesData.map(function(e) {
        return e.total || 0; // Menggunakan 0 jika total tidak ada
    });

    var myAreaChart = new Chart(ctx, {
        type: 'line', // Tipe chart yang digunakan
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area bawah
                borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                borderWidth: 2,
                fill: true // Mengisi area di bawah garis
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true // Mulai sumbu Y dari 0
                }
            }
        }
    });
});
