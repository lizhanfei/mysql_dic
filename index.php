<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<link rel="stylesheet" href="http://getcontent.sinaapp.com//public/css/layout.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://getcontent.sinaapp.com//public/css/bootstrap.min.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://getcontent.sinaapp.com//public/css/bootstrap-theme.min.css" type="text/css" media="all" />
	</head>
	<body>
		<div class="zxx_out_box"><div class="zxx_in_box">
		<form class="form-horizontal" role="form" action="./mysqlDump.php" method="post">
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">mysql 主机地址</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputEmail3" name="host" placeholder="host">
		    </div>
		  </div>

		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">主机端口</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputPassword3" name="port" placeholder="3306">
		    </div>
		</div>

		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">数据库名称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputPassword3" name="dbname" placeholder="dbname">
		    </div>
		</div>

		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">mysql 用户名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputPassword3" name="username" placeholder="username">
		    </div>
		</div>

		<div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">登录密码</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputPassword3" name="password" placeholder="password">
		    </div>
		</div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">make</button>
		    </div>
		  </div>
		</form>
		</div></dvi>
	</body>
</html>