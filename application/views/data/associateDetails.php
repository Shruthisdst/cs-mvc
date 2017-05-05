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
                                    Adding new associate details / Updating existing associate details
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                        <div class="col-md-12">
                        <?php $chkempty = array_filter($data); ?>
                        <p class="text-red gap-med-below text-right">Fields with * are required</p>
                            <form id="updatingassociate" method="post" action="<?=BASE_URL?>data/updateAssociateDetails" class="form-horizontal" onsubmit="return associateformvalidate()">
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Name<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="name" name="name" value="<?=$data['name']?>" placeholder="Enter the name of the associate" required/>
                                    </div>    
                                </div> 
                                <div class="form-group">
                                    <label for="sex" class="col-md-3 text-right">Sex<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="radio" id="sex_m" name="sex" value="M" 
                                         <?php if($data['sex'] == 'M') {?> checked <?php }?>   
                                         required />&nbsp;M &nbsp;&nbsp;
                                        <input type="radio" id="sex_f" name="sex" value="F" 
                                         <?php if($data['sex'] == 'F') {?> checked <?php }?>   
                                        required /> F
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <label for="birth" class="col-md-3 text-right">Date of Birth</label>
                                    <div class="col-md-9">                              
                                        <input type="date" class="form-control" id="birth" name="birth" value="<?=$data['birth']?>" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-md-3 text-right">Type</label>
                                    <div class="col-md-9">                              
                                        <input type="checkbox" id="type_d" name="type[]" value="deceased" 
                                         <?php if($data['type'][0]) {?> checked <?php }?>   
                                        />&nbsp; deceased &nbsp;&nbsp;
                                        <input type="checkbox" id="type_h" name="type[]" value="honorary" 
                                         <?php if($data['type'][1]) {?> checked <?php }?>   
                                        />&nbsp; honorary
                                    </div>
                                </div>                                
                                 <div class="form-group">
                                    <label for="degree" class="col-md-3 text-right">Degree</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="degree" name="degree" value="<?=$data['degree']?>" placeholder="Enter the Degree" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="honours" class="col-md-3 text-right">Honours</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="honours" name="honours" value="<?=$data['honours']?>" placeholder="Enter the honours" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="address" class="col-md-3 text-right">Address</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="address" name="address" value="<?=$data['address']?>" placeholder="Enter the address" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="city" class="col-md-3 text-right">City</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="city" name="city" value="<?=$data['city']?>" placeholder="Enter the city" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="state" class="col-md-3 text-right">State</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="state" name="state" value="<?=$data['state']?>" placeholder="Enter the state" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="country" class="col-md-3 text-right">Country</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="country" name="country" value="<?=$data['country']?>" placeholder="Enter the country" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telephone_office" class="col-md-3 text-right">Telephone(office)</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="telephone_office" name="telephone_office" 
                                        value="<?=$data['telephone_office']?>" placeholder="Enter office telephone number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telephone_residence" class="col-md-3 text-right">Telephone(residence)</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="telephone_residence" name="telephone_residence" 
                                        value="<?=$data['telephone_residence']?>" placeholder="Enter residence telephone number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax" class="col-md-3 text-right">Fax</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="fax" name="fax" 
                                        value="<?=$data['fax']?>" placeholder="Enter Fax number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 text-right">Email</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="email" name="email" 
                                        value="<?=$data['email']?>" placeholder="Enter the email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="specialization" class="col-md-3 text-right">Specialization</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="specialization" name="specialization" 
                                        value="<?=$data['specialization']?>" placeholder="Enter the specialization" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="period" class="col-md-3 text-right">Period<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="period" name="period" 
                                        value="<?=$data['period']?>" placeholder="Enter the period" required />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="url" class="col-md-3 text-right">Url</label>
                                    <div class="col-md-9">                              
                                        <input type="url" class="form-control" id="url" name="url" 
                                        value="<?=$data['url']?>" placeholder="Enter the url" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                    <?php if(!(empty($chkempty))) {
                                        echo '<input type="hidden" class="form-control" id="operation"  name="operation" value="update">';                                        
                                        echo '<input type="hidden" class="form-control" id="id"  name="id" value="'. $data['id'] .'">';
                                        echo '<input type="submit" name="submit" class="btn btn-primary naked text-blue" 
                                        value="Update Associate" />';
                                    }
                                    else { 
                                        echo '<input type="hidden" class="form-control" id="operation"  name="operation" value="add">';                                        
                                        echo '<input type="submit" name="submit" class="btn btn-primary naked text-blue"
                                        value="Add New Associate" />';
                                    }
                                    ?>
                                    </div>
                                </div>       
                            </form>    
                        </div>
                    </li><!-- widgets list end -->
                </ul><!-- widgets end -->
            </div>
        </div>

<script type="text/javascript" src="<?=PUBLIC_URL?>js/formvalidate.js"></script>