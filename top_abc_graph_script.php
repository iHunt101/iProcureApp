	
<?php 
	$ranking_array =  implode(',',$array);	 
?>
<script>
 var chart = AmCharts.makeChart("graph", {

    "type": "serial",
    "theme": "none",  
    "handDrawn":true,
    "handDrawScatter":1,
    "legend": {
        "useGraphSettings": true,
        "markerSize":12,
        "valueWidth":0,
        "verticalGap":0
    },
    "dataProvider": [<?php echo $ranking_array; ?>],
    "valueAxes": [{
        "minorGridAlpha": 0.08,
        "minorGridEnabled": true,
        "position": "top",
        "axisAlpha":0
    }],
    "startDuration": 1,
    "graphs": [{
         "balloonText": "<span style='font-size:13px;'>Rank <b>[[category]]</b>: [[title]] Total ABC = P <b>[[value]]</b></span>",
        "title": "Income",
        "type": "column",
        "fillAlphas": 0.8,
        "valueField": "income"
    }, {
         "balloonText": "<span style='font-size:13px;'>Rank <b>[[category]]</b>: [[title]] Total PO =  P <b>[[value]]</b></span>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "useLineColorForBulletBorder": true,
        "fillAlphas": 0,
        "lineThickness": 2,
        "lineAlpha": 1,
        "bulletSize": 7,
        "title": "Expenses",
        "valueField": "expenses"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start"
    }
});
</script>