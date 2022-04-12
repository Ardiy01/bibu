<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{ $id }}" class="form-label col-sm-3 col-12 m-auto fs-6">{{ $label }}</label>
    <div class="col-sm-9 col-12 mt-1" >
        <input type="{{ $type }}"  class="form-control  @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}" autocomplete="off"
        @if( $value !== null && $value !== "" )
            value="{{ $value }}"
        @else
            value="{{ old($name) }}"
        @endif
        {{ $readonly ? 'readonly' : '' }}>
        @error($name)
            <div class="invalid-feedback text-capitalize">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>