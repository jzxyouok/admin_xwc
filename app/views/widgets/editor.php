<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/29
 * Time: 14:27
 */

?>

<link rel="stylesheet" type="text/css" href="/tools/simditor/styles/simditor.css" />
<script type="text/javascript" src="/tools/simditor/scripts/module.js"></script>
<script type="text/javascript" src="/tools/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/tools/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="/tools/simditor/scripts/simditor.js"></script>
<!--<script type="text/javascript" src="/tools/simditor/scripts/simditor-autosave.js"></script>-->


<script type="text/javascript">
    jQuery(function($) {
        /*富文本*/
        var toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'];
        var editor_<?=$randkey;?> = new Simditor({
            textarea: $('#editor_<?=$randkey;?>'),
            toolbar : toolbar,
            placeholder: '请输入内容...',
//            autosave: 'editor-content',
            upload: {
                url: '<?=$imgPostUrl; ?>',
                params :{'_csrf':"<?= Yii::$app->request->csrfToken ?>" }
            }



            //optional options
        });



    });
</script>

<textarea name="<?=$name; ?>" id="editor_<?=$randkey;?>"  autofocus><?php echo $content; ?></textarea>