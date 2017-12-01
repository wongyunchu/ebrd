@extends('main')
@section('title', '의료비')
@section('title_sub', 'All Posts...')
@section('content')

@section('stylesheets')
    <style type="text/css">
        tbody>tr>th {
            font-weight: normal;
        }
    </style>
@endsection
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table id="example" cellspacing="0" width="100%" class="table table-striped table-bordered table-hover row-border p-b-md">

                <thead>
                    <th style="min-width:60px">대상년월</th>
                    <th style="min-width:50px">신청일</th>
                    <th style="min-width:60px">진료과목</th>
                    <th style="min-width:50px">사용일</th>
                    <th style="min-width:60px"> 지원건수</th>
                    <th style="min-width:60px">지원금액</th>
                    <th style="min-width:60px">품의상태</th>
                    <th style="min-width:60px">전표상태</th>
                    <th style="min-width:60px">변경/삭제</th>
                </thead>
                <tbody>
                @foreach($list as $item)

                    <tr >
                        <th>{{\Illuminate\Support\Carbon::parse($item->tagetdate)->format('Y-m-d')}}</th>
                        <th>{{\Illuminate\Support\Carbon::parse($item->created_at)->format('Y-m-d')}}</th>
                        <th>{{$item->categorySubject}}</th>
                        <th >-</th>
                        <th >-</th>
                        <th></th>
                        <th>접수</th>
                        <th>-</th>
                        <th>
                            <form action="{{route('medicalDetailsView')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="item" value="{{json_encode($item)}}">
                                <button type="submit" class="btn btn-outline b-info text-info btn-sm" >View</button>
                            </form>
{{--                            <a href=""
                               class="btn btn-outline b-warning text-warning btn-sm">Edit</a>--}}
                        </th>
                    </tr>
                @endforeach
                </tbody>


            </table>
            {{--  페이징
            <div class="center-xs">
                {!! $posts->links(); !!}
            </div>
            --}}
            <div id="myModal" class="form_group">
                <hr>
                <div class="row end-xs p-r">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo">작성</a>
{{--                    <button @click="get2"> get List crossDomain</button>
                    <button @click="save2"> test 저장</button>--}}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            ///vue 코드 없어져야함
            vue = new Vue({
                el: '#myModal',
                data: {
                    sltdData: null
                },
                methods: {
                    get2:function() {
                        var formDatas = {};
                        formDatas.SERVER = 'STC';
                        formDatas.FID = 'Z_HR_0131';//'Z_HR_TB01';
                        formDatas.import = '{"I_ENDDA":"20161231","I_PERNR":"2950001","I_BEGDA":"%0d%0a%ea%b2%bd%ea%b8%b0+%ed%9a%8c%eb%b3%b5%ec%84%b8+%eb%82%98%ed%83%80%eb%82%b4%eb%a9%b0+%27%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%27+%ec%97%ac%ea%b1%b4+%ec%a1%b0%ec%84%b1+%ed%8c%90%eb%8b%a8%0d%0a1400%ec%a1%b0+%ea%b0%80%ea%b3%84%eb%b9%9a+%eb%b6%80%eb%8b%b4%ec%97%90+12%ec%9b%94+%eb%af%b8+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%84%a0%ec%a0%9c+%eb%8c%80%ec%9d%91%0d%0a%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%8b%9c%ec%a0%90%ea%b3%bc+%ec%86%8d%eb%8f%84%ec%97%90+%eb%8d%94+%ea%b4%80%ec%8b%ac%e2%80%a6%22%eb%82%b4%eb%85%84+1%7e2%ec%b0%a8%eb%a1%80%22%0d%0a%0d%0a%e3%80%90%ec%84%9c%ec%9a%b8%3d%eb%89%b4%ec%8b%9c%ec%8a%a4%e3%80%91%ec%a1%b0%ed%98%84%ec%95%84+%ea%b8%b0%ec%9e%90+%3d+%ed%95%9c%ea%b5%ad%ec%9d%80%ed%96%89%ec%9d%98+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac+%ec%9d%b8%ec%83%81%ec%9d%b4+%ed%98%84%ec%8b%a4%ed%99%94%eb%90%90%eb%8b%a4.+%ed%95%9c%ec%9d%80+%ea%b8%88%ec%9c%b5%ed%86%b5%ed%99%94%ec%9c%84%ec%9b%90%ed%9a%8c(%ea%b8%88%ed%86%b5%ec%9c%84)%eb%8a%94+30%ec%9d%bc+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%eb%a5%bc+1.50%25%eb%a1%9c+%ec%a0%84%ea%b2%a9+%ec%9d%b8%ec%83%81%ed%96%88%eb%8b%a4.+%ea%b5%ad%eb%82%b4+%ea%b2%bd%ea%b8%b0%ea%b0%80+%ea%b2%ac%ec%a1%b0%ed%95%9c+%ed%9a%8c%eb%b3%b5%ec%84%b8%eb%a5%bc+%eb%b3%b4%ec%9d%b4%eb%a9%b4%ec%84%9c+%ea%b8%88%eb%a6%ac%eb%a5%bc+%ec%98%ac%eb%a6%b4+%ec%97%ac%ea%b1%b4%ec%9d%b4+%ea%b0%96%ec%b6%b0%ec%a1%8c%eb%8b%a4%ea%b3%a0+%ed%8c%90%eb%8b%a8%ed%95%9c+%ea%b2%83%ec%9c%bc%eb%a1%9c+%eb%b3%b4%ec%9d%b8%eb%8b%a4.+%0d%0a%0d%0a%ed%95%9c%ec%9d%80+%ea%b8%88%ed%86%b5%ec%9c%84%eb%8a%94+%ec%9d%b4%eb%82%a0+%ec%98%a4%ec%a0%84+%ec%84%9c%ec%9a%b8+%ec%84%b8%ec%a2%85%eb%8c%80%eb%a1%9c+%ec%82%bc%ec%84%b1%eb%b3%b8%ea%b4%80%ec%97%90+%ec%9c%84%ec%b9%98%ed%95%9c+%ec%9e%84%ec%8b%9c%eb%b3%b8%eb%b6%80%ec%97%90%ec%84%9c+%ec%a0%84%ec%b2%b4%ed%9a%8c%ec%9d%98%eb%a5%bc+%ec%97%b4%ea%b3%a0+%ed%98%84%ec%9e%ac%ec%9d%98+%ec%97%b0+1.25%25%ec%9d%98+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%eb%a5%bc+0.25%25p+%ec%98%ac%eb%a0%a4+%ec%97%b0+1.50%25%eb%a1%9c+%ec%a0%95%ed%96%88%eb%8b%a4.+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%eb%8a%94+%ec%a7%80%eb%82%9c%ed%95%b4+6%ec%9b%94+%ec%82%ac%ec%83%81+%ec%b5%9c%ec%a0%80+%ec%88%98%ec%a4%80%ec%9d%b8+%ec%97%b0+1.25%25%eb%a1%9c+%eb%82%b4%eb%a0%a4%ea%b0%84+%eb%92%a4+17%ea%b0%9c%ec%9b%94+%eb%a7%8c%ec%97%90+%ec%a1%b0%ec%a0%95%eb%90%9c+%ea%b2%83%ec%9d%b4%eb%8b%a4.+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%b4+%eb%8b%a8%ed%96%89%eb%90%9c+%ea%b2%83%ec%9d%80+%ec%a7%80%eb%82%9c+2011%eb%85%84+6%ec%9b%94+%ec%9d%b4%ed%9b%84+6%eb%85%845%ea%b0%9c%ec%9b%94+%eb%a7%8c%ec%9d%b4%eb%8b%a4.+%0d%0a%0d%0a%ec%9d%b4%eb%b2%88+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%80+%ea%b5%ad%eb%82%b4+%ea%b2%bd%ec%a0%9c%ea%b0%80+%ec%88%98%ec%b6%9c%ec%9d%84+%ec%a4%91%ec%8b%ac%ec%9c%bc%eb%a1%9c+%ec%84%b1%ec%9e%a5%ec%84%b8%eb%a5%bc+%eb%b3%b4%ec%9d%b4%eb%8a%94+%ea%b0%80%ec%9a%b4%eb%8d%b0+%eb%b6%80%ec%a7%84%ed%96%88%eb%8d%98+%ec%86%8c%eb%b9%84+%eb%93%b1+%eb%82%b4%ec%88%98%ec%97%90+%eb%8c%80%ed%95%9c+%ec%9a%b0%eb%a0%a4%ea%b0%80+%eb%8b%a4%ec%86%8c+%ea%b1%b7%ed%9e%8c+%ec%98%81%ed%96%a5%ec%9c%bc%eb%a1%9c+%ed%92%80%ec%9d%b4%eb%90%9c%eb%8b%a4.+3%eb%b6%84%ea%b8%b0+%ea%b5%ad%eb%82%b4+%ea%b2%bd%ec%a0%9c%ec%84%b1%ec%9e%a5%eb%a5%a0+1.4%25%eb%a5%bc+%ea%b8%b0%eb%a1%9d%ed%95%98%eb%a9%b0+%ec%98%ac%ed%95%b4+%ec%97%b0+3.0%25+%ec%84%b1%ec%9e%a5%eb%8f%84+%ea%b0%80%eb%bf%90%ed%95%a0+%eb%a7%8c%ed%81%bc+%ea%b8%88%eb%a6%ac%eb%a5%bc+%ec%98%ac%eb%a0%a4%eb%8f%84+%eb%90%a0+%eb%a7%8c%ed%95%9c+%ea%b2%bd%ec%a0%9c+%ec%97%ac%ea%b1%b4%ec%9d%b4+%ed%98%95%ec%84%b1%eb%90%90%eb%8b%a4%ea%b3%a0+%eb%b3%b8+%ea%b2%83%ec%9d%b4%eb%8b%a4.%0d%0a%0d%0a%ec%b5%9c%ea%b7%bc+%ec%a4%91%ea%b5%ad%ea%b3%bc%ec%9d%98+%27%ec%82%ac%eb%93%9c(%ea%b3%a0%ea%b3%a0%eb%8f%84%eb%af%b8%ec%82%ac%ec%9d%bc%eb%b0%a9%ec%96%b4%ec%b2%b4%ea%b3%84%c2%b7THAAD)+%ea%b0%88%eb%93%b1%27%ec%9d%b4+%eb%b4%89%ed%95%a9%eb%90%98%eb%a9%b4%ec%84%9c+%ec%9a%b0%eb%a6%ac+%ea%b2%bd%ec%a0%9c%ec%97%90+%ec%95%85%ec%98%81%ed%96%a5%ec%9d%84+%ec%a4%84+%eb%b6%88%ed%99%95%ec%8b%a4%ec%84%b1%ec%9d%b4+%eb%8b%a4%ec%86%8c+%ed%95%b4%ec%86%8c%eb%90%9c+%ec%98%81%ed%96%a5%eb%8f%84+%ec%9e%88%eb%8b%a4.+%ea%b8%88%ed%86%b5%ec%9c%84+%ec%a7%81%ec%a0%84+%eb%b6%81%ed%95%9c%ec%9d%98+%eb%af%b8%ec%82%ac%ec%9d%bc+%eb%b0%9c%ec%82%ac%ec%97%90+%eb%94%b0%eb%a5%b8+%eb%a6%ac%ec%8a%a4%ed%81%ac%ea%b0%80+%eb%b0%9c%ec%83%9d%ed%95%98%ea%b8%b4+%ed%96%88%ec%a7%80%eb%a7%8c+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%84+%eb%92%a4%ec%a7%91%ec%9d%84+%eb%a7%8c%ed%95%9c+%ec%a0%95%eb%8f%84%eb%8a%94+%ec%95%84%eb%8b%88%ec%97%88%eb%8d%98+%ea%b2%83%ec%9c%bc%eb%a1%9c+%eb%b3%b4%ec%9d%b8%eb%8b%a4.+%0d%0a%0d%0a%0d%0a%e3%80%90%ec%84%9c%ec%9a%b8%3d%eb%89%b4%ec%8b%9c%ec%8a%a4%e3%80%91%ec%95%88%ec%a7%80%ed%98%9c+%ea%b8%b0%ec%9e%90+%3d+%ed%95%9c%ec%9d%80+%ea%b8%88%ec%9c%b5%ed%86%b5%ed%99%94%ec%9c%84%ec%9b%90%ed%9a%8c%eb%8a%94+30%ec%9d%bc+6%eb%85%845%ea%b0%9c%ec%9b%94%eb%a7%8c%ec%97%90+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%eb%a5%bc+1.50%25%eb%a1%9c+0.25%25p+%ec%9d%b8%ec%83%81%ed%96%88%eb%8b%a4.hokma%40newsis.com%0d%0a%0d%0a%0d%0a1400%ec%a1%b0%ec%9b%90%ec%97%90+%eb%8b%ac%ed%95%9c+%ea%b0%80%ea%b3%84%eb%b6%80%ec%b1%84+%ec%a6%9d%ea%b0%80%ec%84%b8%eb%8f%84+%eb%b6%80%eb%8b%b4%ec%9c%bc%eb%a1%9c+%ec%9e%91%ec%9a%a9%ed%95%9c+%ea%b2%83%ec%9c%bc%eb%a1%9c+%eb%b3%b4%ec%9d%b8%eb%8b%a4.+%ea%b2%bd%ea%b8%b0+%ed%9a%8c%eb%b3%b5%ec%84%b8%ea%b0%80+%ec%a7%80%ec%86%8d%eb%90%98%ea%b3%a0+%ec%9e%88%eb%8a%94+%ea%b0%80%ec%9a%b4%eb%8d%b0+%ea%b8%88%eb%a6%ac%eb%a5%bc+%ea%b7%b8%eb%8c%80%eb%a1%9c+%eb%ac%b6%ec%96%b4%eb%91%90%eb%a9%b4+%ea%b0%80%ea%b3%84%eb%b9%9a%ec%9c%bc%eb%a1%9c+%ec%8f%a0%eb%a0%a4%ec%9e%88%eb%8a%94+%ea%b8%88%ec%9c%b5+%eb%b6%88%ea%b7%a0%ed%98%95%ec%9d%84+%eb%8d%94%ec%9a%b1+%ed%82%a4%ec%9a%b8+%ec%88%98+%ec%9e%88%eb%8a%94+%ec%9a%b0%eb%a0%a4%ea%b0%80+%ec%bb%b8%ea%b8%b0+%eb%95%8c%eb%ac%b8%ec%9d%b4%eb%8b%a4.+%ea%b8%88%eb%a6%ac%eb%a5%bc+0.25%25p+%ec%98%ac%eb%a6%ac%eb%8d%94%eb%9d%bc%eb%8f%84+%ec%b7%a8%ec%95%bd+%ec%b0%a8%ec%a3%bc%eb%a5%bc+%ec%a4%91%ec%8b%ac%ec%9c%bc%eb%a1%9c+%ea%b0%80%ea%b3%84%eb%b9%9a+%eb%b6%80%ec%8b%a4%ed%99%94+%ec%9c%84%ed%97%98%ec%9d%b4+%eb%82%98%ed%83%80%eb%82%a0+%ea%b0%80%eb%8a%a5%ec%84%b1%ec%9d%80+%ec%a0%81%eb%8b%a4%ea%b3%a0+%eb%b3%b8+%ea%b2%83%ec%9d%b4%eb%8b%a4.+%0d%0a%0d%0a%eb%af%b8+%ec%97%b0%eb%b0%a9%ec%a4%80%eb%b9%84%ec%a0%9c%eb%8f%84(Fed)%ea%b0%80+%eb%8b%a4%ec%9d%8c%eb%8b%ac+%ec%97%b0%eb%b0%a9%ea%b3%b5%ea%b0%9c%ec%8b%9c%ec%9e%a5%ec%9c%84%ec%9b%90%ed%9a%8c(FOMC)+%ed%9a%8c%ec%9d%98%ec%97%90%ec%84%9c+%ea%b8%88%eb%a6%ac%eb%a5%bc+%ec%98%ac%eb%a6%b4+%ea%b0%80%eb%8a%a5%ec%84%b1%ec%9d%b4+%ec%9c%a0%eb%a0%a5%ed%95%9c+%eb%a7%8c%ed%81%bc+%ec%99%b8%ea%b5%ad%ec%9d%b8+%ed%88%ac%ec%9e%90%ec%9e%90%ea%b8%88+%ec%9c%a0%ec%b6%9c%ec%9d%84+%eb%8c%80%eb%b9%84%ed%95%a0+%eb%b0%a9%ec%96%b4%ec%b1%85%ec%9d%b4+%ed%95%84%ec%9a%94%ed%96%88%eb%8d%98+%ec%a0%90%eb%8f%84+%ec%9e%88%ec%96%b4+%eb%b3%b4%ec%9d%b8%eb%8b%a4.+%0d%0a%0d%0a%ed%95%9c%ec%9d%80%ec%9d%80+%ec%98%ac+%ed%95%98%eb%b0%98%ea%b8%b0%eb%93%a4%ec%96%b4+%eb%b6%80%ec%a9%8d+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%8b%9c%ea%b7%b8%eb%84%90%ec%9d%84+%eb%82%b4%eb%b9%84%ec%b9%98%eb%a9%b0+%ec%8b%9c%ec%9e%a5%ec%9d%98+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%a0%84%eb%a7%9d%ec%9d%84+%eb%86%92%ec%98%80%eb%8b%a4.+%ec%9d%b4%ec%a3%bc%ec%97%b4+%ed%95%9c%ec%9d%80+%ec%b4%9d%ec%9e%ac%eb%8a%94+%22%ea%b2%bd%ea%b8%b0+%ed%9a%8c%eb%b3%b5%ec%84%b8%ea%b0%80+%ec%a7%80%ec%86%8d%eb%90%98%eb%a9%b4+%ed%86%b5%ed%99%94%ec%a0%95%ec%b1%85%ec%9d%98+%ec%99%84%ed%99%94%ec%a0%95%eb%8f%84%ec%9d%98+%ec%a1%b0%ec%a0%95%ec%9d%84+%ea%b2%80%ed%86%a0%ed%95%a0+%ec%88%98+%ec%9e%88%eb%8b%a4%22%eb%a9%b0+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%84+%ec%8b%9c%ec%82%ac%ed%96%88%eb%8b%a4.+%0d%0a%0d%0a%ec%a7%80%eb%82%9c%eb%8b%ac+%ed%95%9c%ec%9d%80+%ea%b8%88%ed%86%b5%ec%9c%84%ec%97%90%ec%84%9c+%ec%9d%b4%ec%9d%bc%ed%98%95+%ea%b8%88%ed%86%b5%ec%9c%84%ec%9b%90%ec%9d%98+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%86%8c%ec%88%98%ec%9d%98%ea%b2%ac%ec%9d%b4+%eb%82%98%ec%98%a8%eb%8d%b0+%ec%9d%b4%ec%96%b4+%ea%b8%88%ed%86%b5%ec%9c%84%ea%b0%80+%ec%9d%98%ea%b2%b0%ed%95%9c+11%ec%9b%94+%ed%86%b5%ed%99%94%ec%8b%a0%ec%9a%a9%ec%a0%95%ec%b1%85%eb%b3%b4%ea%b3%a0%ec%84%9c%ec%97%90%ec%84%9c%eb%8f%84+%22%ea%b7%b8%eb%8f%99%ec%95%88+%ec%a0%80%ec%84%b1%ec%9e%a5%c2%b7%ec%a0%80%eb%ac%bc%ea%b0%80%ec%97%90+%eb%8c%80%ec%9d%91%ed%95%b4+%ed%99%95%eb%8c%80%ed%95%b4%ec%98%a8+%ed%86%b5%ed%99%94%ec%a0%95%ec%b1%85+%ec%99%84%ed%99%94%ec%9d%98+%ec%a0%95%eb%8f%84%eb%a5%bc+%ec%a1%b0%ec%a0%95%ed%95%a0+%ec%88%98+%ec%9e%88%eb%8a%94+%ec%97%ac%ea%b1%b4%ec%9d%b4+%ec%a0%90%ec%b0%a8+%ec%a1%b0%ec%84%b1%eb%90%98%ea%b3%a0+%ec%9e%88%eb%8b%a4%22%ea%b3%a0+%eb%b0%9d%ed%9e%88%ea%b8%b0%eb%8f%84+%ed%96%88%eb%8b%a4.+%0d%0a%0d%0a%ec%8b%9c%ec%9e%a5%ec%97%90%ec%84%9c%eb%8a%94+%ec%b1%84%ea%b6%8c%ea%b8%88%eb%a6%ac+%ec%83%81%ec%8a%b9%ec%84%b8%eb%a5%bc+%eb%82%98%ed%83%80%eb%82%b4%eb%a9%b0+%ec%9d%b4%eb%8b%ac+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%84+%ea%b8%b0%ec%a0%95%ec%82%ac%ec%8b%a4%ed%99%94%ed%96%88%eb%8b%a4.+%ec%8b%a4%ec%a0%9c+%ed%95%9c%ea%b5%ad%ea%b8%88%ec%9c%b5%ed%88%ac%ec%9e%90%ed%98%91%ed%9a%8c%ea%b0%80+%ec%a7%80%eb%82%9c+28%ec%9d%bc+%ea%b5%ad%eb%82%b4+%ec%b1%84%ea%b6%8c+%eb%b3%b4%ec%9c%a0%ec%99%80+%ec%9a%b4%ec%9a%a9%ec%97%85%eb%ac%b4+%ec%a2%85%ec%82%ac%ec%9e%90+200%eb%aa%85%ec%9d%84+%eb%8c%80%ec%83%81%ec%9c%bc%eb%a1%9c+%ec%84%a4%eb%ac%b8%ed%95%9c+%ea%b2%b0%ea%b3%bc%ec%97%90%ec%84%9c%eb%8f%84+%ec%9d%91%eb%8b%b5%ec%9e%90+100%eb%aa%85+%ec%a4%91+82%25%ea%b0%80+%ed%95%9c%ec%9d%80%ec%9d%b4+%ec%9d%b4%eb%8b%ac+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%eb%a5%bc+%ec%97%b0+1.50%25%eb%a1%9c+%ec%9d%b8%ec%83%81%ed%95%a0+%ea%b2%83%ec%9d%b4%eb%9d%bc%ea%b3%a0+%ec%9d%91%eb%8b%b5%ed%96%88%eb%8b%a4.%0d%0a%0d%0a%ec%9d%b4%eb%8b%ac+%ea%b8%b0%ec%a4%80%ea%b8%88%eb%a6%ac%ea%b0%80+%ec%98%88%ec%83%81%eb%8c%80%eb%a1%9c+%ec%9d%b8%ec%83%81%eb%90%98%eb%a9%b4%ec%84%9c+%ea%b4%80%ec%8b%ac%ec%9d%80+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%86%8d%eb%8f%84%ec%99%80+%ec%8b%9c%ec%a0%90%ec%97%90+%eb%8d%94%ec%9a%b1+%ec%8f%a0%eb%a6%ac%eb%8a%94+%eb%b6%84%ec%9c%84%ea%b8%b0%eb%8b%a4.+%ec%a0%84%eb%ac%b8%ea%b0%80%eb%93%a4%ec%9d%80+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81+%ec%86%8d%eb%8f%84%eb%8a%94+%ec%99%84%eb%a7%8c%ed%95%98%ea%b2%8c+%ec%9d%b4%eb%a4%84%ec%a7%80%ea%b3%a0+%eb%82%b4%eb%85%84+1%7e2%ec%b0%a8%eb%a1%80+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%b4+%eb%8d%94+%ea%b0%80%eb%8a%a5%ed%95%a0+%ea%b2%83%ec%9c%bc%eb%a1%9c+%eb%82%b4%eb%8b%a4%eb%b3%b4%ea%b3%a0+%ec%9e%88%eb%8b%a4.+%0d%0a%0d%0a%0d%0a%e3%80%90%ec%84%9c%ec%9a%b8%3d%eb%89%b4%ec%8b%9c%ec%8a%a4%e3%80%91+%ec%9e%84%ed%83%9c%ed%9b%88+%ea%b8%b0%ec%9e%90+%3d+%ec%9d%b4%ec%a3%bc%ec%97%b4+%ed%95%9c%ea%b5%ad%ec%9d%80%ed%96%89+%ec%b4%9d%ec%9e%ac%ea%b0%80+30%ec%9d%bc+%ec%98%a4%ec%a0%84+%ec%84%9c%ec%9a%b8+%ec%a4%91%ea%b5%ac+%ed%95%9c%ea%b5%ad%ec%9d%80%ed%96%89%ec%97%90%ec%84%9c+%ec%97%b4%eb%a6%b0+2017%eb%85%84+11%ec%9b%94+%ed%86%b5%ed%99%94%ec%a0%95%ec%b1%85%eb%b0%a9%ed%96%a5+%ea%b4%80%eb%a0%a8+%ea%b8%88%ec%9c%b5%ed%86%b5%ed%99%94%ec%9c%84%ec%9b%90%ed%9a%8c+%ed%9a%8c%ec%9d%98%eb%a5%bc+%ec%a3%bc%ec%9e%ac%ed%95%98%eb%a9%b0+%ec%9d%b8%ec%82%ac%eb%a7%90%ed%95%98%ea%b3%a0+%ec%9e%88%eb%8b%a4.+2017.11.30.+taehoonlim%40newsis.com%0d%0a%0d%0a%0d%0a%ec%9d%b4%ec%b0%bd%ec%84%a0+LG%ea%b2%bd%ec%a0%9c%ec%97%b0%ea%b5%ac%ec%9b%90+%ec%88%98%ec%84%9d%ec%97%b0%ea%b5%ac%ec%9c%84%ec%9b%90%ec%9d%80+%22%eb%8b%a4%ec%9d%8c+%ea%b8%88%eb%a6%ac%ec%9d%b8%ec%83%81%ec%9d%80+%eb%82%b4%eb%85%84+%ec%83%81%eb%b0%98%ea%b8%b0%ec%97%90+%ed%95%9c%ec%b0%a8%eb%a1%80%2c+%ed%95%98%eb%b0%98%ea%b8%b0%ec%97%90+%ed%95%9c%ec%b0%a8%eb%a1%80%eb%a1%9c+%ec%98%88%ec%b8%a1%ed%95%9c%eb%8b%a4%22%eb%a9%b0+%22%ea%b2%bd%ea%b8%b0+%ea%b3%bc%ec%97%b4%ec%9d%b4%eb%82%98+%eb%ac%bc%ea%b0%80+%ec%83%81%ed%99%a9%ec%9d%b4+%ec%9a%b0%eb%a0%a4%eb%90%98%eb%8a%94+%ec%83%81%ed%99%a9%ec%9d%b4+%ec%95%84%eb%8b%88%ea%b8%b0+%eb%95%8c%eb%ac%b8%ec%97%90+%ec%a7%80%ea%b8%88%ea%b3%bc+%ea%b0%99%ec%9d%80+%ea%b2%bd%ea%b8%b0+%ed%9d%90%eb%a6%84%ec%9d%b4%eb%9d%bc%eb%a9%b4+%ea%b8%88%eb%a6%ac+%ec%88%98%ec%a4%80%ec%9d%b4+%ec%a0%90%ec%b0%a8%ec%a0%81%ec%9c%bc%eb%a1%9c+%eb%86%92%ec%95%84%ec%a7%88+%ea%b2%83%22%ec%9d%b4%eb%9d%bc%ea%b3%a0+%ec%a0%84%eb%a7%9d%ed%96%88%eb%8b%a4.+%0d%0a"}';

                        $.ajax({
                            type: 'POST',
                            url: 'http://localhost:8080/common_infra_01/JsonServlet',
                            data: jQuery.param(formDatas)
                        })
                            .done(function(data){
                                alert( "Posting failed." +data);
                                // show the response
                            })
                            .fail(function() {

                                // just in case posting your form failed
                                alert( "Posting failed." );

                            });

                        //JSON.stringify({"I_PERNR":"2950001"});//'%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D';//

                        //axios.post('http://localhost:8080/common_infra_01/JsonServlet', formDatas)
                        //axios.post('http://10.40.17.43:9088/erpsac/JsonServlet', formDatas)
                        //http://localhost:8080/common_infra_01/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I_EN DDA%22%3A%2220161231%22%2C%22I_PERNR%22%3A%222950001%22%2C%22I_BEGDA%22%3A%2220160101%22%7D
                        /*
                        var param = jQuery.param(formDatas);
                         axios.post('http://localhost:8080/common_infra_01/JsonServlet?'+param
                        )
                             .then(function (response) {
                                 console.log(response);
                                 //var a = response.data.T_MEDI[0].TEXT;
                                 bootbox.alert({
                                     title:'Success',
                                     message:a,
                                     callback: function (result) {
                                         //window.location.href ='/medicals';
                                     }
                                 });
                             })
                             .catch(function (error) {
                                 msg = error.message;
                                 exeption = error.stack;
                                 bootbox.alert({
                                     title: exeption,
                                     message: msg
                                 })
                             });
                       */





                        /*
                        axios.post('http://localhost:8080/common_infra_01/JsonServlet',{
                                                                                            SERVER: 'STC',
                                                                                            FID: 'Z_HR_0131',//'Z_HR_0131',
                                                                                            import:'%7B%22I%5FPERNR%22%3A%222950001%22%7D'
                                                                                        }
/!*                            ,{
                                headers: {
                                    crossDomain: true,
                                    withCredentials: true

                                }
                            }*!/
                        )*/
                        //
/*
*
*
*                           {
                                headers: {
                                    crossDomain: true,
                                    withCredentials: true

                                }
                            }
* */
                        //axios.get('http://10.40.17.43:9088/erpsac/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D')
                        //axios.get('http://localhost:8080/common_infra_01/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I_ENDDA%22%3A%2220161231%22%2C%22I_PERNR%22%3A%222950001%22%2C%22I_BEGDA%22%3A%2220160101%22%7D')



                    },
                    save2:function() {
                        //alert(11);
                        //var formDatas = $('#formMedicalMain').serialize();
/*

                        SERVER: STC
                        FID: Z_HR_TB03
                        import: {"I_GWAREKEY":""}
                        tables: {"ITAB":[{"PERNR":"2950001","BREAS":"12345","BETRG":" 30000.00","BUSE":"01"}]}
*/

                        var formDatas = {};
                        formDatas.SERVER = 'STC';
                        formDatas.FID = 'Z_HR_TB03';
                        formDatas.import = {"I_GWAREKEY":""};
                        formDatas.tables = {"ITAB":[{"PERNR":"2950001","BREAS":"12345","BETRG":" 30000.00","BUSE":"01"}]};

                        axios.post('http://10.40.17.43:9088/erpsac/JsonServlet',formDatas)
                        /*
                        axios.post('/medicals', {
                                                firstName: 'Fred',
                                                lastName: 'Flintstone'
                         })
                        */
                            .then(function (response) {
                                console.log(response);
                                bootbox.alert({
                                    title:'Success',
                                    message:'저장되었습니다.',
                                    callback: function (result) {
                                        window.location.href ='/medicals';
                                    }
                                });
                            })
                            .catch(function (error) {
                                msg = JSON.parse(error.request.responseText).message;
                                exeption = JSON.parse(error.request.responseText).exception;
                                bootbox.alert({
                                    title: exeption,
                                    message: msg
                                })
                            });
                    }
                },
                mounted: function() {

//                    axios.post('/medicals',formDatas)
                    /*axios.get('http://10.40.17.43:9088/erpsac/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D')
                        .then(function (response) {
                            console.log(response);
                            var a = response.data.T_MEDI[0].TEXT;
                            bootbox.alert({
                                title:'Success',
                                message:a,
                                callback: function (result) {
                                    //window.location.href ='/medicals';
                                }
                            });
                        })
                        .catch(function (error) {
                            msg = JSON.parse(error.request.responseText).message;
                            exeption = JSON.parse(error.request.responseText).exception;
                            bootbox.alert({
                                title: exeption,
                                message: msg
                            })
                        });*/
                        /*
                    axios.get("/api/stories")
                        .then(function (response) {
                            Vue.set(vm, "stories", response.data) // vm.stories = response.data
                        })*/
                }
            });


            //alert("의료비");
            var table = $('#example').DataTable(
                {
                    "responsive": true,
                    select: false,
                    "paging": true,
                    "info": true,
                    "ordering": false,
                    "order": [[0, "desc"]],
                    "deferRender": true,
                    stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                    "pagingType": "full_numbers", //first_last_number
                    // obj 순서대로 칼럼 정의 할수 있음
                    "columnDefs": [
                        { responsivePriority: 1, targets: 8},
                        {
                          /*  "render": function ( data, type, row ) {
                                return data +' ('+ row[1]+')';
                            },
                            "targets": 0*/
                        },
                        {
/*                            "targets": [1],
                            "visible": false,
                            "searchable": false*/
                        }
                    ],
                    "createdRow": function ( row, data, index ) {
                        if ( data[0].replace(/[\$,]/g, '') * 1 > 55 ) {
                            $('td', row).eq(1).addClass('text-primary'); //
                        }
                    }
                }
            );
            // 테이블 셋팅완료
            /*var counter = 1;
            $('#addRow').on( 'click', function () {
                table.row.add( [
                    '.1',
                    '.2',
                    '.3'

                ] ).draw( false );

                counter++;
            } );
            $('#addRow').click();*/


/*            // 이벤트
            $('#example tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );*/

/*            $('#example tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data[0]+'\'s row' );
            } );*/
        });
    </script>
@endsection