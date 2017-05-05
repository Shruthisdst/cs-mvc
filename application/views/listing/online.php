    <div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins <?=$data['journal']?>"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li><?=$viewHelper->journalFullNames{$data['journal']}?></li>
                            <li>Online Resources</li>
                        </ol>                           
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title"><?=$viewHelper->journalFullNames{$data['journal']}?></p>
                                <p class="journal-article-subtitle">Online Resources</p>
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

                                        // Essentially the loop os run just once, as there can only be one online issue in each volume.
                                        echo '<li><span>' . $viewHelper->displayNumber($issue[2]) . ' | <a href="' . BASE_URL . 'listing/articles/' . $journal . '/' . $volume . '/' . $issue[0] . '">Online resources</a></span><br /><span /></li>';
                                    }
                                ?>
                               </ul>
                            </li>
<?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
                    
