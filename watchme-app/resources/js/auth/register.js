document.addEventListener('DOMContentLoaded', () => {

    // ── Password strength ──
    const pwdInput      = document.getElementById('password');
    const bars          = ['s1','s2','s3','s4'].map(id => document.getElementById(id));
    const strengthLabel = document.getElementById('strengthLabel');

    const levels = [
        { color: '#e55',     label: 'Weak'   },
        { color: '#f90',     label: 'Fair'   },
        { color: '#3b82f6',  label: 'Good'   },
        { color: '#22c55e',  label: 'Strong' },
    ];

    if (pwdInput) {
        pwdInput.addEventListener('input', () => {
            const val = pwdInput.value;
            let score = 0;
            if (val.length >= 8)           score++;
            if (/[A-Z]/.test(val))         score++;
            if (/[0-9]/.test(val))         score++;
            if (/[^A-Za-z0-9]/.test(val))  score++;

            bars.forEach((b, i) => {
                b.style.background = i < score
                    ? levels[score - 1].color
                    : 'rgba(255,255,255,0.1)';
            });

            strengthLabel.textContent = val.length ? (levels[score - 1]?.label ?? '') : '';
            strengthLabel.style.color = val.length ? (levels[score - 1]?.color ?? '') : 'var(--muted)';
        });
    }

    // ── Loading state on submit ──
    document.getElementById('registerForm')?.addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.disabled    = true;
        btn.textContent = 'Creating account…';
    });

});