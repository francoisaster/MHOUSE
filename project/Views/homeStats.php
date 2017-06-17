<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['date_mesure',
                <?php
                echo "'".$capteur_choisi."'";
                ?>]
            <?php
            while ($row = $result->fetch()){ //est dans Controllers
                echo ",['".$row["date_mesure"]."',".$row["valeur"]."]";
            }
            ?>
        ]);
        var options = {
            title: 'Evolution du <?php echo $capteur_choisi; ?> en fonction de la moyenne',
            curveType: 'function',
            legend: { position: 'right' }

        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
    }
</script>


<div class="block" id="curve_chart" style="width: 700px; height: 400px"></div>