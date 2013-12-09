(function($) {

    /**
     * JS To make this thing work
     * @author Alexandru Budurovici <work@w0rldart.com>
     */
    $(function() {

        /**
         ***************************************
         * Cached Globals
         ***************************************
         */
        var $window, $body, $document, $halfWidth ,$halfHeight;
        
        $window     = $(window);
        $body       = $('body');
        $document   = $(document);
        $halfHeight = $window.height() / 2;
        $halfWidth  = $window.width() / 2;

        $('img.quiz-img').each(function(index, image)
        {
            var path   = $(this).attr('src'),
                width,
                height;

            if ($window.width() <= 320) {
                height = $window.height() / 3;
                width  = $window.width() / 2;
            } else {
                height = $window.height() / 3;
                width  = $window.width() / 4; 
            }

            $(this).attr('src', (img.croppa(path, Math.round(width), Math.round(height))));
        });

        
        $(':radio').on('change', function() {
            console.log($(this));
        });

        $(':radio').on('toggle', function() {
            console.log($(this));
        });

        /**
         * Dinamic $.load()
         */
        $(document).on('click', '.remote-load-trigger', function (event)
        {
            var $url = $(this).data('src');
            console.log($url);

            $(document).find('#content').load($url, function(response)
            {
                $(this).fadeIn(response);
                $(':radio').radio();
            });

            event.preventDefault()

        });

        $(document).on('change', 'input[name="answer"]', function() {
            if ($(this).val() === $('input[name="correctAnswer"]').val()) {
                $(this).closest('li').find('.status').css('background-color', '#16a085');
                $('.remote-load-trigger').click();
            } else {
                $(this).closest('li').find('.status').css('background-color', '#e74c3c');
            }
        });

    });
  
})(jQuery);