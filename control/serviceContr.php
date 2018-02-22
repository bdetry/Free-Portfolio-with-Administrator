<?php

/**
 * Service controller
 *
 * Method -> Delete a service Line ->75|
 * Method -> Post a service Line ->55|
 * Method -> SHow main body Line ->92|
 * Method -> Show Services Line ->27|
 * Method -> Show admin bar Line ->104|
 * Method -> Show admin post service Line ->114|
 * Method -> Show back bottom Line ->124|
 * Method -> Show html footer Line ->154|
 * Method -> Show html header Line ->144|
 * Method -> Show main menu Line ->134|
 * Method -> __construct Line ->14|
 */
class serviceContr
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
        $this->modal = new ServiceMod($pdo);
    }
    
    
    /**
     * ◙Show Services◘
     * 
     * @param boolean $session true if session['admin']
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
        
        if($session)
        {
            $this->ShowPostService($this->modal->allServices());
        }
        
        $this->ShowMain($this->modal->allServices());
        
        $this->ShowFoot();
    }
    
    /**
     * ◙Post a service◘
     * 
     * @param array $params service info
     * 
     * @return boolean    true if well executed
     */
    public function postServiceAction($params)
    {
        $file = $_FILES['serviceImg'];
        
        if($this->modal->postService($params ,  $file))
        {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * ◙Delete a service◘
     * 
     * @param array $param id to delete
     * 
     * @return bollean    true if well executed
     */
    public function delServiceAction($param)
    {
        if($this->modal->delService($param))
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙SHow main body◘
     * 
     * @param array $allServices
     * 
     * @return none
     */
    public function ShowMain($allServices)
    {
         require_once('./views/allServices.php');
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
     * ◙Show admin post service◘
     * 
     * @return none
     */
    public function ShowPostService($services)
    {
        require_once('./views/postService.php');
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