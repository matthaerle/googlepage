<html>
<head>
	    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <!-- Theme CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	
</head>
<body>
<div class="row">
    <div class="col-lg-2"> </div>
        <div class="col-lg-2">
                <form action='links/add' method='post'>
        <label for="name">Link Text:</label>
        <input type="text" name="name" />
        <br />
        <label for="url">Link URL:</label>
            <input type="text" name="url" /><br>
                    <select class="form-dropdown" id="group" name="group">
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
    </div>
</div>



</body>
</html>
