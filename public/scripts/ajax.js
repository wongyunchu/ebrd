(function ($) {
	'use strict';
    if ($.support.pjax) {
      $.pjax.defaults.maxCacheLength = 0;
      var container = $('#view');
      $(document).on('click', 'a[data-pjax], [data-pjax] a, a, #aside .nav a', function(event) {
        if($("#view").length == 0 || $(this).hasClass('no-ajax')){
          return;
        }
        // view id를 찾아서 그 부분만 로딩함
        $.pjax.click(event, {container: container, timeout: 6000, fragment: '#view'});
      });

      $(document).on('pjax:start', function() {
        $( document ).trigger( "pjaxStart" );
      });
      // fix js
      $(document).on('pjax:end', function(event) {
        try {
            $(document).ready(initJquery);
        }
        catch(e) {
          alert('you gotta make initJquery() to Content Yield.');
        }

        $(event.target).find('[ui-jp]').uiJp();
        $(event.target).uiInclude();
        $( document ).trigger( "pjaxEnd" );

      });
    }
})(jQuery);
