{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>--}}





<!-- Bootstrap -->
{{--

<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
--}}

<script src="{{ asset('js/app.bundle.js')}}"></script>
<script src="{{ asset('js/datatables.min.js')}}"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js">
</script>
{{--
jquery가 제일 먼저 읽혀짐을 위해 css영역으로 뺐음
->>>>>>>>>>>>>>>     _head.blade.php

<script src="{{ asset('libs/jquery/jquery/dist/jquery.js') }}"></script>

<script src="{{ asset('js/val.js')}}"></script>
--}}


{{--
<script src="{{ asset('js/formSilver.js')}}"></script>
<script src="{{ asset('js/vue.min.js')}}"></script>
<script src="{{ asset('js/sap.js')}}"></script>--}}

{{-- table grid관련 순서 중요 --}}
{{--<script src="{{ asset('js/bootbox.min.js')}}"></script>--}}


<!-- core -->
{{--<script src="{{ asset('libs/jquery/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{ asset('libs/jquery/underscore/underscore-min.js')}}"></script>
<script src="{{ asset('libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
<script src="{{ asset('libs/jquery/PACE/pace.min.js')}}"></script>
<script src="{{ asset('scripts/config.lazyload.js')}}"></script>
<script src="{{ asset('scripts/palette.js')}}"></script>
<script src="{{ asset('scripts/ui-load.js')}}"></script>
<script src="{{ asset('scripts/ui-jp.js')}}"></script>
<script src="{{ asset('scripts/ui-include.js')}}"></script>
<script src="{{ asset('scripts/ui-device.js')}}"></script>
<script src="{{ asset('scripts/ui-form.js')}}"></script>
<script src="{{ asset('scripts/ui-nav.js')}}"></script>
<script src="{{ asset('scripts/ui-screenfull.js')}}"></script>
<script src="{{ asset('scripts/ui-scroll-to.js')}}"></script>
<script src="{{ asset('scripts/ui-toggle-class.js')}}"></script>
<script src="{{ asset('scripts/app.js')}}"></script>--}}

{{--for datetimepicker--}}
{{--<script src="{{ asset('libs/js/moment/moment.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.kr.min.js')}}"></script>--}}

{{-- greensock --}}
<script src="/js/TweenMax.min.js"></script>

{{--parsley--}}
{{--<script src="{{ asset('js/parsley.min.js')}}"></script>
<script src="{{ asset('js/ko.js')}}"></script>--}}

{{--통화관련 / 소숫점
<script src="{{ asset('js/accounting.js')}}"></script>
--}}
{{--<script src="{{ asset('libs/jquery/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>--}}
{{--<script src="../libs/jquery/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--메뉴 클릭시 jquery가 반응을 안하는 현상이 발생 / 디버깅이 안됨--}}
{{--<script src="{{ asset('libs/jquery/jquery-pjax/jquery.pjax.js')}}"></script>
<script src="{{ asset('scripts/ajax.js')}}"></script>--}}


{{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
<script type="text/javascript">
    $(document).ready(function() {

        if($('#success-alert').length > 0) {
            $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });
        }

    });
</script>