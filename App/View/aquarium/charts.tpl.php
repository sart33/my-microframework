<?php ?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        let concentrateArr = <?= json_encode($params)?>;

        let data = google.visualization.arrayToDataTable(concentrateArr);

        console.log(concentrateArr);
        // console.log(arrTwo);
        let options = {
            // title: 'Added concentration (mg/l)',
            // curveType: 'function',
            // legend: { position: 'bottom',
            // }
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'added (mg/l)',
                logScale: true,
                minValue: 0

            },
            trendlines: {
                0: {type: 'exponential', color: '#333', opacity: 1},
            }

        };

        let chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>
<div id="curve_chart" style="width: 900px; height: 500px"></div>
<pre>
<!--    --><?php //print_r($params);?>
</pre>