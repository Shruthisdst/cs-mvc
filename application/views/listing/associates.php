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
                            <li>Associateship</li>
                        </ol>
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title"><?=$data['typeTitle']?></p>
                                <p class="journal-article-subtitle">
                                    <?=count($data) - 1?>
                                    <?php if(count($data) > 2) { echo ' Associates';} else { echo ' Associate';}?>
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php

unset($data['typeTitle']);
foreach($data as $row) { 
?>

                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <span class="journal-article-meta-feature"><?=$viewHelper->displayAssociatePeriod($row->period)?></span>
                                </p>
                                <p class="journal-article-list-title">
                                    <a href="<?=BASE_URL . 'describe/associate/' . preg_replace('/ /', '_', $row->name)?>"><?=$row->name?></a>
                                    <?php
                                        $degree = '';
                                        $degree .= ($row->degree) ? $row->degree : '';
                                        $degree .= ($row->honours) ? ', ' . $row->honours : '';
                                        $degree = preg_replace('/^, /', '', $degree);
                                    ?>                                    
                                    <?php if($degree) { ?><br /><span class="subtitle"><?=$degree?></span><?php } ?>
                                </p>
                                <div class="journal-article-list-authors">
                                    <?php if($row->birth != '0000-00-00') { ?><span><strong>Date of birth:</strong> <?=$viewHelper->formatDate($row->birth)?></span><?php } ?>
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
                                            
                                            $fromTo = explode('-', $row->period);
                                            $validTill = $fromTo[1];
                                            echo ($validTill < date('Y')) ? '<strong>Address during Associateship:</strong> ' : '<strong>Address:</strong> ';
                                            
                                            echo $address;
                                        }
                                    ?>
                                    <?php
                                        $contact = '';
                                        $contact .= ($row->telephone_office) ? 'Office: ' . $row->telephone_office : '';
                                        $contact .= ($row->telephone_residence) ? '<br />Residence: ' . $row->telephone_residence : '';
                                        $contact .= ($row->fax) ? '<br />Fax: ' . $row->fax : '';
                                        $contact .= ($row->email) ? '<br />Email: ' . $row->email : '';
                                        $contact = preg_replace('/^<br \/>/', '', $contact);
                                    ?>
                                    <?php if($contact) { ?><br /><strong>Contact:</strong><br /><?=$contact?><?php } ?>
                                </div>
                                <?php if($row->url) { ?><div class="journal-article-list-meta"><span><a target="_blank" href="<?=$row->url?>"><?=$row->url?></a></span></div><?php } ?>
                            </li>
<?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
