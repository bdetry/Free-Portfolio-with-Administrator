<?php

/**
 * Main Controller
 * 
 * Method -> Add link to database Line ->116|
 * Method -> Array from string - Links  Line ->185|
 * Method -> Delete link from databese Line ->90|
 * Method -> Html Head Line ->216|
 * Method -> Html foot Line ->226|
 * Method -> Main Construct Line ->15|
 * Method -> Main Show Line ->27|
 * Method -> Post Intro Line ->72|
 * Method -> Show Admin Bar Line ->62|
 * Method -> Show Info Editor for admin Line ->154|
 * Method -> Show link administrator Line ->142|
 * Method -> Show links Line ->175|
 * Method -> Show main body Line ->204|
 * Method -> Show main menu Line ->165| *
 */


class mainContr
{
    private $modal;
    
    /**
     * ◙Main Construct◘
     * 
     * @param object $pdo DataBade connexion
     * 
     * @return none
     */
    public function __construct($pdo)
    {
        $this->modal = new MainMod($pdo);
    }
    
    /**
     * ◙Main Show◘
     * 
     * @param boolean $session true if we have a session['admin']
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
        
        $this->ShowMe($this->modal->getSubjectInfo());
        
        if($session)
        {
            $this->ShowMeAdmin();   
        }
        
        $this->ShowMenu();
        $this->ShowLinks($this->extractLinks($this->modal->getSubjectInfo()['array_liens']));
        
        if($session)
        {
            $this->ShowLinksAdmin($this->extractLinks($this->modal->getSubjectInfo()['array_liens']));   
        }
        
        $this->ShowFoot();
    }
    
    
    /**
     * ◙Show Admin Bar◘
     *
     * @return none 
     */
    public function ShowAdminBar()
    {
        require_once('./views/mainAdminBar.php');
    }
    
    /**
     * ◙Post Intro◘
     * 
     * @param array $params post from form
     * 
     * @return boolean true if well executed
     */
    public function postIntroAction($params)
    {
        $imgSrc = $_FILES['newImg'];
        if($this->modal->postIntro($params , $imgSrc))
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙Delete link from databese◘
     * 
     * @param int $toDel index in array to delete
     * 
     * @return boolean    true if well executed
     */
    public function DelLinkAction($toDel)
    {
        $links = $this->extractLinks($this->modal->getSubjectInfo()['array_liens']);
        unset($links[(int)$toDel]);        
        $str=[];
        foreach($links as $link)
        {
            $str[] .= implode(";;", $link);
        }        
        $newLinks = implode(" --- ", $str);
        
        if($this->modal->deletLink($newLinks))
        {
            return true;
        }
        
        return false;
    }    
   
   /**
    * ◙Add link to database◘
    * 
    * @param array $newLink new info from form
    * 
    * @return boolean    true if well executed
    */
    public function AddLinkAction($newLink)
    {
        $newImg = "medias/".$_FILES['newImglink']['name'];
        $newImgTmp = $_FILES['newImglink']['tmp_name'];
        $newTitle = $newLink['newLinkTitle'];
        $newLink = $newLink['newLink'];
        $separateur = " --- ";
        
        $insert = $this->modal->getSubjectInfo()['array_liens'] . $separateur . $newTitle . ";;" . $newImg . ";;" . $newLink ;
        
        if($this->modal->addLink($insert))
        {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * ◙Show link administrator◘
     * 
     * @param array $AllLinks 
     * 
     * @return none
     */
    public function ShowLinksAdmin($AllLinks)
    {
        require_once('./views/newLinksAdmin.php');
    }
    
    /**
     * ◙Show Info Editor for admin◘
     * 
     * @return Type    Description
     */
    public function ShowMeAdmin()
    {
        require_once('./views/newInfoAdmin.php');
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
     * ◙Show links◘
     * 
     * @return none
     */
    public function ShowLinks(array $linkArray)
    {
        require_once('./views/mainLinks.php');
    }    
    
    /**
     * ◙Array from string - Links ◘
     * 
     * @param string $LiensStr
     * 
     * @return array  links in array
     */
    public function extractLinks($LiensStr)
    {         
        $exploded = explode(" --- " , $LiensStr);
        
        foreach($exploded as $allLink)
        {
            $link[] = explode(";;" , $allLink);
        }
        
        return $link;        
    }
    
    /**
     * ◙Show main body◘
     * 
     * @param array $subjetInfo
     * 
     * @return none
     */
    public function ShowMe($subjetInfo)
    {
        require_once('./views/mainMe.php');
    }
    
    /**
     * ◙Html Head◘
     * 
     * @return none
     */
    public function ShowHead()
    {
        require_once('./views/head.php');
    }
    
    /**
     * ◙Html foot◘
     * 
     * @return none
     */
    public function ShowFoot()
    {
        require_once('./views/foot.php');
    }
    
}