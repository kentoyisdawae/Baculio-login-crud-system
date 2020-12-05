<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.cssom/bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src="main.js"></script>
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
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){-
            $('[data-toggle="tooltip"]3.').tooltip();   
        });
    </script>
</head>
<body>
	 <div id="sidebar">
			<div class="toggle" onclick="toggleSideBar()">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<ul>
				<li><a href="index2.html">Home</a></li>
				<li onclick="wew()"><a style="color: white">Records</a></li>	
				<li><a href="Setting.html">Setting</a></li>
			</ul>

		</div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Records Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Record</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Bill</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>