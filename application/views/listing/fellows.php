<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Fellowship</li>
                        </ol>
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title"><?=$data['typeTitle']?></p>
                                <p class="journal-article-subtitle">
                                    <?=($data['type'] == '') ? 1065 : count($data) - 2?>
                                    <?php if(count($data) > 3) { echo ' Fellows';} else { echo ' Fellow';}?>
                                </p>
                            </li>
                            <?php if($data['type'] == '') {?>
                            <li class="alphabet-selection">
                                <a href="<?=BASE_URL?>listing/fellows/A">A</a> <a href="<?=BASE_URL?>listing/fellows/B">B</a> <a href="<?=BASE_URL?>listing/fellows/C">C</a> <a href="<?=BASE_URL?>listing/fellows/D">D</a> <a href="<?=BASE_URL?>listing/fellows/E">E</a> <span>F</span> <a href="<?=BASE_URL?>listing/fellows/G">G</a> <a href="<?=BASE_URL?>listing/fellows/H">H</a> <a href="<?=BASE_URL?>listing/fellows/I">I</a> <a href="<?=BASE_URL?>listing/fellows/J">J</a> <a href="<?=BASE_URL?>listing/fellows/K">K</a> <a href="<?=BASE_URL?>listing/fellows/L">L</a> <a href="<?=BASE_URL?>listing/fellows/M">M</a> <a href="<?=BASE_URL?>listing/fellows/N">N</a> <a href="<?=BASE_URL?>listing/fellows/O">O</a> <a href="<?=BASE_URL?>listing/fellows/P">P</a> <span>Q</span> <a href="<?=BASE_URL?>listing/fellows/R">R</a> <a href="<?=BASE_URL?>listing/fellows/S">S</a> <a href="<?=BASE_URL?>listing/fellows/T">T</a> <a href="<?=BASE_URL?>listing/fellows/U">U</a> <a href="<?=BASE_URL?>listing/fellows/V">V</a> <a href="<?=BASE_URL?>listing/fellows/W">W</a> <span>X</span> <a href="<?=BASE_URL?>listing/fellows/Y">Y</a> <span>Z</span>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php

$typeTitle = $data['typeTitle'];
unset($data['typeTitle']);
unset($data['type']);
foreach($data as $row) { 
?>

                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <span class="journal-article-meta-feature">Elected: <?=$row->yearelected?></span>
                                    <?php if(preg_match('/honorary/', $row->type)) { ?>
                                    <span class="journal-article-meta-feature">Honorary</span>
                                    <?php }else{ ?>
                                    <span class="journal-article-meta-feature">Section: <?=$row->section?></span>
                                    <?php } ?>
                                </p>
                                <p class="journal-article-list-title">
                                    <a href="<?=BASE_URL . 'describe/fellow/' . preg_replace('/ /', '_', $row->name)?>"><?=$row->name?></a>
                                    <?php
                                        $degree = '';
                                        $degree .= ($row->degree) ? $row->degree : '';
                                        $degree .= ($row->honours) ? ', ' . $row->honours : '';
                                        $degree = preg_replace('/^, /', '', $degree);
                                    ?>                                    
                                    <?php if($degree) { ?><br /><span class="subtitle"><?=$degree?></span><?php } ?>
                                    <?php if($row->councilservice) { ?><br /><span class="subtitle text-green"><?=$row->councilservice?></span><?php } ?>
                                </p>
                                <div class="journal-article-list-authors">
                                    <?php if($row->birth != '0000-00-00') { ?><span><strong>Date of birth:</strong> <?=$viewHelper->formatDate($row->birth)?></span><?php } ?>
                                    <?php if($row->death != '0000-00-00') { ?><br /><span class="text-primary"><strong>Date of death:</strong> <?=$viewHelper->formatDate($row->death)?></span><?php } ?>
                                    <?php if($row->specialization) { ?><br /><strong>Specialization:</strong> <?=$row->specialization?><?php } ?>
                                    <?php
                                        $address = '';
                                        $address .= ($row->address) ? $row->address : '';
                                        $address .= ($row->city) ? ', ' . $row->city : '';
                                        $address .= ($row->state) ? ', ' . $row->state : '';
                                        $address .= ($row->country) ? ', ' . $row->country : '';
                                        $address = preg_replace('/^, /', '', $address);
                                    ?>
                                    <?php
                                        if($address) {
                                            echo '<br />';
                                            echo (preg_match('/deceased/', $row->type)) ? '<strong>Last known address:</strong> ' : '<strong>Address:</strong> ';
                                            echo $address;
                                        }
                                    ?>
                                    <?php
                                        $contact = '';
                                        if(!(preg_match('/deceased/', $row->type))) {
                                         
                                            $contact .= ($row->telephone_office) ? 'Office: ' . $row->telephone_office : '';
                                            $contact .= ($row->telephone_residence) ? '<br />Residence: ' . $row->telephone_residence : '';
                                            $contact .= ($row->telephone_mobile) ? '<br />Mobile: ' . $row->telephone_mobile : '';
                                            $contact .= ($row->fax) ? '<br />Fax: ' . $row->fax : '';
                                            $contact .= ($row->email) ? '<br />Email: ' . $row->email : '';
                                            
                                            $contact = preg_replace('/^<br \/>/', '', $contact);
                                        }
                                    ?>
                                    <?php if($contact) { ?><br /><strong>Contact:</strong><br /><?=$contact?><?php } ?>
                                </div>
                                <?php if($row->url) { ?><div class="journal-article-list-meta"><span><a target="_blank" href="<?=$row->url?>"><?=$row->url?></a></span></div><?php } ?>
                            </li>
<?php
    }
    if ($typeTitle == 'Present Fellows') {

        echo '
            <p class="journal-article-list-page">
                <span class="journal-article-meta-feature text-primary">Past Fellow</span>
                <span class="journal-article-meta-feature text-primary">Date of resignation: 1976</span>
            </p>
            <p class="journal-article-list-title">Bhargava, P. M.</p>
        ';
    }
?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
