(function($){
	var Tabs = {

		init : function(){
			this.bindUIfunctions();
			this.pageLoadCorrectTab();
		},
		
		bindUIfunctions : function(){
		
			$('body').on('click','.nav-tabs a',function(){
				Tabs.navTabClick($(this));
				return false;
			});
		
		},
		
		navTabClick : function( clickObj ){
		
			//find the target
			var tab    = clickObj
		       ,target = $(tab.attr('href'));
		
		    // activate correct anchor (visually)
		    tab.addClass("active").siblings("a").removeClass("active");
		
		    // activate correct div (visually)
		    target.addClass("active").siblings().removeClass("active");
		
		    // update URL, no history addition
		    window.history.replaceState("", "", tab.attr('href'));
			    
		},
		
		pageLoadCorrectTab: function() {

			if( $('.nav-tabs').size() ){
				if( document.location.hash ){
					this.navTabClick($("[href=" + document.location.hash + "]"));
				}else{
					this.navTabClick($('.nav-tabs a:first'));
				}
			}
			
		},

	}

	var Images = {

		init: function(){
			this.skewImages();
		},
		
		skewImages : function(){

			$('img[data-option-type=image]').each(function(){
				var $this			= $(this);
				var $parent 		= $this.parent();
				var angle = ( ( Math.random() * 5 ) + 1 ) * ( ( Math.floor( Math.random() * 2 ) == '1' ) ? '1' : '-1' );
				$parent.css({
							 '-webkit-transform': 'rotate('+angle+'deg)'
							,'-moz-transform'	: 'rotate('+angle+'deg)'
							,'transform'		: 'rotate('+angle+'deg)'
							});
				$this.removeAttr('width height');
			});
		
		}

	}

	var Modal = {

		init : function(){
			this.bindUIfunctions();
		},
		
		bindUIfunctions : function(){
		
			//same domain "new window" links
			$('body')
				.on('click','a[target=_blank][href*=peerministry.org]',function(){
					Modal.show($(this).attr('href')+' #main');
					return false;
				})
				.on('click','.modal-close, .modal-overlay',function(){
					Modal.hide();
					return false;
				});
			
		},
		
		show : function( url ){
		
			$('.modal-overlay').addClass('active');
			$('.modal-content').load(url,function(){
				$('.modal-window').addClass('active');
			});
		
		},
		
		hide : function(){
		
			$('.modal-content').html('');
			$('.modal-window, .modal-overlay').removeClass('active');
		
		}

	}

	var Cart = {

		init : function(){
			this.bindUIfunctions();
		},
		
		bindUIfunctions : function(){
		
			$('body')
				.on('click','.add-to-cart a',function(){

					//add the right item to the cart
					Cart.addToCart($(this));
					return false;

				})
				.on('click','.element-toggle',function(){
					Cart.toggleElement( $(this) );
					return false;
				})
			
		},
		
		addToCart : function( linkObj ){

			var form     = linkObj.closest('form')
			   ,attrName = linkObj.closest('.dropdown-menu').data('attribute-name')
			   ,varId    = linkObj.data('variation-id');

			//probably remove this and make it actually go to the cart page
			//or maybe an ajax call and put a message on the page that it worked
			//and update the cart
			$(linkObj).closest('.btn-group').removeClass('open');

			$('input[name=variation_id]',form).val( Cart.findVariation( form.data('product_variations'), varId, attrName ) );
			$('input[name=attribute_'+attrName+']',form).val( varId );
			$('.single_add_to_cart_button',form).click();
		},

		findVariation: function( formVariations, currentVariation, attrName ){

			var attributeName = 'attribute_'+attrName;

			for ( var i = 0; i < formVariations.length; i++ ) {
				var variation = formVariations[i];

				if( variation.attributes['attribute_'+attrName] == currentVariation ){
					return variation.variation_id;
				}
			}

		},

		toggleElement: function( linkObj ){

			var target = $(linkObj.attr('href'));
			linkObj.toggleClass('open');
			target.toggleClass('hide');

		}
		
	}

	Tabs.init();
	Images.init();
	Modal.init();
	Cart.init();
	
})(jQuery);