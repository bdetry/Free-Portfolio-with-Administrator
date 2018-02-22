<?php

   if(isset($_GET['c']))
   {
      $css = $_GET['c'];
   }
   else
   {
      $css = "main";
   }

?>

<!DOCTYPE html>
    
<html lang="en">
<head>
   <title>Lorem ipsum</title>
   <meta type="description" content="lorem ipsum">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style/<?php echo $css; ?>.css" />
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900" rel="stylesheet">
   <link rel="icon" href="" type="image/x-icon">
</head>
    
<body>    

