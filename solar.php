<?php
include("./header.php");

?>
<div class="content">
    <h1>Solar Department</h1>

<!-- table 1 -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Date</td>
                <td>On Hand</td>
                <td>New Additions</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM solar_application
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['on_hand'] . "</td>
                        <td>" . $row['new_additions'] . "</td>
                        <td>" . $row['on_hand'] + $row['new_additions'] . "</td>
                        <tr>";
                    }
                }
                
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm1()">Add-Data</button> 
                <!-- function: openPopupForm_1  -->
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm12()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
<!-- table 2 -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Date</td>
                <td>Visted</td>
                <td>Completed</td>
                <td>Inform to Customer</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM solar_estimates
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['visited'] . "</td>
                        <td>" . $row['completed'] . "</td>
                        <td>" . $row['inform_to_cus'] ."</td>
                        <tr>";
                    }
                }
                
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm2()">Add-Data</button>
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm22()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
<!-- table 3 -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Date</td>
                <td>To Be Started</td>
                <td>In Progress</td>
                <td>Handed Over</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM solar_installations
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['to_be_started'] . "</td>
                        <td>" . $row['in_progress'] . "</td>
                        <td>" . $row['handed_over'] ."</td>
                        <tr>";
                    }
                }
                
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm3()">Add-Data</button>
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm32()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
<!-- table 4 -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Revenue</td>
                <td>Cost</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM solar_revanue
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['revenue'] . "</td>
                        <td>" . $row['cost'] . "</td>
                        <tr>";
                    }
                }
                
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm4()">Add-Data</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

    <div id="popup-form-11" class="popup_form">
        <form action="./add_solar.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="number" name="on_hand" required placeholder="On Hand Projects" />
            <br />
            <input type="number" name="new_additions" required placeholder="New Additions" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-21" class="popup_form">
        <form action="./add_solar_2.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="number" name="visited" required placeholder="Visited" />
            <br />
            <input type="number" name="completed" required placeholder="Completed" />
            <br />
            <input type="number" name="inform_to_cus" required placeholder="Inform to Customer" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-31" class="popup_form">
        <form action="./add_solar_3.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="number" name="to_be_started" required placeholder="To Be Started" />
            <br />
            <input type="number" name="in_progress" required placeholder="In Progress"/>
            <br />
            <input type="number" name="handed_over" required placeholder="Handed Over"/>
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-revenue-41" class="popup_form">
        <form action="./add_solar_4.php" method="post">
            <h2>ADD DATA</h2>
            <input type="number" name="revenue" required placeholder="Revenue" />
            <br />
            <input type="number" name="cost" required placeholder="Cost"/>
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-12" class="popup_form">
        <form action="./delete_solar.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-22" class="popup_form">
        <form action="./delete_solar_2.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-32" class="popup_form">
        <form action="./delete_solar_3.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-del-revenue-42" class="popup_form">
        <form action="./delete_solar_4.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

<?php
include("./footer.php");
?>
<script>

function openPopupForm1() {
    document.getElementById('popup-form-11').style.display = 'block';
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
    document.getElementById('popup-form-21').style.display = 'block';
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
    document.getElementById('popup-form-31').style.display = 'block';
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

function openPopupForm4() {
    document.getElementById('popup-form-revenue-41').style.display = 'block';
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
        document.getElementById('popup-form-11').style.display = 'none';
        document.getElementById('popup-form-12').style.display = 'none';
        document.getElementById('popup-form-21').style.display = 'none';
        document.getElementById('popup-form-22').style.display = 'none';
        document.getElementById('popup-form-31').style.display = 'none';
        document.getElementById('popup-form-32').style.display = 'none';
        document.getElementById('popup-form-revenue-41').style.display = 'none';        
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.remove('blurred');
        divToBlur.classList.remove('blurred');
        mydiv.classList.remove('blurred');
        table.classList.remove('blurred');
    }
    function opendeleteForm12() {
        document.getElementById('popup-form-12').style.display = 'block';
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
    function opendeleteForm22() {
        document.getElementById('popup-form-22').style.display = 'block';
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
    function opendeleteForm32() {
    document.getElementById('popup-form-32').style.display = 'block';
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
    function opendeleteForm42() {
    document.getElementById('popup-form-del-revenue-42').style.display = 'block';
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
</script>
