<?php
$link = mysqli_connect("localhost", "root", "", "guestbook");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($link, $_POST['name']);
$email = mysqli_real_escape_string($link, $_POST ['email']);
$rate = mysqli_real_escape_string($link, $_POST ['rate']);
$comment = mysqli_real_escape_string($link, $_POST ['comment']);

$sql = "INSERT INTO guest (name, email, rate, comment) VALUES ('$name', '$email', '$rate', '$comment')";

if(mysqli_query($link, $sql))
{
    echo "Thank you for your message and support! You will be redirected back to home after 5 seconds";
} else
{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>

<script type='text/javascript'>
    function delayedRedirect() {
        window.location = "index.html"
    }
</script>
<head>
    <style media="screen">
        * {
            text-align: center;
            margin-top: 150px;
        }
    </style>
</head>
<body onload="setTimeout('delayedRedirect()', 5000)"></body>
