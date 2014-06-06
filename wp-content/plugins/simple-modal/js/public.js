(function($){

	var SimpleModal = {

		init: function(){

			this.bindUIFunctions();

		},

		bindUIFunctions: function(){

			console.log('yay?')

			var that = this;

			jQuery('body')
				.on('click','.simplemodal-link',function(){
					console.log('test');
					that.modalOpen($(this).attr('href'), $(this).attr('data-post-id'));
					return false;
				})
				.on('click','.simplemodal-close',function(){
					that.modalClose();
					return false;
				})

		},

		modalOpen: function(url, postId){
			console.log(url);
			console.log(postId);
			var loadUrl = '/wp-admin/admin-ajax.php?action=&';
			if( postId ){
				loadUrl += 'postId='+postId;
			}else{
				loadUrl += 'url='+url
			}
			$.ajax({
				url: '/wp-admin/admin-ajax.php',
				data:{
					action: 'simple-modal--ajax-post-load',
					postId: postId,
					url: url
				},
				complete: function(jqXHR, textStatus ){
					if( textStatus == 'success' ){
						var data = JSON.parse( jqXHR.responseText );
						jQuery('#simplemodal-window .modal-header').text(data.title);
						jQuery('#simplemodal-window .modal-body').text(data.content);
						jQuery('#simplemodal-overlay, #simplemodal-window').css({'display':'block'});
					}else{
						alert('error!');
					}
				}
			})
			return false;
		},

		modalClose: function(){

			jQuery('#simplemodal-overlay, #simplemodal-window').css({'display':'none'});
			jQuery('#simplemodal-window .modal-header').text('');
			jQuery('#simplemodal-window .modal-body').text('');

		}

	}

	$(function(){
		SimpleModal.init();
	});

})(jQuery);