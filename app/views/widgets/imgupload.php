<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25 0025
 * Time: 上午 10:58
 */

?>

<div style="position: relative;">
<h3 class="header smaller lighter green"><?=$title;?></h3>
<img class="<?=$randkey;?>" src="<?=$src;;?>" style="display:block;border: 1px dotted green;" width="150px;" height="80px;" />
<input type="file" name="file<?=$randkey;?>" id="file<?=$randkey;?>" style="position:absolute;top: 50px;left: 0;opacity:0;z-index:9999;width: 150px;height: 80px;" />
<input type="hidden" class="hide<?=$randkey;?>" value="<?=$value;?>" name="<?=$name;?>" />
</div>


<script>
$(function () {
    $("#file<?=$randkey;?>").change(function(){
        var formData = new FormData();
        formData.append("file", document.getElementById("file<?=$randkey;?>").files[0]);
        $.ajax({
            url:"<?=$postUrl;?>",
            type:"POST",
            contentType: false,
            processData: false,
            dataType: "json",
            data: formData,
            beforeSend:function(){
//                $(".loader").show();
//                $("#cs-dropBg").show();
        },
            success: function(o) {
                if(o.status){
                    $("img.<?=$randkey;?>").attr("src", o.filePath);
                    $(".hide<?=$randkey;?>").val(o.fileName);

                }
        },
            error:function(){
        }
        });

        });


})

</script>