<?php

/**
 * CV modal
 *
 * Method -> Delet CV info (UPDATE) Line ->85|
 * Method -> Extract CV src Line ->24|
 * Method -> Post a new cv Line ->52|
 * Method -> __construct Line ->12|
 */
class cvMod
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
     * ◙Extract CV src◘
     * 
     * @return mixed
     */
    public function getCvSrc()
    {
        try
        {                        
            if(($resource = $this->pdo->prepare('SELECT SUJET_INFO.cv_src FROM ARTICLE INNER JOIN SUJET_INFO ON ARTICLE.id = SUJET_INFO.id_ARTICLE ORDER BY SUJET_INFO.id DESC LIMIT 1;'))!==FALSE)
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
     * ◙Post a new cv◘
     * 
     * @param array $file
     * 
     * @return boolean
     */
    public function newCv($file)
    {
        $file = $file['cv'];
        
        $newPath = "./medias/".$file['name'];
        
        if(file_exists($newPath))
        {
            $a = rand(0,150);
            $newPath = "./medias/".$a.$file['name'];
        }
        
        if(move_uploaded_file($file['tmp_name'], $newPath))
        {
            if(($resource = $this->pdo->prepare('UPDATE SUJET_INFO SET cv_src = :liens'))!==FALSE)
            {
                if($resource->execute(["liens"=>$newPath]))
                {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * ◙Delet CV info (UPDATE)◘
     * 
     * @return boolean 
     */
    public function delCv()
    {        
        if(($resource = $this->pdo->prepare('UPDATE SUJET_INFO SET cv_src = NULL'))!==FALSE)
        {
            if($resource->execute())
            {
                return true;
            }
        }        
        
        return false;
    }
}