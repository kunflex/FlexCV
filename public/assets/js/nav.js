// Get the header and AI-powered elements
const header = document.querySelector('header');
const aiPowered = document.querySelector('.AI-powered');

let prevScrollPos = window.pageYOffset;

// Add scroll event listener
window.onscroll = function () {
    const currentScrollPos = window.pageYOffset;

    // Check the scroll direction
    if (prevScrollPos > currentScrollPos) {
        header.classList.add('scrolled', 'fixed-nav');
        
        // Check if not at the top
        if (currentScrollPos > 0) {
            aiPowered.classList.add('hidden');
        } else {
            aiPowered.classList.remove('hidden');
        }
    } else {
        header.classList.add('scrolled', 'fixed-nav');
        aiPowered.classList.add('hidden');
    }

    prevScrollPos = currentScrollPos;
};
