layui.use(['form','layer'], function() {
    var $ = layui.jquery,
        layer = layui.layer;
    var form = layui.form;
    //自定义验证规则
    form.verify({
        oldpwd: function(value) {
            if(value.length < 6) {
                return '密码至少得6个字符啊';
            }
        },
        newpwd: [/(.+){6,12}$/, '新密码必须6到12位'],
        newpwd1: function(value) {
            if(value != $('#newpwd').val()){
                return '输入两次密码不相等';
            }
        }
    });

    //监听提交
    form.on('submit(savePwd)', function(data) {

        var loading = layer.msg('正在操作，请等候...', {icon: 16,time: 999999, shade: [0.3, '#000']});
        $.post('/thome/passport/editpwdPost',data.field,function(data){
            if(data.code == 1 ){
                layer.msg(data.msg,{icon:1});
            }else{
                layer.msg(data.msg,{icon:2});
            }

        },'json');
        return false;
    });
});