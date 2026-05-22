// ── Eye toggles ──
function makeToggle(btnId, inputId, openId, closedId) {
    const btn     = document.getElementById(btnId);
    const input   = document.getElementById(inputId);
    const eOpen   = document.getElementById(openId);
    const eClosed = document.getElementById(closedId);
    btn.addEventListener('click', () => {
        const isText = input.type === 'text';
        input.type        = isText ? 'password' : 'text';
        eOpen.style.display  = isText ? 'block' : 'none';
        eClosed.style.display= isText ? 'none'  : 'block';
    });
}
makeToggle('eyeToggle1', 'password',              'eye1Open', 'eye1Closed');
makeToggle('eyeToggle2', 'password_confirmation', 'eye2Open', 'eye2Closed');

// ── Live requirements checker ──
const pwdInput = document.getElementById('password');
const rules = [
    { id: 'req-length',  test: v => v.length >= 8 },
    { id: 'req-upper',   test: v => /[A-Z]/.test(v) },
    { id: 'req-lower',   test: v => /[a-z]/.test(v) },
    { id: 'req-special', test: v => /[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(v) },
];

pwdInput.addEventListener('input', () => {
    const val = pwdInput.value;
    rules.forEach(({ id, test }) => {
        document.getElementById(id).classList.toggle('met', test(val));
    });
});

// ── Loading state ──
document.getElementById('resetForm').addEventListener('submit', () => {
    const btn = document.getElementById('submitBtn');
    btn.disabled    = true;
    btn.textContent = 'Resetting…';
});