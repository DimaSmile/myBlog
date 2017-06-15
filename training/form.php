<?php 

require_once('dbConn.php');
 ?>


<form action="/training/handle.php" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<legend><h1>Form</h1></legend>
		</div>

		<input type="text" name="login" id="input" class="form-control" value=""  title="">
		<input type="text" name="password" id="input2" class="form-control2" value="" title="">
		<hr>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Отправить</button>
			</div>
		</div>
</form>