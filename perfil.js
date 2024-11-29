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

function abrirModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'flex'; // Torna o modal visível
}

// Fecha o modal ao clicar no botão ou fora do conteúdo
function fecharModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
}

// Salva as alterações do perfil
function salvarEdicao() {
    const username = document.getElementById('username').value;
    const description = document.getElementById('description').value;

    // Atualiza as informações no perfil
    document.querySelector('.profile-info h1').textContent = username;
    document.querySelector('.profile-info p').textContent = description;

    fecharModal(); // Fecha o modal
}

// Fecha o modal ao clicar fora do conteúdo
window.addEventListener('click', function (event) {
    const modal = document.getElementById('editModal');
    const modalContent = modal.querySelector('.modal-content');

    // Se o clique não foi no conteúdo do modal e o modal está aberto
    if (event.target === modal) {
        fecharModal();
    }
});
