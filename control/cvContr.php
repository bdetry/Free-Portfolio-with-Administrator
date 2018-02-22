<?php

/**
 * CV controller
 *
 * Method -> Delet CV Line ->97|
 * Method -> Post new CV Line ->80|
 * Method -> Show CV Line ->27|
 * Method -> Show admin bar Line ->112|
 * Method -> Show admin tab Line ->69|
 * Method -> Show back bottom Line ->122|
 * Method -> Show html footer Line ->152|
 * Method -> Show html header Line ->142|
 * Method -> Show main body Line ->56|
 * Method -> Show main menu Line ->132|
 * Method -> __construct Line ->14|
 */
class cvContr
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
        $this->modal = new cvMod($pdo);
    }
    
    
    /**
     * ◙Show CV◘
     * 
     * @param array $session
     * 
     * @return none
     */
    public function ShowCom($session)
    {
        $this->ShowHead();
        if($session)
        {
            $this->ShowAdminBar();   
        }
        
        $this->ShowMenu();
        $this->ShowGoBack();
        
        $this->showMain($this->modal->getCvSrc());
        
        if($session)
        {
            $this->ShowCvAdmin();
        }
        
        
        $this->ShowFoot();
    }
    
    /**
     * ◙Show main body◘
     * 
     * @param array $cvSrc
     * 
     * @return none
     */
    public function showMain($cvSrc)
    {
        require_once('./views/cvMain.php');
    }
    
    
    /**
     * ◙Show admin tab◘
     * 
     * @return none
     */
    public function ShowCvAdmin()
    {
        require_once('./views/cvAdmin.php');
    }
    
    
    /**
     * ◙Post new CV◘
     * 
     * @param array $params file info
     * 
     * @return boolean  
     */
    public function postCvAction($params)
    {
        if($this->modal->newCv($params))
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙Delet CV◘
     * 
     * @return boolean 
     */
    public function delCvAction()
    {
        if($this->modal->delCv())
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙Show admin bar◘
     * 
     * @return none
     */
    public function ShowAdminBar()
    {
        require_once('./views/mainAdminBar.php');
    }
    
    /**
     * ◙Show back bottom◘
     * 
     * @return none
     */
    public function ShowGoBack()
    {
        require_once('./views/goBack.php');
    }
   
    /**
     * ◙Show main menu◘
     * 
     * @return none
     */
    public function ShowMenu()
    {
        require_once('./views/mainMenu.php');
    }    

    /**
     * ◙Show html header◘
     * 
     * @return none
     */
    public function ShowHead()
    {
        require_once('./views/head.php');
    }
    
    /**
     * ◙Show html footer◘
     * 
     * @return none
     */
    public function ShowFoot()
    {
        require_once('./views/foot.php');
    }    
}