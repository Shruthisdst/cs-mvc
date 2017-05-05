<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins <?=$journal?>"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li>Special Sections</li>
                        </ol>
                        <ul class="list-unstyled">
                            <li class="journal-article">
                                <p class="journal-article-title">
                                    Special Sections
                                </p>
                                <p class="journal-article-subtitle">
                                    Current Science
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php foreach($data as $row) { ?>

                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <span class="journal-article-meta-feature">Volume <?=$row->volume?></span>
                                    <span class="journal-article-meta-feature"><?=$row->year?></span>
                                    <span class="journal-article-meta-feature">pp. <?=$row->pages?></span>
                                </p>
                                <p class="journal-article-list-title"><a href="<?=BASE_URL.'listing/listsplIssue/' . $journal . '/' . $row->volume . '/' . $row->pages?>"><?=$row->title?></a></p>
                            </li>
<?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
