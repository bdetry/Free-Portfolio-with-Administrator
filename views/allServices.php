<main>
    <?php
    foreach($allServices as $service)
    {
        ?>
    <article>
        <div>
            <img src="<?php echo $service['img_src']; ?>">
        </div>
        <div>
            <h3><?php echo $service['titre']; ?></h3>
            <p><?php echo $service['desc_rip']; ?></p>
        </div>
    </article>
        <?php
    }    
    ?>
</main>