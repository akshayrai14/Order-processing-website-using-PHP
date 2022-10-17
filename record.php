<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recstyle.css">
    <title>Order processing website</title>
</head>
<body class="bo">
    <form method="post" action="record.php">
        <div class="login">
        <h1>Login Details:- </h1>
        Name :<input type="text" name="nm" id="user" value=""><br><br>
        Email :<input type="text" name="em"><br><br>
        Phone :<input type="text" name="ph"><br><br>
        </div>
        <div class="basket">
        <h1>Fruit Basket:- </h1>
        Apples :<input type="text" name="ap"><br><br>
        Banana :<input type="text" name="ba"><br><br>
        Guava :<input type="text" name="gu"><br><br>
        Orange :<input type="text" name="or"><br><br>
        Coconut :<input type="text" name="co"><br><br>
        Watermelon :<input type="text" name="wa"><br><br>
        </div>
        <input type="submit" name="sb" class="butt">

    </form>
    <input type="button" class="ko" value="OrderHistory" onclick="myfunction()"/>
    <script>
        function myfunction()
        {
            var nm= document.getElementById('user').value;
            window.location.href=`show.php`;
        }
    </script>
    <?php
    $conn=mysqli_connect('localhost','root','','aksdb');
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['sb'])){
        $name=$_POST['nm'];
        $email=$_POST['em'];
        $phone=$_POST['ph'];
        $apples=$_POST['ap'];
        $banana=$_POST['ba'];
        $guava=$_POST['gu'];
        $orange=$_POST['or'];
        $coconut=$_POST['co'];
        $watermelon=$_POST['wa'];
        $query="INSERT INTO orders(Name,Email,Phone,Apples,Banana,Guava,Orange,Coconut,Watermelon) VALUES ('$name','$email','$phone','$apples','$banana','$guava','$orange','$coconut','$watermelon')";
        $handle = fopen("fileop.txt","w");
        $run=mysqli_query($conn, $query);
        $query1="SELECT * FROM orders";
        $run=mysqli_query($conn, $query1);
        while($row = mysqli_fetch_assoc($run)){
            $string =implode(' ',$row).PHP_EOL;
            fwrite($handle,$string);
        }
    }
    ?>
</body>
</html>