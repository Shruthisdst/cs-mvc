<!-- Column 2 -->
        <div class="col-md-4 clear-paddings gap-above-med">
            <div class="col-padded col-shaded"><!-- inner custom column -->             
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_nav_menu"><!-- widget -->
                        <h1 class="title-widget"><strong>Current Science</strong></h1>
                        <div class="journal-desc">
                            <figure class="recent-news-thumb">
                                <a href="<?=BASE_URL . 'listing/articles/' . DEFAULT_JOURNAL . '/' . $current->volume . '/' . $current->issue?>" title="Current Issue : Vol. <?=$viewHelper->displayNumber($current->volume)?>, Issue <?=$viewHelper->displayNumber($current->issue)?>">
                                <img src="<?=STOCK_IMAGE_URL?>issue.png" alt="Current Issue"></a>
                            </figure>
                            <div class="journal-current-issue">
                                <p>
                                    <span class="text-primary"><a href="<?=BASE_URL . 'listing/articles/' . DEFAULT_JOURNAL . '/' . $current->volume . '/' . $current->issue?>">Current Issue</a></span><br />
                                    Volume <?=$viewHelper->displayNumber($current->volume)?> | Issue <?=$viewHelper->displayNumber($current->issue)?><br />
                                    <?=$viewHelper->displayMonth($current->month)?> <?=$viewHelper->displayNumber($current->year)?><br />
                                    <!-- <span class="text-primary">Special issue on signal-processing and computation fluid dynamics</span><br /> -->
                                </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="journal-menu">
                            <li><a href="<?=BASE_URL . 'Archives/'?>">Home</a></li>
                            <li><a href="<?=BASE_URL . 'listing/issues/'?>">Volumes &amp; Issues</a></li>
                            <li><a href="<?=BASE_URL . 'listing/specialIssues/'?>">Special Sections</a></li>
                            <li><a href="<?=BASE_URL . 'listing/categories/'?>">Categories</a></li>
                            <li><a href="<?=BASE_URL . 'Forthcoming_Articles/'?>">Forthcoming Articles</a></li>
                            <li><a href="<?=BASE_URL . 'search/index/' . $journal?>">Search</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php require_once('application/views/generalSidebar.php');?>
        </div>
    </div>
</div>
