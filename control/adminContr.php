<?php

/**
 * Admin controller
 * 
 * Method -> Connect admin Line ->63|
 * Method -> Show admin Line ->27|
 * Method -> Show admin Log In Line ->51|
 * Method -> __construct Line ->13|
 */
class adminContr
{
    private $modal;
    
    
    /**
     * ◙__construct◘
     * 
     * @param object $pdo database connection
     * 
     * @return none
     */
    public function __construct($pdo)
    {
        $this->modal = new AdminMod($pdo);
    }
    
    
    
    /**
     * ◙Show admin◘
     * 
     * @param boolean $session true if admin is connected
     * 
     * @return mixed    true if we have a session
     */
    public function ShowCom($session)
    {
        if($session)
        {
            return true;
        }
        else
        {
            $this->showNotConnect();
        }
    }
    
    public function showNotConnect()
    {
        $this->showConnectForm();
    }    
    
    /**
     * ◙Show admin Log In◘
     * 
     * @return none
     */
    public function showConnectForm()
    {
        require_once('./views/adminLogIn.php');        
    }
    
    
    
    /**
     * ◙Connect admin◘
     * 
     * @param array $param_array admin conectio params
     * 
     * @return boolean true if well executed
     */
    public function connectAction($param_array)
    {
        $log = $param_array["login"];
        $mail= $param_array["pass"];
        
        if($this->modal->createSess($log , $mail))
        {
            return true;
        }
        echo "<hr>Identifiants non trouves";
        return false;
    }
}