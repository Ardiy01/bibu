<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control bg-white @error($name) is-invalid @enderror" style="color: #007C84" id="{{ $id }}" name="{{ $name }}" autocomplete="off"
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