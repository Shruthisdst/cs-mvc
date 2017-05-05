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
                                <p class="journal-article-title">Fellow Profile</p>
                                <p class="journal-article-subtitle">&nbsp;</p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news">
                        <?=$viewHelper->displayThumbnail($data->name, 'images/flat/Fellows/')?>
                        <ul class="list-unstyled">
                            <li class="journal-article-list">
                                <p class="journal-article-list-page">
                                    <span class="journal-article-meta-feature">Elected: <?=$data->yearelected?></span>
                                    <?php if(preg_match('/honorary/', $data->type)) { ?>
                                    <span class="journal-article-meta-feature">Honorary</span>
                                    <?php }else{ ?>
                                    <span class="journal-article-meta-feature">Section: <?=$data->section?></span>
                                    <?php } ?>
                                </p>
                                <p class="journal-article-list-title">
                                    <?=$data->name?>
                                    <?php
                                        $degree = '';
                                        $degree .= ($data->degree) ? $data->degree : '';
                                        $degree .= ($data->honours) ? ', ' . $data->honours : '';
                                        $degree = preg_replace('/^, /', '', $degree);
                                    ?>                                    
                                    <?php if($degree) { ?><br /><span class="subtitle"><?=$degree?></span><?php } ?>
                                    <?php if($data->councilservice) { ?><br /><span class="subtitle text-green"><?=$data->councilservice?></span><?php } ?>
                                </p>
                                <div class="journal-article-list-authors">
                                    <?php if($data->birth != '0000-00-00') { ?><span><strong>Date of birth:</strong> <?=$viewHelper->formatDate($data->birth)?></span><?php } ?>
                                    <?php if($data->death != '0000-00-00') { ?><br /><span class="text-primary"><strong>Date of death:</strong> <?=$viewHelper->formatDate($data->death)?></span><?php } ?>
                                    <?php if($data->specialization) { ?><br /><strong>Specialization:</strong> <?=$data->specialization?><?php } ?>
                                    <?php
                                        $address = '';
                                        $address .= ($data->address) ? $data->address : '';
                                        $address .= ($data->city) ? ', ' . $data->city : '';
                                        $address .= ($data->state) ? ', ' . $data->state : '';
                                        $address .= ($data->country) ? ', ' . $data->country : '';
                                        $address = preg_replace('/^, /', '', $address);
                                    ?>
                                    <?php
                                        if($address) {
                                            echo '<br />';
                                            echo (preg_match('/deceased/', $data->type)) ? '<strong>Last known address:</strong> ' : '<strong>Address:</strong> ';
                                            echo $address;
                                        }
                                    ?>
                                    <?php
                                        $contact = '';
                                        if(!(preg_match('/deceased/', $data->type))) {
                                         
                                            $contact .= ($data->telephone_office) ? 'Office: ' . $data->telephone_office : '';
                                            $contact .= ($data->telephone_residence) ? '<br />Residence: ' . $data->telephone_residence : '';
                                            $contact .= ($data->telephone_mobile) ? '<br />Mobile: ' . $data->telephone_mobile : '';
                                            $contact .= ($data->fax) ? '<br />Fax: ' . $data->fax : '';
                                            $contact .= ($data->email) ? '<br />Email: ' . $data->email : '';
                                            
                                            $contact = preg_replace('/^<br \/>/', '', $contact);
                                        }
                                    ?>
                                    <?php if($contact) { ?><br /><strong>Contact:</strong><br /><?=$contact?><?php } ?>
                                </div>
                                <?php if($data->url) { ?><div class="journal-article-list-meta"><span><a target="_blank" href="<?=$data->url?>"><?=$data->url?></a></span></div><?php } ?>
                            </li>
                        </ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
