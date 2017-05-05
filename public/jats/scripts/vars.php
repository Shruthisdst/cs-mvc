<?php

$volumesPath = "/var/www/html/ias/public/Volumes";

$jtitle=array(
'boms' => 'Bulletin of Materials Science',
'joaa' => 'Journal of Astrophysics and Astronomy',
'jbsc' => 'Journal of Biosciences',
'jcsc' => 'Journal of Chemical Sciences',
'jess' => 'Journal of Earth System Science',
'jgen' => 'Journal of Genetics',
'pram' => 'Pramana',
'pmsc' => 'Proceedings – Mathematical Sciences',
'reso' => 'Resonance',
'sadh' => 'Sadhana'
);

$jmetaData=array(
'boms' => "\t\t<journal-meta>
			<journal-id>boms</journal-id>
			<journal-title-group>
				<journal-title>Bulletin of Materials Science</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">Bull. Mater. Sci.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0250-4707</issn>
			<issn pub-type=\"electronic\">0973-7669</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'joaa' => "\t\t<journal-meta>
			<journal-id>joaa</journal-id>
			<journal-title-group>
				<journal-title>Journal of Astrophysics and Astronomy</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">J. Astrophys. Astr.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0250-6335</issn>
			<issn pub-type=\"electronic\">0973-7758</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'jbsc' => "\t\t<journal-meta>
			<journal-id>jbsc</journal-id>
			<journal-title-group>
				<journal-title>Journal of Biosciences</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">J. Biosci.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0250-5991</issn>
			<issn pub-type=\"electronic\">0973-7138</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'jcsc' => "\t\t<journal-meta>
			<journal-id>jcsc</journal-id>
			<journal-title-group>
				<journal-title>Journal of Chemical Sciences</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">J. Chem. Sci.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0974-3626</issn>
			<issn pub-type=\"electronic\">0973-7103</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'jess' => "\t\t<journal-meta>
			<journal-id>jess</journal-id>
			<journal-title-group>
				<journal-title>Journal of Earth System Science</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">J. Earth Syst. Sci.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0253-4126</issn>
			<issn pub-type=\"electronic\">0973-774X</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'jgen' => "\t\t<journal-meta>
			<journal-id>jgen</journal-id>
			<journal-title-group>
				<journal-title>Journal of Genetics</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">J. Genet.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0022-1333</issn>
			<issn pub-type=\"electronic\">0973-7731</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'pram' => "\t\t<journal-meta>
			<journal-id>pram</journal-id>
			<journal-title-group>
				<journal-title>Pramana</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">Pramana — J. Phys.</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0304-4289</issn>
			<issn pub-type=\"electronic\">0973-7111</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'pmsc' => "\t\t<journal-meta>
			<journal-id>pmsc</journal-id>
			<journal-title-group>
				<journal-title>Proceedings – Mathematical Sciences</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">Proc. Indian Acad. Sci. (Math. Sci.)</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0253-4142</issn>
			<issn pub-type=\"electronic\">0973-7685</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'reso' => "\t\t<journal-meta>
			<journal-id>reso</journal-id>
			<journal-title-group>
				<journal-title>Resonance</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">Resonance</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0971-8044</issn>
			<issn pub-type=\"electronic\">0973-712X</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>",
'sadh' => "\t\t<journal-meta>
			<journal-id>sadh</journal-id>
			<journal-title-group>
				<journal-title>Sadhana</journal-title>
				<abbrev-journal-title abbrev-type=\"iso4\">Sadhana</abbrev-journal-title>
			</journal-title-group>
			<issn pub-type=\"print\">0256-2499</issn>
			<issn pub-type=\"electronic\">0973-7677</issn>
			<publisher>
				<publisher-name>Indian Academy of Sciences</publisher-name>
				<publisher-loc>Bengaluru</publisher-loc>
			</publisher>
		</journal-meta>"
);


$date_short = array(
	"M" => "Manuscript Received",
	"R" => "Manuscript Revised",
	"A" => "Accepted",
	"E" => "Early published",
	"U" => "Unedited version published online",
	"F" => "Final version published online"
);

$preamble = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE article PUBLIC "-//NLM//DTD JATS (Z39.96) Journal Archiving and Interchange DTD v1.0 20120330//EN" "dtd/JATS-archivearticle1.dtd">
<article xmlns:xlink="http://www.w3.org/1999/xlink">
	<front>
';

$postinfo = '	</front>
</article>
';

?>
