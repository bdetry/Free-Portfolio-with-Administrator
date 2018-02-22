<?php
if(!is_null($cvSrc['cv_src']))
{
    ?>
    <main>
    <div>
        <a href="<?php echo $cvSrc['cv_src']; ?>" download>Telecharger</a>
    </div>
    <iframe src="<?php echo $cvSrc['cv_src'];?>">
        
    </iframe>
    </main>
    <?php
}
else
{
    ?>
    <div class="NoCv">CV non disponible</div>
    <?php
}
