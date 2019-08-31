<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins <?=$data->journal?>"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li><?=$viewHelper->journalFullNames{$data->journal}?></li>
                            <li>Volume <?=$viewHelper->displayNumber($data->volume)?></li>
                            <li><?=$viewHelper->displayIssue($data->issue)?></li>
                        </ol>                           
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title gap-below"><?=$viewHelper->formatText($data->title)?></p>
                                <p class="journal-article-authors">
                                    <?=$viewHelper->displayAuthors($data->authors, $data->journal)?>
                                </p>
                                <div class="journal-article-meta">
                                    <span class="journal-article-meta-feature"><?=$data->feature?></span>
                                    <span class="journal-article-meta-volume">Volume <?=$viewHelper->displayNumber($data->volume)?></span>
                                    <span class="journal-article-meta-issue"><?=$viewHelper->displayIssue($data->issue)?></span>
                                    <span class="journal-article-meta-date"><?=$viewHelper->displayMonth($data->month)?> <?=$data->year?></span>
                                    <span class="journal-article-meta-page">
                                        <?php
                                            if(preg_match('/(.*)-(.*)/', $data->page)){

                                                echo "pp&nbsp;" . $viewHelper->displayNumber($data->page);        
                                            }
                                            else{

                                                 echo "Article ID&nbsp;" . $viewHelper->displayArtId($data->page);   
                                            }
                                        ?>
                                        
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </li><!-- widgets list end -->
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ul class="list-unstyled">                          
                            <li class="journal-article-details">                            
                                <h1 class="title-median">Fulltext</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p><span class="text-primary"><?=$viewHelper->linkArticle($data, '<i class="fa fa-file-pdf-o"></i>', 'download', 'Download PDF')?></span> &nbsp; <?=$viewHelper->linkArticle($data, 'Click here to view fulltext PDF')?></p>
                                        <p><br />Permanent link:<br /><?=BASE_URL.'article/fulltext/crsc/' . $viewHelper->getPDFLink($data)?></p>
                                    </div>
                                </div>
                            </li>
                            <?php if($data->keywords != '') { ?>
                            <li class="journal-article-details">
                                <h1 class="title-median">Keywords</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p><?=$viewHelper->formatText($viewHelper->displayKeywords($data->keywords))?></p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if($data->abstract != '') { ?>
                            <li class="journal-article-details">
                                <h1 class="title-median">Abstract</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <?=$viewHelper->formatText($data->abstract)?>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <?php
                                if($data->authors != '[]') { 
                                    // Get unique affiliation list and pass it to both displayAuthor and displayAffiliation
                                    $uniqueAffiliations = $viewHelper->getUniqueAffiliations($data->authors);
                            ?>
                            <li class="journal-article-details">
                                <h1 class="title-median">Author Affiliations</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <p class="journal-article-affiliation">
                                            <?=$viewHelper->displayAuthors($data->authors, $data->journal, 1, $uniqueAffiliations)?>
                                        </p>
                                        <?=$viewHelper->displayAffiliationList($uniqueAffiliations)?>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if($data->dates != '[]') { ?>
                            <li class="journal-article-details">
                                <h1 class="title-median">Dates</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <dl class="dl-horizontal journal-article-dates">
                                            <?=$viewHelper->displayDates($data->dates)?>
                                        </dl>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if($data->hassup == '1') { ?>
                            <li class="journal-article-details">
                                <h1 class="title-median">Supplementary Material</h1>
                                <div class="recent-news-meta">&nbsp;</div>
                                <div class="recent-news-content clearfix">
                                    <div class="recent-news-text clear-margins">
                                        <ul>
                                            <?=$viewHelper->displaySupplementaryMaterial($data)?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
                
