<?php
$head_title = "Link Administration";
require '../layout/template_head.php';
?>
<body>
<div class="row">
    <div class="col-lg-2"> </div>
    <div class="col-lg-2">
        <form class="form-group" action='links/add' method='post'>
            <label for="name">Link Text:</label>
            <input type="text" name="name" />
            <br />
            <label for="url">Link URL:</label>
            <input type="text" name="url" /><br>
            <select class="form-control" id="group" name="group">
                <option value="0">Select A Group</option>
                <?php
                require '../db/db.php';
                try {
                    $result = $conn->query("select * from Support_Link_Groups");
                    foreach ($result as $row) {
                        echo '<option value="' . $row['Group_ID'] .'" >'. $row['Group_Name'] . '</option>';
                    }
                }
                catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                ?>
            </select>
            <input class="btn btn-default" type="submit" />
        </form>
    </div>
    <div class="col-lg-2">
        <form id="groupadd" class="form-group" method="post">
            <label for="addgroup">Add group:</label>
            <input type="text" name="addgroup" id="addgroup"/>
        <button onclick="postStuff()" id="groupSubmit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    function postStuff(){
        // Create our XMLHttpRequest object
        var hr = new XMLHttpRequest();
        // Create some variables we need to send to our PHP file
        var url = "links/groupadd";
        var group = document.getElementById("addgroup").value;
        var vars = "group="+group;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Access the onreadystatechange event for the XMLHttpRequest object
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                console.log(return_data);
            }
        }
        // Send the data to PHP now... and wait for response to update the status div
        hr.send(vars); // Actually execute the request
        document.getElementById("result").innerHTML = "processing...";
    }


</script>


</body>
</html>
