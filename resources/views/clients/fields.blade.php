<!-- Full Name Field -->

<div class="form-group col-sm-12">
    {!! Form::label('member_no', 'Member_No:') !!}
    {!! Form::text('member_no', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- National Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('national_id', 'National Id:') !!}
    {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <select class="form-control select2" name="gender" id="gender">
        <option value="MALE">MALE</option>
        <option value="FEMALE">FEMALE</option>

    </select>
    {{--{!! Form::text('gender', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- B Role Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('b_role', 'B Role:') !!}--}}
    {{--{!! Form::text('b_role', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Created By Field -->
{{--<div class="form-group col-sm-12">--}}
    {{--{!! Form::label('created_by', 'Created By:') !!}--}}
    {{--{!! Form::number('created_by', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

