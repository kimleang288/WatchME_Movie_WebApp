function makeToggle(btnId, inputId, openId, closedId) {
    const btn    = document.getElementById(btnId);
    const input  = document.getElementById(inputId);
    const eOpen  = document.getElementById(openId);
    const eClosed= document.getElementById(closedId);
    btn.addEventListener('click', () => {
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        eOpen.style.display  = isText ? 'block' : 'none';
        eClosed.style.display= isText ? 'none'  : 'block';
    });
}
makeToggle('eyeToggle1','password',      'eye1Open','eye1Closed');
makeToggle('eyeToggle2','password_confirmation','eye2Open','eye2Closed');

// ── Password strength ──
const pwdInput     = document.getElementById('password');
const bars         = [document.getElementById('s1'),document.getElementById('s2'),document.getElementById('s3'),document.getElementById('s4')];
const strengthLabel= document.getElementById('strengthLabel');
const levels = [
    { color: '#e55', label: 'Weak' },
    { color: '#f90', label: 'Fair' },
    { color: '#3b82f6', label: 'Good' },
    { color: '#22c55e', label: 'Strong' },
];

pwdInput.addEventListener('input', () => {
    const val = pwdInput.value;
    let score = 0;
    if (val.length >= 8)            score++;
    if (/[A-Z]/.test(val))          score++;
    if (/[0-9]/.test(val))          score++;
    if (/[^A-Za-z0-9]/.test(val))   score++;

    bars.forEach((b, i) => {
        b.style.background = i < score ? levels[score - 1].color : 'rgba(255,255,255,0.1)';
    });
    strengthLabel.textContent  = val.length ? levels[score - 1]?.label ?? '' : '';
    strengthLabel.style.color  = val.length ? levels[score - 1]?.color ?? '' : 'var(--muted)';
});

// ── Loading state on submit ──
document.getElementById('registerForm').addEventListener('submit', () => {
    const btn = document.getElementById('submitBtn');
    btn.disabled    = true;
    btn.textContent = 'Creating account…';
});