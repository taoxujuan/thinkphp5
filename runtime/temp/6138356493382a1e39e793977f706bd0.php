<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\qampp\htdocs\thinkphp_5\public/../application/index\view\same\same.html";i:1522807648;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品列表</title>
    <meta name="keywords" content="商品">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/thinkphp_5/public/static/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/animate.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight" style="height:100%;">
        <div class="ibox float-e-margins style=" style="height:100%;">
     <!-- 分页 -->
          <div class="example-wrap">

                <table id="exampleTable">
                </table>
          </div>
        </div>
    </div> 
    <!-- 全局js -->
    <script src="/thinkphp_5/public/static/index/js/jquery.min.js?v=2.1.4"></script>
    <script src="/thinkphp_5/public/static/index/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/thinkphp_5/public/static/index/js/content.js?v=1.0.0"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/thinkphp_5/public/static/index/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript">
        // var a_token = window.sessionStorage.getItem('token') || {};
        $(function () {
          initTable();  
        });
        // 窗口改变自适应
        $(window).resize(function () {
            $("#exampleTable").bootstrapTable('resetView');
        });
        // enter键关闭最新打开的layer弹框
        $(document).on('keyup',function(e){
          if(e.keyCode === 13){
              layer.close(layer.index);
          }
        });
        //页面初始化
        function initTable() {
            var that = this;
            $('#exampleTable').bootstrapTable('destroy');
            $("#exampleTable").bootstrapTable({
                height:520,
                pagination: true,
                pageNumber: 1,      //初始化加载第一页，默认第一页
                pageSize: 10,      //每页的记录行数（*）
                queryParams: function queryParams(params) {
                    var param = {    
                      pageNumber: params.pageNumber,    
                      pageSize: params.pageSize 
                  };    
                  return param; 
                },
                queryParamsType: 'unedfined',
                sidePagination: "server", 
                search: false,
                url: "getSameList",
                responseHandler: function (data) {
                    if (data.success == 0) {
                        return {
                            "rows": [],
                            "total": 0
                        }
                    } else {
                        return {
                            "rows": data.rows,
                            "total": data.total
                        }
                    }
                },
                columns: [{
                    field: 'id',
                    title: 'id'
                },{
                    field: 'bar_code',
                    title: '商品条码'
                }, {
                    field: 'name',
                    title: '商品名称'
                },{
                    field: 'brand_name',
                    title: '品牌名称'
                },{
                    field: 'specification',
                    title: '规格'
                },{
                    field: 'price',
                    title: '价格'
                },{
                    field: 'operation',
                    title: '操作',
                    formatter: function (value, row, index) {
                        var r = '<button class="btn btn-info btn-sl" onclick="onRemove(\''+ row.id+'\')">删除</button>';
                        return r;
                    }
                }]
            });
        };
        // 删除重复项
        function onRemove(id) {
            layer.confirm('确认要删除商品吗？', {
	            btn : [ '确定', '取消' ]//按钮
	        }, function(index) {
		        $.ajax({
	                type: "POST",
	                url: "delSame",
	                data: {id:id},
	                success: function (res) {
	                    $('#exampleTable').bootstrapTable('refresh');
	                    if (res.success) {
	                    	layer.alert('删除商品成功！')
	                    }else{
	                    	layer.alert(res.msg);
	                    }
	                }
	            });
	            layer.close(index); 
	        }); 
        };
    </script>
</body>

</html>
