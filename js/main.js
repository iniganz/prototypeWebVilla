const slides = document.getElementById('slides');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
let currentIndex = 0;

function updateSlider() {
  const slideWidth = slides.children[0].offsetWidth;
  slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

prev.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + slides.children.length) % slides.children.length;
  updateSlider();
});

next.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % slides.children.length;
  updateSlider();
});

// Optional: Auto-slide
setInterval(() => {
  currentIndex = (currentIndex + 1) % slides.children.length;
  updateSlider();
}, 5000);


// Script untuk toggle menu mobile
