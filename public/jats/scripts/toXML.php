<!DOCTYPE html>
<html lang="en">
<head>
	<title>Indian Academy of Sciences</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script  src="js/input_method.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div id="navbar" class="navbar-collapse collapse">
			 <ul class="nav navbar-nav navbar-right">
				<li><a href="../index.php">Home</a></li>
			</ul>
	  </div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">JATS XML Generation Form</h1>
			<hr />
			<br /> 
		</div>
	</div>

<?php
include "vars.php";

$affiliations = '';
$authors_group = '';
$keywords = '';
$journal = '';
$fl = 0;
if(isset($_POST['journal']))
{
	$journal = $_POST['journal'];
}
if(isset($_POST['afflist']))
{
	$affiliations = $_POST['afflist'];
}
if(isset($_POST['group']))
{
	$authors_group = $_POST['group'];
}
if(isset($_POST['id_20']))
{
	$keywords = $_POST['id_20'];
}

$pubType = $_POST['pubtype'];
$article_ID = $_POST['id_1'];
$categories = $_POST['id_2'];
$title = $_POST['id_3'];
$PublishedDate = $_POST['id_6'];
$vnum = $_POST['id_7'];
$inum = $_POST['id_8'];
$IssueTitle = $_POST['id_9'];
$SupplInfo = $_POST['id_10'];
$PageRange = $_POST['id_11'];
$ReceivedDate = $_POST['id_12'];
$RevisedDate = $_POST['id_13'];
$AcceptedDate = $_POST['id_14'];
$EpubDate = $_POST['id_15'];
$Unedited_version = $_POST['id_16'];
$Final_version = $_POST['id_17'];
$Abstract = $_POST['id_19'];
$keywords = $_POST['id_20'];

if($ReceivedDate != '')
{
	$fl = 1;
}
if($RevisedDate != '')
{
	$fl = 1;
}
if($AcceptedDate != '')
{
	$fl = 1;
}
if($EpubDate != '')
{
	$fl = 1;
}
if($Unedited_version != '')
{
	$fl = 1;
}
if($Final_version != '')
{
	$fl = 1;
}
if($pubType == 'published')
{
	$FileName = $PageRange.".xml";
}
if($pubType == 'forthcoming')
{
	$FileName = $article_ID.".xml";
}
$path = "../xml/$journal/$FileName";

$file = fopen("$path","w");
chmod("$path", 0777);

fwrite($file, $preamble);
fwrite($file, $jmetaData[$journal]);
fwrite($file, "\n\t\t<article-meta>\n");
if($pubType == 'published')
{
	fwrite($file, "\t\t\t<article-id pub-id-type=\"ias\">".$journal."_".$vnum."_".$inum."_".$PageRange."</article-id>\n");
}
if($pubType == 'forthcoming')
{
	fwrite($file, "\t\t\t<article-id pub-id-type=\"ias\">$article_ID</article-id>\n");
}
if($categories != '')
{
	$categories = trim($categories);
	fwrite($file, "\t\t\t<article-categories>
				<series-title>$categories</series-title>
			</article-categories>\n");
}
else
{
	fwrite($file, "\t\t\t<article-categories />\n");
}
$title = trim($title);
$title = replace_tags($title);
fwrite($file, "\t\t\t<title-group>
\t\t\t\t<article-title>$title</article-title>
\t\t\t</title-group>\n");

if($authors_group != '')
{
	fwrite($file, "\t\t\t<contrib-group>\n");
	foreach($authors_group as $key)
	{
		$key[0] = trim($key[0]);
		$key[1] = trim($key[1]);
		$key[0] = preg_replace("/[ ]+/", " ", $key[0]);
		$key[1] = preg_replace("/[ ]+/", " ", $key[1]);
		$stringName = $key[1] . " " . $key[0];

		fwrite($file, "\t\t\t\t<contrib contrib-type=\"author\">
					<name>
						<surname>".$key[0]."</surname>
						<given-names>".$key[1]."</given-names>
					</name>
					<string-name>".$stringName."</string-name>\n");
		if($key[2] != '')
		{
			fwrite($file, "\t\t\t\t\t<email>".$key[2]."</email>\n");
		}
		else
		{
			fwrite($file, "\t\t\t\t\t<email />\n");
		}
		if($key[3] != '')
		{
			$AffCounts = (explode(",",$key[3]));
			foreach($AffCounts as $eachcount)
			{
				fwrite($file, "\t\t\t\t\t<xref ref-type=\"aff\" rid=\"aff-".$eachcount."\"/>\n");
			}
		}
		fwrite($file, "\t\t\t\t</contrib>\n");
	}
	if($affiliations != "")
	{
		for($i=0;$i<count($affiliations);$i++)
		{
			$aff = "aff-" . ($i+1);
			//$affiliations[$i];
			$affiliations[$i] = preg_replace('/&(?![A-Za-z0-9#]{1,7};)/', '&amp;', $affiliations[$i]);

			fwrite($file, "\t\t\t\t<aff id=\"".$aff."\">".$affiliations[$i]."</aff>\n");
			
		}
	}
	fwrite($file, "\t\t\t</contrib-group>\n");
}
else
{
	fwrite($file, "\t\t\t<contrib-group>
				<contrib />
			</contrib-group>\n");
}
if($PublishedDate != '')
{
	$pubDate = '';
	$splitDateForm = (explode("-", $PublishedDate));
	$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
	$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
	$PublishedDate = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
	$PublishedDate = preg_replace("/^[-]/", "", $PublishedDate);
	fwrite($file, "\t\t\t<pub-date date-type=\"published\">
\t\t\t\t<string-date>$PublishedDate</string-date>
\t\t\t</pub-date>\n");
}
else
{
	fwrite($file, "\t\t\t<pub-date />\n");
}
if($vnum != '')
{
	fwrite($file, "\t\t\t<volume>$vnum</volume>\n");
}
else
{
	fwrite($file, "\t\t\t<volume />\n");
}
if($inum != '')
{
	fwrite($file, "\t\t\t<issue>$inum</issue>\n");
}
else
{
	fwrite($file, "\t\t\t<issue />\n");
}
if($IssueTitle != '')
{
	$IssueTitle = trim($IssueTitle);
	fwrite($file, "\t\t\t<issue-title>$IssueTitle</issue-title>\n");
}
else
{
	fwrite($file, "\t\t\t<issue-title />\n");
}
if($PageRange != '')
{
	fwrite($file, "\t\t\t<page-range>$PageRange</page-range>\n");
}
else
{
	fwrite($file, "\t\t\t<page-range />\n");
}
if($SupplInfo != '')
{
	$getMimeType = array("pdf"=>"application/pdf", "doc"=>"application/msword", "docx"=>"application/msword", "xls"=>"application/excel", "xlsx"=>"application/excel", "jpg"=>"image/jpeg","jpeg"=>"image/jpeg", "png"=>"image/png", "tif"=>"image/tiff", "tiff"=>"image/tiff");
	$SupplInfo = (explode(";", $SupplInfo));
	foreach($SupplInfo as $eachSup)
	{
		$SupFile = explode(".", $eachSup);
		$FileExtn = array_pop($SupFile);
		//~ $FileExtn = $SupFile[count($SupFile)-1];
		fwrite($file, "\t\t\t<supplementary-material mimetype=\"" . $getMimeType{$FileExtn} . "\" xlink:href=\"$eachSup\" />\n");
	}
}
else
{
	fwrite($file, "\t\t\t<supplementary-material />\n");
}
if($fl == 1)
{
	fwrite($file, "\t\t\t<history>\n");
	if($ReceivedDate != '')
	{
		$splitDateForm = (explode("-", $ReceivedDate));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$ReceivedDate = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		fwrite($file, "\t\t\t\t<date date-type=\"Manuscript Received\">
\t\t\t\t\t<string-date>$ReceivedDate</string-date>
\t\t\t\t</date>\n");
	}
	if($RevisedDate != '')
	{
		$splitDateForm = (explode("-", $RevisedDate));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$RevisedDate = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		$RevisedDate = preg_replace("/ /", "", $RevisedDate);
		fwrite($file, "\t\t\t\t<date date-type=\"Manuscript Revised\">
\t\t\t\t\t<string-date>$RevisedDate</string-date>
\t\t\t\t</date>\n");
	}
	if($AcceptedDate != '')
	{
		$splitDateForm = (explode("-", $AcceptedDate));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$AcceptedDate = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		$AcceptedDate = preg_replace("/ /", "", $AcceptedDate);
		fwrite($file, "\t\t\t\t<date date-type=\"Accepted\">
\t\t\t\t\t<string-date>$AcceptedDate</string-date>
\t\t\t\t</date>\n");
	}
	if($EpubDate != '')
	{
		$splitDateForm = (explode("-", $EpubDate));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$EpubDate = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		$EpubDate = preg_replace("/ /", "", $EpubDate);
		fwrite($file, "\t\t\t\t<date date-type=\"Early published\">
\t\t\t\t\t<string-date>$EpubDate</string-date>
\t\t\t\t</date>\n");
	}
	if($Unedited_version != '')
	{
		$splitDateForm = (explode("-", $Unedited_version));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$Unedited_version = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		$Unedited_version = preg_replace("/ /", "", $Unedited_version);
		fwrite($file, "\t\t\t\t<date date-type=\"Unedited version published online\">
\t\t\t\t\t<string-date>$Unedited_version</string-date>
\t\t\t\t</date>\n");
	}
	if($Final_version != '')
	{
		$splitDateForm = (explode("-", $Final_version));
		$splitDateForm[0] = str_pad($splitDateForm[0], 2, '0', STR_PAD_LEFT);
		$splitDateForm[1] = str_pad($splitDateForm[1], 2, '0', STR_PAD_LEFT);
		$Final_version = $splitDateForm[2]."-".$splitDateForm[1]."-".$splitDateForm[0];
		$Final_version = preg_replace("/ /", "", $Final_version);
		fwrite($file, "\t\t\t\t<date date-type=\"Final version published online\">
\t\t\t\t\t<string-date>$Final_version</string-date>
\t\t\t\t</date>\n");
	}
	fwrite($file, "\t\t\t</history>\n");
}
else
{
	fwrite($file, "\t\t\t<history />\n");
}
if($pubType == 'published')
{
	fwrite($file, "\t\t\t<self-uri xlink:href=\"http://www.ias.ac.in/article/fulltext/$journal/$vnum/$inum/$PageRange\"/>\n");
}
if($pubType == 'forthcoming')
{
	fwrite($file, "\t\t\t<self-uri />\n");
}

if($Abstract != '')
{
	fwrite($file, "\t\t\t<abstract>\n");

	$Abstract = replace_tags($Abstract);
	preg_match("'<p>'", $Abstract, $match);
	if($match)
	{
		$Abstract = preg_replace('/\r?\n(?=[\w|\$\(\)])/m', '', trim($Abstract));
		$Abstract = preg_replace('/(<\/[pP]>)\s+(<[pP]>)/', "$1\n\t\t\t\t$2", trim($Abstract));
		$Abstract = preg_replace('/(<\/[pP]>)\s+(<list list-type="bullet">)/', "$1\n\t\t\t\t$2", trim($Abstract));
		$Abstract = preg_replace('/(<\/[pP]>)\s+(<list list-type="ordered">)/', "$1\n\t\t\t\t$2", trim($Abstract));
		$Abstract = preg_replace('/(<list-item>)/', "\t\t\t\t\t$1", trim($Abstract));
		$Abstract = preg_replace('/(<\/list>)/', "\t\t\t\t$1", trim($Abstract));
		$Abstract = preg_replace('/(<\/list>)\s*(<p>)/', "$1\n\t\t\t\t$2", trim($Abstract));
	}
	else
	{
		$Abstract = replace_tags($Abstract);
		$Abstract = preg_replace('/(<\/[pP]>)\s+(<[pP]>)/', "$1\n\t\t\t\t$2", trim($Abstract));
		//~ $Abstract = preg_replace('/(<\/[pP]>)\s+(<list list-type="bullet">)/', "$1\n\t\t\t\t$2", trim($Abstract));
		//~ $Abstract = preg_replace('/(<\/[pP]>)\s+(<list list-type="ordered">)/', "$1\n\t\t\t\t$2", trim($Abstract));
		//~ $Abstract = preg_replace('/(<list-item>)/', "\n\t\t\t\t\t$1", trim($Abstract));
		//~ $Abstract = preg_replace('/(<\/list>)/', "\n\t\t\t\t$1", trim($Abstract));
		
		$Abstract = preg_replace('/\r?\n(?=[\w|\$\(\)])/m', '', trim($Abstract));
		$Abstract = preg_replace('/(.*)/', "<p>$1</p>", trim($Abstract));
			//~ $Abstract = preg_replace('/\s+(<\/[pP]>)\s+/', "</p>", $Abstract);
			//~ $Abstract = preg_replace('/(<\/[pP]>)\s+(<[pP]>)/', "$1\n\t\t\t\t$2", $Abstract);
			//~ $Abstract = preg_replace('/(<p>)(<list list-type="bullet">)(<\/p>)/', "$2", $Abstract);
			//~ $Abstract = preg_replace('/(<p>)(<list list-type="ordered">)(<\/p>)/', "$2", $Abstract);
			//~ $Abstract = preg_replace('/(<list-item>)(.*?)(<\/p>)/', "$1$2", $Abstract);
			//~ $Abstract = preg_replace('/(<p>)(<\/list-item>)/', "$2", $Abstract);
			//~ $Abstract = preg_replace('/(<p>)(<list-item>)/', "\t$2", $Abstract);
			//~ $Abstract = preg_replace('/(<\/list-item>)(<\/p>)/', "$1", $Abstract);
			//~ $Abstract = preg_replace('/(<p>)(<\/list>)(<\/p>)/', "$2", $Abstract);
		$Abstract = preg_replace('/<[pP]><\/[pP]>/', "", $Abstract);
	}

	fwrite($file, "\t\t\t\t$Abstract\n");

	fwrite($file, "\t\t\t</abstract>\n");
}
else
{
	fwrite($file, "\t\t\t<abstract />\n");
}
if($keywords != '')
{
	fwrite($file, "\t\t\t<kwd-group kwd-group-type=\"author-generated\">\n");
	$kwds = (explode(";",$keywords));
	foreach($kwds as $kwd)
	{
		$kwd = trim($kwd);
		$kwd = replace_tags($kwd);
		fwrite($file, "\t\t\t\t<kwd>$kwd</kwd>\n");
	}
	fwrite($file, "\t\t\t</kwd-group>\n");
}
else
{
	fwrite($file, "\t\t\t<kwd-group kwd-group-type=\"author-generated\">
\t\t\t\t<kwd />
\t\t\t</kwd-group>\n");
}

fwrite($file, "\t\t</article-meta>
\t</front>
</article>
");

fclose($file);
echo "<div class=\"row\">
		<div class=\"col-xs-12 outFile text-center\"><a href=\"$path\" download=\"$FileName\">Click here to download the file $FileName</a></div>
		<div class=\"col-xs-12 outFile text-center\"><a href=\"http://www.ncbi.nlm.nih.gov/pmc/tools/xmlchecker/\" target=\"_blank\">Click here to validate the file $FileName</a></div>
	</div>";

function replace_tags($text)
{
	$text = preg_replace('/&(?![A-Za-z0-9#]{1,7};)/', '&amp;', $text);
	$text = preg_replace('/<b>/', "<bold>", $text);
	$text = preg_replace('/<\/b>/', "</bold>", $text);
	$text = preg_replace('/<i>/', "<italic>", $text);
	$text = preg_replace('/<\/i>/', "</italic>", $text);
	$text = preg_replace('/<ol>/', "\t\t\t\t<list list-type=\"ordered\">", $text);
	$text = preg_replace('/<\/ol>/', "</list>", $text);
	$text = preg_replace('/<ul>/', "\t\t\t\t<list list-type=\"bullet\">", $text);
	$text = preg_replace('/<\/ul>/', "</list>", $text);
	$text = preg_replace('/<li>/', "<list-item><p>", $text);
	$text = preg_replace('/<\/li>/', "</p></list-item>", $text);
	return $text;
}
?>

</div>
</body>
</html>
