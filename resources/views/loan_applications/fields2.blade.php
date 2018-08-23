<!-- Mem No Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mem_no', 'Member:') !!}
    {!! Form::number('mem_no', null, ['class' => 'form-control'],['readonly']) !!}
    {{--<input type="text" name="mem_no" class="form-control" readonly>--}}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('loan_type_id', 'LoanType:') !!}
    {!! Form::number('loan_type_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('Member', 'Member:') !!}
    <select class="form-control select2" name="mem_no" id="mem_no">
            <option value="">Select Client<option>
        @if(count($members))

            @foreach($members as $member)

                    <option value="{{$member->id}}">{{$member->full_name}}</option>
                @endforeach

            @endif
    </select>
</div>

<!-- Loan Type Id Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('loan_type_id', 'LoanType:') !!}--}}
    {{--{!! Form::number('loan_type_id', null, ['class' => 'form-control']) !!}--}}
    {{--<select class="form-control select2" name="loan_type_id" id="loan_type_id">--}}
        {{--<option value="">Select Loan Type</option>--}}
        {{--@if(count($loantypes))--}}
            {{--@foreach($loantypes as $loantype)--}}
                {{--<option value="{{$loantype->id}}">{{$loantype->name}}</option>--}}
            {{--@endforeach--}}
         {{--@endif--}}
    {{--</select>--}}
{{--</div>--}}

<!-- Application Date Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('application_date', 'Application Date:') !!}--}}
    {{--{!! Form::date('application_date', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Applied Amt Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('applied_amt', 'Applied Amt:') !!}--}}
    {{--{!! Form::number('applied_amt', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Approved Amt Field -->
<div class="form-group col-sm-12">
    {!! Form::label('approved_amt', 'Approved Amt:') !!}
    {!! Form::number('approved_amt', null, ['class' => 'form-control']) !!}
</div>

<!-- Approval Date Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('approval_date', 'Approval Date:') !!}--}}
    {{--{!! Form::date('approval_date', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Repayment Prd Field -->
<div class="form-group col-sm-12">
    {!! Form::label('repayment_prd', 'Repayment Prd:') !!}
    {!! Form::number('repayment_prd', null, ['class' => 'form-control']) !!}
</div>

<!-- Balance Todate Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('balance_todate', 'Balance Todate:') !!}--}}
    {{--{!! Form::number('balance_todate', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Created By Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('created_by', 'Created By:') !!}--}}
    {{--{!! Form::number('created_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Approved By Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('approved_by', 'Approved By:') !!}--}}
    {{--{!! Form::number('approved_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Status Field -->--}}
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('status', 'Status:') !!}--}}
    {{--<label class="checkbox-inline">--}}
        {{--{!! Form::hidden('status', false) !!}--}}
        {{--{!! Form::checkbox('status', '1', null) !!} 1--}}
    {{--</label>--}}
{{--</div>--}}

