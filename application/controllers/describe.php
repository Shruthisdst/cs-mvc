<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->article();
	}

	public function article($journal = DEFAULT_JOURNAL, $id = '') {

		$data = $this->model->getDetails($journal, $id);
		if ($data) {

			$articleDetails = preg_split('/_/', $id);
			$path = PHY_VOL_URL . $journal . '/' . $articleDetails[1] . '/' . $articleDetails[2] . '/' . $articleDetails[3] . '-' . $articleDetails[4] . '/';
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

	public function getFeatureDetails($journal = DEFAULT_JOURNAL, $feature = 'correspondence') {

		$data = $this->model->listCurrentToc($journal, $feature);
		var_dump($data);
	}
}

?>
