<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Fellow CMS</li>
                        </ol>
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title">Fellow CMS</p>
                                <p class="journal-article-subtitle">
                                    A content management system to manage database-driven pages of the Fellows list
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                        <div class="col-xs-offset-2 col-xs-8">
                            <p id="selectFellowOperation">
                            <button id="addfellow" class="btn btn-primary naked text-blue">Add New Fellow</button>
                            <button id="updatefellow" class="btn btn-primary naked text-blue">Update Fellow</button><br />
                            </p>
                            <div id="divtohide" class="urlhide">
                                <form id="updatingfellow" method="post" action="<?=BASE_URL?>data/updatefellow" class="form-horizontal">
                                    <div class="form-group">
                                        <input type="url" name="fellowurl" value="" placeholder="Enter the fellow url" />
                                        <input type="submit" name="updatefellow" class="btn btn-primary naked text-blue" value="Update" />
                                    </div>    
                                </form>    
                            </div>
                        </div>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
