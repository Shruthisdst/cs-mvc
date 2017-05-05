<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li><?=$viewHelper->journalFullNames{$journal}?></li>
                            <li>Cover page gallery</li>
                        </ol>                           
                        <ul class="list-unstyled">
                            <li class="journal-article">
                                <p class="journal-article-title">Cover page gallery</p>
                                <p class="journal-article-subtitle"><?=$viewHelper->journalFullNames{$journal}?></p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <?php
                            foreach($data as $row) {
                        
                                $viewHelper->displayCoverGalleryItem($row);
                            }
                        ?>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
