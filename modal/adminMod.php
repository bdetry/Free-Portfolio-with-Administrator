<?php

/**
 * Admin Modal
 * Method -> Make session Line ->24|
 * Method -> __construct Line ->11|
 */
class AdminMod
{
    private $pdo;
     /**
     * ◙__construct◘
     * 
     * @param object $pdo database connect
     * 
     * @return none
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    
    /**
     * ◙Make session◘
     * 
     * @param string $log
     * @param string $pass
     * 
     * @return boolean    
     */
    public function createSess($log , $pass)
    {
        try
        {                        
            if(($resource = $this->pdo->prepare('SELECT * FROM ADMIN WHERE login =:login'))!==FALSE)
            {          
                if($resource->execute(array("login"=>$log)))
                {
                    if(($data = $resource->fetch( PDO::FETCH_ASSOC ))!==FALSE)
                    {
                        if(!empty($data["pass"]))
                        {
                            if(password_verify($pass, ''.$data["pass"].'')===true)
                            {
                                $_SESSION['admin']=$data; // temp
                                return true;
                            }
                        }                        
                    }
                }
            }
            
            return false;
        }
        catch(PDOException $msg)
        {
            die($msg->getMessage());
        }
    }
}

