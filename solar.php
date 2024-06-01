<?php
include("./header.php");

?>
<div class="content">
    <h1>Solar Department</h1>
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
                <td><button class="btn" onclick="openPopupForm()">Add-Data</button>
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

    <div id="popup-form" class="popup_form">
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

    <div id="popup-form4" class="popup_form">
        <form action="./delete_solar.php" method="post">
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
</script>
