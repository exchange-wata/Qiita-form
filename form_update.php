<?php
	session_start();
	include('dbconnect.php');

	if (isset($_POST['feed_update'])) {
	    $feed_update = $_POST['feed_update'];
			$feed_id = $_GET['feed_update'];

	    $update_feed_sql  = 'UPDATE `feeds` SET `feed` = ? WHERE `id` = ?';
	    $update_feed_data = array($feed_update, $feed_id);
	    $update_feed_stmt = $dbh->prepare($update_feed_sql);
	    $update_feed_stmt->execute($update_feed_data);
	}

	header("Location:form.php");
	exit();

?>