	
<?php 
	$ranking_array =  implode(',',$array);	 
?>
<script>

var chart = AmCharts.makeChart("graph", {
	"type": "serial",
	"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
	"categoryField": "year",
	"rotate": true,
	"startDuration": 3,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Agency APP = [[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Income",
			"type": "column",
			"valueField": "income"
		},
		{
			"balloonText": "Contract Amount = [[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"amExport": {
		"right": 20,
		"top": 20
	},
	"balloon": {},
	"titles": [],
	"dataProvider": [<?php echo $ranking_array; ?>]
});


 /* var chart = AmCharts.makeChart("graph", {

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
         "balloonText": "<span style='font-size:13px;'> <b>[[category]]</b>: [[title]] Agency APP = P <b>[[value]]</b></span>",
        "title": "Income",
        "type": "column",
        "fillAlphas": 0.8,
        "valueField": "income"
    }, {
         "balloonText": "<span style='font-size:13px;'> <b>[[category]]</b>: [[title]] Contract Amount =  P <b>[[value]]</b></span>",
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
}); */
</script>