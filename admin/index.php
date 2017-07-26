<html>
<body>

<form action="add.php" method="get">
Link Text: <input type="text" name="name"><br>
Link URL: <input type="text" name="email"><br>
    <?php
    require '../db/db.php';
    try {
        $result = $conn->query("select * from Support_Link_Groups");
        echo '<select class="form-dropdown" id="group" name="group">';
        foreach ($result as $row) {
            echo '<option value="' . $row['Group_ID'] .'" > '. $row['Group_Name'] . '</option>'
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

<?php

?>