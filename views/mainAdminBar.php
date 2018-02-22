<?php

$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(!isset($_GET['c']))
{
    $a = "?";
}
else
{
    $a = "&";
}
?>

<div class="adminBar">
    <div style="padding-left: 10px; font-weight: bold; color: #111; font-size: 1.9rem;">  ADMIN : </div>
    <a href="<?php echo $link . $a . 'decon'; ?>">Fermer la Session</a>
</div>