$(function () {
			$("input[name='pubtype']").click(function () {
            if ($("#pubtype_2").is(":checked")) {
                $("#showArticleID").show();
            } else {
                $("#showArticleID").hide();
            }
        });
});

function validate()
{
	var journal = document.getElementById("journal").value;
	var article_id = document.getElementById("id_1").value;
	var title = document.getElementById("id_3").value;
	var pubDate = document.getElementById("id_6").value;
	var vnum = document.getElementById("id_7").value;
	var inum = document.getElementById("id_8").value;
	var suppl = document.getElementById("id_10").value;
	var pages = document.getElementById("id_11").value;
	var receivedDate = document.getElementById("id_12").value;
	var revisedDate = document.getElementById("id_13").value;
	var acceptedDate = document.getElementById("id_14").value;
	var epubDate = document.getElementById("id_15").value;
	var uneditedVersion = document.getElementById("id_16").value;
	var finalVersion = document.getElementById("id_17").value;

	if(journal == '')
	{
		alert('Please select journal!');
		return false;
	}
	if(document.getElementById('pubtype_2').checked)
	{
		if(article_id == '')
		{
			alert('Please Enter Article ID!');
			return false;
		}
		if(article_id.match(' '))
		{
			alert('Spaces Found in Article Id!');
			return false;
		}
		if((vnum != '') && (!(vnum.match(/^\d{3}$/))))
		{
			alert('Volume number should be 3 digits!');
			return false;
		}
		if((inum != '') && (!(inum.match(/^\d{2}$/))))
		{
			alert('Issue number should be 2 digits!');
			return false;
		}
		if((pages != '') && (!(pages.match(/^(([\d+]{4})|(([\d+]{4}|[\d+]{4}[a-z]+)\-([\d+]{4}|[\d+]{4}[a-z]+)))$/))))
		{
			alert('Please enter valid page range or CAP ID!');
			return false;
		}
	}
	if(title == '')
	{
		alert('Please Enter Title!');
		return false;
	}
	if(document.getElementById('pubtype_1').checked)
	{
		
		if(pubDate == '')
		{
			alert('Please enter valid published date of an article!');
			return false;
		}
		if(!(vnum.match(/^\d{3}$/)))
		{
			alert('Volume number should be 3 digits!');
			return false;
		}
		if(!(inum.match(/^\d{2}$/)))
		{
			alert('Issue number should be 2 digits!');
			return false;
		}
		if(!(pages.match(/^(([\d+]{4})|(([\d+]{4}|[\d+]{4}[a-z]+)\-([\d+]{4}|[\d+]{4}[a-z]+)))$/)))
		{
			alert('Please enter valid page range or CAP ID!');
			return false;
		}
	}
	if(suppl.match(' '))
	{
		alert('Spaces found in supplementary material information!');
		return false;
	}
	if((pubDate != '') && (!(pubDate.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid published date of an article!');
		return false;
	}
	if((receivedDate != '') && (!(receivedDate.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid manuscript received date of an article!');
		return false;
	}
	if((revisedDate != '') && (!(revisedDate.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid manuscript revised date of an article!');
		return false;
	}
	if((acceptedDate != '') && (!(acceptedDate.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid accepted date of an article!');
		return false;
	}
	if((epubDate != '') && (!(epubDate.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid early published date of an article!');
		return false;
	}
	if((uneditedVersion != '') && (!(uneditedVersion.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid unedited version published date of an article!');
		return false;
	}
	if((finalVersion != '') && (!(finalVersion.match(/^(([\d+]{1}|[\d+]{2})\-([\d+]{1}|[\d+]{2})\-([\d+]{4}))$/))))
	{
		alert('Please enter valid final version published date of an article!');
		return false;
	}
}

