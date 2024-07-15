const slider = document.querySelector('.slider');
const images = slider.querySelectorAll('img');
const textoBoton = document.querySelector('.texto-boton');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let activeImage = 0;

images[0].classList.add('active');
textoBoton.style.display = 'none'; // Mostrar el texto y el botón inicialmente

prevBtn.addEventListener('click', () => {
  activeImage--;
  if (activeImage < 0) {
    activeImage = images.length - 1;
  }
  setActiveImage();
});

nextBtn.addEventListener('click', () => {
  activeImage++;
  if (activeImage >= images.length) {
    activeImage = 0;
  }
  setActiveImage();
});

function setActiveImage() {
  images.forEach(image => {
    image.classList.remove('active');
  });

  images[activeImage].classList.add('active');

  // Mostrar el texto y el botón correspondiente a la imagen activa
  if (activeImage === 0) {
    textoBoton.style.display = 'none';
  } 
}