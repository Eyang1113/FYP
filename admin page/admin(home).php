<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style(Home).css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 450px;
            height: 450px;
            margin: 0 auto;
        }
        
        .summary-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <?php include "admin(header).php"; ?>
    <?php
        $result_bag = mysqli_query($conn, "SELECT * FROM bag");	
        $count_bag = mysqli_num_rows($result_bag);
        $result_clothes = mysqli_query($conn, "SELECT * FROM clothes");	
        $count_clothes = mysqli_num_rows($result_clothes);
        $result_racquet = mysqli_query($conn, "SELECT * FROM racquet");	
        $count_racquet = mysqli_num_rows($result_racquet);
        $result_shoe = mysqli_query($conn, "SELECT * FROM shoe");	
        $count_shoe = mysqli_num_rows($result_shoe);
        $result_string = mysqli_query($conn, "SELECT * FROM string");	
        $count_string = mysqli_num_rows($result_string);
        $result_shuttlecock = mysqli_query($conn, "SELECT * FROM shuttlecock");	
        $count_shuttlecock = mysqli_num_rows($result_shuttlecock);
        $result_user = mysqli_query($conn, "SELECT * FROM user");	
        $count_user = mysqli_num_rows($result_user);
        $result_order = mysqli_query($conn, "SELECT * FROM orders");	
        $count_order = mysqli_num_rows($result_order);
    ?>
    <div class="main">
        <div class="row">
            <h3>Summary</h3>
            <hr><br>
            <div class="chart-container">
                <canvas id="summaryChart"></canvas>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('summaryChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Bag', 'Clothes', 'Racquet', 'Shoe', 'String', 'Shuttlecock', 'User', 'Order'],
                            datasets: [{
                                data: [
                                    <?php echo $count_bag; ?>,
                                    <?php echo $count_clothes; ?>,
                                    <?php echo $count_racquet; ?>,
                                    <?php echo $count_shoe; ?>,
                                    <?php echo $count_string; ?>,
                                    <?php echo $count_shuttlecock; ?>,
                                    <?php echo $count_user; ?>,
                                    <?php echo $count_order; ?>
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 10)',
                                    'rgba(54, 162, 235, 10)',
                                    'rgba(255, 206, 86, 10)',
                                    'rgba(75, 192, 192, 10)',
                                    'rgba(153, 102, 255, 10)',
                                    'rgba(255, 159, 64, 10)',
                                    'rgba(231, 233, 237, 10)',
                                    'rgba(150, 150, 150, 10)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(231, 233, 237, 1)',
                                    'rgba(150, 150, 150, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                            }
                        }
                    });
                });
            </script>
            <br>
        </div>
        <br><br>
        <div class="row">
            <h3>Login History</h3>
            <hr><br><br>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Admin Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Date & Time</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM loginhistory");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
