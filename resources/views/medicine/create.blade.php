@extends('main')
@section('title', '공지사항')
@section('title_sub', 'write form...')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}

    <style>
        table.blueTable {
            border: 2px solid #C8D7E3;
            background-color: #FFFFFF;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
            border: 2px solid #C8D7E3;
            padding: 4px 10px;
            font-size: 13px;
            color: #838383;
        }

        table.blueTable td:nth-child(odd) {
            background: #E3F2F5;
            color: #58849E;
            font-weight: 500;
            text-align: center;
        }
        table.blueTable tfoot td {
            font-size: 14px;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        {{--{{phpinfo()}}--}}
        <div class="col-xs-offset-0 col-xs-12">

            <div class="table-responsive ">
                <table class="blueTable  m-a-0">
                    <tbody>
                    <tr>
                        <td width="200">의료비 지원대상자</td>
                        <td>김남오(342221)</td>
                        <td width="200">의료비 지원가능 금액</td>
                        <td>30,000원</td>
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
            </div>




            {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}

            <div class="form_group">
                <hr>
                <div class="row no-gutter">
                    <div class="col-sm-6">
                        {{--{!! Html::linkRoute('posts.index','Back', array(), ['class'=>'md-btn md-raised m-b-sm btn-lg w-sm green'] ) !!}--}}
                    </div>

                    <div class="col-sm-6">
                        <div class="row end-xs">
                            <button type="submit" id="submit-all" class="md-btn md-raised m-b-sm btn-lg w-sm blue" >저장</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{--
            <div class="row">
                <div class="col-xs-12" style="background-color: red">
                    <div class="form_group row between-xs">
                        <div class="col-xs-2">
                            <button type="submit" id="submit-all" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" id="submit-all1" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                    </div>
                </div>
            </div>--}}



@stop
@section('scripts')
    {!! (Html::script('js/select2.min.js')) !!}


@endsection


