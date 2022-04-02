<div class="form-group row">

    <label class="col-md-2 col-form-label" for="level_id">{{ __('Level') }} <span class="text-danger">*</span></label>
    <div class="col-lg-3">
        <select name="level_id" id="level_id" class="form-control @error('level_id') is invalid @enderror">
            @foreach ($levels as $key => $level)
            <option value="{{ $level->id }}"
                {{ isset($grade) ? Helper::getSelectedValue($level->id, $grade->level_id) : '' }}>{{ $level->name }}
            </option>
        @endforeach
    </select>

    @error('level_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<label class="col-md-2 col-form-label" for="grade_name">{{ __('Grade Name') }} <span class="text-danger">*</span></label>
    <div class="col-lg-5">
        <input type="text" class="form-control @error('grade_name') is invalid @enderror" id="grade_name" 
        name="grade_name" value="{{ isset($grade) ? $grade->name : old('grade_name') }}"
        placeholder="{{ __('Enter Grade Name') }}..">
            
    @error('grade_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">

    <label class="col-md-2 col-form-label" for="grade_status">{{ __('Grade Status') }}<span class="text-danger">*</span></label>
        <div class="col-lg-3">
            <select name="grade_status" id="grade_status" class="form-control @error('grade_status') is invalid @enderror">
            @foreach (Helper::getStatus() as $key => $status)
            <option value="{{ $key }}"
                {{ isset($grade) ? Helper::getSelectedValue($key, $grade->status) : '' }}>{{ $status }}
            </option>
            @endforeach
            </select>

@error('grade_status')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

</div>
    <label class="col-lg-2 col-form-label @error('description') is invalid @enderror"
        for="description">{{ __('Description') }}<span class="text-danger">*</span></label>
    <div class="col-lg-5">
        <textarea class="form-control" id="description" name="description" rows="5"
            placeholder="{{ __('Enter Description') }}">{{ isset($grade) ? $grade->description : old('description') }}</textarea>
    </div>

@error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror



