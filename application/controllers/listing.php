<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->issues();
	}

	public function issues($journal = DEFAULT_JOURNAL) {

		$data = $this->model->listIssues($journal);
		// Result obtained in the form of array("volume" => array("issue1", "issue2",...))
		($data) ? $this->view('listing/issues', $data, $journal) : $this->view('error/index');
	}

	public function online($journal = DEFAULT_JOURNAL) {

		$data = $this->model->listOnline($journal);
		// Result obtained in the form of array("volume" => array("issue1", "issue2",...))
		($data) ? $this->view('listing/online', $data, $journal) : $this->view('error/index');
	}

	public function articles($journal = DEFAULT_JOURNAL, $volume = DEFAULT_VOLUME, $issue = DEFAULT_ISSUE) {

		$data = $this->model->listArticles($journal, $volume, $issue);
		($data) ? $this->view('listing/articles', $data, $journal) : $this->view('error/index');
	}

	public function bibliography($journal = DEFAULT_JOURNAL, $author = '') {

		$data = $this->model->listAuthorArticles($journal, $author);
		($data) ? $this->view('listing/bibliography', $data, $journal) : $this->view('error/index');
	}

	public function categories($journal = DEFAULT_JOURNAL) {

		$data = $this->model->listCategories($journal);
		($data) ? $this->view('listing/categories', $data, $journal) : $this->view('error/index');
	}

	public function categoryArticles($journal = DEFAULT_JOURNAL, $feature = '') {

		$data = $this->model->listCategoryArticles($journal, $feature);
		($data) ? $this->view('listing/categoryArticles', $data, $journal) : $this->view('error/index');
	}

	public function covers($journal = DEFAULT_JOURNAL) {

		$data = $this->model->listCoverPages($journal);
		($data) ? $this->view('listing/covers', $data, $journal) : $this->view('error/index');
	}

	public function forthcoming($journal = DEFAULT_JOURNAL) {

		$data = $this->model->listForthcoming($journal);
		var_dump($data);
		//~ ($data) ? $this->view('listing/forthcoming', $data, $journal) : $this->view('error/index');
	}

	public function specialIssues($journal = DEFAULT_JOURNAL, $splTitle = '') {

		$data = $this->model->listSpecialIssues($journal, $splTitle);
		($data) ? $this->view('listing/specialIssues', $data, $journal) : $this->view('error/index');
	}

	public function listsplIssue($journal = DEFAULT_JOURNAL, $volume, $pages) {

		$data = $this->model->listSpecialSection($journal, $volume, $pages);
		($data) ? $this->view('listing/specialSection', $data, $journal) : $this->view('error/index');
	}

	public function currentToc($journal = DEFAULT_JOURNAL, $volume, $pages) {

		$data = $this->model->listSpecialSection($journal, $volume, $pages);
		($data) ? $this->view('listing/specialSection', $data, $journal) : $this->view('error/index');
	}
}

?>
