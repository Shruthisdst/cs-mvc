<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getMetadaData($volumes, $issues, $dbh) {

		$xmlFilePath = PHY_VOL_URL . $volumes . '/' . $issues . '/';
		$xmlFileNames = glob($xmlFilePath . '*.xml');

		foreach($xmlFileNames as $xmlFileName)
		{
			if (!(file_exists($xmlFileName))) {
					return False;
			}

			$metaDataFromXML = array();

			$datesArray = array("Manuscript Received" => "M","Manuscript Revised" => "R","Accepted"=>"A", "Early published" => "E", "Unedited version published online" => "U","Final version published online" => "F");

			$xml = simplexml_load_file($xmlFileName);

			if ($xml === false) 
			{
				return False;
			}

			$journal = $xml->front->{'journal-meta'}->{'journal-id'}->__toString();
			$articleId = $xml->front->{'article-meta'}->{'article-id'}->__toString();
			$volume = $xml->front->{'article-meta'}->volume->__toString();
			$issue = $xml->front->{'article-meta'}->issue->__toString();

			//split the string date at hyphen. Get year and month values
			if(isset($xml->front->{'article-meta'}->{'pub-date'}->{'string-date'}))
			{
				$pubStringDate =  preg_split('/-/',$xml->front->{'article-meta'}->{'pub-date'}->{'string-date'});
				$year = $pubStringDate[0];
				$month = $pubStringDate[1];
			}
			else
			{
				$year = "0000";
				$month = "00";
			}

			$info =  $xml->front->{'article-meta'}->{'issue-title'}->__toString();
			$hasSup =  $xml->front->{'article-meta'}->{'supplementary-material'}['mimetype'];
			$hasSup = (isset($hasSup))? 1 : 0;
			$title =  $xml->front->{'article-meta'}->{'title-group'}->{'article-title'}->asXML();
			$title = preg_replace("/<article-title>|<\/article-title>|\t*/","",$title);
			$feature =  $xml->front->{'article-meta'}->{'article-categories'}->{'series-title'}->__toString();
			$page =  $xml->front->{'article-meta'}->{'page-range'}->__toString();
			$abstract =  $xml->front->{'article-meta'}->abstract->asXML();
			$abstract = preg_replace("/<abstract>|<\/abstract>|\t*/","",$abstract);
			$history = $xml->front->{'article-meta'}->history;

			$dates = array();

			if($history != "")
			{
				foreach($xml->front->{'article-meta'}->history->date as $date)
				{
					$dateKey = $datesArray[(string) $date['date-type']];
					$dateValue = (string) $date->{'string-date'};
					$dates[$dateKey] = $dateValue;
				}
				$datesJson = json_encode($dates);
			}
			else
			{
				$datesJson = "[]";
				//~ echo $dates . "\n";
			}

			$affiliations = array();

			foreach($xml->front->{'article-meta'}->{'contrib-group'}->{'aff'} as $affiliation)
			{
				$affKey = $affiliation['id'];
				$affiliations[(string) $affKey] = (string) $affiliation;
			}

			$authors = array();
			$count = 0;
			if(isset($xml->front->{'article-meta'}->{'contrib-group'}->contrib->name))
			{
				foreach($xml->front->{'article-meta'}->{'contrib-group'}->contrib as $author)
				{
					#echo $author->name->{'given-names'} . "\n";

					$tempAuthor = array();

					$lastName = (string) $author->name->{'surname'};
					$firstName = (string) $author->name->{'given-names'};
					$fullName = (string) $author->{'string-name'};

					$tempAuthor['name'] = array("full" => $fullName, "first" => $firstName, "last" => $lastName);

					$tempArray = array();

					foreach($author->xref as $aff)
					{
						$affKey = (string) $aff['rid'];
						$affValue = (string) $affiliations[$affKey];
						array_push($tempArray, $affValue);
						//echo $affKey . "\n";
					}

					$tempAuthor['affiliation'] = (object)$tempArray;
					$tempAuthor['email']=$author->email; 
					array_push($authors,$tempAuthor);
				}
			}

			$authorsJson = json_encode($authors,JSON_UNESCAPED_UNICODE);

			$keyWords = "";

			foreach($xml->front->{'article-meta'}->{'kwd-group'}->kwd as $keyWord)
			{
				$keyWords = $keyWords . ";" . $keyWord;
			}

			$keyWords = preg_replace("/^;/","",$keyWords);
			// $title = addslashes($title); 
			// $feature = addslashes($feature); 
			// $abstract = addslashes($abstract); 
			// $keyWords = addslashes($keyWords); 

			$metaDataFromXML['journal'] = $journal; 
			$metaDataFromXML['volume'] = $volume; 
			$metaDataFromXML['issue'] = $issue; 
			$metaDataFromXML['month'] = $month; 
			$metaDataFromXML['year'] = $year; 
			$metaDataFromXML['info'] = $info; 
			$metaDataFromXML['hassup'] = $hasSup; 
			$metaDataFromXML['title'] = $title; 
			$metaDataFromXML['feature'] = $feature; 
			$metaDataFromXML['page'] = $page; 
			$metaDataFromXML['abstract'] = $abstract; 
			$metaDataFromXML['keywords'] = $keyWords; 
			$metaDataFromXML['authors'] = $authorsJson; 
			$metaDataFromXML['dates'] = $datesJson;
			$metaDataFromXML['id'] = $articleId;

			$this->db->insertData(METADATA_TABLE, $dbh, $metaDataFromXML);
		}
	}

	private function getAbstract($Article) {

		// Parse each child of absract element. Only p, ul and ol are allowed.
		$abstract = '';
		foreach ($Article->abstract->children() as $Child) {

			$abstract = $abstract . "\n" . $Child->asXML();
		}

		return $abstract;
	}

	private function getAuthorsJSON($Article) {

		$authors = array();
		foreach ($Article->authors->author as $Author) {
			
			$author['name'] = array("full" => (string) $Author->name->__toString(), 
									"first" => (string) $Author->name['first'], 
									"last" => (string) $Author->name['last']);
			$author['affiliation'] = $Author->affiliation;
			$author['email'] = $Author->email;

			array_push($authors, $author);
		}
		return json_encode($authors);
	}

	private function getDatesJSON($Article) {

		$dates = array();
		foreach ($Article->dates->date as $Date) {
			
			$type = (string) $Date['type'];
			$dates[$type] = (string) $Date->__toString();
		}

		return json_encode($dates);
	}

	private function reformArticleId($id) {
		
		$id = preg_replace('/_a/', '', $id, -1, $count);
		$id = ($count == 0) ? $id : $id . '_' . $count;
		return $id;
	}

	public function getFulltextAndInsert($journal = DEFAULT_JOURNAL, $dbh = null) {
	
		$sth = $dbh->prepare('SELECT id FROM ' . METADATA_TABLE . ' ORDER BY id');
		$sth->execute();
		
		while($result = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$result['text'] = $this->getContent($journal, $result['id']);

			$this->db->insertData(FULLTEXT_TABLE, $dbh, $result);
		}
	}

	private function getContent($journal, $id) {

		$id = preg_replace('/_[0-9]$/', '', $id);
		$textPath = PHY_TXT_URL . preg_replace('/\_/', '/', $id) . '.txt';
		return (file_exists($textPath)) ? file_get_contents($textPath) : $this->createAndGetText($textPath);
	}

	private function createAndGetText($textPath) {

		$folderPath = preg_replace('/(.*)\/.*/', "$1", $textPath);

		if (!(file_exists($folderPath)))
			mkdir($folderPath, 0777, true);

		$pdfPath = str_replace(PHY_TXT_URL, PHY_VOL_URL, $textPath);
		$pdfPath = str_replace('.txt', '.pdf', $pdfPath);

		$cmd = 'pdftotext ' . $pdfPath . ' ' . $textPath;
		$result = exec($cmd);

		if (!($result)) {

			echo 'Text extracted: ' . $textPath . "\n";
			return file_get_contents($textPath);
		}
		else{

			return '';
		}
	}

	public function getMetadaDataFromXML($path)	{

		$xmlFileName = PHY_BASE_URL . $path;

		if (!(file_exists($xmlFileName))) {
			return False;
		}			
		
		$metaDataFromXML = array();
			
		$datesArray = array("Manuscript Received" => "M","Manuscript Revised" => "R","Accepted"=>"A", "Early published" => "E", "Unedited version published online" => "U","Final version published online" => "F");
	
		$xml = simplexml_load_file($xmlFileName);

		if ($xml === false) 
		{
			return False;
		}
	
		$journal = $xml->front->{'journal-meta'}->{'journal-id'}->__toString();
		$articleId = $xml->front->{'article-meta'}->{'article-id'}->__toString();
		$volume = $xml->front->{'article-meta'}->volume->__toString();
		$issue = $xml->front->{'article-meta'}->issue->__toString();

		//split the string date at hyphen. Get year and month values
		if(isset($xml->front->{'article-meta'}->{'pub-date'}->{'string-date'}))
		{
			$pubStringDate =  preg_split('/-/',$xml->front->{'article-meta'}->{'pub-date'}->{'string-date'});
			$year = $pubStringDate[0];	
			$month = $pubStringDate[1];	
		}
		else
		{
			$year = "0000";
			$month = "00";
		}
			

		$info =  $xml->front->{'article-meta'}->{'issue-title'}->__toString();
		$hasSup =  $xml->front->{'article-meta'}->{'supplementary-material'}['mimetype'];
		$hasSup = (isset($hasSup))? 1 : 0;
		$title =  $xml->front->{'article-meta'}->{'title-group'}->{'article-title'}->asXML();
		$title = preg_replace("/<article-title>|<\/article-title>|\t*/","",$title);
		$feature =  $xml->front->{'article-meta'}->{'article-categories'}->{'series-title'}->__toString();
		$page =  $xml->front->{'article-meta'}->{'page-range'}->__toString();
		$abstract =  $xml->front->{'article-meta'}->abstract->asXML();
		$abstract = preg_replace("/<abstract>|<\/abstract>|\t*/","",$abstract);
		$history = $xml->front->{'article-meta'}->history;

		$dates = array();		

		if($history != "")
		{
			
			foreach($xml->front->{'article-meta'}->history->date as $date)
			{
				$dateKey = $datesArray[(string) $date['date-type']];
				$dateValue = (string) $date->{'string-date'};
				$dates[$dateKey] = $dateValue;
			}

			$datesJson = json_encode($dates);
		}
		else
		{
			$datesJson = "[]";
			//~ echo $dates . "\n";
		}

		$affiliations = array();

		foreach($xml->front->{'article-meta'}->{'contrib-group'}->{'aff'} as $affiliation)
		{
			$affKey = $affiliation['id'];
			$affiliations[(string) $affKey] = (string) $affiliation;
		}

		$authors = array();

		$count = 0;
		if(isset($xml->front->{'article-meta'}->{'contrib-group'}->contrib->name))
		{
			foreach($xml->front->{'article-meta'}->{'contrib-group'}->contrib as $author)
			{
				#echo $author->name->{'given-names'} . "\n";
				
				$tempAuthor = array();
				
				$lastName = (string) $author->name->{'surname'};
				$firstName = (string) $author->name->{'given-names'};
				$fullName = (string) $author->{'string-name'};

				$tempAuthor['name'] = array("full" => $fullName, "first" => $firstName, "last" => $lastName);

				$tempArray = array();

				foreach($author->xref as $aff)
				{	
					$affKey = (string) $aff['rid'];
					$affValue = (string) $affiliations[$affKey];
					array_push($tempArray, $affValue); 
					//echo $affKey . "\n"; 
				}

				$tempAuthor['affiliation'] = (object)$tempArray;
				$tempAuthor['email']=$author->email; 
				array_push($authors,$tempAuthor);
			}
		}

		$authorsJson = json_encode($authors,JSON_UNESCAPED_UNICODE);

		$keyWords = "";

		foreach($xml->front->{'article-meta'}->{'kwd-group'}->kwd as $keyWord)
		{
			$keyWords = $keyWords . ";" . $keyWord;
		}

		$keyWords = preg_replace("/^;/","",$keyWords);
		// $title = addslashes($title); 
		// $feature = addslashes($feature); 
		// $abstract = addslashes($abstract); 
		// $keyWords = addslashes($keyWords); 
		
		$metaDataFromXML['journal'] = $journal; 
		$metaDataFromXML['volume'] = $volume; 
		$metaDataFromXML['issue'] = $issue; 
		$metaDataFromXML['month'] = $month; 
		$metaDataFromXML['year'] = $year; 
		$metaDataFromXML['info'] = $info; 
		$metaDataFromXML['hassup'] = $hasSup; 
		$metaDataFromXML['title'] = $title; 
		$metaDataFromXML['feature'] = $feature; 
		$metaDataFromXML['page'] = $page; 
		$metaDataFromXML['abstract'] = $abstract; 
		$metaDataFromXML['keywords'] = $keyWords; 
		$metaDataFromXML['authors'] = $authorsJson; 
		$metaDataFromXML['dates'] = $datesJson;
		$metaDataFromXML['id'] = $articleId; 

		return $metaDataFromXML;
	}

	public function getChangesFromGit($repo, $journal = DEFAULT_JOURNAL) {

		// Get status in porcelain mode
		$status = (string) $repo->status();

		// Replace '??' with A which means untracked files which are to be added
		$status = str_replace('??', 'A', $status);
		$status = preg_replace('/\h+/m', ' ', $status);
		$status = preg_replace('/^\h/m', '', $status);

		$lines = preg_split("/\n/", $status);
		
		$files['A'] = $files['M'] = $files['D'] = $files['F'] = array();

		foreach ($lines as $file) {
			
			// Extract files into three bins - A->Added, M->Modified and D->Deleted. Also filter other file not belonging to the journal mentioned
			if((preg_match('/^([AMD])\s(.*)/', $file, $matches)) && (preg_match('/Volumes\/' . $journal . '\//', $file))) {

				// Extract forthcmogng articles to a separate bin
				(preg_match('/Volumes\/' . $journal . '\/forthcoming/', $matches[2])) ? array_push($files['F'], $matches[2]) : array_push($files[$matches[1]], $matches[2]);
			}
		}

		return $files;
	}

	public function gitProcess($repo, $journal, $files, $operation, $message, $user) {

		if(($operation == 'addAll')&&(is_array($files))) {

			$path = preg_replace('/(.*)\/.*/' , "$1", $files[0]);
			$repo->run('add --all ' . $path);
		}
		else{

			foreach ($files as $file) {
				
				$repo->{$operation}($file);
			}
		}

		$message = str_replace(':journal', $journal, $message);
		$repo->run('-c "user.name=' . $user['name'] . '" -c "user.email=' . $user['email'] . '" commit -m "' . escapeshellarg($message) . '"');
	}

	public function verifyUser($journal, $user) {

		$users = constant(strtoupper($journal) . '_USERS');

		return (bool) preg_match('/"'.$user['email'] . ':' . $user['password'].'"/', $users);
	}

	public function formatStatus($statements) {

		$status = '<ul>';
		foreach ($statements as $statement) {
	
			$status .= '<li>' . $statement . '</li>';
		}
		$status .= '</ul>';
		return $status;
	}
	
	public function getSpecialMetaData($path) {

		$xmlFileName = PHY_BASE_URL . $path;

		if (!(file_exists($xmlFileName))) {
			return False;
		}

		$xml = simplexml_load_file($xmlFileName);
		$metaData = array();
		$id = 1;

		foreach ($xml->entry as $entry) {
			$article['title'] = (string) $entry->title;
			$article['volume'] = (string) $entry->volume;
			$article['pages'] = (string) $entry->pages;
			$article['year'] = (string) $entry->year;
			$article['id'] = str_pad($id, 4, '0', STR_PAD_LEFT);
			$id++;
			array_push($metaData, $article);
		}
		return $metaData;
	}
}

?>
