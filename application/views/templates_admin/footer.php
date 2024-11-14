
    </main>

    <script src="<?php echo base_url () ?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url () ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url () ?>assets/admin/js/plugins.min.js"></script>
    <script src="<?php echo base_url () ?>assets/admin/js/custom-scripts.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById('salesChart').getContext('2d');
			var salesData = <?= json_encode($sales) ?>;

			var labels = salesData.map(function(e) {
				return e.month_name;
			});
			var data = salesData.map(function(e) {
				return e.total || 0;
			});

			var salesChart = new Chart(ctx, {
				type: 'bar', 
				data: {
					labels: labels,
					datasets: [{
						label: 'Total Penjualan',
						data: data,
						backgroundColor: 'rgba(75, 192, 192, 0.5)',
						borderColor: 'rgba(75, 192, 192, 1)',
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true,
							title: {
								display: true,
								text: '' 
							}
						},
						x: {
							title: {
								display: true,
								text: '' 
							}
						}
					}
				}
			});
		});
	</script>

</body>	
</html>
