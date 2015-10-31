function media_upload(button_class) {

	jQuery('body').on('click', button_class, function(e) {
		var button_id ='#'+jQuery(this).attr('id');
		var display_field = jQuery(this).parent().children('input:text');
		var _custom_media = true;

		wp.media.editor.send.attachment = function(props, attachment){

			if ( _custom_media  ) {
				if(typeof display_field != 'undefined'){
					switch(props.size){
						case 'full':
							display_field.val(attachment.sizes.full.url);
                            display_field.trigger('change');
							break;
						case 'medium':
							display_field.val(attachment.sizes.medium.url);
                            display_field.trigger('change');
							break;
						case 'thumbnail':
							display_field.val(attachment.sizes.thumbnail.url);
                            display_field.trigger('change');
							break;
						case 'repeater_team':
							console.log(attachment.sizes);
							display_field.val(attachment.sizes.repeater_team.url);
                            display_field.trigger('change');
							break
						case 'repeater_services':
							display_field.val(attachment.sizes.repeater_services.url);
                            display_field.trigger('change');
							break
						case 'repeater_customers':
							display_field.val(attachment.sizes.repeater_customers.url);
                            display_field.trigger('change');
							break;
						default:
							display_field.val(attachment.url);
                            display_field.trigger('change');
					}
				}
				_custom_media = false;
			} else {
				return wp.media.editor.send.attachment( button_id, [props, attachment] );
			}
		}
		wp.media.editor.open(button_class);
		window.send_to_editor = function(html) {

		}
		return false;
	});
}

/********************************************
*** Generate uniq id ***
*********************************************/
function repeater_uniqid(prefix, more_entropy) {

  if (typeof prefix === 'undefined') {
    prefix = '';
  }

  var retId;
  var formatSeed = function(seed, reqWidth) {
    seed = parseInt(seed, 10)
      .toString(16); // to hex str
    if (reqWidth < seed.length) { // so long we split
      return seed.slice(seed.length - reqWidth);
    }
    if (reqWidth > seed.length) { // so short we pad
      return Array(1 + (reqWidth - seed.length))
        .join('0') + seed;
    }
    return seed;
  };

  // BEGIN REDUNDANT
  if (!this.php_js) {
    this.php_js = {};
  }
  // END REDUNDANT
  if (!this.php_js.uniqidSeed) { // init seed with big random int
    this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
  }
  this.php_js.uniqidSeed++;

  retId = prefix; // start with prefix, add current milliseconds hex string
  retId += formatSeed(parseInt(new Date()
    .getTime() / 1000, 10), 8);
  retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string
  if (more_entropy) {
    // for more entropy we add a float lower to 10
    retId += (Math.random() * 10)
      .toFixed(8)
      .toString();
  }

  return retId;
}

/********************************************
*** General Repeater ***
*********************************************/
function repeater_refresh_general_control_values(){
	jQuery(".repeater_general_control_repeater").each(function(){
		var values = [];
		var th = jQuery(this);
		th.find(".repeater_general_control_repeater_container").each(function(){
			var icon_value = jQuery(this).find('.repeater_icon_control').val();
			var text = jQuery(this).find(".repeater_text_control").val();
			if(text){
				text = text.replace(/(['"])/g, "\\$1");
			}
			var link = jQuery(this).find(".repeater_link_control").val();
			var image_url = jQuery(this).find(".custom_media_url").val();
			var choice = jQuery(this).find(".repeater_image_choice").val();
			var title = jQuery(this).find(".repeater_title_control").val();
			if(title){
				title = title.replace(/(['"])/g, "\\$1");
			}
			var subtitle = jQuery(this).find(".repeater_subtitle_control").val();
			if(subtitle){
				subtitle = subtitle.replace(/(['"])/g, "\\$1");
			}
			var id = jQuery(this).find(".repeater_box_id").val();
            var shortcode = jQuery(this).find(".repeater_shortcode_control").val();
            var color = jQuery(this).find(".repeater_color_control").val();
            var percentage = jQuery(this).find(".repeater_percentage_control").val();
            if( text !='' || image_url!='' || title!='' || subtitle!='' ){
                values.push({
                    "icon_value" : (choice === 'parallax_none' ? "" : icon_value) ,
                    "text" : text,
                    "link" : link,
                    "image_url" : (choice === 'parallax_none' ? "" : image_url),
                    "choice" : choice,
                    "title" : title,
                    "subtitle" : subtitle,
					"id" : id,
                    "shortcode" : escapeHtml(shortcode),
                    "color" : escapeHtml(color),
                    "percentage": percentage,
                });
            }

        });
        th.find('.repeater_repeater_colector').val(JSON.stringify(values));
        th.find('.repeater_repeater_colector').trigger('change');
    });
}


jQuery(document).ready(function(){
    jQuery('#customize-theme-controls').on('click','.parallax-customize-control-title',function(){
        jQuery(this).next().slideToggle('medium', function() {
            if (jQuery(this).is(':visible'))
                jQuery(this).css('display','block');
        });
    });
    
    jQuery('#customize-theme-controls').on('change','.repeater_image_choice',function() {
        if(jQuery(this).val() == 'parallax_image'){
            jQuery(this).parent().parent().find('.repeater_general_control_icon').hide();
            jQuery(this).parent().parent().find('.repeater_image_control').show();
        }
        if(jQuery(this).val() == 'parallax_icon'){
            jQuery(this).parent().parent().find('.repeater_general_control_icon').show();
            jQuery(this).parent().parent().find('.repeater_image_control').hide();
        }
        if(jQuery(this).val() == 'parallax_none'){
            jQuery(this).parent().parent().find('.repeater_general_control_icon').hide();
            jQuery(this).parent().parent().find('.repeater_image_control').hide();
        }
        
        repeater_refresh_general_control_values();
        return false;        
    });
    media_upload('.custom_media_button_parallax_one');
    jQuery(".custom_media_url").live('change',function(){
        repeater_refresh_general_control_values();
        return false;
    });
    

	jQuery("#customize-theme-controls").on('change', '.repeater_icon_control',function(){
		repeater_refresh_general_control_values();
		return false; 
	});

	jQuery(".repeater_general_control_new_field").on("click",function(){
	 
		var th = jQuery(this).parent();
		var id = 'repeater_'+repeater_uniqid();
		if(typeof th != 'undefined') {
			
            var field = th.find(".repeater_general_control_repeater_container:first").clone();
            if(typeof field != 'undefined'){
                field.find(".repeater_image_choice").val('parallax_icon');
                field.find('.repeater_general_control_icon').show();
				if(field.find('.repeater_general_control_icon').length > 0){
                	field.find('.repeater_image_control').hide();
				}
                field.find(".repeater_general_control_remove_field").show();
                field.find(".repeater_icon_control").val('');
                field.find(".repeater_text_control").val('');
                field.find(".repeater_link_control").val('');
				field.find(".repeater_box_id").val(id);
                field.find(".custom_media_url").val('');
                field.find(".repeater_title_control").val('');
                field.find(".repeater_subtitle_control").val('');
                field.find(".repeater_shortcode_control").val('');
                field.find(".repeater_color_control").val('');
                field.find(".repeater_percentage_control").val('');
                th.find(".repeater_general_control_repeater_container:first").parent().append(field);
                repeater_refresh_general_control_values();
            }
			
		}
		return false;
	 });
	 
	jQuery("#customize-theme-controls").on("click", ".repeater_general_control_remove_field",function(){
		if( typeof	jQuery(this).parent() != 'undefined'){
			jQuery(this).parent().parent().remove();
			repeater_refresh_general_control_values();
		}
		return false;
	});


	jQuery("#customize-theme-controls").on('keyup', '.repeater_title_control',function(){
		 repeater_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.repeater_subtitle_control',function(){
		 repeater_refresh_general_control_values();
	});
    
    jQuery("#customize-theme-controls").on('keyup', '.repeater_shortcode_control',function(){
		 repeater_refresh_general_control_values();
	}); 
     
    jQuery("#customize-theme-controls").on('keyup', '.repeater_color_control',function(){
		 repeater_refresh_general_control_values();
	}); 
    
    jQuery("#customize-theme-controls").on('keyup', '.repeater_percentage_control',function(){
		 repeater_refresh_general_control_values();
	});
    
	jQuery("#customize-theme-controls").on('keyup', '.repeater_text_control',function(){
		 repeater_refresh_general_control_values();
	});
	
	jQuery("#customize-theme-controls").on('keyup', '.repeater_link_control',function(){
		repeater_refresh_general_control_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".repeater_general_control_droppable").sortable({
		update: function( event, ui ) {
			repeater_refresh_general_control_values();
		}
	});	

});


var entityMap = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': '&quot;',
    "'": '&#39;',
    "/": '&#x2F;'
  };

  function escapeHtml(string) {
    return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });
  }