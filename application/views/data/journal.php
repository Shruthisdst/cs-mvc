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
                                <p class="journal-article-title">Journal CMS</p>
                                <p class="journal-article-subtitle">
                                    A content management system to manage database-driven pages of the journal websites
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                        <form id="cmsLogin" method="post" action="#" class="form-horizontal">
                            <div class="form-group">
                                <label for="title" class="control-label col-xs-2">Select Journal</label>
                                <div class="col-xs-8">
                                    <select class="form-control" id="journal" name="journal">
                                        <option value=""></option>
                                        <option value="boms">Bulletin of Materials Science</option>
                                        <option value="joaa">Journal of Astrophysics and Astronomy</option>
                                        <option value="jbsc">Journal of Biosciences</option>
                                        <option value="jcsc">Journal of Chemical Sciences</option>
                                        <option value="jess">Journal of Earth System Science</option>
                                        <option value="jgen">Journal of Genetics</option>
                                        <option value="pram">Pramana – Journal of Physics</option>
                                        <option value="pmsc">Proceedings – Mathematical Sciences</option>
                                        <option value="reso">Resonance – Journal of Science Education</option>
                                        <option value="sadh">Sadhana</option>
                                    </select>
                                </div>
                                <div class="col-xs-2">&nbsp;</div>
                            </div>
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
                                </div>
                                <div class="col-xs-2">&nbsp;</div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-8">
                                    <p>Before clicking the button below, please ensure that necessary data (PDF, XML, JPG and other supplementary files) are uploaded to relevant directories on the server through FTP.</p>
                                    <button type="submit" class="btn btn-primary naked text-blue">Update article details</button>
                                </div>
                            </div>
                        </form>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>
