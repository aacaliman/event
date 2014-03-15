function generateCustomScrolls() {
	jQuery('.scroll-pane').jScrollPane({
		showArrows: true
	});
}

/* ---------------------------------------------------
	custom checkbox / radio
------------------------------------------------------*/

/*--------------------------------------------------------------------
 * jQuery plugin: customInput()
 * by Maggie Wachs and Scott Jehl, http://www.filamentgroup.com
 * Copyright (c) 2009 Filament Group
 * Dual licensed under the MIT (filamentgroup.com/examples/mit-license.txt) and GPL (filamentgroup.com/examples/gpl-license.txt) licenses.
 * Article: http://www.filamentgroup.com/lab/accessible_custom_designed_checkbox_radio_button_inputs_styled_css_jquery/
 * Usage example below (see comment "Run the script...").
--------------------------------------------------------------------*/

jQuery.fn.customInput = function(){
	jQuery(this).each(function(i){
		if(jQuery(this).is('[type=checkbox],[type=radio]')){
			var input = jQuery(this);

			// get the associated label using the input's id
			var label = jQuery('label[for='+input.attr('id')+']');

			//get type, for classname suffix
			var inputType = (input.is('[type=checkbox]')) ? 'checkbox' : 'radio';

			// wrap the input + label in a div
			jQuery('<div class="custom-'+ inputType +'"></div>').insertBefore(input).append(input, label);

			// find all inputs in this set using the shared name attribute
			var allInputs = jQuery('input[name="'+input.attr('name')+'"]');

			// necessary for browsers that don't support the :hover pseudo class on labels
			label.hover(
				function(){
					jQuery(this).addClass('hover');
					if(inputType == 'checkbox' && input.is(':checked')){
						jQuery(this).addClass('checkedHover');
					}
				},
				function(){ jQuery(this).removeClass('hover checkedHover'); }
			);

			//bind custom event, trigger it, bind click,focus,blur events
			input.bind('updateState', function(){
				if (input.is(':checked')) {
					if (input.is(':radio')) {
						allInputs.each(function(){
							jQuery('label[for='+jQuery(this).attr('id')+']').removeClass('checked');
						});
					};
					label.addClass('checked');
				}
				else { label.removeClass('checked checkedHover checkedFocus'); }

			})
			.trigger('updateState')
			.click(function(){
				jQuery(this).trigger('updateState');
			})
			.focus(function(){
				label.addClass('focus');
				if(inputType == 'checkbox' && input.is(':checked')){
					jQuery(this).addClass('checkedFocus');
				}
			})
			.blur(function(){ label.removeClass('focus checkedFocus'); });
		}
	});
};





jQuery(document).ready(function(){

/* ---------------------------------------------------
	front page slider
------------------------------------------------------*/

jQuery('#slideShowItems div').hide();

var currentSlide = -1;
var prevSlide = null;
var slides = jQuery('#slideShowItems div');
var interval = null;
var FADE_SPEED = 1500;
var DELAY_SPEED = 5000;

var html = '<ul id="slideShowCount">'

for (var i = slides.length - 1;i >= 0 ; i--){
	html += '<li id="slide'+ i+'" class="slide"><span>'+'</span></li>' ;
}

html += '</ul>';
jQuery('#slideShow').after(html);

for (var i = slides.length - 1;i >= 0 ; i--){
	jQuery('#slide'+i).bind("click",{index:i},function(event){
		currentSlide = event.data.index;
		gotoSlide(event.data.index);
	});
};

if (slides.length <= 1){
	jQuery('.slide').hide();
}

nextSlide();

function nextSlide (){

	if (currentSlide >= slides.length -1){
		currentSlide = 0;
	}else{
		currentSlide++
	}

	gotoSlide(currentSlide);

}

function gotoSlide(slideNum){

	if (slideNum != prevSlide){

		if (prevSlide != null){
			jQuery(slides[prevSlide]).stop().fadeOut(500);
			jQuery('#slide'+prevSlide).removeClass('selectedTab');
		}

		jQuery('#slide'+currentSlide).addClass('selectedTab');


		jQuery('#slide'+slideNum).addClass('selectedTab');
		jQuery('#slide'+prevSlide).removeClass('selectedTab');

		jQuery(slides[slideNum]).stop().fadeIn(FADE_SPEED,function(){
			jQuery(this).css({opacity:1});
			if(jQuery.browser.msie){
				this.style.removeAttribute('filter');
			}
		});

		prevSlide = currentSlide;

		if (interval != null){
			clearInterval(interval);
		}
		interval = setInterval(nextSlide, DELAY_SPEED);
	}

}

jQuery('.user-container ul li:even').addClass('even');
jQuery('.user-container ul li:odd').addClass('odd');

/* ---------------------------------------------------
	custom dropdowns
------------------------------------------------------*/
	//jQuery('[class^=custom-dropdown]').selectmenu();



/* ---------------------------------------------------
	custom scrollbars
------------------------------------------------------*/
	//generateCustomScrolls();



/* ---------------------------------------------------
	run custom checkbox / radio
------------------------------------------------------*/
	//jQuery('input').customInput();



/* ---------------------------------------------------
	run custom checkbox / radio
------------------------------------------------------*/
	//jQuery('#file1').customFileInput();

//jQuery(".colrboxitem").colorbox({rel:'colrboxitem', transition:"fade"});


}); // end of ready


