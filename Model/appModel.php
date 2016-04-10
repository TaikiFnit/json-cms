<?php

/**
* appModel
*/
class appModel
{
	
	protected function connectDB()
	{
		try {

			$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);

			return new PDO(DSN, DB_USER, DB_PASSWORD, $options);
			
		} catch (PDOException $e) {
			$e->getMessage();
			exit;	
		}
	}

	protected function fetch($dbh, $sql, $values) {

		$stmt = $dbh->prepare($sql);

		foreach ($values as $key => $value) {
			$stmt->bindValue($key, $value);
		}

		$stmt->execute();

		return $stmt->fetchAll();
	}

	protected function insert($dbh, $sql, $values) {

		$stmt = $dbh->prepare($sql);

		foreach ($values as $key => $value) {
			$stmt->bindValue($key, $value);
		}

		return $stmt->execute();
	}

	protected function ftpUpload($path, $name) {

		$result;

		// 接続を確立する
		$conn_id = ftp_connect(FTP_SERVER);

		// ユーザ名とパスワードでログインする
		$login_result = ftp_login($conn_id, FTP_USER_NAME, FTP_USER_PASS);

		// ファイルをアップロードする
		$result = ftp_put($conn_id, REMOTE_FILE . $name, $path, FTP_BINARY);

		// 接続を閉じる
		ftp_close($conn_id);

		return $result;
	}

	protected function ftpFileList($path) {

		$result;	

		$conn_id = ftp_connect(FTP_SERVER);

		$login_result = ftp_login($conn_id, FTP_USER_NAME, FTP_USER_PASS);

		$result = ftp_nlist($conn_id, $path);

		// 接続を閉じる
		ftp_close($conn_id);

		return $result;
	}

	protected function ftpRename($old, $new) {

		$result;

		$conn_id = ftp_connect(FTP_SERVER);

		$login_result = ftp_login($conn_id, FTP_USER_NAME, FTP_USER_PASS);

		$result = ftp_rename($conn_id, $old, $new);

		ftp_close($conn_id);

		return $result;
	}

	protected function ftpDelete($path) {

		$result;

		$conn_id = ftp_connect(FTP_SERVER);

		$login_result = ftp_login($conn_id, FTP_USER_NAME, FTP_USER_PASS);

		$result = ftp_delete($conn_id, $path);

		ftp_close($conn_id);

		return $result;
	}
}