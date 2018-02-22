<main>
    <?php
    foreach($allReals as $real)
    {
        ?>
    <article>
        <div>
            <h3><?php echo $real['titre']; ?></h3>
            <p><?php echo $real['desc_rip']; ?></p>
            
            <?php            
            if(!is_null($real['lien_src']))
            {
                echo "<a href='".$real['lien_src']."' title='".$real['lien_title']."'>Voir Plus</a>";
            }            
            ?>
        </div>
        
        <div>
            <img src="<?php echo $real['img_src']; ?>">
        </div>
    </article>
        <?php
    }    
    ?>
</main>