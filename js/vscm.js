var refresh_timeout;
$(document).ready(function() {
	$('.inlinesparkline').sparkline('html',{type: 'pie', barColor: 'green', sliceColors: ['#393','#933']});
	$.getJSON('probstats.php', {"username" : $.query.get('username'), "code" : $.query.get('code')}, function(points) {
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
				color: '#933'
		     }]
		  });
	});
	refresh_timeout = setInterval("refresh()", 60000);
	refresh();
});

function refresh() {
		$.get('refresh.php', function(data) {
			var old = $('#refresh').html();		
			if (old != '' && data != old) {
				$('#refresh').html('Refresh').css('display: block');	
				clearTimeout(refresh_timeout);
				location.reload();
			}
			else
				$('#refresh').html(data);		
		});
}
