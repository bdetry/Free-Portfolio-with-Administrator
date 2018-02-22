<div class="newService">
    <form method="post" action="?c=service" enctype="multipart/form-data">
        <input type="hidden" name="execute" value="postServiceAction">
        <input type="hidden" name="adminId" value="<?php echo $_SESSION['admin']['id']?>">
        <div>
            <input type="file" name="serviceImg">
        </div>
        <div>
            <input type="text" name="serviceTitle" placeholder="Title"><br>
            <textarea name="serviceDescrip" placeholder="Description"></textarea><br>
            <input type="submit" value="Publier Service">
        </div>
    </form>
</div>

<div class="delService">
    <form method="post" action="?c=service">
    <input type="hidden" name="execute" value="delServiceAction">
    <select name="toDel">
    <?php
    foreach($services as $service)
    {
        ?>
        <option value="<?php echo $service['id']; ?>"><?php echo $service['titre']; ?></option>
        <?php
    }    
    ?>
    </select><br>
    <input type="submit" value="Effacer Service">
    </form>
</div>
