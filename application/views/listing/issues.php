    <div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><?=$viewHelper->journalFullNames{$data['journal']}?></li>
                        </ol>                           
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title"><?=$viewHelper->journalFullNames{$data['journal']}?></p>
                                <p class="journal-article-subtitle">Volumes &amp; Issues</p>
                                <!-- <div class="journal-article-meta">
                                    <span class="journal-article-meta-feature">Special issue title goes here</span>
                                </div> -->
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php 
$journal = $data['journal'];
unset($data['journal']);
foreach ($data as $volume => $issues) { ?>
                            <li class="journal-article-details">
                                <h1 class="journal-article-volume">Volume <?=$viewHelper->displayNumber($volume)?></h1>
                                <ul class="journal-article-issues list-unstyled list-inline"> 
                                <?php
                                    foreach ($issues as $issue) {

                                        // "0" => issue, "1" => month, "2" => year
                                        echo '<li><span><a href="' . BASE_URL . 'listing/articles/' . $journal . '/' . $volume . '/' . $issue[0] . '">Issue ' . $viewHelper->displayNumber($issue[0]) . '</a></span><br /><span>' . $viewHelper->displayMonth($issue[1], 'short') . ' ' . $viewHelper->displayNumber($issue[2]) . '</span></li>';
                                    }
                                ?>
                               </ul>
                            </li>
<?php } ?>
                            <!-- Resonance has all the issues right from 1996 in the archive and hence there is no need to link old j_archive. -->
                            <?php if(($journal != 'reso') && ($journal != 'crsc')) { ?>
                            <li class="journal-article-details">
                                <a class="text-primary" target="_blank" href="http://www.ias.ac.in/j_archive/">Archive</a> of earlier issues (pre-2000).
                            </li>
                            <?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
                    
