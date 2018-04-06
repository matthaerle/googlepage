<a class="dropdown-toggle" data-toggle="dropdown" id="drop_down">Tech Support Links<span class="caret"></span></a>
<ul class="dropdown-menu" id="wht_txt">

    <?php
    require '../db/db.php';


    try {
        $sql = "select * from Support_Link_Groups";
        $result = $conn->query($sql);

        foreach($result as $row) {
            $result = $conn->query("select * from Tech_Support_Links where Group_ID = '" .$row['Group_ID'] . "'");
            echo "<li class='dropdown-header'>".$row['Group_Name']."</li>";
            foreach($result as $row) {
                echo "<li><a href='".$row['Link_URL']."'>". $row['Link_Text'] . "</a></li>";

            }
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</ul>