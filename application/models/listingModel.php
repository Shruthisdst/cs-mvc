<?php

class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listIssues($journal = DEFAULT_JOURNAL) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		// Issues which are actually Online resources are not included here
		$sth = $dbh->prepare('SELECT DISTINCT volume, issue, month, year FROM ' . METADATA_TABLE . ' WHERE journal=:journal and issue NOT REGEXP \'online\' ORDER BY volume DESC, issue');
		$sth->bindParam(':journal', $journal);
		
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$volume = $result->volume;
			$details = array($result->issue, $result->month, $result->year);

			if(isset($data{$volume})) {
				array_push($data{$volume}, $details);
			}
			else {
				$data{$volume} = array($details);
			}
		}

		if($data) {

			$data['journal'] = $journal;
		}

		$dbh = null;
		return $data;
	}
	
	public function listOnline($journal = DEFAULT_JOURNAL) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		// Only online resources are fethced here
		$sth = $dbh->prepare('SELECT DISTINCT volume, issue, month, year FROM ' . METADATA_TABLE . ' WHERE journal=:journal and issue REGEXP \'online\' ORDER BY volume DESC, issue');
		$sth->bindParam(':journal', $journal);
		
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$volume = $result->volume;
			$details = array($result->issue, $result->month, $result->year);

			if(isset($data{$volume})) {
				array_push($data{$volume}, $details);
			}
			else {
				$data{$volume} = array($details);
			}
		}

		if($data) {

			$data['journal'] = $journal;
		}

		$dbh = null;
		return $data;
	}

	public function listArticles($journal = DEFAULT_SERIES, $volume = DEFAULT_VOLUME, $issue = DEFAULT_ISSUE) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE journal=:journal AND volume=:volume AND issue=:issue ORDER BY page');
		$sth->bindParam(':journal', $journal);
		$sth->bindParam(':volume', $volume);
		$sth->bindParam(':issue', $issue);

		$sth->execute();
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
	        $i++;
		}

		$dbh = null;
		return $data;
	}

	public function listAuthorArticles($journal = DEFAULT_SERIES, $author = '') {

		if($author == '') {

			return null;
		}

		// In the url, spaces will be replaced by '_', and hence need to get back the actual authorname
		$author = preg_replace('/_/', ' ', $author);
	
		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE authors regexp :author');
		
		// json_encode is used to put unicode back to \uxxxx format so that it will match with whatever is there in the database
		// An alternative to this (> php v5.4.0) is to use JSON_UNESCAPED_UNICODE in dataModel::getAuthorJSON so that everything will be handled in unicode
		$authorJSONEncoded = json_encode($author);
		$authorQuoted = preg_quote($authorJSONEncoded);
		$sth->bindParam(':author', $authorQuoted);

		$sth->execute();
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
	        $i++;
		}

		if($data) {

			$data['author'] = $author;
		}

		$dbh = null;
		return $data;
	}

	public function listCategories($journal = DEFAULT_JOURNAL) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;

		$sth = $dbh->prepare('SELECT DISTINCT feature FROM ' . METADATA_TABLE . ' WHERE journal=:journal ORDER BY feature');
		$sth->bindParam(':journal', $journal);
		
		$sth->execute();
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
	        $i++;
		}

		$dbh = null;
		return $data;
	}

	public function listSpecialIssues($journal = DEFAULT_JOURNAL, $feature = '') {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;

		$sth = $dbh->prepare('SELECT * FROM ' . SPECIALSECTION_TABLE . ' ORDER BY volume DESC');

		$sth->execute();
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
			$i++;
		}

		$dbh = null;
		return $data;
	}

	public function listSpecialSection($journal = DEFAULT_JOURNAL, $volume, $pages) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		$pageRange = explode('-', $pages);
		$startPage = $pageRange[0];
		$endPage = $pageRange[1];

		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE volume=:volume AND page BETWEEN :startPage AND :endPage');
		$sth->bindParam(':volume', $volume);
		$sth->bindParam(':startPage', $startPage);
		$sth->bindParam(':endPage', $endPage);

		$sth->execute();
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
			$i++;
		}

		$dbh = null;
		return $data;
	}

	public function listCategoryArticles($journal = DEFAULT_SERIES, $feature = '') {

		if($feature == '') {

			return null;
		}

		// In the url, spaces will be replaced by '_', and hence need to get back the actual feature
		$feature = preg_replace('/_/', ' ', $feature);

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;

		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE feature regexp :feature');
		$sth->bindParam(':feature', $feature);

		$sth->execute();
		$data = null;
		$i = 0;
		
		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
	        $i++;
		}

		if($data) {

			$data['feature'] = $feature;
		}

		$dbh = null;
		return $data;
	}

	public function listCoverPages($journal = DEFAULT_SERIES) {

		$path = PHY_VOL_URL . $journal . '/**/**/thumb.jpg';
		$files = glob($path);
		$covers = array();
		foreach ($files as $file) {
			
			$relPath = str_replace(PHY_VOL_URL, '', $file);
			$peices = explode('/', $relPath);
			
			array_push($covers, $peices);
		}
		return array_reverse($covers);
	}

	public function listForthcoming($journal = DEFAULT_SERIES) {

		$dbh = $this->db->connect($journal);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . FORTHCOMING_TABLE);
		$sth->execute();
	
		$data = null;
		$i = 0;

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$data[$i] = $result;
	        $i++;
		}

		$dbh = null;
		return $data;
	}
}

?>
