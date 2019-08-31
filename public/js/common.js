function getResult(feature,widget) {
    // alert('hhh');
     // alert(base_url + "data/getFeatureDetails/?feature=" + feature);
    $.ajax({
        url: base_url + "data/getFeatureDetails/?feature=" + feature,
        type: "GET",
        success: function(data){
           var widgetNum = ".widget" + widget; 
           var displayString = "";
           var obj = JSON.parse(data);
           var displayString = "";
           displayString = displayString + '<h4 class="widget_title">'+ feature +'</h4>';
            for(i=0;i<obj.length;i++){

				let authorString = '';

                authors = JSON.parse(obj[i]['authors']);
                $.each(authors, function( index, author ) {
                    authorString += '<span><a href="' + base_url + 'listing/bibliography/crsc/' + author.name.full.replace(' ', '_') + '">' + author.name.full + '</a></span>';
                });

                displayString = displayString + '<li class="widget-container widget_recent_news ititle"><a href="'+ base_url + 'describe/article/' + obj[i]['journal'] + '/' + obj[i]['id'] + '">' + obj[i]['title'] + '</a><p class="iauthor">' + authorString + '</p></li>';
			}
            $(widgetNum).append(displayString);
            displayString = '';
        },
        error: function(){console.log("Fail");}
  });
}

$(document).ready(function() {

    var isWider = $( '.wider' );
    isWider.next( '.container' ).addClass( 'push-down' );

    if(isWider.length) {
        $( window ).scroll(function() {

            var tp = $( 'body' ).scrollTop();

            if(tp > 50) {

                $( '.navbar' ).removeClass( 'wider') ;
            }
            else if(tp < 50) {
        
                $( '.navbar' ).addClass( 'wider') ;
            }
        }); 
    }

	// Hide all abstracts after pafe load    
    $( '.journal-article-list-abstract' ).hide();
    $( ".trigger-abstract" ).click(function() {
   		
   		var id = $(this).attr('id').replace('display_', 'abstract_')
    	$( '#' + id ).slideDown('slow');
    });

    $( '#togglePast' ).change(function() {

    	if($(this).is(":checked")) {

			$( '#type' ).val('.*');
    	}
    	else {

			$( '#type' ).val('^$|^honorary$');
    	}
    });

    // CMS login AJAX

    $( '#cmsLogin' ).submit(function(e){

        var formData = $( '#cmsLogin' ).serialize();

        $.ajax({

            url : base_url + "data/verifyAndUpdate",
            type : "POST",
            data : formData,
            cache : false,
            processData : false,
            success : function (data){
                
                if ($.trim(data) === 'False') {
                    
                    $('.spinner').fadeOut().remove();
                    $('button[type="submit"]').before('<p class="text-primary error-note">Invalid email/password or email not authorized for this journal</p>');
                }
                else{
                    // $('button[type="submit"]').before(data);
                    window.location.href = base_url + 'data/updateCompleted/journal'
                }
            },
            beforeSend : function(){

                $( '.error-note' ).remove();
                $('button[type="submit"]').before('<p class="spinner"><i class="fa fa-spinner fa-spin"></i></p>');
            },
            error : function(){

                $('button[type="submit"]').before('<p class="text-primary">Error! Please try again</p>');
            }
        });

        e.preventDefault();
    });

    $("#selectFellowOperation button").click(function() {
        if(this.id == "updatefellow"){
            $('#divtohide').removeClass('urlhide');
            $('#divtohide').addClass('urlshow');
        }
        else{
            window.location.href = base_url + 'data/addnewfellow';
        }   
    });    

    $("#selectAssociateOperation button").click(function() {
        if(this.id == "updateassociate"){
            $('#divtohide').removeClass('urlhide');
            $('#divtohide').addClass('urlshow');
        }
        else{
            window.location.href = base_url + 'data/addnewassociate';
        }   
    });    

  var vieweroptions = {
        // inline: true,
        url: 'data-original',
        ready:  function (e) {
          console.log(e.type);
        },
        show:  function (e) {
          console.log(e.type);
        },
        shown:  function (e) {
          console.log(e.type);
        },
        hide:  function (e) {
          console.log(e.type);
        },
        hidden:  function (e) {
          console.log(e.type);
        },
        view:  function (e) {
          console.log(e.type, e.detail.index);
        },
        viewed:  function (e) {
          console.log(e.type, e.detail.index);
          // this.viewer.zoomTo(1).rotateTo(180);
        }
      };

    var viewer = new Viewer(document.getElementById('viewimages'),vieweroptions);

});
