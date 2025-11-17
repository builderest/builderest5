document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.accordion-button').forEach(btn => {
            if (btn !== button) {
                btn.classList.add('collapsed');
            }
        });
    });
});
