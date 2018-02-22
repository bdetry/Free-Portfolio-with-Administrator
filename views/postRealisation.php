<div class="newReal">
    <form method="post" action="?c=realisation" enctype="multipart/form-data">
        <input type="hidden" name="execute" value="postRealAction">
        <input type="hidden" name="adminId" value="<?php echo $_SESSION['admin']['id']?>">
        <div>
            <input type="file" name="realImg">
        </div>
        <div>
            <input type="text" name="realTitle" placeholder="Title"><br>
            <textarea name="realDescrip" placeholder="Description"></textarea><br>
            <input type="text" name="realLinkTitle" placeholder="Link Title"><br>
            <input type="text" name="realLinkTitleSrc" placeholder="Title Src"><br>
            <input type="submit" value="Publier Realisaton">
        </div>
    </form>
</div>


<div class="delReal">
    <form method="post" action="?c=realisation">
    <input type="hidden" name="execute" value="delRealAction">
    <select name="toDel">
    <?php
    foreach($realisations as $realisation)
    {
        ?>
            <option value="<?php echo $realisation['id']; ?>"><?php echo $realisation['titre']; ?></option>
        <?php
    }    
    ?>
    </select><br>
    <input type="submit" value="Effacer Realisation">
    </form>
</div>