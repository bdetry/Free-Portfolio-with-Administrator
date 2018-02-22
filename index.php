<?php
session_start();

if(isset($_GET['decon']))
{
    unset($_SESSION['admin']);
    header('Location: index.php?c=main'); //redirige sur main a chauqe action
     exit;
}

if(isset($_SESSION['admin']) AND isset($_GET['c']) AND $_GET['c']=="admin")
{
     header('Location: index.php?c=main'); //redirige sur main a chauqe action
     exit;
}


require_once("./conf/config.php");

$control = null;
if(isset($_GET['c']))
{
    $control = $_GET['c'] . "Contr";
}
else
{
    $control = "mainContr";
}

$modal = null;
if(isset($_GET['c']))
{
    $modal = $_GET['c'] . "Mod";
}
else
{
    $modal = "mainMod";
}

if(file_exists("./control/".$control.".php")) 
{
    require_once("./conf/SPDO.php");//CHARGEMENT SPDO
    $pdo = SPDO::getInstance(DB_HOST, DB_NAME, DB_USER , DB_PASS)->getPDO();
    
    
    require_once("./control/".$control.".php");//CHARGEMENT CONTROL
    
        if(file_exists("./modal/".$modal.".php"))
        {
            require_once("./modal/".$modal.".php");//CHARGEMENT MODAL 
        }
        
    $session=false;
    if(isset($_SESSION['admin']))
        $session=true;
    
    $controller = new $control($pdo);
    
    if(isset($_POST['execute']) AND $_POST['execute']!="" AND !is_null($_POST['execute'])) // test execution d'action quand on a des POST
    {
        $method = $_POST['execute'];
        
        $params=[];
        foreach($_POST as $key => $param)
        {
            if($param!=$method)
            {
                $params[$key]=$param;
            }
        }
        
        
            if(isset($_FILES))
            {
                foreach($_FILES as $key => $file)
                {
                    if($file!=$method)
                    {
                        $params[$key]=$file;
                    }
                }
            }
        

        
        
        if(!in_array("",$params))
        {        
            if(method_exists($controller , $method))
            {
                if($controller->$method($params))
                {                    
                    if(isset($_GET['c']))
                    {
                        $a = $_GET['c'];
                    }
                    else
                    {
                        $a = "main";
                    }
                    
                   // header('Location: index.php?c='.$a); //redirige sur lui meme a chaque action
                    //exit;
                    ?>
                        <script type="text/javascript">
                            window.location.href = "index.php?c=<?php echo $a; ?>";
                        </script>
                    <?php
                }
                else
                {
                    echo "<div style='position: absolute; z-index:10; color:red; font-size:1.8rem;background-color: #fff;padding:10px;'><hr>Une methode demande n'a pas ete execute</div>";
                }
            }
            else
            {
                echo "<div style='position: absolute; z-index:10; color:red; font-size:1.8rem;background-color: #fff;padding:10px;'><hr>Une methode demande n'a pas ete ateinte</div>";
            }   
        }
        else
        {
           echo "<div style='position: fixed; z-index:10; color:red; font-size:1.8rem; background-color: #fff; padding:10px;'>L'un des parametres transmit est vide ou null</div>";
        }
    }
    
    $controller->ShowCom($session);
    
}
else
{
    header('Location: 404');
}

