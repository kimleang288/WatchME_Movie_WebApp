@props([
    'name'        => 'password',
    'label'       => 'Password',
    'placeholder' => 'Enter your password',
    'autocomplete'=> 'current-password',
    'hasError'    => false,
])

<div class="form-group" x-data="{ show: false }">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-wrap">
        <span class="input-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
        </span>
        <input
            :type="show ? 'text' : 'password'"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            autocomplete="{{ $autocomplete }}"
            required
            class="{{ $hasError ? 'is-invalid' : '' }}"
        >
        <button type="button" class="eye-toggle" @click="show = !show" aria-label="Toggle password visibility">
            <svg x-show="!show" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            </svg>
            <svg x-show="show" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
            </svg>
        </button>
    </div>
</div>