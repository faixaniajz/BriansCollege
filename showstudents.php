<!DOCTYPE html>
<html lang="en">

<head>
    <title>Students Data</title>
</head>

<body>

    <?php

$conn = new mysqli("localhost","whxpykvf_brains","brainskhan786","whxpykvf_data");
if(!$conn)
{
	echo "Error in Connection";
}
else
{
$sql = "Select * from student";
$result = mysqli_query($conn,$sql);
?>
    <h1> List of Students - <a href="adminform.php">Logout</a></h1>
    <table border="1" cellpadding="10" width="50%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Whatsapp</th>
                <th>Phone Number</th>
                <th>Subject</th>
                <th>Branch</th>
            </tr>
        </thead>
        <tbody>
            <?php
		while($row = mysqli_fetch_assoc($result))
		{
		?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["whatsapp"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><?php echo $row["course"];?></td>
                <td><?php echo $row["branch"];?></td>
            </tr>
            <?php
	}
	?>
        </tbody>
    </table>
    <?php	
}
?>

</body>

</html>