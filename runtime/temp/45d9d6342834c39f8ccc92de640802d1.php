<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\qampp\htdocs\thinkphp_5\public/../application/index\view\account\account.html";i:1522824433;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>账号列表</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/thinkphp_5/public/static/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/animate.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
	<!-- 新增modal -->
    <div class="modal fade" id="myModalAdd"  tabindex="1000" role='dialog' aria-hidden='true' aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">新增App账号</h4>
                </div>
                <div class="modal-body">
                    <!-- 修改商品表单 -->
                    <form id="updateFrom" class="form-horizontal">
                        <div class="form-group">
                            <label for="name_new" class="col-sm-2 control-label">账号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_new" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_new" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="password_new" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_id_new" class="col-sm-2 control-label">网店编码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="site_id_new" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="addAccount()">提交</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 修改modal -->
    <div class="modal fade" id="myModal"  tabindex="1000" role='dialog' aria-hidden='true' aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">修改App账号</h4>
                </div>
                <div class="modal-body">
                    <!-- 修改商品表单 -->
                    <form id="updateFrom" class="form-horizontal">
                        <input type="hidden" name="" id="id" value="">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">账号</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" id="name"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="password" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="updateAccount()">提交更改</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight" style="height:100%;">
        <div class="ibox float-e-margins style=" style="height:100%;">
     <!-- 分页 -->
          <div class="example-wrap">
				<!-- 添加 -->
	        	<div class="form-group clearfix col-sm-1" style='margin-top: 15px;'>
	                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModalAdd">新增App账号</button>               
	            </div>
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
                url: "getAccList",
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
                    field: 'name',
                    title: '账号'
                }, {
                    field: 'password',
                    title: '密码'
                },{
                    field: 'site_id',
                    title: '网店编码'
                },{
                    field: 'operation',
                    title: '操作',
                    formatter: function (value, row, index) {
                        var r = '<button class="btn btn-info btn-sl" data-toggle="modal" data-target="#myModal" onclick="getDetail(\''+ index +'\')">修改</button><button style="margin-left:10px;" class="btn btn-info btn-sl" onclick="onRemove(\''+ row.id+'\')">删除</button>';
                        return r;
                    }
                }]
            });
        };
         //新增账号
        function addAccount(){
        	var paramArray = {
                name: $('#name_new').val(),
                password: $('#password_new').val(),
                site_id: $('#site_id_new').val()
            };
            $.ajax({
                type: "POST",
                url: "addAccount",
                data: paramArray,
                success: function (res) {
                    $('#exampleTable').bootstrapTable('refresh');
                    if (res.success) {
                    	layer.alert('新增账号成功！')
                    }else{
                    	layer.alert(res.msg);
                    }
                }
            });
        };
        // 获取当前点击数据
        function getDetail(index) {
            var data = $("#exampleTable").bootstrapTable('getData')[index];
            $('#id').val(data.id);
            $('#name').html(data.name);
            $('#password').val(data.password);
        };
        //修改账号密码
        function updateAccount(){
        	if ($('#password').val()) {
        		var paramArray = {
	        		id: $("#id").val(),
	                password: $('#password').val()
	            };
	            $.ajax({
	                type: "POST",
	                url: "updateAccount",
	                data: paramArray,
	                success: function (res) {
	                    $('#exampleTable').bootstrapTable('refresh');
	                    if (res.success) {
	                    	layer.alert('修改成功！')
	                    }else{
	                    	layer.alert(res.msg);
	                    }
	                }
	            });
        	}else{
        		layer.alert('密码不能为空！');
        	}
        };
        //删除账号
        function onRemove(id){
        	layer.confirm('确认要删除吗？', {
	            btn : [ '确定', '取消' ]//按钮
	        }, function(index) {
		        $.ajax({
	                type: "POST",
	                url: "delAccount",
	                data: {id:id},
	                success: function (res) {
	                    $('#exampleTable').bootstrapTable('refresh');
	                    if (res.success) {
	                    	layer.alert('删除成功！')
	                    }else{
	                    	layer.alert(res.msg);
	                    }
	                }
	            });
	            layer.close(index); 
	        }); 
        }
    </script>
</body>

</html>
