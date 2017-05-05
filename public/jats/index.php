<!DOCTYPE html>
<html lang="en">

<head>
	<title>Indian Academy of Sciences</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="scripts/css/normalize.css">
	<link rel="stylesheet" href="scripts/css/bootstrap.min.css">
	<script src="scripts/js/jquery.min.js"></script>
	<script src="scripts/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script  src="scripts/js/input_method.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="scripts/js/validation.js"></script>
	<script src="scripts/js/add_auth_aff.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div id="navbar" class="navbar-collapse collapse">
			 <ul class="nav navbar-nav navbar-right">
				<li><a href="#">Home</a></li>
			</ul>
	  </div>
	</div>
</nav>

	<div class="container">
		<h1 class="text-center">JATS XML Generation Form</h1>
		<hr />
		<br /> 
		<form  method="POST" class="form-horizontal" role="form" action="scripts/toXML.php" onsubmit="return validate()">
			<div class="form-group">
				<label for="list" class="control-label col-xs-2">Select Journal <span class="warning">*</span></label>
				&nbsp;&nbsp;&nbsp;&nbsp;<select name="journal" id="journal">
					<option value="">-Select Journal-</option>
					<option value="boms">Bulletin of Materials Science</option>
					<option value="joaa">Journal of Astrophysics and Astronomy</option>
					<option value="jbsc">Journal of Biosciences</option>
					<option value="jcsc">Journal of Chemical Sciences</option>
					<option value="jess">Journal of Earth System Science</option>
					<option value="jgen">Journal of Genetics</option>
					<option value="pram">Pramana – Journal of Physics</option>
					<option value="pmsc">Proceedings – Mathematical Sciences</option>
					<option value="reso">Resonance</option>
					<option value="sadh">Sadhana</option>
				</select>
			</div>
			<div class="form-group">
				<label for="pubtype" class="control-label col-xs-2">Publication Type</label>
				<div class="col-xs-6">
					<input type="radio" name="pubtype" id="pubtype_1" value="published" checked> Published<br>
					<input type="radio" name="pubtype" id="pubtype_2" value="forthcoming"> Forthcoming<br>
				</div>
			</div>
			<div class="form-group" id="showArticleID">
				<label for="id_1" class="control-label col-xs-2">Article ID</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_1" name="id_1" placeholder="Enter article id without any spaces">
				</div>
			</div>
			<div class="form-group">
				<label for="id_2" class="control-label col-xs-2">Article Categories</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_2" name="id_2" placeholder="Enter category of an article">
				</div>
			</div>
			<div class="form-group">
				<label for="id_3" class="control-label col-xs-2">Article Title <span class="warning">*</span></label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_3" name="id_3" placeholder="Enter title of an article">
				</div>
			</div>
			<div class="form-group">
				<ol id="orderedlist">
				</ol>
				<input type="button" id="btn" onclick="addTextBox(btn)" value="Add Affiliation">
			</div>
			<div class="form-group">
				<div id="Authlist">
				</div>
				<input type="button" id="addAuthorbtn" onclick="addAuthors(addAuthorbtn)" value="Add Authors">
			</div>
			<div class="form-group">
				<p><strong>Note:</strong> Please fill this field, if it is published article. Otherwise leave it blank.</p> 
				<label for="id_6" class="control-label col-xs-2">Published Date</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_6" name="id_6" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_7" class="control-label col-xs-2">Volume No.</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_7" name="id_7" placeholder="Enter volume number with 3 digits - 000">
				</div>
			</div>
			<div class="form-group">
				<label for="id_8" class="control-label col-xs-2">Issue No.</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_8" name="id_8" placeholder="Enter issue number with 2 digits - 00">
				</div>
			</div>
			<div class="form-group">
				<label for="id_9" class="control-label col-xs-2">Issue Title</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_9" name="id_9" placeholder="Enter special issue title">
				</div>
			</div>
			<div class="form-group">
				<label for="id_10" class="control-label col-xs-2">Supplementary Material Information</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_10" name="id_10" placeholder="Enter file names separated with semicolons without any spaces">
				</div>
			</div>
			<div class="form-group">
				<label for="id_11" class="control-label col-xs-2">Page Range /<br />CAP ID</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_11" name="id_11" placeholder="0000-0000 / 0000">
				</div>
			</div>
			<div class="form-group">
				<label for="id_12" class="control-label col-xs-2">Manuscript Received Date</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_12" name="id_12" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_13" class="control-label col-xs-2">Manuscript Revised Date</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_13" name="id_13" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_14" class="control-label col-xs-2">Accepted Date</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_14" name="id_14" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_15" class="control-label col-xs-2">Early Published Date</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_15" name="id_15" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_16" class="control-label col-xs-2">Unedited version published online</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_16" name="id_16" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_17" class="control-label col-xs-2">Final version published online</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_17" name="id_17" placeholder="DD-MM-YYYY">
				</div>
			</div>
			<div class="form-group">
				<label for="id_19" class="control-label col-xs-2">Abstract</label>
				<div class="col-xs-6">
					<textarea class="form-control" rows="7" id="id_19" name="id_19" placeholder="Please enclosing abstract within HTML <p> tag. Ex: <p>paragraph...</p> like this. If abstract contains mathematical equation then use Tex commands"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="id_20" class="control-label col-xs-2">Keywords</label>
				<div class="col-xs-6">
					<input type="text" class="form-control" id="id_20" name="id_20" placeholder="Enter Keywords separated with semicolons">
				</div>
			</div>
			<div class="row right">
				<div class="col-xs-10 center">
					<button type="submit" class="btn btn-default">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12"></div>
			</div>
		</form>
	</div>
</body>
</html>
