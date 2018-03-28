	          			<div class="col-md-3">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> <?=$clientes?> </h2>
							    <p>Nuevos Clientes</p>
							  </div>
							</div>
	          			</div>
	          			<div class="col-md-3">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-podcast" aria-hidden="true"></i> <?=$instalaciones?> </h2>
							    <p>Instalaciones Pendientes</p>
							  </div>
							</div>
	          			</div>
	          			<div class="col-md-3">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-line-chart" aria-hidden="true"></i> <?=$acuerdos?> </h2>
							    <p>Acuerdos Cerrados hoy</p>
							  </div>
							</div>
	          			</div>
	          			<div class="col-md-3">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-address-book" aria-hidden="true"></i> <?=$interesados?></h2>
							    <p>Clientes Interesados</p>
							  </div>
							</div>
	          			</div>
	           		</div>
            	</div>
			  </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<div id="chartContainer" style="height: 300px; width: 100%;"></div>
						</div>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
						</div>
					</div>	
				</div>
			</div>
			
		</div>
	</div>
</div>
	<script src="<?=base_url()?>assets/canvasjs/canvasjs.min.js"></script>
	<script>
	window.onload = function () {
		
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		
		title:{
			text:"Fortune 500 Companies by Country"
		},
		axisX:{
			interval: 1
		},
		axisY2:{
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			title: "Number of Companies"
		},
		data: [{
			type: "bar",
			name: "companies",
			axisYType: "secondary",
			color: "#014D65",
			dataPoints: [
				{ y: 3, label: "Sweden" },
				{ y: 7, label: "Taiwan" },
				{ y: 5, label: "Russia" },
				{ y: 9, label: "Spain" },
				{ y: 7, label: "Brazil" },
				{ y: 7, label: "India" },
				{ y: 9, label: "Italy" },
				{ y: 8, label: "Australia" },
				{ y: 11, label: "Canada" },
				{ y: 15, label: "South Korea" },
				{ y: 12, label: "Netherlands" },
				{ y: 15, label: "Switzerland" },
				{ y: 25, label: "Britain" },
				{ y: 28, label: "Germany" },
				{ y: 29, label: "France" },
				{ y: 52, label: "Japan" },
				{ y: 103, label: "China" },
				{ y: 134, label: "US" }
			]
		}]
	});

	var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "Desktop Search Engine Market Share - 2016"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "Google"},
			{y: 7.31, label: "Bing"},
			{y: 7.06, label: "Baidu"},
			{y: 4.91, label: "Yahoo"},
			{y: 1.26, label: "Others"}
		]
	}]
});
	
	chart.render();


	chart2.render();

	}
</script>
<body>