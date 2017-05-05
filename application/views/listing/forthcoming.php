<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins <?=$data[0]->journal?>"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journals</li>
                            <li><?=$viewHelper->journalFullNames{$data[0]->journal}?></li>
                            <li>Forthcoming articles</li>
                        </ol>                           
                        <ul class="list-unstyled">
                            <li class="journal-article">
                                <p class="journal-article-title">
                                    Forthcoming articles
                                </p>
                                <p class="journal-article-subtitle">
                                    <?=$viewHelper->journalFullNames{$data[0]->journal}?>
                                </p>
                                <?php if($data[0]->journal == "jess"): ?>
                                    <p>Please note that these full text PDF files contain the unedited and unformatted  versions of the accepted papers scheduled to be published in the forthcoming issues.
                                    </p>    
                                <?php endif; ?>    
                                <!-- <div class="journal-article-meta">
                                    <span class="journal-article-meta-feature"><?=$data[0]->info?></span>
                                </div> -->
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <ul class="list-unstyled">
<?php foreach($data as $row) { ?>

                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <!-- <span class="journal-article-meta-feature">pp <?=$viewHelper->displayNumber($row->page)?></span> -->
                                    <span class="journal-article-meta-feature"><?=$row->feature?></span>
                                </p>
                                <!-- <p class="journal-article-list-title"><a href="<?=BASE_URL.'describe/article/' . $row->journal . '/' . $row->volume . '/' . $row->issue . '/' . $row->page?>"><?=$row->title?></a></p> -->
                                <?php if(file_exists(PHY_VOL_URL . $row->journal . "/forthcoming/" . $row->id . ".pdf" )): ?>
                                    <p class="journal-article-list-title">
                                        <a href="<?=VOL_URL?><?=$row->journal?>/forthcoming/<?=$row->id?>.pdf" target="_blank"><?=$row->title?></a>
                                    </p>
                                <?php else: ?>    
                                    <p class="journal-article-list-title"><?=$row->title?></p>
                                <?php endif; ?>    
                                <p class="journal-article-list-authors"><?=$viewHelper->displayAuthorsInForthcoming($row->authors, $row->journal)?></p>
                                <div class="journal-article-list-meta">
                                    <!-- <span><a href="<?=BASE_URL.'describe/article/' . $row->journal . '/' . $row->volume . '/' . $row->issue . '/' . $row->page?>">More Details</a></span> -->
                                    <?php if ($row->abstract != "<abstract/>"): ?>
                                    <span><a class="trigger-abstract" id="display_<?=$row->id?>" href="javascript:void(0);">Abstract</a></span>
                                    <?php endif; ?>
                                    <!-- <span><?=$viewHelper->linkArticle($row)?></span> -->
                                </div>
                                <?php if($row->abstract != "<abstract/>") { ?>
                                <div class="journal-article-list-abstract" id="abstract_<?=$row->id?>">
                                    <?=$row->abstract?>
                                </div>
                                <?php } ?>
                            </li>
<?php } ?>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
