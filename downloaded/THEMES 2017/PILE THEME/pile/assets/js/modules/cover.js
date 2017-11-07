(function(){

    var $hero = $('.hero'),
        $document = $(document),
        keysBound = false;

    function positionHeroContent(e) {
        switch(e.which) {
            case 37: // left
                if ( $hero.hasClass('right') ) {
                    $hero.removeClass('right');
                } else {
                    $hero.addClass('left');
                }
            break;

            case 38: // up
                if ( $hero.hasClass('bottom') ) {
                    $hero.removeClass('bottom');
                } else {
                    $hero.addClass('top');
                }
            break;

            case 39: // right
                if ( $hero.hasClass('left') ) {
                    $hero.removeClass('left');
                } else {
                    $hero.addClass('right');
                }
            break;

            case 40: // down
                if ( $hero.hasClass('top') ) {
                    $hero.removeClass('top');
                } else {
                    $hero.addClass('bottom');
                }
            break;

            default: return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    }

    var triggers = [ [38,38,40,40,37,39,37,39], [37,38,39,40] ],
	    sequence = [];

	function arraysEqual( arr1, arr2 ) {

		if ( arr1.length !== arr2.length ) {
			return false;
		}

		for ( var i = arr1.length; i --; ) {
			if ( arr1[i] !== arr2[i] ) {
				return false;
			}
		}

		return true;
	}

    function checkSequence(e) {
        if (keysBound) return;

	    sequence.push(e.which);

	    $.each(triggers, function(i, seq) {
		    var length = seq.length;

			if ( arraysEqual( seq, sequence.slice( -length ) ) ) {
		        $document.off('keydown', checkSequence);
			    $document.on('keydown', positionHeroContent);
				keysBound = true;
			    return false;
		    }
	    });
    }

    $document.on('keydown', checkSequence);

})();
