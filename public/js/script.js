const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.menu-items');

//* Display mobile menu
const mobileMenu = () => {
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);

const faders = document.querySelectorAll(".fade-in");
const appearOptions = {
    // * They only fade in when they are 150px from the bottom.
    threshold: 0,
    rootMargin: "0px 0px -200px 0px"
};
const sliders = document.querySelectorAll(".slide-in");

// * The IntersectionObserver API lets code register a callback-function.
// * This function will be executed when an element I want to monitor enters or exits another element.
// * Or when the amount by which the two intersect changes by a requested amount.
    
    const appearOnScroll = new IntersectionObserver(function(
        entries,
        appearOnScroll) 
        {
            entries.forEach(entry => {
            // * IntersectionObserver wether or not its intersecting, is going to fire as soon as the page loads.
            // * And its going to say this is or is not intersecting, So if it does and I have a function here that is
            // * toggling the class on and off, it is going to turn the class on everywhere.
            // * And I wont be able to see what it is actually doing.

            // * If the entry is not intersecting, I want to leave.
            if (!entry.isIntersecting) {
                return;
            } else {
                // * Here I tell the API to start looking at something and stop once it has done its job.
                entry.target.classList.add("appear");
                appearOnScroll.unobserve(entry.target);
            }
        });
    },
    appearOptions);

faders.forEach(fader => {
        // * for each fader inside of faders I want to run appearOnScroll.
    appearOnScroll.observe(fader);
  });

sliders.forEach( slider => {
    appearOnScroll.observe(slider);
})