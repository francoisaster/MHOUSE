<div class="block">
    <h1>Home</h1>

    <fieldset class="notif">Les notifications seront bientôt disponibles !</fieldset>
    <br />
    <fieldset class="notif">Voici une notification, si tu l'as lu, clic dessus pour la faire disparaitre !</fieldset>
</div>

<script>
    $(document).ready(function(){
        $(".notif").click(function(){
            $(this).hide();
        });
    });   //PARFAIT POUR FAIRE LES SUPPRESSIONS DE notifications
    </script>


<!-- NOTRE FUCK*NG BEAU GRAPHIQUE -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Capteurs');
        data.addColumn('number', 'Percentage');
        data.addRows([
            ['Lumière Salon', 0.5],
            ['Lumière Chambre', 0.3],
            ['Lumière extérieure', 0.2]
        ]);
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
        chart.draw(data, null);
    }
</script>
<!-- Identify where the chart should be drawn. -->
<div class ="block" id="myPieChart"/>
