<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 18:44
// */
//echo '<pre>';
//print_r($response);
?>
<div class="container">
    <canvas id="barChart"></canvas>
</div>
<script>
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
        type: 'bar',
        data: {
            labels: ["Usuarios", "Estabelecimentos", "Parceiros", "Hot", "Combustiveis", "Combos", "Administradores"],
            datasets: [{
                label: 'Usuarios',
                data: ["<?php echo @$response['users']?>",
                    "<?php echo @$response['eslblishemnts']?>",
                    "<?php echo @$response['partners']?>",
                    "<?php echo @$response['hots']?>",
                    "<?php echo @$response['fuels']?>",
                    "<?php echo @$response['combos']?>",
                    "<?php echo @$response['sub_admin']?>"
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
