$(document).ready(function(){
	$.ajax({
		url: "graphs.php",
		method: "GET",
		success: function(data) {
			var data = JSON.parse(data);
			console.log(data);
			var sensor = [];
			var count = [];

			for(var i in data) {
				sensor.push("Sensor: " + data[i].sensor_code);
				count.push(data[i].sensorCount);
			}

			var chartdata = {
				labels: sensor,
				datasets : [
					{
						label: 'Total notifications received',
						backgroundColor: 'rgba(120, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: count
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});