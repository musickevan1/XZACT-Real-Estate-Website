function openPopup() {
    document.getElementById('question-popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('question-popup').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
});
