<?php

$conn = new mysqli("localhost","whxpykvf_brains","brainskhan786","whxpykvf_data");
    if (!$conn) {
        echo "Error in Connection..";
    } else {
        $name = $_POST['name'];
        $whatsapp = $_POST['email'];
        $phone =  $_POST['phone'];
        $course =  $_POST['subject'];
        $branch = $_POST['branch'];
        $sql = "INSERT INTO `student`(`id`, `name`, `whatsapp`, `phone`, `course`, `branch`) VALUES (null,'$name','$whatsapp','$phone','$course','$branch')";
        mysqli_query($conn, $sql);
        
        echo "
            <script>
                alert('Your data has been submitted. Thank you for your interest!');
                window.location.href='index.html';
            </script>
        ";

    }
    

?>