<!--<script type="text/javascript">-->
<!---->
<!--    var wsServer = 'ws://123.57.154.226:9502';-->
<!--    var websocket = new WebSocket(wsServer);-->
<!--    websocket.onopen = function (evt) {-->
<!--        console.log("Connected to WebSocket server.");-->
<!--        websocket.send('nima');-->
<!--    };-->
<!---->
<!--    websocket.onclose = function (evt) {-->
<!--        console.log("Disconnected");-->
<!--    };-->
<!---->
<!---->
<!---->
<!--    websocket.onmessage = function (evt) {-->
<!--        console.log('Retrieved data from server: ' + evt.data);-->
<!--    };-->
<!---->
<!--    websocket.onerror = function (evt, e) {-->
<!--        console.log('Error occured: ' + evt.data);-->
<!--    };-->
<!---->
<!---->
<!--</script>-->
    <?php $form = \yii\widgets\ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','method' => 'post','action' =>'']]); ?>
<input type="file" webkitdirectory multiple  />
    <input type="submit" name="sub"  >

<?php \yii\widgets\ActiveForm::end(); ?>