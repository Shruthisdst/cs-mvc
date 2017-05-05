<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Journal CMS</li>
                        </ol>
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title">Article details successfully updated</p>
                                <p class="journal-article-subtitle">
                                    Task completed
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                    	<ul>
                    	<?php foreach ($data as $row) { ?>
                    		<li><?=$row?></li>
                    	<?php } ?>
                    	</ul>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
