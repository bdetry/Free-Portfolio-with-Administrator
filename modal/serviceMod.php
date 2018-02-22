<?php
/**
 * Services Mod
 * Method -> Delete a service Line ->78|
 * Method -> Extract all services Line ->105|
 * Method -> Post a new Service Line ->23|
 * Method -> __construct Line ->10|
 */
class ServiceMod
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
     * ◙Post a new Service◘
     * 
     * @param array $newInfo
     * @param array $newImg
     * 
     * @return boolean
     */
    public function postService($newInfo ,  $newImg)
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
                if($newInfo['serviceTitle']!="" AND $newInfo['serviceDescrip']!="")
                {
                    if(($resource = $this->pdo->prepare('INSERT INTO ARTICLE(date_publie , titre , desc_rip, img_src, id_ADMIN) VALUES(NOW() , :titre , :desc_rip, :img_src, :id_ADMIN);'))!==FALSE)
                    {
                        if($resource->execute([                                              
                                              "titre"=>$newInfo['serviceTitle'],
                                              "desc_rip"=>$newInfo['serviceDescrip'],
                                              "img_src"=>$newPath,
                                              "id_ADMIN"=>$newInfo['adminId']
                                              
                                              ]))
                        {
                            $articleID = $this->pdo->lastInsertId();
                            
                            if(($resource = $this->pdo->prepare('INSERT INTO SERVICES(id_ARTICLE) VALUES(:id_ARTICLE);'))!==FALSE)
                            {
                                if($resource->execute([
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
     * ◙Delete a service◘
     * 
     * @param array $param
     * 
     * @return boolean
     */
    public function delService($param)
    {
        
        if(($resource = $this->pdo->prepare('DELETE FROM SERVICES WHERE id_ARTICLE = :id'))!==FALSE)
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
     * ◙Extract all services◘
     * 
     * @return mixed    array if well executed
     */
    public function allServices()
    {
            try
            {                        
                if(($resource = $this->pdo->query('SELECT * FROM SERVICES INNER JOIN ARTICLE ON SERVICES.id_ARTICLE = ARTICLE.id'))!==FALSE)
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
}