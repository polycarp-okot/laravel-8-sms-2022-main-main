<div class="form-group row">

    <label class="col-md-2 col-form-label" for="grade_id">{{ __('Grade') }} <span class="text-danger">*</span></label>
    <div class="col-lg-3">
        <select name="grade_id" id="grade_id" class="form-control @error('grade_id') is invalid @enderror">
            @foreach ($grades as $key => $grade)
            <option value="{{ $grade->id }}"
                {{ isset($class) ? Helper::getSelectedValue($grade->id, $class->grade_id) : '' }}>{{ $grade->name }}
            </option>
        @endforeach
    </select>

    @error('grade_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<label class="col-md-2 col-form-label" for="class_name">{{ __('Class Name') }} <span class="text-danger">*</span></label>
    <div class="col-lg-5">
        <input type="text" class="form-control @error('class_name') is invalid @enderror" id="class_name" 
        name="class_name" value="{{ isset($class) ? $class->name : old('class_name') }}"
        placeholder="{{ __('Enter Class Name') }}..">
            
    @error('class_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">

    <label class="col-md-2 col-form-label" for="class_status">{{ __('Class Status') }}<span class="text-danger">*</span></label>
        <div class="col-lg-3">
            <select name="class_status" id="class_status" class="form-control @error('class_status') is invalid @enderror">
            @foreach (Helper::getStatus() as $key => $status)
            <option value="{{ $key }}"
                {{ isset($class) ? Helper::getSelectedValue($key, $class->status) : '' }}>{{ $status }}
            </option>
            @endforeach
            </select>

@error('class_status')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

</div>
    <label class="col-lg-2 col-form-label" for="class_code">{{ __('Class Code') }}<span class="text-danger">*</span></label>
    <div class="col-lg-5">
        <input type="text" readonly class="form-control @error('class_code') is invalid @enderror" id="class_code" 
        name="class_code" value="{{ isset($class) ? $class->code : old('class_code') }}"
        placeholder="{{ __('Enter Class Code') }}..">
    </div>
            
    @error('class_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror



