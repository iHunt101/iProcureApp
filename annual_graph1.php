<?php 
	$ranking_array1 =  implode(',',$array1);	 
?>
<script>
	var chart = AmCharts.makeChart("annual_graph1", {
    "type": "serial",
    "theme": "none",
    "legend": {
        "useGraphSettings": true
    },
    "dataProvider": [<?php echo $ranking_array1; ?>],
    "valueAxes": [{
        "integersOnly": true,
        "reversed": false,
        "axisAlpha": 0,
        "dashLength": 5,
        "gridCount": 10,
        "position": "left",
        "title": "Annual Record"
    }],
    "startDuration": 0.5,
    "graphs": [{
        "balloonText": "Request numbers in [[category]]: [[value]]",
        "bullet": "round",
        "title": "Request ( <?php echo $request_total; ?> )",
        "valueField": "italy",
		"fillAlphas": 0
    }, {
        "balloonText": "Award numbers in  [[category]]: [[value]]",
        "bullet": "round",
        "title": "Award ( <?php echo $award_total; ?> )",
        "valueField": "germany",
		"fillAlphas": 0
    }],
    "chartCursor": {
        "cursorAlpha": 0,
        "cursorPosition": "mouse",
        "zoomable": false
    },
    "categoryField": "data",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "fillAlpha": 0.05,
        "fillColor": "#000000",
        "gridAlpha": 0,
        "position": "bottom"
    },
    "exportConfig": {
        "menuBottom": "15px",
        "menuRight": "15px",
        "menuItems": [{
            "icon": '/lib/3/images/export.png',
            "format": 'png'
        }]
    }
});

</script>