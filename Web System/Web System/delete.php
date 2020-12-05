<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{
            background-image: url(back4.jpg);
            background-repeat: no-repeat;
        }
        #sidebar
        {
            position: fixed;
            width: 200px;
            height: 100%;
            background-color: rgba(255,255,255,0.3);
            left: -200px;
            transition: all 500ms linear;
        }
        #sidebar.active
        {
            left: 0px;
        }
        #sidebar ul li{
            padding: 30px 20px;
            list-style: none;
            text-decoration: none;
        }
        #sidebar ul li a
        {
            color: black;   
            text-decoration: none;
            border-bottom: 1px solid rgba(100,100,100,0.3);
            transition: .5s;
            font-size: 30px;
            cursor: pointer;    
        }

        #sidebar ul li a:hover{
            color: #303030;

        }
        #sidebar .toggle
        {
            position: absolute;
            left: 230px;
            top: 20px;

        }
        #sidebar .toggle span
        {
            display: block;
            width: 30px;
            height: 5px;
            background-color: black;
            margin: 3px 0px;
            
        }
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div id="sidebar">
            <div class="toggle" onclick="toggleSideBar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="index2.php">Home</a></li>
                <li onclick="wew()"><a style="color: white">Records</a></li>    
                <li><a href="Setting.php">Setting</a></li>
            </ul>

        </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="record.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>