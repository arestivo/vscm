$(document).ready(function() {
	$.getJSON('probstats.php', function(points) {
		new Highcharts.Chart({
		     chart: {
		        renderTo: 'problemchart',
		        type: 'line'
		     },
		     title: {
		        text: ''
		     },
		     xAxis: {
		        categories: points[0],
				labels: {
            		step: 6
		        }
		     },
		     yAxis: {
		        title: {
		           text: '# Problems'
		        },
				min: 0
		     },
		     series: [{
		        name: 'Submmited',
		        data: points[1],
				color: '#369'
		     },{
		        name: 'Accepted',
		        data: points[2],
				color: '#693'
		     },{
		        name: 'Failed',
		        data: points[3],
				color: '#936'
		     }]
		  });
	});
});
