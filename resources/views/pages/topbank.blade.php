@extends('main')
@section('title', '| Top Bank')
@section('stylesheets')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row end-xs" style="margin-right: -24px">
                    <table id="" cellspacing="0" style="max-width:400px;"  class="table blueTable2 table-striped table-bordered table-hover row-border p-b-md m-r-md">
                        <thead>
                            <th style="min-width:60px">상환기간</th>
                            <th style="min-width:50px">대출금액</th>
                            <th style="min-width:60px">상환금액</th>
                            <th style="min-width:50px">잔여금액</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <table id="example" cellspacing="0" width="100%" class="table blueTable2 table-striped table-bordered table-hover row-border p-b-md" style="border-collapse:collapse!important;">
                    <thead>
                    <th style="min-width:60px">신청상태</th>
                    <th style="min-width:50px">신청일</th>
                    <th style="min-width:60px">대출용도</th>
                    <th style="min-width:50px">대출사유</th>
                    <th style="min-width:60px"> 대출금액</th>
                    <th style="min-width:60px">보증보험상태</th>
                    <th style="min-width:60px">지급일</th>
                    <th style="min-width:60px">변경/상태</th>
                    </thead>
                    <tbody>

                    </tbody>


                </table>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-2">
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue">신청</a>
                    </div>
                    <div class="col-xs-10 end-xs">
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue m-r-sm">동의서</a>
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-md blue">Top Bank 매뉴얼</a>
                    </div>
                    <div class="col-xs-12 well well-sm m-b-0">
                        <div class="text-info">
                            <i class="fa fa-comments-o"></i> Help :
                        </div>
                        <ul class="p-l-md m-b-0">
                            <li type="*">신청기간 : 수시</li>
                            <li>부서장의 결재를 득한 경우에만 지급됩니다.</li>
                            <li>신청 시 대출사유별 제출서류 확인 후 동의서 및 증빙서류 Scan File을 첨부하셔야 (1개의 File로 첨부) 지급이 가능합니다.</li>
                            <li class="text-danger">단, 파일은 반드시 보안해제 후 첨부하셔야 합니다.</li>
                            <li>보증보험 가입 대상자는 증빙서류 제출 후 1차 지급 확정시 일주일 이내 보증보험 가입을 완료해야 합니다.</li>
                            <li class="text-danger">운영금액 한도 소진 시 Top Bank 신청이 일시 중단 될 수 있습니다.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        //alert("의료비");
        var table = $('#example').DataTable(
            {
                "searching":false,
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
                    { responsivePriority: 1, targets: 1},
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
                ]
            }
        );



        /*        $(document).ready(function () {
                    var s = $('.portlet.portlet-bordered');
                    s.attr('style', 'background-color:#f0f0f0');
                });*/
    </script>
@endsection
