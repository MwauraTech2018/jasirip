<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Int Field -->
<div class="form-group col-sm-12">
    {!! Form::label('int', 'Int:') !!}
    {!! Form::number('int', null, ['class' => 'form-control']) !!}
</div>

<!-- Repayment Period Field -->
<div class="form-group col-sm-12">
    {!! Form::label('repayment_period', 'Repayment Period:') !!}
    {!! Form::number('repayment_period', null, ['class' => 'form-control']) !!}
</div>
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('ID', 'ID:') !!}--}}
    {{--{!! Form::number('id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

