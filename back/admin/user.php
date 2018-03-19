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
        <script>
            $(function() {
                $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/getBlack.php', {},
                        function(data) {
                            var jsonObject = $.parseJSON(data);
                            var list = $("#list");
                            
                            var btnclass = 'btn-danger';
                            var btntxt = '封号';
                            
                            for (var i = 0; i < jsonObject.length; i++) {
                                if (jsonObject[i].black == null) {
                                    jsonObject[i].black = 0;
                                }
                                if (jsonObject[i].state == 0) {
                                    btnclass = 'btn-success';
                                    btntxt = '解封';
                                }else if(jsonObject[i].state == 1) {
                                    btnclass = 'btn-danger';
                                    btntxt = '封号';
                                }
                                list.append("<tr>\n\
                                        <td>" + jsonObject[i].nickname + "</td>\n\
                                        <td>" + jsonObject[i].username + "</td>\n\
                                        <td>" + jsonObject[i].mark + "</td>\n\
                                        <td>男</td>\n\
                                        <td>" + jsonObject[i].black + "</td>\n\
                                        <td><input userid=" + jsonObject[i].userid + " class='btn "+btnclass+" btn-mini ban' type='button' value='"+btntxt+"'><input type='hidden' value='1'></td>\n\
                                    </tr>");
                                 console.log(jsonObject[i].state);
                            }

                            $(".ban").on("click", function() {
                                var userid = $(this).attr('userid');
                                var type = $(this);
                                
                                if (type.val() == "封号") {
                                    $.post("http://<?php echo $ip; ?>/huoxiuapi/apis/ban.php", {
                                        userid: userid
                                    },
                                    function(data) {
                                        if (data == 1) {
                                            type.val("解封");
                                            type.removeClass('btn-danger');
                                            type.addClass('btn-success');
                                            alert("封号成功");
                                        }
                                    });
                                }else if(type.val() == "解封"){
                                    $.post("http://<?php echo $ip; ?>/huoxiuapi/apis/removeBan.php", {
                                        userid: userid
                                    },
                                    function(data) {
                                        if (data == 1) {
                                            type.val("封号");
                                            type.removeClass('btn-success');
                                            type.addClass('btn-danger');
                                            alert("解封成功");
                                        }
                                    });
                                }

                            });
                        });
            })
        </script>
    </head>
    <body>
        <div class="alert alert-block  alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            以下为系统统计出的被拉黑次数最多的用户名单
        </div>
        <table class="table table-striped   table-hover table-bordered my_table">
            <thead>
                <tr><th colspan="6" >用户管理</th></tr>
                <tr><th>昵称</th><th>账号</th><th>简介</th><th>性别</th><th>被拉黑次数</th><th>操作</th></tr>
            </thead>
            <tbody id="list">

            </tbody>
        </table>
    </body>
</html>