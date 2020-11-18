<?php 
	include '../init.php';
	$getFromU->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
 	if(isset($_POST) && !empty($_POST)){
		$status     = $getFromU->checkInput($_POST['status']);
		$tweetImage = '';
		$user_id  = $_SESSION['user_id'];

		if(!empty($status) or !empty($_FILES['file']['name'][0])){

			if(!empty($_FILES['file']['name'][0])){
				$tweetImage = $getFromU->uploadImage($_FILES['file']);
			}

			if(strlen($status) > 140){
				$error  = "Quá dài";
			}

			$tweet_id = $getFromU->create('tweets', array('status' => $status, 'tweetBy' => $user_id, 'tweetImage' => $tweetImage, 'postedOn' => date('Y-m-d H:i:s')));
			preg_match_all("/#+([a-zA-Z0-9_]+)/i", $status, $hashtag);

			if(!empty($hashtag)){
				$getFromT->addTrend($status);
			}
			$getFromT->addMention($status, $user_id, $tweet_id);


			$result['success'] = "Tweet của bạn đã được đăng";
			echo json_encode($result);	

		}else {
			$error = "Viết gì đó hoặc đăng ảnh";
		}

		if(isset($error)){
			$result['error'] = $error;
			echo json_encode($result);
		}
	}
 

?>