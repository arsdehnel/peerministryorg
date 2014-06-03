(function($){
	var Tabs = {

		init : function(){
			this.bindUIfunctions();
			this.pageLoadCorrectTab();
		},

		bindUIfunctions : function(){

			$('body').on('click','.tabs a',function(){
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

			if( $('.tabs').size() ){
				if( document.location.hash ){
					this.navTabClick($("[href=" + document.location.hash + "]"));
				}else{
					this.navTabClick($('.tabs a:first'));
				}
			}

		},

	}

	var Images = {

		init: function(){
			this.carousel();
		},

		carousel : function(){

			var that = this;

			$('.image-module').each(function(){

				var module = $(this),
				    imageLoader = $('img.loader',module),
				    imageCurrent = $('img.current',module),
				    moduleCenter = JSON.parse(module.attr('data-center')),
				    images = JSON.parse(module.attr('data-images')),
				    currImgIdx = 0,
				    firstImage = images[currImgIdx];

				var spinner = new Spinner({color: "#ffffff"}).spin(module[0]);

				setTimeout(function(){

					that.imgLoad( firstImage.src, imageLoader[0], spinner, function(){
						that.imgCrossFade( module, 10, moduleCenter, imageCurrent, imageLoader, 2000 );
					});

					if( images.length > 1 ){

						setInterval(function(){

							if( currImgIdx == ( images.length - 1 ) ){
								currImgIdx = 0;
							}else{
								currImgIdx++;
							}

							that.imgLoad( images[currImgIdx].src, imageLoader[0], false, function(){
								that.imgCrossFade( module, 10, moduleCenter, imageCurrent, imageLoader, 2000 );
							} );

						}, 5000);

					}

				}, 2000);

			});

		},

		imgLoad: function( newSrc, holderElem, spinner, callback ){

			var newImg = new Image;
			newImg.onload = function(){
				if( spinner ){
					spinner.stop();
				}
				holderElem.src = this.src;
				callback();
			}
			newImg.src = newSrc;

		},

		imgCrossFade: function( wrapper, wrapperPadding, wrapperCenter, imgCurrent, imgNew, duration ){

			newHeight = parseFloat( imgNew.css('height') );
			newWidth = parseFloat( imgNew.css('width') );

			//animate the current image to fade away
			imgCurrent.animate({
				opacity: 0,
				height: newHeight,
				width: newWidth
			}, 700);

			//make the new image do all sorts of stuff
			imgNew
				.css({visibility: 'visible'})
				.animate({
						opacity: 1,
						height: newHeight,
						width: newWidth
					},
					2000,
					function(){
						imgCurrent.attr('src',imgNew.attr('src')).css({opacity:1});
						imgNew.css({
							opacity: 0,
							height: 'auto',
							width: 'auto'
						});
					}
				);

			//and make the wrapper respond to the new dimensions
			var wrapperTop = wrapperCenter.y - ( newHeight / 2 ) - wrapperPadding;

			if( wrapperCenter.x > 0 ){
				var wrapperLeft = wrapperCenter.x - ( newWidth / 2 ) - wrapperPadding;
				var wrapperRight = 'auto';
			}else{
				var wrapperLeft = 'auto';
				var wrapperRight = ( wrapperCenter.x * -1 ) - ( newWidth / 2 ) - wrapperPadding;
			}
			wrapper
				.animate({
						top: wrapperTop,
						left: wrapperLeft,
						right: wrapperRight,
						height: ( newHeight + ( wrapperPadding * 2 ) ),
						width: ( newWidth + ( wrapperPadding * 2 ) )
					},
					700
				);


		}

	}

	var Panels = {

		init: function(){
			this.alignHeaders();
		},

		alignHeaders: function(){
			$('.panel header').each(function(){
				var header = $(this),
				    panel = header.parent();

				console.log(parseInt(header.css('width'),10));
				header.css({width: panel.css('height'),bottom: ( header.outerHeight() * -1 )});
			})
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
	Panels.init();
	Modal.init();
	Cart.init();

})(jQuery);