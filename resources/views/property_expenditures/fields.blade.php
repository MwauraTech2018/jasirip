<!-- Property Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('property_id', 'Property:') !!}
    <select name="property_id" class="form-control select2" required id="property_id">
        <option value="">Select Property</option>
        @if(count($properties))
            @foreach($properties as $property)
                <option value="{{ $property->id }}">{{ $property->name }}-{{$property->masterfile->full_name}}</option>
                @endforeach
            @endif
        {{--<option value="{{ $payment->id }}">{{ $payment->ref_number }} - {{ $payment->house_number }} - {{ $payment->masterfile->full_name }} - {{ $payment->amount }} Ksh</option>--}}
    </select>
</div>/

<!-- Expenditure Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('expenditure_id', 'Expenditure:') !!}
    <select name="expenditure_id" class="form-control select2" required id="expenditure_id">
        <option value="">Select Expense</option>
        @if(count($expenses))
            @foreach($expenses as $expense)
                <option value="{{ $expense->id }}">{{ $expense->name }}</option>
            @endforeach
        @endif
    </select>
</div>



{{--<!-- Landlord Id Field -->--}}
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('landlord_id', 'Landlord Id:') !!}--}}
    {{--{!! Form::number('landlord_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Created By Field -->--}}
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('created_by', 'Created By:') !!}--}}
    {{--{!! Form::number('created_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Amount Field -->
<div class="form-group col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', \Carbon\Carbon::today()->toDateString(), ['class' => 'form-control']) !!}
</div>

