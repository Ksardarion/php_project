var ModalEffects = (function() {

	function init() {
		var contact;
		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' ),
				ok = modal.querySelector( '.md-ok' );


			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				var content = modal.getElementsByTagName('p')[0];
				contact = this.parentNode.parentNode.children;
				content.innerHTML = "Do you wanna delete a "+contact[1].textContent+"\n with email: "+contact[2].textContent+"?";
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'md-setperspective' ) ) {

					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});
			ok.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
				window.location = "/php/add_contact?act=del&cid="+contact[0].textContent.substring(2);
			});

		} );

	}

	init();

})();