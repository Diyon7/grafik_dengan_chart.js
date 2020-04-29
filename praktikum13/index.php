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
    <div style="width: 800px;height : 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasus); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
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
</body>

</html>