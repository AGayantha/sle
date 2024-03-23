<?php
include("./header.php");

?>

<div class="content">
    <h1>BIOMED Hydro Power Plant</h1>
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
                $query = "SELECT * FROM biomed
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['unit'] . " kWh</td><tr>";
                    }
                }
                
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
    $query = "SELECT * FROM shift_biomed
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

        <!-- Turbine 1 -->
        <div class="form-container">
            <form id="turbine1Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='1' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Turbine 1</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Turbine 2 -->
        <div class="form-container">
            <form id="turbine2Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='2' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Turbine 2</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Generator 1 -->
        <div class="form-container">
            <form id="generator1Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='3' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Generator 1</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Generator 2 -->
        <div class="form-container">
            <form id="generator2Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='4' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Generator 2</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Hydraulic Unit -->
        <div class="form-container">
            <form id="hydraulicUnitForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='5' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Hydraulic Unit</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Lubrication System -->
        <div class="form-container">
            <form id="lubricationSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='6' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Lubrication System</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Generator -->
        <div class="form-container">
            <form id="generatorForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='7' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Generator</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Dewatering System -->
        <div class="form-container">
            <form id="dewateringSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='8' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Dewatering System</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Medium Voltage Panel -->
        <div class="form-container">
            <form id="mediumVoltagePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='9' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Medium Voltage Panel</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Low Voltage Panel -->
        <div class="form-container">
            <form id="lowVoltagePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='10' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Low Voltage Panel</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Battery Pack -->
        <div class="form-container">
            <form id="batteryPackForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='11' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Battery Pack</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Control Panel -->
        <div class="form-container">
            <form id="controlPanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='12' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Control Panel</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Station Service Panel -->
        <div class="form-container">
            <form id="stationServicePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='13' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Station Service Panel</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Motor Control Panel -->
        <div class="form-container">
            <form id="motorControlPanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='14' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Motor Control Panel</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Decentralized Control Common -->
        <div class="form-container">
            <form id="decentralizedControlCommonForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='15' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Decentralized Control Common</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Inlet Valve and Control System -->
        <div class="form-container">
            <form id="inletValveControlSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='16' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Inlet Valve and Control System</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Bypass Valve and Control System (Water Bypass) -->
        <div class="form-container">
            <form id="bypassValveControlSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='17' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Bypass Valve and Control System (Water Bypass)</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auxiliary Generator (Outside) -->
        <div class="form-container">
            <form id="auxiliaryGeneratorOutsideForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='18' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Auxiliary Generator (Outside)</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Transformer -->
        <div class="form-container">
            <form id="transformerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='19' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Transformer</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- CT PT Transformer -->
        <div class="form-container">
            <form id="ctPtTransformerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='20' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>CT PT Transformer</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auto Re-closer -->
        <div class="form-container">
            <form id="autoRecloserForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='21' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Auto Re-closer</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Mechanical Bypass Unit (33,000) -->
        <div class="form-container">
            <form id="mechanicalBypassUnitForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='22' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Mechanical Bypass Unit (33,000)</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Overhead Crane -->
        <div class="form-container">
            <form id="overheadCraneForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='23' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Overhead Crane</a>";
                echo "<input style='background-color :".$color['color'].";' type='text'>";
                ?>
            </form>
        </div>
            
    </div> 

    <!-- card end -->

    <!-- item status End -->

    <div id="popup-form" class="popup_form">
        <form action="./add_biomed.php" method="post">
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
        <form action="./generate_biomed.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form3" class="popup_form">
        <form action="./shift_biomed.php" method="post">
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
        <form action="./delete_biomed.php" method="post">
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
        FROM biomed
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
            title: "BIOMED HYDRO POWER PLANT ELECTRICITY GENERATION",
            curveType: "function",
            legend: { position: "none" },
            backgroundColor: { fill: "transparent" },
            chartArea: { left: 70, top: 50, width: '100%', height: '75%' },
            vAxes: { 0: { title: 'M W h' } }
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