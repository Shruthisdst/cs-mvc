<div class="container">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-8 clear-paddings">
            <div class="col-padded"><!-- inner custom column -->                
                <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->               
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li>Associate CMS</li>
                        </ol>
                        <ul class="list-unstyled">                          
                            <li class="journal-article">
                                <p class="journal-article-title">Associate CMS</p>
                                <p class="journal-article-subtitle">
                                    A content management system to manage database-driven pages of the Associate list
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                        <div class="col-xs-offset-2 col-xs-8">
                            <p id="selectAssociateOperation">
                            <button id="addassociate" class="btn btn-primary naked text-blue">Add New Associate</button>
                            <button id="updateassociate" class="btn btn-primary naked text-blue">Update Associate</button><br />
                            </p>
                            <div id="divtohide" class="urlhide">
                                <form id="updatingassociate" method="post" action="<?=BASE_URL?>data/updateassociate" class="form-horizontal">
                                    <div class="form-group">
                                        <input type="url" name="associateurl" value="" placeholder="Enter the associate url" />
                                        <input type="submit" name="updateassociate" class="btn btn-primary naked text-blue" value="Update" />
                                    </div>    
                                </form>    
                            </div>
                        </div>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
