<?php

include('koneksi.php');
$kasus = mysqli_query($conn, "select * from tb_negara");
while ($row = mysqli_fetch_array($kasus)) {
    $nama_negara[] = $row['country'];

    $query = mysqli_query($conn, "select sum(tcases) as tcases from cases where id = '" . $row['id'] . "'");
    $row = $query->fetch_array();
    $jumlah_kasus[] = $row['tcases'];
}
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="Chart.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="canvas-holder" style="width:50%">
        <canvas id="chart-area"></canvas>
    </div>

    <script>
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: <?php echo json_encode($jumlah_kasus); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                    label: 'Grafik cases country'
                }],
                labels: <?php echo json_encode($nama_negara); ?>
            },
            options: {
                responsive: true
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
        };
        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myPie.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var newDataset = {
                backgroundColor: [],
                data: [],
                label: 'new dataset ' + config.data.datasets.length,
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());

                var colorName = colorNames[index % colorNames.length];
                var newColor = window.chartColors[colorName];
                newDataset.backgroundColor.push(newColor);
            }

            config.data.datasets.push(newDataset);
            window.myPie.update();
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myPie.update();
        });
    </script>
</body>

</html>