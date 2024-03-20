window.addEventListener('scroll', function() {
    var footer = document.getElementById('myFooter');
    var scrollPosition = window.innerHeight + window.scrollY;
    var documentHeight = document.body.offsetHeight;
  
    if (scrollPosition >= documentHeight) {
        footer.style.bottom = '0';
    } else {
        footer.style.bottom = '-70px'; // Ajusta este valor según la altura de tu pie de página
    }
  });