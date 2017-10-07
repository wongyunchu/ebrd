@extends('main')
@section('title', '공지사항')
@section('title_sub', 'write form...')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}
 {{--   <style>
        input[type=text], textarea {
            border:             1px solid #DDDDDD;
            margin:             5px 1px 3px 0px;
            outline:            none;
            padding:            3px 0px 3px 3px;
            -webkit-transition: all 0.20s ease-in-out;
            -moz-transition: all 0.20s ease-in-out;
            -ms-transition: all 0.20s ease-in-out;
            -o-transition: all 0.20s ease-in-out;
        }

        input[type=text]:focus, textarea:focus {
            border:             1px solid rgba(81, 203, 238, 1);
            box-shadow:         0 0 2px rgba(81, 203, 238, 1);
            margin:             5px 1px 3px 0px;
            padding:            3px 0px 3px 3px;
        }
    </style>--}}
@endsection

@section('content')





    <div class="col-xs-offset-0 col-xs-12 ">

        {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}

        <table class="blueTable m-a-0">
            <tbody>
            <tr>
                <td width="20%">의료비 지원대상자</td>
                <td >김남오(342221)</td>
                <td width="20%">의료비 지원가능 금액</td>
                <td >30,000원</td>
            </tr>
             <tr>
                 <td>대상년월</td>
                 <td>Table cell</td>
                 <td>신청금액</td>
                 <td>Table cell</td>
             </tr>
             <tr>
                 <td>진료과목</td>
                 <td>Table cell</td>
                 <td>잔여금액</td>
                 <td>30,000원</td>
             </tr>
            </tbody>
        </table>
        <div class="form_group">
            <hr>
            <div class="row ">
                <div class="col-sm-6">
                    {{--{!! Html::linkRoute('posts.index','Back', array(), ['class'=>'md-btn md-raised m-b-sm btn-lg w-sm green'] ) !!}--}}
                </div>

                <div class="col-sm-6">
                    <div class="end-xs">
                        <button type="submit" id="submit-all" class="md-btn md-raised m-b-sm btn-lg w-sm blue">저장
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-addon" id="basic-addon2">@example.com</span>
    </div>



@stop
@section('scripts')
    {!! (Html::script('js/select2.min.js')) !!}


@endsection


