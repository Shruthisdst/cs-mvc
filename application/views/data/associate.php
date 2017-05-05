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
                        <form id="fellowCmsLogin" method="post" action="<?=BASE_URL?>data/verifyAndUpdateAssociate" class="form-horizontal">
                            <div class="form-group">
                                <label for="keywords" class="control-label col-xs-2">Email</label>
                                <div class="col-xs-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Use ias.ac.in emails only">
                                </div>
                                <div class="col-xs-2">&nbsp;</div>
                            </div>
                            <div class="form-group">
                                <label for="fulltext" class="control-label col-xs-2">Password</label>
                                <div class="col-xs-8">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Preset">
                                    <input type="hidden" class="form-control" id="user"  name="user" value="admin">
                                </div>
                                <div class="col-xs-2">&nbsp;</div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-8">
                                    <p>&nbsp;</p>
                                    <button type="submit" class="btn btn-primary naked text-blue">Add / Update Associate Details</button>
                                </div>
                            </div>
                        </form>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
