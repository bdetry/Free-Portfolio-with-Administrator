<div class="linkCotainer">
    <?php    
        foreach($linkArray as $completeLink)
        {
            if(isset($completeLink[2]) AND $completeLink[2]!="")
            {
                echo "<a target='_blank' title='".$completeLink[0]."' href='".$completeLink[2]."' style='background-image: url(".$completeLink[1].");'></a>"; 
            }
           
        }    
    ?>
</div>