<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recstyle.css">
    <title>Document</title>
</head>
<body class="popo">
    <form action="" method="post">
    <div class="emem">
    Email: <input type="text" name="em"><br><br>
    <input type="submit" name="sb" class="butto">
    </div>
    </form>
    <?php
    $conn=mysqli_connect('localhost','root','','aksdb');
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['sb'])){
        $email=$_POST['em'];
        $query="SELECT * FROM orders WHERE Email='$email'";
        $run=mysqli_query($conn, $query);
        ?>
        <table class="tab">
            <tr>
                <th>Name</th>
                <th>Apples</th>
                <th>Banana</th>
                <th>Guava</th>
                <th>Orange</th>
                <th>Coconut</th>
                <th>Watermelon</th>
            </tr>
        <?php
        while($row = mysqli_fetch_assoc($run)){
        ?>
            <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Apples'];?></td>
                <td><?php echo $row['Banana'];?></td>
                <td><?php echo $row['Guava'];?></td>
                <td><?php echo $row['Orange'];?></td>
                <td><?php echo $row['Coconut'];?></td>
                <td><?php echo $row['Watermelon'];?></td>
            </tr>
            <?php
        }
    }
    ?>
</body>
</html>