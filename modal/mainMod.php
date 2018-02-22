<?php

/**
 * Main Modal
 * 
 * Method -> Add link (UPDATE) Line ->133|
 * Method -> Delete link (UPDATE) Line ->112|
 * Method -> Extract all info from subject Line ->26|
 * Method -> Post a new intro Line ->54|
 * Method -> __construct Line ->13|
 */
class MainMod
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
     * ◙Extract all info from subject◘
     * 
     * @return mixed    array:all the info / false if error
     */
    public function getSubjectInfo()
    {
        try
        {                        
            if(($resource = $this->pdo->prepare('SELECT * FROM ARTICLE INNER JOIN SUJET_INFO ON ARTICLE.id = SUJET_INFO.id_ARTICLE ORDER BY SUJET_INFO.id DESC LIMIT 1;'))!==FALSE)
            {              
                if($resource->execute())
                {
                    if(($data = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                    {
                        return $data;
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
    
    /**
     * ◙Post a new intro◘
     * 
     * @param array $newInfo
     * @param array $newImg 
     * 
     * @return boolean   true if well executed
     */
    public function postIntro($newInfo ,  $newImg)
    {
        $newPath = "./medias/".$newImg['name'];
        
        if(file_exists($newPath))
        {
            $a = rand(0,150);
            $newPath = "./medias/rand".$a.$newImg['name'];
        }
        
        if(substr($newImg['type'] , 0 , 5)=="image")
        {
            if(move_uploaded_file($newImg['tmp_name'], $newPath))
            {
                if($newInfo['newTitle']!="" AND $newInfo['newDescrip']!="")
                {
                    if(($resource = $this->pdo->prepare('INSERT INTO ARTICLE(date_publie , titre , desc_rip, img_src, id_ADMIN) VALUES(NOW() , :titre , :desc_rip, :img_src, :id_ADMIN);'))!==FALSE)
                    {
                        if($resource->execute([                                              
                                              "titre"=>$newInfo['newTitle'],
                                              "desc_rip"=>$newInfo['newDescrip'],
                                              "img_src"=>$newPath,
                                              "id_ADMIN"=>$newInfo['adminId']
                                              
                                              ]))
                        {
                            $articleID = $this->pdo->lastInsertId();
                            
                            if(($resource = $this->pdo->prepare('INSERT INTO SUJET_INFO(info1 , info2 , id_ARTICLE) VALUES(:info1 , :info2 , :id_ARTICLE);'))!==FALSE)
                            {
                                if($resource->execute([
                                                       "info1"=>$newInfo['newInfo1'],
                                                       "info2"=>$newInfo['newInfo2'],
                                                       "id_ARTICLE"=>$articleID
                                                       ]))
                                {
                                    return true;
                                }
                            }
                            
                        }
                    }
                }
            }
        }
        
        return false;
    }
    
    
    /**
     * ◙Delete link (UPDATE)◘
     * 
     * @param string $newStr the new link str
     * 
     * @return boolean    true if well executed
     */
    public function deletLink($newStr)
    {
        if(($resource = $this->pdo->prepare('UPDATE SUJET_INFO SET array_liens = :str'))!==FALSE)
            {
                if($resource->execute(["str"=>$newStr]))
                {
                    return true;
                }
            }
            
            return false;
    }
    
    
    /**
     * ◙Add link (UPDATE)◘
     * 
     * @param array $newLink
     * 
     * @return boolean    true if well executed
     */
    public function addLink($newLink)
    {
        if(($resource = $this->pdo->prepare('UPDATE SUJET_INFO SET array_liens = :str'))!==FALSE)
            {
                if($resource->execute(["str"=>$newLink]))
                {
                    return true;
                }
            }
            
            return false;
    }
    
}