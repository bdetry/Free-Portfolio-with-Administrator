<main>
    <article>
        <figure>
            <img alt="" src="<?php echo $subjetInfo['img_src']; ?>">
        </figure>
        <div id="containInfo">
            <div><?php echo $subjetInfo['titre']; ?></div>
            <div><?php echo $subjetInfo['desc_rip']; ?></div>
            <div><?php echo $subjetInfo['info1'] . " - " . $subjetInfo['info2']; ?></div>
        </div>
    </article>    
</main>

<?php // var_dump($subjetInfo); ?>