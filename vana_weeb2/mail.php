<?php
	if ( isset($_POST['submit']) )
	{
		$upload_dir = '/data05/virt1545/domeenid/www.elin.ee/htdocs/pics/';

		include_once("email_message.php");

		$from_address=addslashes(trim($_POST['mail']));
		$from_name=htmlentities(trim($_POST['name']));
		$text_message=trim($_POST['message']);
		
		if ( $text_message == '' )
		{
			header("Location: index.php?c=6&msg=".urlencode('Tühja kirja ei saa saata.'));;
			exit;
		}

		$reply_name=$from_name;
		$reply_address=$from_address;
		$reply_address=$from_address;
		$error_delivery_name=$from_name;
		$error_delivery_address=$from_address;

		$to_name="Elin";
		$to_address="info@elin.ee";

		$subject="Veebilehe tagasiside";
		$email_message=new email_message_class;
		$email_message->SetEncodedEmailHeader("To",$to_address,$to_name);
		$email_message->SetEncodedEmailHeader("From",$from_address,$from_name);
		$email_message->SetEncodedEmailHeader("Reply-To",$reply_address,$reply_name);
		$email_message->SetHeader("Sender",$from_address);

		$email_message->SetEncodedHeader("Subject",$subject);
		
		$email_message->AddQuotedPrintableTextPart($email_message->WrapText($text_message));

		$file_name_parts = explode('.',$_FILES['attach']['name']);
		$extension = end($file_name_parts);
		$upload_file_name = uniqid("g".$gallery."_").'.'.$extension;
		$upload_file = $upload_dir.$upload_file_name;

		if ( $_FILES['attach']['size'] > 0 && move_uploaded_file($_FILES['attach']['tmp_name'], $upload_file) )
		{
			$text_attachment=array(
//				"Data"=>$upload_file,
				"Name"=>$_FILES['attach']['name'],
				"FileName"=>$upload_file,
				"Content-Type"=>"automatic/name",
				"Disposition"=>"attachment"
			);
			$email_message->AddFilePart($text_attachment);
		}

		$error=$email_message->Send();
		if(strcmp($error,""))
			header("Location: index.php?c=6&msg=".urlencode($error));
		else
			header("Location: index.php?c=6&msg=".urlencode('Teade on saadetud. Vajadusel vastame esimesel võimalusel.'));;

		@unlink($upload_file);
	}
	else
	{
		header("Location: index.php?c=6");
	}
?>