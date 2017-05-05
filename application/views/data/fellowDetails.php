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
                                    Adding new fellow details / Updating existing fellow details
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="widget-container widget_recent_news" id="cmsLoginContainer">
                        <div class="col-md-12">
                        <?php $chkempty = array_filter($data); ?>
                        <p class="text-red gap-med-below text-right">Fields with * are required</p>
                            <form id="updatingfellow" method="post" action="<?=BASE_URL?>data/updateFellowDetails" class="form-horizontal" onsubmit="return formvalidate()">
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Name<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="name" name="name" value="<?=$data['name']?>" placeholder="Enter the name of the fellow" required/>
                                    </div>    
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">First Name</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="fname" name="fname" value="<?=$data['fname']?>" placeholder="Enter the first name of the fellow" />
                                    </div>    
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Last Name<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="lname" name="lname" value="<?=$data['lname']?>" placeholder="Enter the last name of the fellow" required/>
                                    </div>    
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Salutation</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="sal" name="sal" value="<?=$data['sal']?>" placeholder="Salutation (Prof., Dr.)" />
                                    </div>    
                                </div> 
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Sex<span class="text-red">*</span></label>
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
                                    <label for="name" class="col-md-3 text-right">Date of Birth</label>
                                    <div class="col-md-9">                              
                                        <input type="date" class="form-control" id="birth" name="birth" value="<?=$data['birth']?>" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Type</label>
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
                                    <label for="name" class="col-md-3 text-right">Degree</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="degree" name="degree" value="<?=$data['degree']?>" placeholder="Enter the Degree" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Honours</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="honours" name="honours" value="<?=$data['honours']?>" placeholder="Enter the honours" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Address</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="address" name="address" value="<?=$data['address']?>" placeholder="Enter the address" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">City</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="city" name="city" value="<?=$data['city']?>" placeholder="Enter the city" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">State</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="state" name="state" value="<?=$data['state']?>" placeholder="Enter the state" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Country</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="country" name="country" value="<?=$data['country']?>" placeholder="Enter the country" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Telephone(office)</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="telephone_office" name="telephone_office" 
                                        value="<?=$data['telephone_office']?>" placeholder="Enter office telephone number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Telephone(residence)</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="telephone_residence" name="telephone_residence" 
                                        value="<?=$data['telephone_residence']?>" placeholder="Enter residence telephone number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Mobile</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="telephone_mobile" name="telephone_mobile" 
                                        value="<?=$data['telephone_mobile']?>" placeholder="Enter mobile number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Fax</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="fax" name="fax" 
                                        value="<?=$data['fax']?>" placeholder="Enter Fax number" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Email</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" name="email" 
                                        value="<?=$data['email']?>" placeholder="Enter the email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Specialization</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="specialization" name="specialization" 
                                        value="<?=$data['specialization']?>" placeholder="Enter the specialization" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Section</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="section" name="section" 
                                        value="<?=$data['section']?>" placeholder="Enter the section" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Year elected<span class="text-red">*</span></label>
                                    <div class="col-md-9">                              
                                        <input type="number" class="form-control" id="yearelected" name="yearelected" 
                                        value="<?=$data['yearelected']?>" placeholder="Enter the year elected" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Council Service</label>
                                    <div class="col-md-9">                              
                                        <input type="text" class="form-control" id="councilservice" name="councilservice" 
                                        value="<?=$data['councilservice']?>" placeholder="Enter the council service" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Url</label>
                                    <div class="col-md-9">                              
                                        <input type="url" class="form-control" id="url" name="url" 
                                        value="<?=$data['url']?>" placeholder="Enter the url" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="name" class="col-md-3 text-right">Date of death</label>
                                    <div class="col-md-9">                              
                                        <input type="date" class="form-control" id="death" name="death" 
                                        value="<?=$data['death']?>" placeholder="Enter the Date of death" />
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
                                        value="Update Fellow" />';
                                    }
                                    else { 
                                        echo '<input type="hidden" class="form-control" id="operation"  name="operation" value="add">';                                        
                                        echo '<input type="submit" name="submit" class="btn btn-primary naked text-blue"
                                        value="Add New Fellow" />';
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