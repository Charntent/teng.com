layui.use(['element','form','jquery','upload'], function(){
    var form = layui.form,$ = layui.jquery,upload = layui.upload;
      //普通图片上传
    var uploadInst = upload.render({
      elem: '#upload-logo'
      ,url: '/thome/sites/upload/'
      ,before: function(obj){
        //预读本地文件示例，不支持ie8
        obj.preview(function(index, file, result){
            $('#test-upload-normal-img').attr('src', result); //图片链接（base64）
        });
      }
      ,done: function(res){
        //如果上传失败
        if(res.code == 0){
          return layer.msg('上传失败');
        }
        $('#site_logo').val(res.data.url);
        //上传成功
      }
      ,error: function(){
        //演示失败状态，并实现重传
        var demoText = $('#test-upload-demoText');
        demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
        demoText.find('.demo-reload').on('click', function(){
          uploadInst.upload();
        });
      }
    });

    




    form.on('submit(formSave)', function(data){
      console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
      console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
      console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}

      $.post('/thome/sites/dataPost',data.field,function(res){
          console.log(res);
          layer.msg(res.msg);
          if(res.code == 1) {
              setTimeout(function(){
                location.href = '/thome/sites/';
              },1000);
          }
      },'json');

      return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    });
  });