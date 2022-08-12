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
    
    <div class="">
        <div class="row">
            <div class="col-md-4 left">
                 <div class="left1">
                    <h2>Vehicle owner identification system</h2>
                 </div>   
            </div> 

            <div class="col-md-8 right">
            
                
                <div class="home">
                    <a><?php echo( "<button class='btn btn-primary' onclick= \"location.href='index.php'\">Home</button>");?>
                    </a>
                
                
                    <a><?php echo( "<button class='btn btn-primary' onclick= \"location.href='search.php'\">Search Info</button>");?>
                    </a>
            
                </div>
            

            <div class="text-center col-md-12"><h2>Import Vehicle List</h2></div>
    
            <!-- Display status message -->
            <?php if(!empty($statusMsg)){ ?>
            <div class="col-xs-12">
                <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
            </div>
            <?php } ?>


            <div class="row">
            <!-- Import link -->
            <div class="col-md-12 head">
                <div class=" text-center">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
                </div>
            </div>
            <!-- CSV file upload form -->
            <div class="col-md-12" id="importFrm" style="display: none;">
                <form action="importData.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" />
                    <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                </form>
            </div>
            </div>
            </div> 
            
       </div>
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