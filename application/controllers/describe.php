<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->article();
	}

	public function article($journal = DEFAULT_JOURNAL, $volume = DEFAULT_VOLUME, $issue = DEFAULT_ISSUE, $page = DEFAULT_PAGE) {

		$data = $this->model->getDetails($journal, $volume, $issue, $page);
		if ($data) {
			
			$path = PHY_VOL_URL . $journal . '/' . $volume . '/' . $issue . '/' . $page . '/';
			$data->supplementary = $this->model->listFiles($path);
			$this->view('describe/article', $data, $journal);
		}
		else {
			
			$this->view('error/index');
		}
	}

	public function fellow($name = '') {

		$data = $this->model->getDetailsByName($name, 'FELLOW');
		($data) ? $this->view('describe/fellow', $data) : $this->view('error/index');
	}

	public function associate($name = '') {

		$data = $this->model->getDetailsByName($name, 'ASSOCIATE');
		($data) ? $this->view('describe/associate', $data) : $this->view('error/index');
	}
}

?>