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
                $.post('http://<?php echo $ip; ?>/huoxiuapi/apis/getBlack.php',{},
                    function(data) {
                            var jsonObject = $.parseJSON(data);
                            var list = $("#list");
                            
                            var btnclass = 'btn-info';
                            var btntxt = '重置密码';
                            
                            for (var i = 0; i < jsonObject.length; i++) {
                                list.append("<tr>\n\
                                        <td>" + jsonObject[i].nickname + "</td>\n\
                                        <td>" + jsonObject[i].username + "</td>\n\
                                        <td>" + jsonObject[i].mark + "</td>\n\
                                        <td>男</td>\n\
                                        <td><input userid=" + jsonObject[i].userid + " class='btn "+btnclass+" btn-mini ban' type='button' value='"+btntxt+"'><input type='hidden' value='1'></td>\n\
                                    </tr>");
                                 console.log(jsonObject[i].state);
                            }

            });
        });
        </script>
    </head>
    <body>
        <table class="table table-striped   table-hover table-bordered my_table">
            <thead>
                <tr><th colspan="6" >帐号管理</th></tr>
                <tr><th>昵称</th><th>账号</th><th>简介</th><th>性别</th><th>操作</th></tr>
            </thead>
            <tbody id="list">
                
            </tbody>
        </table>
    </body>
</html>