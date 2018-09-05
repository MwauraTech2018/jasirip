<!-- Loan Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('loan_id', 'Loan Id:') !!}
    {!! Form::number('loan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mem No Field -->
<div class="form-group col-sm-12">
    {!! Form::label('mem_no', 'Mem No:') !!}
    {!! Form::number('mem_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    {!! Form::text('transaction_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Received By Field -->
<div class="form-group col-sm-12">
    {!! Form::label('received_by', 'Received By:') !!}
    {!! Form::number('received_by', null, ['class' => 'form-control']) !!}
</div>

