document.getElementById('menu').addEventListener('click', function() {
  const toolbar = document.querySelector('.toolbar');
  toolbar.classList.toggle('expanded');

    // Seleciona todos os elementos com a classe .text
    const texts = document.querySelectorAll('.text');
    
    // Aplica a classe expanded a todos os textos
    texts.forEach(function(text) {
        text.classList.toggle('expanded');
    });
});