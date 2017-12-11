@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div  style="overflow-x:auto;">
                <table style="table-layout: fixed; border-collapse:collapse!important;">
                    <tbody><tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                        <th>Points</th>
                    </tr>
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>

                    </tbody></table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var s = $('.portlet.portlet-bordered');
            s.attr('style', 'background-color:#f0f0f0');
        });
    </script>
@endsection
