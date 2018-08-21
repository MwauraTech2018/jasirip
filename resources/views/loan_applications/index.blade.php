@extends('layouts.app')
 @section("pageTitle",'Loans')
 {{--@section("pageSubtitle",'create, edit, delete loan_applications')--}}
  {{--@section("breadcrumbs")--}}
         {{--<li>Home</li> <li>Apply Loan</li>--}}
         {{--@endsection--}}
@section('content')
    <section class="content-header">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right btn-sm" data-toggle="modal" style="margin-top: -10px;margin-bottom: 5px" href="#create-modal">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('loan_applications.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="create-modal" role="dialog">
            {!! Form::open(['route' => 'loanApplications.store']) !!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Create loan_applications</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @include('loan_applications.fields')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        {!! Form::close() !!}
    </div>

    {{--<div class="modal fade" id="edit-modal" role="dialog">--}}
           {{--<form method="post" id="edit-form">--}}
               {{--{{ csrf_field() }}--}}
           {{--<input name="_method" type="hidden" value="PATCH">--}}
           {{--<div class="modal-dialog">--}}
               {{--<div class="modal-content">--}}
                   {{--<div class="modal-header">--}}
                       {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                           {{--<span aria-hidden="true">&times;</span>--}}
                       {{--</button>--}}
                       {{--<h4 class="modal-title">Edit loan_applications</h4>--}}
                   {{--</div>--}}
                   {{--<div class="modal-body">--}}
                        {{--<div class="row">--}}
                           {{--@include('loan_applications.fields'))--}}
                        {{--</div>--}}
                   {{--</div>--}}
                   {{--<div class="modal-footer">--}}
                       {{--<input type="hidden" id="editDetails" value="{{url("/loanApplications") }}">--}}
                       {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>--}}
                       {{--<button type="submit" class="btn btn-primary">Save</button>--}}
                   {{--</div>--}}
               {{--</div>--}}
               {{--<!-- /.modal-content -->--}}
           {{--</div>--}}
           {{--</form>--}}
       {{--</div>--}}
    <div class="modal fade" id="edit2-modal" role="dialog">
        <form method="post" id="edit-form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Update loan_applications</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @include('loan_applications.fields2')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="editDetails" value="{{ url("/loanApplications") }}">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
    </div>

     {{--delete modal--}}
        <div class="modal fade" id="delete-modal" role="dialog">
            <form id="delete-form" method="post">
                <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Delete loan_applications</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this loan_applications?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <div class="modal fade" id="details-modal" role="dialog">
        <form id="" method="post">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Gurantors Details</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                {{--<th>Ref</th>--}}
                                <th>Mem_No</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody id="loan-details">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Ok</button>
                        {{--<button type="submit" class="btn btn-primary">Save</button>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

     @push('js')

        <script>
            $("body").on('click','.loan-details',function(){
                var url = $(this).attr('hint');
                console.log(url);
                $.ajax({
                    url: url,
                    dataType: 'json',
                    type: 'GET',
                    // var data = JSON.parse(response);
                    success: function(data){
                        // data = JSON.parse(response);
                        //  data = JSON.parse(data);
                        console.log(data);
                        let html = '';
                        if(data.length > 0){
                            let total = 0;
                            for (let i =0; i< data.length; i++){
                                // let date = new Date(data[i].date);
                                // if(data[i].transaction_type === 'CREDIT'){
                                //     total = total + data[i].amount;
                                // }else{
                                    total = total + data[i].amount;
                                // }
                                html += '<tr>' +
                                    // '<td>'+ date.toDateString()+'</td>' +
                                    '<td>'+ data[i].name+'</td>' +
                                    '<td>'+ data[i].mem_no+'</td>' +
                                    '<td>'+ data[i].amount+'</td>' +
                                    '</tr>';
                            }
                            html += '<tr>' +
                                '<th>Totals</th>' +
                                '<th></th>' +
                                // '<th></th>' +
                                '<th>'+ total+'</th>' +
                                '</tr>';
                        }
                        $('#loan-details').html(html);
                    }
                })
            });
         </script>




        @endpush