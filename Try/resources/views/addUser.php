<!DOCTYPE html>
<html>

<head>
    <title> Login Page </title>
    <style>
        Body {
            background-color: black;
        }

        button {
            background-color: #2D2926FF;
            width: 100%;
            color: orange;
            padding: 15px;
            margin: 10px 0px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid blue;
            box-sizing: border-box;
        }

        .container {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 25px;
        }

        .box {
            padding-left: 25px;
            padding-right: 25px;
        }

        h1 {
            color: lightblue;
        }
    </style>
</head>

<body>
    <form action="insert" method="post">
        <div class="container">
            <center>
                <h1>ADD NEW USER</h1>
            </center>
            <label>Username : </label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label>Password : </label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">ADD</button>
        </div>
    </form>

    <form action="login" method="get">
        <div class="box">
            <button type="submit">BACK</button>

        </div>

    </form>


</body>

</html>