jQuery(function($){
    // Resize the main home slider image
    var sliderHeight = $('#home-slider').height();
    
    $('#home-slider img.slide').load(function(){
        var $$ = $(this);
        if($$.height() < sliderHeight){
            $$.css({
                'height' : sliderHeight,
                'width' : 'auto'
            });
        }
        else if($$.width() < $('#home-slider').width()){
            $$.css({
                'height' : 'auto',
                'width' : '100%'
            });
        }

        $$.css('margin-top', -$$.height()/2);
    });
    
    // This handles resizing the window
    $(window).resize(function(){
        $('#home-slider img.slide.current').load();
    })

    // Display a slide
    var displaySlide = function(i){
        if(i < 0 || i >= $('#home-slider img.slide').length){
            i = i % $('#home-slider img.slide').length;
        }

        var c = $('#home-slider img.slide.current').index('#home-slider img.slide');
        if(c != -1){
            // Hide the slide
            $('#home-slider img.slide').eq(c)
                .add($('#home-slider .post-titles a').eq(c))
                .clearQueue().animate({'opacity' : 0}, Number(snapshotHome.transitionSpeed), function(){
                    $(this).hide();
                });
        }
        $('#home-slider img.slide, #home-slider .post-titles a').removeClass('current');

        
        // Show the new slide
        $('#home-slider img.slide').eq(i).load()
            .add($('#home-slider .post-titles a').eq(i))
            .addClass('current').show().css('opacity', 0).clearQueue().animate({'opacity' : 1}, Number(snapshotHome.transitionSpeed));
    }
    
    // Start by preloading the loader gif
    $.imgpreload(snapshot.sliderLoaderUrl);
    
    // Next, preload the slide images
    $('#home-slider img.slide').imgpreload(function(){
        $('#home-slider').removeClass('loading');

        if($('#home-slider img.slide').length > 1) {
            $('#home-slider .navigation').fadeIn();
            displaySlide(0);
    
            // Temporary slide transition
            var cc = 0;
            var interval;
    
            var resetInterval = function(){
                clearInterval(interval);
                interval = setInterval(function(){
                    displaySlide(++cc);
                }, snapshotHome.sliderSpeed);
            };
            resetInterval();
    
            $('#home-slider a.next').click(function(){
                displaySlide(++cc);
                resetInterval();
                return false;
            });
    
            $('#home-slider a.previous').click(function(){
                displaySlide(--cc);
                resetInterval();
                return false;
            });
        }
        else{
            displaySlide(0);
        }
    });
})