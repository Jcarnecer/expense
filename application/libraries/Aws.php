<?php

require 'aws/aws-autoloader.php';

class Aws
{
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}


	public function upload_avatar($user_id)
	{
		$s3Client = new Aws\S3\S3Client([
		    'version' => 'latest',
		    'region'  => 'ap-southeast-1'
		]);

		$result = $s3Client->putObject([
			'ACL' => 'public-read',
			'Bucket' => 'payakapps.com',
			'ContentType' => 'image/png',
			'SourceFile' => $_FILES['avatar']['tmp_name'],
			'Key' => "avatar/{$user_id}.jpg"
		]);

		$avatar_url = "https://s3-ap-southeast-1.amazonaws.com/payakapps.com/avatar/{$user_id}.jpg";
		$this->CI->session->user->avatar_url = $avatar_url;
		$this->CI->user->update($user_id, [
			"avatar_url" => $avatar_url
		]);
	}



	public function upload_receipt($reimbursement_id){
		
		$s3Client = new Aws\S3\S3Client([
		    'version' => 'latest',
		    'region'  => 'ap-southeast-1'
		]);

		$result = $s3Client->putObject([
			'ACL' => 'public-read',
			'Bucket' => 'payakapps.com',
			'ContentType' => 'image/png',
			'SourceFile' => $_FILES['receipt_image']['tmp_name'],
			'Key' => "avatar/{$reimbursement_id}.jpg"
		]);

		$avatar_url = "https://s3-ap-southeast-1.amazonaws.com/payakapps.com/reimbursement/($reimbursement_id}.jpg";
		$this->CI->session->user->avatar_url = $avatar_url;
		$this->CI->user->update($user_id, [
			"avatar_url" => $avatar_url
		]);
		
	   return $result['ObjectURL'];
	}
}