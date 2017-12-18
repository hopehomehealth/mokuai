//发起圈子（弹窗）
function checkSendQz(buy_id){
    var D={buy_id:buy_id};
    $.post('/quanzi/checkSendQz',D,function(data){
        if(data.error){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else{
            var obj = '#checkSendQz';
            $(obj).find('#qz_buy_id').val(buy_id);

            $.layer({
                type: 1,
                title: '发起圈子设置',
                fadeIn: 300,
                area: ['90%', 'auto'],
                page: {dom: $(obj)},
                success: function(){
                    $('.xubox_page').css('width', '100%');
                }
            });
        }
    },'json');
}

//发起圈子（执行）
function sendQz(){
    var qz_max_num = $('#qz_max_num').val();
    var qz_pass = $('#qz_pass').val();
    var buy_id = $('#qz_buy_id').val();
    var D={qz_max_num:qz_max_num,qz_pass:qz_pass,buy_id:buy_id};

    //数据验证
    if(parseInt(qz_max_num) != qz_max_num){ layer.msg('最大参与人数只能输入数字！',1,{type:3}); return false; }
    if(parseInt(qz_pass) != qz_pass || qz_pass.length != 6){ layer.msg('圈子商品密码为6位纯数字密码！',1,{type:3}); return false; }

    $.post('/quanzi/sendQz',D,function(data){
        if(data.error){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else{
            location.href='/quanzi/detail/'+data.qz_buy_id+'?flag=1';
        }
    },'json');
}

//发起成功弹窗
function sendFlag(){
    $.layer({
        type: 1,
        title: '发起成功',
        fadeIn: 300,
        area: ['90%', 'auto'],
        page: {dom: '#sendFlag'},
        success: function(){
            $('.xubox_page').css('width', '100%');
        }
    });
}

//设置圈子（弹窗）
function checkSetQz(buy_id){
    var D={buy_id:buy_id};
    $.post('/quanzi/checkSetQz',D,function(data){
        if(data.error){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else{
            var obj = '#checkSetQz';
            $(obj).find('#setQz_max_num_old').html(data.qz_max_num);
            $(obj).find('#setQz_pass_old').html(data.qz_pass);
            $(obj).find('#setQz_buy_id').val(buy_id);

            $.layer({
                type: 1,
                title: '设置圈子',
                fadeIn: 300,
                area: ['90%', 'auto'],
                page: {dom: $(obj)},
                success: function(){
                    $('.xubox_page').css('width', '100%');
                }
            });
        }
    },'json');
}

//设置圈子（执行）
function setQz(){
    var qz_max_num = $('#setQz_max_num').val();
    var qz_pass = $('#setQz_pass').val();
    var buy_id = $('#setQz_buy_id').val();
    var D={qz_max_num:qz_max_num,qz_pass:qz_pass,buy_id:buy_id};

    //数据验证
    if(parseInt(qz_max_num) != qz_max_num){ layer.msg('最大参与人数只能输入数字！',1,{type:3}); return false; }
    if(qz_pass.length > 0 && (parseInt(qz_pass) != qz_pass || qz_pass.length != 6)){ layer.msg('圈子商品密码为6位纯数字密码！',1,{type:3}); return false; }

    $.post('/quanzi/setQz',D,function(data){
        if(data.error){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else{
            location.reload();
        }
    },'json');
}

//验证密码（弹窗）
function checkPassAlertQz(buy_id){
    var D={buy_id:buy_id};
    $.post('/quanzi/checkPassAlertQz',D,function(data){
        if(data.error == 1){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else if(data.error == 2){
            addToCart(buy_id,'buy');
        }else{
            var obj = '#checkPassAlertQz';
            $(obj).find('#checkQz_buy_id').val(buy_id);

            $.layer({
                type: 1,
                title: '立即参与（验证密码）',
                fadeIn: 300,
                area: ['90%', 'auto'],
                page: {dom: $(obj)},
                success: function(){
                    $('.xubox_page').css('width', '100%');
                }
            });
        }
    },'json');
}

//验证密码（执行）
function checkPassQz(){
    var qz_pass = $('#checkQz_pass').val();
    var buy_id = $('#checkQz_buy_id').val();
    var D={qz_pass:qz_pass,buy_id:buy_id};

    //数据验证
    if(parseInt(qz_pass) != qz_pass){ layer.msg('请输入圈子参与密码！',1,{type:3}); return false; }

    $.post('/quanzi/checkPassQz',D,function(data){
        if(data.error){
            if(data.error_text) layer.msg(data.error_text,1,{type:3});
            if(data.url) location.href=data.url;
        }else{
            addToCart(buy_id,'buy');
        }
    },'json');
}