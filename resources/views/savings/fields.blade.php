<!-- Payment Mode Field -->
<div class="form-group col-sm-12">
    {!! Form::label('client_id', 'Client Name:') !!}
    {{--{!! Form::number('client_id', null, ['class' => 'form-control']) !!}
    --}}
    <select class="form-control select2" name="client_id" id="client_id">
        <option value="">Select Client</option>
        @if(count($clients))
            @foreach($clients  as $client)
                <option value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
        @endif
    </select>

</div>
<div class="form-group col-sm-12">
    {!! Form::label('service_id', 'Service Type:') !!}
    {{--{!! Form::number('service_id', null, ['class' => 'form-control']) !!}--}}
    <select class="form-control select2" name="service_id" id="service_id">
        <option value="">Select Sercice Type</option>
        @if(count($services))

            @foreach($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>

            @endforeach
        @endif

    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('payment_mode', 'Payment Mode:') !!}
    {{--{!! Form::text('payment_mode', null, ['class' => 'form-control']) !!}--}}
<select class="form-control select2" name="payment_mode" id="payment-mode">
        <option value="CASH">Cash</option>
        <option value="Bank">Bank</option>
        <option value="MPESA">Mpesa</option>
    </select>
</div>

<div class="form-group col-sm-12" id="bank-div" style="display: none;">
    {!! Form::label('bank_id', 'Bank Name:') !!}
    <select class="form-control select2" name="bank_id" id="bank-id">

        <option value="">Select Bank</option>

        @if(count($banks))

            @foreach($banks as $bank)
                <option value="{{$bank->id}}">{{$bank->name}}</option>
            @endforeach
            @endif
    </select>
    {{--{!! Form::number('bank_id', null, ['class' => 'form-control']) !!}--}}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('ref_number', 'Ref Number:') !!}
    {!! Form::text('ref_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Id Field -->


<!-- Amount Field -->
<div class="form-group col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Paybill Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('paybill', 'Paybill:') !!}--}}
    {{--{!! Form::text('paybill', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Phone Number Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('phone_number', 'Phone Number:') !!}--}}
    {{--{!! Form::text('phone_number', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Billrefnumber Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('BillRefNumber', 'Billrefnumber:') !!}--}}
    {{--{!! Form::text('BillRefNumber', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Transid Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('TransID', 'Transid:') !!}--}}
    {{--{!! Form::text('TransID', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Transtime Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('TransTime', 'Transtime:') !!}--}}
    {{--{!! Form::date('TransTime', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Firstname Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('FirstName', 'Firstname:') !!}--}}
    {{--{!! Form::text('FirstName', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Middlename Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('middleName', 'Middlename:') !!}--}}
    {{--{!! Form::text('middleName', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Lastname Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('LastName', 'Lastname:') !!}--}}
    {{--{!! Form::text('LastName', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Received On Field -->
<div class="form-group col-sm-12">
    {!! Form::label('received_on', 'Received On:') !!}
    {!! Form::date('received_on', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('created_by', 'Created By:') !!}--}}
    {{--{!! Form::number('created_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Status Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('status', 'Status:') !!}--}}
    {{--<label class="checkbox-inline">--}}
        {{--{!! Form::hidden('status', false) !!}--}}
        {{--{!! Form::checkbox('status', '1', null) !!} 1--}}
    {{--</label>--}}
{{--</div>--}}

<!-- Transferred From Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('transferred_from', 'Transferred From:') !!}--}}
    {{--{!! Form::text('transferred_from', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Transferred To Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('transferred_to', 'Transferred To:') !!}--}}
    {{--{!! Form::text('transferred_to', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Transferred By Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('transferred_by', 'Transferred By:') !!}--}}
    {{--{!! Form::text('transferred_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

