layui.use('table', function(){
    var table = layui.table;

    var apiUrl = {
        dataUrl:'/thome/user/trade'
    };
    table.render({
        elem: '#dataTable'
        ,url:apiUrl.dataUrl
        ,cols: [[
             {field:'id', width:80, title: 'ID', sort: true}
            ,{field:'paytype', width:180, title: '收支类型'}
            ,{field:'tradetype', width:180, title: '交易类型', sort: true}
            ,{field:'money', title: '交易金额'}
            ,{field:'nowmoney', title: '剩余金额', minWidth: 150}
            ,{field:'addtime', title: '交易时间', sort: true}
        ]]
        ,page: true
    });



});