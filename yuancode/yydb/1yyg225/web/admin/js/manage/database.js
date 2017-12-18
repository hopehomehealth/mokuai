/*>>>>>field模型字段*/
var database=function(){

};
database.prototype={

    //提交SQL执行
    query_sql:function(){
        var sql = $('#sql').val();
        if(sql.length == 0){
            $('#result').html('<b class="c-red">请输入SQL命令!</b>');
            return false;
        }
        var D={sql:sql};
        $post({
            url:'databases/query',
            method:'post',
            data:D,
            dataType:'json',
            callback:function(x){
                if(x.html){
                    $('#result').html(x.html);
                }
            }
        });
    }

};database = new database;