<div class="adminLinks">
    <div>
    <form method="post" action="?c=main">
        <input type="hidden" name="execute" value="DelLinkAction">
    <select name="delLink">
    <?php
    foreach($AllLinks as $key => $link)
    {
    ?>
        <option value="<?php echo $key; ?>"><?php echo $link['0']; ?></option>
    <?php
    }
    ?>
    </select><br>
    <input type="submit" value="Suprimer">
    </form>
    </div>
    
    <div>
        <form method="post" action="?c=main" enctype="multipart/form-data">
            <input type="hidden" name="execute" value="AddLinkAction">
            <input type="text" name="newLinkTitle" placeholder="Link Title"><br>
            <input type="text" name="newLink" placeholder="Link"><br>
            <input type="file" name="newImglink"><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</div>