{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>--}}


<!-- Bootstrap -->
<script src="{{ asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        if($('#success-alert').length > 0) {
            $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });
        }

    });
</script>





<script src="{{ asset('libs/jquery/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>


<!-- core -->

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

<script src="{{ asset('scripts/app.js')}}"></script>


<!-- ajax -->
{{--메뉴 클릭시 jquery가 반응을 안하는 현상이 발생 --}}
{{--<script src="{{ asset('libs/jquery/jquery-pjax/jquery.pjax.js')}}"></script>
<script src="{{ asset('scripts/ajax.js')}}"></script>--}}


{{--<script src="{{ asset('js/exentriq-bootstrap-material-ui.min.js')}}"></script>--}}

<script src="{{ asset('js/datatables.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>