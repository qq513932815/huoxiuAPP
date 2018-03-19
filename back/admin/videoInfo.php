<?php
include '../ipConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/my.css">

    </head>
    <body>
        <div class="alert alert-block  alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>		  
            删除视频可在视频回收站找回。
        </div>
        <table class="table table-striped   table-hover table-bordered my_table">
            <thead>
                <tr><th colspan="6" >视频信息</th></tr>
                <tr><th>简介</th><th>喜欢数</th><th>分享数</th><th>操作</th></tr>
            </thead>
            <tbody id="list">
               	
            </tbody>
    </table>

    </body>
</html>
<script type="text/javascript">
     $(function() {
                $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/isGarbage.php',{},
                    function(data) {
                            var jsonObject = $.parseJSON(data);
                            var list = $("#list");
                            
                            var btnclass = 'btn-danger';
                            var btntxt = '删除视频';
                            
                            for (var i = 0; i < jsonObject.length; i++) {
                                list.append("<tr>\n\
                                        <td>" + jsonObject[i].content + "</td>\n\
                                        <td>" + jsonObject[i].likes + "</td>\n\
                                        <td>" + jsonObject[i].shares + "</td>\n\
                                        <td><input videoid=" + jsonObject[i].videoid + " class='btn "+btnclass+" btn-mini garbageTure' type='button' value='"+btntxt+"'><input type='hidden' value='1'></td>\n\
                                    </tr>");
                                 console.log(jsonObject[i].state);
                            }
                            
                            $(".garbageTure").on("click", function() {
                                var videoid = $(this).attr('videoid');
                                var num = 1;
                                var type = $(this);
                                
                                $.post("http://<?php echo $ip; ?>/huoxiuapi/apis/garbageTorF.php", {
                                    videoid: videoid,
                                    num: num
                                },
                                function(data) {
                                    if (data == 1) {
                                        alert("删除成功");
                                    }else{
                                        alert("删除失败");
                                    }
                                });
                            });

            });
        });
</script>
