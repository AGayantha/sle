<?php
include("./header.php");

?>

<div class="content">
    <h1>Meter Manufacturing</h1>
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>DATE</td>
                <td>UNIT</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM memp
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['unit'] . " kWh</td><tr>";
                    }
                }
                // $connection->close();
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm()">Add-Data</button>
                    <button class="btn" onclick="openPopupForm2()">Generate-Data</button>
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>


    
    <table id="deduruoya_table2" class="plant_table">
    <thead>
        <tr>
            <td>Date</td>
            <td>Name</td>
            <td>Contact Number</td>
        </tr>
    </thead>
    <tbody>
    <?php
    require_once 'config.php';
    $query = "SELECT * FROM shift_memp
            ORDER BY id DESC
            LIMIT 2";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['date'] . "</td><td>" . $row['name'] ."</td><td>"  . $row['number'] ."</td></tr>";
        }
    }

    // Close the result set
    $result->close();

    // Close the database connection
    $connection->close();
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td><button class="btn" onclick="openPopupForm3()">Add-Data</button></td>
        </tr>
    </tfoot>
</table>
         

    <div id="curve_chart" class="curve_chart"></div>

    <!-- item status Start -->
    <!-- card Start -->

<div class="card"> 

        <!-- Hopper -->
    <div class="form-container">
        <form id="hopperForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='1' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Hopper</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Auto Loader -->
    <div class="form-container">
        <form id="autoLoaderForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='2' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Auto Loader</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Chiller -->
    <div class="form-container">
        <form id="chillerForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='3' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Chiller</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Compressor -->
    <div class="form-container">
        <form id="compressorForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='4' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Compressor</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Crusher -->
    <div class="form-container">
        <form id="crusherForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='5' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Crusher</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Material Rubber Building A -->
    <div class="form-container">
        <form id="materialRubberBuildingAForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='6' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Material Rubber Building A</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Material Rubber Building B -->
    <div class="form-container">
        <form id="materialRubberBuildingBForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='7' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Material Rubber Building B</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Polycarbonate -->
    <div class="form-container">
        <form id="polycarbonateForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='8' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Polycarbonate</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Master Batch -->
    <div class="form-container">
        <form id="masterBatchForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='9' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Master Batch</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Spring -->
    <div class="form-container">
        <form id="springForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='10' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Spring</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Scotch Tape (Sellotape) -->
    <div class="form-container">
        <form id="scotchTapeForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='11' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Scotch Tape (Sellotape)</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Corrugated Box -->
    <div class="form-container">
        <form id="corrugatedBoxForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='12' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Corrugated Box</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>

    <!-- Safety Gear -->
    <div class="form-container">
        <form id="safetyGearForm">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM status_memp WHERE id='13' ";
            $result = mysqli_query($connection, $sql);
            $color = $result->fetch_assoc();
            echo "<a href='update_memp_status.php?id=$color[id]'>Safety Gear</a>";
            echo "<input style='background-color :".$color['color'].";' type='text'>";
            ?>
        </form>
    </div>
</div>

    <!-- card end -->

    <!-- item status End -->

    <div id="popup-form" class="popup_form">
        <form action="./add_memp.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="text" name="unit" required placeholder="Unit-kWh" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form2" class="popup_form">
        <form action="./generate_memp.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form3" class="popup_form">
        <form action="./shift_memp.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="text" name="name" required placeholder="Name" />
            <br />
            <input type="number" name="number" required placeholder="Contact Number" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form4" class="popup_form">
        <form action="./delete_memp.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>
    
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    <?php
    include 'config.php';

    $sql = "SELECT date, unit
        FROM memp
        ORDER BY id ASC
        LIMIT 10";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $data = array();

        // Add the header to the array
        $data[] = ['date', 'unit'];

        while ($row = $result->fetch_assoc()) {
            // Fetch and add each row to the array
            $data[] = [date('m-d', strtotime($row['date'])), (int) $row['unit']];
        }

        // Convert the PHP array to a JSON string
        $json_data = json_encode($data);
    } else {
        echo "No data found!";
    }

    $connection->close();
    ?>
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Parse the JSON data generated from PHP
        var jsonData = <?php echo $json_data; ?>;

        var data = google.visualization.arrayToDataTable(jsonData);

        var options = {
            title: "Meter Manufacturing GENERATION",
            curveType: "function",
            legend: { position: "none" },
            backgroundColor: { fill: "transparent" },
            chartArea: { left: 70, top: 50, width: '100%', height: '75%' },
            vAxes: { 0: { title: 'Unit' } }
        };

        var chart = new google.visualization.LineChart(
            document.getElementById("curve_chart")
        );

        chart.draw(data, options);
    }
</script>

<script>

    function openPopupForm() {
        document.getElementById('popup-form').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }
    function openPopupForm2() {
        document.getElementById('popup-form2').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }
    function openPopupForm3() {
        document.getElementById('popup-form3').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }
    function opendeleteForm() {
        document.getElementById('popup-form4').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }
    function closePopupForm() {
        document.getElementById('popup-form').style.display = 'none';
        document.getElementById('popup-form2').style.display = 'none';
        document.getElementById('popup-form3').style.display = 'none';
        document.getElementById('popup-form4').style.display = 'none';
        document.getElementById('curve_chart').style.display = 'block';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.remove('blurred');
        divToBlur.classList.remove('blurred');
        mydiv.classList.remove('blurred');
        table.classList.remove('blurred');
    }
</script>



<?php
include("./footer.php");
?>