<html>
<body>

<form action="links/add" method="post">
Link Text: <input type="text" name="name"><br>
Link URL: <input type="text" name="url"><br>
    <?php
    require '../db/db.php';
    try {
        $result = $conn->query("select * from Support_Link_Groups");
        echo '<select class="form-dropdown" id="group" name="group">';
        foreach ($result as $row) {
            echo '<option value="' . $row['Group_ID'] .'" > '. $row['Group_Name'] . '</option>';
        }
        echo '</select>';
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
     ?>
<input type="submit">
</form>

</body>
</html>
