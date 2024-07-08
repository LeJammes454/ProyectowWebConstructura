AOS.init({
  // Configuraciones que pueden ser sobrescritas por cada elemento individualmente usando atributos `data-aos-*`:
  offset: 120, // desplazamiento (en px) desde el punto de activación original
  delay: 0, // valores desde 0 hasta 3000, con incrementos de 50ms
  duration: 900, // valores desde 0 hasta 3000, con incrementos de 50ms
  easing: 'ease', // transición predeterminada para las animaciones de AOS
  once: false, // si la animación debe ocurrir solo una vez - al desplazarse hacia abajo
  mirror: false, // si los elementos deben animarse al desplazarse más allá de ellos
  anchorPlacement: 'top-bottom', // define qué posición del elemento con respecto a la ventana debe activar la animación
});
