<div class="newInfoAdmin">
    <form action="?c=main" method="post" enctype="multipart/form-data">
        <input type="hidden" name="execute" value="postIntroAction">
        <input type="hidden" name="adminId" value="<?php echo $_SESSION['admin']['id']?>">
        <div>
            <input type="file" name="newImg">
        </div>
        <div>
            <input type="text" name="newTitle"  style="width: 98%" placeholder="New title"><br>
            <textarea name="newDescrip" placeholder="New Description" style="width: 98%;height: 150px;" ></textarea><br>
            <input type="text" name="newInfo1" style="width: 49%" placeholder="Info 1">
            <input type="text" name="newInfo2"  style="width: 49%" placeholder="Info 2"><br>
            <input type="submit" value="Post new Introduction">
        </div>
    </form>
</div>