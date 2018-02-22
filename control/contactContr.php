<?php


/**
 * Contact Controller
 *
 * Method -> Send Email Line ->61|
 * Method -> Show Bck Bottom Line ->30|
 * Method -> Show Contact Line ->14|
 * Method -> Show contact form Line ->40|
 * Method -> Show html footer Line ->94|
 * Method -> Show html head Line ->84|
 * Method -> Show main menu Line ->50|
 */

class contactContr
{
    
    /**
     * ◙Show Contact◘
     * 
     * @param boolean $session true if their is a session
     * 
     * @return none
     */
    public function ShowCom($session)
    {
        $this->ShowHead();
        $this->ShowMenu();
        $this->ShowGoBack();
        $this->ShowForm();
        $this->ShowFoot();
    }
    
    /**
     * ◙Show Bck Bottom◘
     * 
     * @return none
     */
    public function ShowGoBack()
    {
        require_once('./views/goBack.php');
    }
    
    /**
     * ◙Show contact form◘
     * 
     * @return none
     */
    public function ShowForm()
    {
        require_once('./views/contactForm.php');
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
     * ◙Send Email◘
     * 
     * @param array $params email and user info
     * 
     * @return boolean    true if well executed
     */
    public function emailMeAction($params)
    {        
        $to = CONTACT_ME;
        $sub= $params['userSubj'];
        $body=  "From : ".$params['userName'] . PHP_EOL . $params['userBody'];
        $userMail = $params['userMail'];
        $headers = 'From: '.$userMail.'' . "\r\n" . 'Reply-To: '.$userMail.'' . "\r\n";
        
        if(mail($to , $sub , $body , $headers))
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * ◙Show html head◘
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