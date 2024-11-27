function mostrarInputComentario() {
    const comentariosContainer = document.getElementById('comentariosContainer');

    // Cria um novo elemento de comentário
    const novoComentario = document.createElement('div');
    novoComentario.classList.add('comentario');

    // Foto do perfil
    const fotoPerfil = document.createElement('div');
    fotoPerfil.classList.add('foto-perfil');
    const img = document.createElement('img');
    img.src = 'img/foto-perfil.png'; // Caminho da sua imagem
    img.alt = 'Foto de Perfil';
    fotoPerfil.appendChild(img);

    // Conteúdo do comentário
    const conteudoComentario = document.createElement('div');
    conteudoComentario.classList.add('conteudo-comentario');

    // Nome do usuário
    const idPerfil = document.createElement('div');
    idPerfil.classList.add('id-perfil');
    idPerfil.textContent = '_viniross';

    // Campo de texto do comentário
    const textarea = document.createElement('textarea');
    textarea.classList.add('textarea-comentario');
    textarea.placeholder = 'Escreva seu comentário...';

    // Botão Salvar
    const botaoSalvar = document.createElement('button');
    botaoSalvar.textContent = 'Salvar';
    botaoSalvar.classList.add('botao-salvar');

    botaoSalvar.addEventListener('click', function () {
        salvarComentario(conteudoComentario, textarea.value);
    });

    // Adiciona os elementos ao conteúdo do comentário
    conteudoComentario.appendChild(idPerfil);
    conteudoComentario.appendChild(textarea);
    conteudoComentario.appendChild(botaoSalvar);

    // Adiciona o conteúdo ao novo comentário
    novoComentario.appendChild(fotoPerfil);
    novoComentario.appendChild(conteudoComentario);

    // Adiciona o novo comentário ao container
    comentariosContainer.appendChild(novoComentario);
}

function salvarComentario(conteudoComentario, texto) {
    const textarea = conteudoComentario.querySelector('.textarea-comentario');
    const botaoSalvar = conteudoComentario.querySelector('button');
    conteudoComentario.removeChild(textarea);
    conteudoComentario.removeChild(botaoSalvar);

    const textoComentario = document.createElement('p');
    textoComentario.classList.add('texto-comentario');
    textoComentario.textContent = texto;

    conteudoComentario.appendChild(textoComentario);
}
