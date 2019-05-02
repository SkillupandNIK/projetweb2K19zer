const track = document.querySelector('.carousel_track');

const slides = Array.from(track.children);

const nextButton = document.querySelector('.carousel_button--right');
const prevButton = document.querySelector('.carousel_button--left');

const dotsNav = document.querySelector('.carousel_nav');
const dots = Array.from(dotsNav.children); 

const slideWidth = slides[0].getBoundingClientRect().width;

const setSlidePosition = (slide, index) => {
	slide.style.left = slideWidth * index + 'px';
};

slides.forEach(setSlidePosition);

//when i click on the right button

nextButton.addEventListener('click', e => {
	const currentSlide = document.track.querySelector('.current-slide');
	console.log(currentSlide);
	//const nextSlide = currentSlide.nextElementSibling;
	//const amountToMove = nextSlide.style.left;
	//console.log(currentSlide);
	//move to the next slide
})

