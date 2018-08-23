

<!-- Mem No Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mem_no', 'Mem No:') !!}

    {{--{!! Form::number('mem_no', null, ['class' => 'form-control']) !!}--}}
    <select class="form-control select2" name="mem_no" id="mem-select">

        <option value="">Select Name</option>
        @if(count($clients))

            @foreach($clients as $client)

                <option value="{{$client->id}}">{{$client->full_name}}</option>

            @endforeach

            @endif


    </select>
</div>
<div class="form-group col-sm-12">
    <label>Total_Savings</label>
    <input type="text" name="savings" id="t_sav" class="form-control" readonly>
</div>

<!-- Loan Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('loan_id', 'Loan Id:') !!}
    {{--{!! Form::number('loan_id', null, ['class' => 'form-control']) !!}--}}
    <select class="form-control select2" name="loan_id" id="loan-id">
        <option value="">Select Loan</option>
        @if(count($loans))
            @foreach($loans as $loan)

                <option value="{{$loan->id}}">{{$loan->masterfile->full_name.' - '.$loan->approved_amt}}</option>

                @endforeach



            @endif

    </select>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

