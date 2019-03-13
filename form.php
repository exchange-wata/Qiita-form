<?php 
	session_start();
	include('dbconnect.php');

	if (empty($_SESSION["id"])) {
		$user_id = mt_rand();
		$_SESSION["id"] = $user_id;
  }
  
  if (isset($_POST['feed'])) {
  	$feed = $_POST['feed'];
		$sql  = 'INSERT INTO `feeds` SET `user_id` = ?, `feed` = ?';
		$data = array($_SESSION["id"], $feed);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
	}

	$records = [];

	$select_sql  = 'SELECT * FROM `feeds`';
	$select_data = array();
	$select_stmt = $dbh->prepare($select_sql);
	$select_stmt->execute($select_data);

	while (true) {
    $record=$select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($record==false) {
    	break;
    }
    $records[]=$record;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="row mt-3">
		<!-- insert -->
		<div class="offset-1 col-3">			
			<h3>送信欄</h3>
			<div>
				<button type="button" class="btn btn-light" data-toggle="modal" data-target="#hoge-modal">クリックで送信formを開きます。</button>
			</div>
			<div class="modal fade" id="hoge-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">モーダルのタイトル</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
							<form id="hoge" action="form.php" method="POST">
								<label for="">formタグ外のボタンからテキストを送信したい。</label>
								<input type="text" class="form-control" name="feed">
							</form>
							<div>
								<button type="submit" class="btn btn-light" form="hoge">submit</button>
							</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
			        <button type="button" class="btn btn-primary">変更を保存</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<!-- select -->
		<div class="col-7 overflow-auto" style="height: 700px;">			
			<h3>送信されたもの一覧</h3>
			<table class="table">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th scope="col">feed</th>
			      <th scope="col">編集</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($records as $r) : ?>
			    <tr>
			      <th scope="row"><?php echo $r['id']; ?></th>
			      <td><?php echo $r['feed']; ?></td>
			      <td>
			      	<div>
								<button type="button" class="btn btn-light" data-toggle="modal" data-target="#moge-modal<?php echo $r['id']; ?>">クリックで送信formを開きます。</button>
							</div>
							<div class="modal fade" id="moge-modal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">モーダルのタイトル</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
											<form id="moge<?php echo $r['id']; ?>" action="form_update.php?feed_update=<?php echo $r['id']; ?>" method="POST">
												<label for="">formタグ外のボタンからテキストを送信したい。</label>
												<input type="text" class="form-control" name="feed_update">
											</form>
											<div>
												<button type="submit" class="btn btn-light" form="moge<?php echo $r['id']; ?>">submit</button>
											</div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
							        <button type="button" class="btn btn-primary">変更を保存</button>
							      </div>
							    </div>
							  </div>
							</div>
						</td>
			    </tr>
			    <?php endforeach ; ?>
			  </tbody>
			</table>
		</div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>