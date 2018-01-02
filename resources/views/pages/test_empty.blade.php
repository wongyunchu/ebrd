<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta content="IE=Edge" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
    <title></title>
    <style type="text/css">
        /* Common */ p,div { margin:0; padding:0; } /* 임시 비주얼 스타일 정의 */ div{margin-bottom:10px;padding:10px 0;color:#2d2c2d;font-family:Tahoma;font-size:14px;font-weight:bold} #wrap{padding:10px;border:1px solid #bdbdbd;background:#f7f7f7} #header{margin-top:10px;padding:10px;border:2px solid #bfbfbf;background:#e5e5e5} #container{border:2px solid #bfbfbf;background:#e5e5e5} .snb{margin-top:10px;border:1px solid #bdbdbd;background:#fff;text-align:center} #content{height:200px;margin-top:10px;border:1px solid #bdbdbd;background:#fff;text-align:center} .aside{margin-top:10px;border:1px solid #bdbdbd;background:#fff;text-align:center} #footer{padding:10px;border:2px solid #bfbfbf;background:#e5e5e5} /* Layout */ #container{ zoom:1; padding:0 200px; } #container:after{ display:block; clear:both; content:'' } .snb{ float:left; margin-right:-180px; position:relative; left:-190px; width:178px; } #content{ float:left; width:100% } .aside{ float:left; margin-left:-182px; position:relative; left:190px; width:178px; }

    </style>
</head>
<body>
<div id="wrap">
    <p>#wrap</p>
    <header role="header" data-include="html/header_inc.html"></header>
    <!-- container -->
    <div id="container">
        <p>#container</p>
        <!-- snb -->
        <div class="snb">
            <p>.snb</p>
        </div>
        <!-- //snb -->
        <!-- content -->
        <div id="content">
            <p>#content</p>
        </div>
        <!-- //content -->
        <!-- aside -->
        <div class="aside">
            <p>.aside</p>
        </div> <!-- //aside -->
        <div class="clear">
        </div>
    </div> <!-- //container -->
    <footer role="footer" data-include="/html/footer_inc.html"></footer>
</div>


<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
    $(function(){
        includeLayout();
    });

    function includeLayout(){
        var includeArea = $('[data-include]');
        var self, url;

        $.each(includeArea, function() {
            self = $(this);
            url = self.data("include");
            self.load(url, function() {
                self.removeAttr("data-include");
            });
        });
    }
</script>

</body>
</html>