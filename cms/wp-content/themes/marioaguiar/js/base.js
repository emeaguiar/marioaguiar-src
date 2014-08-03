(function($) {
	AGUIAR = {

		fn: {
			init: function() {
				AGUIAR.features.init();
			}
		},
		features: {
			init: function() {
				var features = $('body').data('features'),
					featuresArray = [];

				if(features) {
					featuresArray = features.split(' ');

					for(var x = 0, length = featuresArray.length; x < length; x++) {
						var func = featuresArray[x];

						if(this[func] && typeof this[func].init === 'function') {
							this[func].init();
						}
					}
				}
			},
			code: {
				init: function() {
					if( typeof window.getComputedStyle === 'undefined' ) {
						return;
					}
					var $pre = $( 'pre' );
					$pre.each( function() {
						var $this = $( this ),
							$code = $this.find( 'code' );
						if( $code.length === 0 ) {
							$this.wrapInner( '<code />' );
							$code = $this.find( 'code' );
						}
						var $column = $( '<div />' ),
							pieces = $code.html().split( /[\n\r]/g );
						$column.attr( 'aria-hidden', true );
						$.each( pieces, function() {
							$column.append( $( '<span />' ) );
						} );
						$code.before( $column );
						$this.addClass( 'line-numbers' );
					} );
				}
			},
			zebra: {
				init: function() {
					$('article:odd', '.container').addClass('even');
				}
			}
		}

	}
	AGUIAR.fn.init();

})(jQuery);