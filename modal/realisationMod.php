<?php

/**
 * Realisation Modal
 * 
 * Method -> Delete realisations Line ->48|
 * Method -> Extract all Realisations Line ->23|
 * Method -> Post new realisation Line ->74|
 * Method -> __construct Line ->11|
 */
class realisationMod
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
     * ◙Extract all Realisations◘
     * 
     * @return mixed 
     */
    public function allReals()
    {
        try
        {                        
            if(($resource = $this->pdo->query('SELECT * FROM REALISATION INNER JOIN ARTICLE ON REALISATION.id_ARTICLE = ARTICLE.id'))!==FALSE)
            {
                if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
                {
                  return $data;
                }
            }
        }
        catch(PDOException $msg)
        {
            die($msg->getMessage());
        }
        
        return false;
    }
    
    /**
     * ◙Delete realisations◘
     * 
     * @param array $param id to delete
     * 
     * @return boolean    true if well executed
     */
    public function delReal($param)
    {
        if(($resource = $this->pdo->prepare('DELETE FROM REALISATION WHERE id_ARTICLE = :id'))!==FALSE)
        {
            if($resource->execute(array("id"=>$param['toDel'])))                                 
            {
                if(($resource = $this->pdo->prepare('DELETE FROM ARTICLE WHERE id = :id2'))!==FALSE)
                {
                    if($resource->execute(array("id2"=>$param['toDel'])))                                 
                    {
                        return true;
                    }
                }                
            }            
        }
        
        return false;
    }
    
    /**
     * ◙Post new realisation◘
     * 
     * @param array $newInfo
     * @param array $newImg
     * 
     * @return boolean
     */
    public function postReal($newInfo , $newImg)
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
                if($newInfo['realTitle']!="" AND $newInfo['realDescrip']!="")
                {
                    if(($resource = $this->pdo->prepare('INSERT INTO ARTICLE(date_publie , titre , desc_rip, img_src, id_ADMIN) VALUES(NOW() , :titre , :desc_rip, :img_src, :id_ADMIN);'))!==FALSE)
                    {
                        if($resource->execute([                                              
                                              "titre"=>$newInfo['realTitle'],
                                              "desc_rip"=>$newInfo['realDescrip'],
                                              "img_src"=>$newPath,
                                              "id_ADMIN"=>$newInfo['adminId']
                                              
                                              ]))
                        {
                            $articleID = $this->pdo->lastInsertId();
                            
                            if(($resource = $this->pdo->prepare('INSERT INTO REALISATION(lien_src, lien_title, id_ARTICLE) VALUES(:lien_src, :lien_title, :id_ARTICLE);'))!==FALSE)
                            {
                                if($resource->execute([
                                                        "lien_src"=>$newInfo['realLinkTitleSrc'],
                                                       "lien_title"=>$newInfo['realLinkTitle'],
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
    }
}