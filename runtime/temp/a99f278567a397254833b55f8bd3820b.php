<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\qampp\htdocs\thinkphp_5\public/../application/index\view\commodity\commodity.html";i:1523182774;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品列表</title>
    <meta name="keywords" content="商品">
    <meta name="description" content="">
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link href="/thinkphp_5/public/static/index/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/animate.css" rel="stylesheet">
    <link href="/thinkphp_5/public/static/index/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">
        .col-sm-2{
            padding-left: 10px;
        }
    </style>
</head>

<body class="gray-bg">
	<!-- 新增modal -->
    <div class="modal fade" id="myModalAdd"  tabindex="1000" role='dialog' aria-hidden='true' aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">新增商品</h4>
                </div>
                <div class="modal-body">
                    <!-- 修改商品表单 -->
                    <form id="updateFrom" class="form-horizontal">
                        <div class="form-group">
                            <label for="bar_code_new" class="col-sm-2 control-label">商品条码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bar_code_new" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name_new" class="col-sm-2 control-label">商品名称</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_new" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand_name_new" class="col-sm-2 control-label">品牌名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="brand_name_new" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="specification_new" class="col-sm-2 control-label">规格</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="specification_new" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="addGood()">提交</button>
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
                    <h4 class="modal-title" id="myModalLabel">修改商品</h4>
                </div>
                <div class="modal-body">
                    <!-- 修改商品表单 -->
                    <form id="updateFrom" class="form-horizontal">
                        <input type="hidden" name="" id="id" value="">
                        <div class="form-group">
                            <label for="bar_code" class="col-sm-2 control-label">商品条码</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" id="bar_code"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">商品名称</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand_name" class="col-sm-2 control-label">品牌名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="brand_name" value="">
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label for="specification" class="col-sm-2 control-label">规格</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="specification" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="updataGood()">提交更改</button>
                </div>
            </div>
        </div>
    </div>
    <!-- mainPage -->
    <div class="wrapper wrapper-content animated fadeInRight" style="height:100%;">
        <div class="ibox float-e-margins style=" style="height:100%;">
        	<!-- 添加商品 -->
        	<div class="form-group clearfix col-sm-1" style='margin-top: 15px;'>
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModalAdd">添加商品</button>               
            </div>
            <!-- 导入 -->
            <form action="<?php echo url('excel/into'); ?>" enctype="multipart/form-data" method="post" style='float: left;margin-top: 15px;margin-left: 15px;'>
			    <input type="file" name="myfile" style="display: inline;" />
			    <input type="submit" value="导入" class="btn btn-info"/>
			</form>
            <!-- 导出 -->
            <form action="<?php echo url('excel/out'); ?>" enctype="multipart/form-data" method="post" style='float: left;margin-top: 15px;margin-left: 15px;'>
                <input type="submit" class="btn btn-info" value="导出">
            </form>
          <div class="example-wrap">
                <table id="exampleTablePagination">
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
    <script type="text/javascript" src="/thinkphp_5/public/static/index/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript">
        // var a_token = window.sessionStorage.getItem('token') || {};
        $(function () {
            initTable();
        });
        // 窗口改变自适应
        $(window).resize(function () {
            $("#exampleTablePagination").bootstrapTable('resetView');
        });
        // enter键关闭最新打开的layer弹框
        $(document).on('keyup',function(e){
              if(e.keyCode === 13){
                  layer.close(layer.index);
              }
        });
        // 页面初始化
        function initTable() {
          var that = this;
            $('#exampleTablePagination').bootstrapTable('destroy');
            $("#exampleTablePagination").bootstrapTable({
                height:520,
                pagination: true,
                pageNumber: 1,      //初始化加载第一页，默认第一页
                pageSize: 10,      //每页的记录行数（*）
                queryParams: function queryParams(params) {
                    var param = {    
                      pageNumber: params.pageNumber,    
                      pageSize: params.pageSize,
                      searchText:params.searchText 
                  };    
                  return param; 
                },
                queryParamsType: 'unedfined',
                sidePagination: "server", 
                search: true,
                url: "getList",
                responseHandler: function(data) {
                    if (data.success == 0) {
                        return {
                            "rows":[],
                            "total":0
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
                        var r = '<button class="btn btn-info btn-sl" data-toggle="modal" data-target="#myModal" onclick="getDetail(\''+ index +'\')">修改</button><button class="btn btn-info btn-sl" style="margin-left:5px;" onclick="delGood(\''+ row.id +'\')">删除</button>';
                        return r;
                    }
                }]
            });  
        };
        // 获取当前点击数据
        function getDetail(index) {
            var data = $("#exampleTablePagination").bootstrapTable('getData')[index];
            $('#id').val(data.id);
            $('#bar_code').html(data.bar_code);
            $('#name').val(data.name);
            $('#brand_name').val(data.brand_name);
            $('#specification').val(data.specification);
        };
        // 修改数据
        function updataGood() {
            var paramArray = {
            	id: $('#id').val(),
            	bar_code: $('#bar_code').html(),
                name: $('#name').val(),
                brand_name: $('#brand_name').val(),
                specification: $('#specification').val()
            };
            $.ajax({
                type: "POST",
                url: "updateCommodity",
                data: paramArray,
                success: function (res) {
                    $('#exampleTablePagination').bootstrapTable('refresh');
                    if (res.success) {
                    	layer.alert('修改商品成功！')
                    }else{
                    	layer.alert(res.msg);
                    }
                }
            });
        };
        //新增数据
        function addGood(){
        	var paramArray = {
        	    bar_code: $('#bar_code_new').val(),
                name: $('#name_new').val(),
                brand_name: $('#brand_name_new').val(),
                specification: $('#specification_new').val()
            };
            $.ajax({
                type: "POST",
                url: "addCommodity",
                data: paramArray,
                success: function (res) {
                    $('#exampleTablePagination').bootstrapTable('refresh');
                    if (res.success) {
                    	layer.alert('新增商品成功！')
                    }else{
                    	layer.alert(res.msg);
                    }
                }
            });
        };
        //删除数据
        function delGood(id){
        	layer.confirm('确认要删除商品吗？', {
	            btn : [ '确定', '取消' ]//按钮
	        }, function(index) {
		        $.ajax({
	                type: "POST",
	                url: "delCommodity",
	                data: {id:id},
	                success: function (res) {
	                    $('#exampleTablePagination').bootstrapTable('refresh');
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
        //导出数据
        function excelOut(){
            var iframe = document.createElement('iframe')
              iframe.style.display = 'none'
              document.body.appendChild(iframe)
              iframe.src = "<?php echo url('excel/daochu'); ?>"
              // 加载文档后删除iframe
              window.setTimeout(function () {
                document.body.removeChild(iframe)
              }, 10000)
        }
    </script>
</body>

</html>
