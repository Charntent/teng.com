layui.use(['form','jquery'],function(){


    var form = layui.form,$ = layui.jquery;
    form.verify({
        pass: [
            /^[\S]{6,12}$/
            ,'密码必须6到12位，且不能出现空格'
        ]
    });
    form.on('submit(loginBtn)',function(res){

        console.log(res);
        res.field.phone = res.field.account;
        var loading = layer.load();
        $.post('/passport/signup',res.field,function(res){
             layer.close(loading);

             if(res.code == 0){
                 return layer.msg(res.msg,{icon:res.code == 0?2:1});
             }
             location.href = res.url;
        },'json');
        return false;
    });

    $(document).keypress(function(e) {
        if (e.which == 13)
            $('.nextstep ').click();
    });
});