<?php 
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Vehicle Data from Csv file</title>
    <!-- <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link  href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600,800&display=swap">
 
</head>
<body>
    
    <div class="container">
       
    <div class="col-md-6 search"><a><?php echo( "<button class='btn btn-primary' onclick= \"location.href='index.php'\">Home</button>");?></a></div>
    <div class="col-md-6"><h2>Vehicle List:</h2></div>
    
    <?php if(!empty($statusMsg)){ ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
    </div>
    <?php } ?>


    <div class="row">
     <table class="table table-striped table-bordered " id="example">
        <thead class="thead-dark">
            <tr>
                <th>#id</th>
                <th>Owner Name</th>
                <th>Phone Number:</th>
                <th>Owner Email:</th>
                <th>Owner Address:</th>
                <th>Number Plate:</th>
                <th>Model:</th>
                <th>Speed:</th>
                <th>Fine:</th>
                <th>Status:</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        $result = $db->query("SELECT * FROM abul ORDER BY id DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['vnplate']; ?></td>
                <td><?php echo $row['vmodel']; ?></td>
                <td><?php echo $row['speed']; ?></td>
                <td><?php echo $row['fine']; ?></td>
                <td><?php $t = $row['speed'];
                if ($t < "81") {
                echo "<div style='green:red;'>normal</div>";
                } else {
                echo "<div style='color:red;'>Over Speed</div>" . $t - "80"; 
                } ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table> 
</div>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
  
</script>
<script src="./assets/js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
      $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>