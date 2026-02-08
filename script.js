document.addEventListener('DOMContentLoaded', () => {
    
    /* =========================================
       1. INITIALIZE AOS (ANIMATIONS)
       ========================================= */
    AOS.init({
        duration: 1000,       // Duration of animation in ms
        easing: 'ease-out-cubic', // Smoother easing than default
        once: true,           // Only animate once while scrolling down
        offset: 50,           // Trigger animations sooner
        delay: 50,            // Slight delay for better pacing
        anchorPlacement: 'top-bottom', // Animate when top of element hits bottom of window
    });

    /* =========================================
       2. SMART NAVBAR (SCROLL EFFECT)
       ========================================= */
    const navbar = document.querySelector('.temp-nav') || document.querySelector('header');
    
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.style.background = 'rgba(10, 25, 47, 0.95)';
                navbar.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
                navbar.style.padding = '0 5%'; // Compact height
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'transparent';
                navbar.style.boxShadow = 'none';
                navbar.style.padding = '10px 5%'; // Original height
                navbar.style.backdropFilter = 'none';
            }
        });
    }

    /* =========================================
       3. PARALLAX BLOBS (MOUSE MOVEMENT)
       ========================================= */
    // Only runs if blobs exist on the page
    const blobs = document.querySelectorAll('.blob');
    const container = document.querySelector('.info-panel');

    if (blobs.length > 0 && container) {
        container.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;

            blobs.forEach((blob, index) => {
                // Different speeds for depth effect
                const speed = (index + 1) * 20; 
                const xOffset = (window.innerWidth / 2 - e.clientX) / speed;
                const yOffset = (window.innerHeight / 2 - e.clientY) / speed;

                blob.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
            });
        });
    }

    /* =========================================
       4. FORM ENHANCEMENTS
       ========================================= */
    
    // A. Auto-Expanding Textarea
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(tx => {
        tx.setAttribute('style', 'height:' + (tx.scrollHeight) + 'px;overflow-y:hidden;');
        tx.addEventListener("input", OnInput, false);
    });

    function OnInput() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    }

    // B. Handle Browser Autofill (Keep label floating)
    const inputs = document.querySelectorAll('.clean-input');
    
    function checkInput(input) {
        const label = input.nextElementSibling; // The .input-highlight
        const realLabel = input.parentElement.querySelector('.clean-label');
        
        if (input.value.length > 0) {
            realLabel.style.top = '-15px';
            realLabel.style.fontSize = '0.8rem';
            realLabel.style.color = '#FDB913'; // Gold color
            realLabel.style.fontWeight = '700';
        } else {
            // Only reset if not focused
            if (document.activeElement !== input) {
                realLabel.style.top = '15px';
                realLabel.style.fontSize = '1rem';
                realLabel.style.color = '#aaa';
                realLabel.style.fontWeight = '400';
            }
        }
    }

    inputs.forEach(input => {
        // Check on load (for autofill)
        setTimeout(() => checkInput(input), 100); 
        
        // Check on input change
        input.addEventListener('input', () => checkInput(input));
        input.addEventListener('blur', () => checkInput(input));
    });

    /* =========================================
       5. AUTO-DISMISS ALERTS
       ========================================= */
    const msgBox = document.querySelector('.msg-box');
    if (msgBox && msgBox.classList.contains('active')) {
        setTimeout(() => {
            msgBox.style.transition = 'opacity 0.5s ease';
            msgBox.style.opacity = '0';
            setTimeout(() => {
                msgBox.style.display = 'none';
            }, 500);
        }, 6000); // Disappear after 6 seconds
    }

});