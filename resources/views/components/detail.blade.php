<div class="d-grid gap-2 col-12 mx-auto">
    <div class="my-2" style="color: #007C84">
        <label for="{{ $id }}" class="form-label mb-1 fw-bold">{{ $label }}</label>
        <div class="input-group mt-0">
            <input type="{{ $type }}" style="color: #007C84"
                class="form-control bg-white fw-bold shadow @error($name) is-invalid @enderror" id="{{ $id }}"
                value="{{ $value }}" name="{{ $name }}" {{ $readonly ? 'readonly' : '' }}
                @if ($value !== null && $value !== '') value="{{ $value }}"
                @else value="{{ old($name) }}" @endif>
            @error($name)
                <div class="invalid-feedback text-capitalize">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
