@extends('main')
@section('title', '공지사항')
@section('title_sub', 'All Posts...')
@section('content')
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table class="table table-hover">
                <thead>
                <th style="width:100px">#</th>
                <th>Title</th>
                <th>Body</th>
                <th style="width:140px">Create At</th>
                <th style="width:140px"></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{strip_tags($post->title)}}</td>
                        <td>{{substr(strip_tags($post->body), 0, 50)}} {{strlen($post->body) > 50 ? "...":""}}</td>
                        <td>{{date('M j, Y', strtotime($post->updated_at) )}}</td>
                        <td>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
               {{-- <tfoot class="hide-if-no-paging">
                <tr>
                    <td colspan="5" class="text-center footable-visible">
                        <ul class="pager">
                            <li class="footable-page-arrow disabled">«</li>
                            <li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li>
                            <li class="footable-page active"><a data-page="0" href="#">1</a></li>
                            <li class="footable-page">5</li>
                            <li class="footable-page"><a data-page="1" href="#">2</a></li>
                            <li class="footable-page"><a data-page="1" href="#">2</a></li>

                            <li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li>
                            <li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li>
                        </ul>
                    </td>
                </tr>

                <tfoot class="hide-if-no-paging">
                <tr>
                    <td colspan="5" class="text-center footable-visible">
                        <ul class="pagination">
                            <li class="disabled"><span>«</span></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="http://ehr.dev/posts?page=2">2</a></li>
                            <li><a href="http://ehr.dev/posts?page=2" rel="next">»</a></li>
                        </ul>
                    </td>
                </tr>

                </tfoot>
--}}

            </table>
            <div class="center-xs">
                {!! $posts->links(); !!}
            </div>

            <div class="form_group">
                <hr>

                    <div class="row col-sm-12 end-xs">
                            <a href="{{route('posts.create')}}" class="md-btn md-raised m-b-sm w-xs blue">작성</a>
                    </div>
                    {{--<div class="col-md-8">col-md-8</div>--}}
                    {{--<div class="col-md-4 "></div>--}}

            </div>

        </div>
    </div>

@stop