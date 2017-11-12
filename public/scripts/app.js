(function ($) {

	'use strict';



	  window.app = {
      name: 'Flatkit',
      version: '1.1.3',
      // for chart colors
      color: {
        'primary':      '#0cc2aa',
        'accent':       '#a88add',
        'warn':         '#fcc100',
        'info':         '#6887ff',
        'success':      '#6cc788',
        'warning':      '#f77a99',
        'danger':       '#f44455',
        'white':        '#ffffff',
        'light':        '#f1f2f3',
        'dark':         '#2e3e4e',
        'black':        '#2a2b3c'
      },
      setting: {
        theme: {
    			primary: 'primary',
    			accent: 'accent',
    			warn: 'warn'
        },
        color: {
	        primary:      '#0cc2aa',
	        accent:       '#a88add',
	        warn:         '#fcc100'
    	  },
        folded: false,
        boxed: false,
        container: false,
        themeID: 1,
        bg: ''
      }
    };

    var setting = 'jqStorage-'+app.name+'-Setting',
        storage = $.localStorage;
    
    if( storage.isEmpty(setting) ){
        storage.set(setting, app.setting);
    }else{
        app.setting = storage.get(setting);
    }
    var v = window.location.search.substring(1).split('&');
    for (var i = 0; i < v.length; i++)
    {
        var n = v[i].split('=');
        app.setting[n[0]] = (n[1] == "true" || n[1]== "false") ? (n[1] == "true") : n[1];
        storage.set(setting, app.setting);
    }

    // init
    function setTheme(){

      $('body').removeClass($('body').attr('ui-class')).addClass(app.setting.bg).attr('ui-class', app.setting.bg);
      app.setting.folded ? $('#aside').addClass('folded') : $('#aside').removeClass('folded');
      app.setting.boxed ? $('body').addClass('container') : $('body').removeClass('container');

      $('.switcher input[value="'+app.setting.themeID+'"]').prop('checked', true);
      $('.switcher input[value="'+app.setting.bg+'"]').prop('checked', true);

      $('[data-target="folded"] input').prop('checked', app.setting.folded);
      $('[data-target="boxed"] input').prop('checked', app.setting.boxed);
      
    }

    // click to switch
    $(document).on('click.setting', '.switcher input', function(e){
      var $this = $(this), $target;
      $target = $this.parent().attr('data-target') ? $this.parent().attr('data-target') : $this.parent().parent().attr('data-target');
      app.setting[$target] = $this.is(':checkbox') ? $this.prop('checked') : $(this).val();
      ($(this).attr('name')=='color') && (app.setting.theme = eval('[' +  $(this).parent().attr('data-value') +']')[0]) && setColor();
      storage.set(setting, app.setting);
      setTheme(app.setting);
    });

    function setColor(){
      app.setting.color = {
        primary: getColor( app.setting.theme.primary ),
        accent: getColor( app.setting.theme.accent ),
        warn: getColor( app.setting.theme.warn )
      };
    };

    function getColor(name){
      return app.color[ name ] ? app.color[ name ] : palette.find(name);
    };

    function init(){
      $('[ui-jp]').uiJp();
      $('body').uiInclude();
    }

    $(document).on('pjaxStart', function() {
        $('#aside').modal('hide');
        $('body').removeClass('modal-open').find('.modal-backdrop').remove();
        $('.navbar-toggleable-sm').collapse('hide');
    });
    
    init();
    setTheme();

    // 메뉴 클릭시 해당 경로 저장 (sltd acitve를 위해)
    var pathname;
/*
    $(document).on('click', 'a[data-pjax], [data-pjax] a, #aside .nav a', function(event) {

        var pathname = this.pathname;
        var pathname = $(location).attr('pathname');
        localStorage.setItem("activeMenu", pathname);
    });
*/

    //var hrefName = $('ul.nav.aa').find('li>a')["0"].pathname;
    var menuLists = $('ul.nav.leftMenu').find('li>a');
    var savedPathName = $(location).attr('pathname');//localStorage.getItem("activeMenu");
    savedPathName = savedPathName.split('/');

    //for(i in menuLists) {
        //$(menuLists[i].parentElement).removeClass("active");
    //}

    if(savedPathName) {
        for(i in menuLists) {
            var hrefName = menuLists[i].pathname;
            if("/"+savedPathName[1] == hrefName) {

                //alert(hrefName);
                //$(menuLists[i]).parentElement.addClass("active")
                $(menuLists[i].parentElement).addClass("active");
                break;
            }
        }
    }

})(jQuery);

vue = new Vue({
    el: '#aside',
    data: {
        isActive: true,
        pathname:''
    },
    methods: {
        chkMenu:function(e, t) {
            alert("e");
        }
    },

    computed: {


        chkSltd: function (e) {
            //alert(this.pathname);
            return {
                active:true
            }
        }
    }
});