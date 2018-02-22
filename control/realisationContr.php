<?php


/**
 * Realisation controller
 *
 * Method -> Delete a realisation Line ->70|
 * Method -> Post a new Realisation Line ->88|
 * Method -> Show Go Back Line ->131|
 * Method -> Show Realisation Line ->26|
 * Method -> Show admin bar Line ->120|
 * Method -> Show admin post new Line ->107|
 * Method -> Show htlm head Line ->153|
 * Method -> Show html footer Line ->164|
 * Method -> Show main body Line ->57|
 * Method -> Show main menu Line ->142|
 * Method -> __construct Line ->14|
 */

 
class realisationContr
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
        $this->modal = new realisationMod($pdo);
    }
    
    /**
     * ◙Show Realisation◘
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
        
        $allReal = $this->modal->allReals();
        
        if($session)
        {
            $this->ShowPostReal($allReal);
        }
        
        $this->ShowMain($allReal);
        
        $this->ShowFoot();
    }
    
    
    /**
     * ◙Show main body◘
     * 
     * @param array $allReals
     * 
     * @return none
     */
    public function ShowMain($allReals)
    {
        require_once('./views/allReals.php');
    }
    
    
    /**
     * ◙Delete a realisation◘
     * 
     * @param array $params id to delete
     * 
     * @return boolean    true if well executed
     */
    public function delRealAction($params)
    {
        if($this->modal->delReal($params))
        {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * ◙Post a new Realisation◘
     * 
     * @param array $params new article info
     * 
     * @return boolean    true if well executed
     */
    public function postRealAction($params)
    {
        $file = $_FILES['realImg'];
        
        if($this->modal->postReal($params ,  $file))
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙Show admin post new◘
     * 
     * @param array $realisations all reals
     * 
     * @return none
     */
    public function ShowPostReal($realisations)
    {
        require_once('./views/postRealisation.php');
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
     * ◙Show Go Back◘
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
     * ◙Show htlm head◘
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