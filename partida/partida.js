function mostrarInputComentario() {

    let pathProjeto = document.getElementById('path').value;

    // Cria a estrutura do novo comentário
    const comentariosContainer = document.querySelector('.comentarios-container');
 
    // Criação do formulário para inserir o comentário
    const novoComentario = document.createElement('div');
    novoComentario.classList.add('comentario');
 
    // Estrutura para a foto do perfil
    const fotoPerfil = document.createElement('div');
    fotoPerfil.classList.add('foto-perfil');
    const img = document.createElement('img');
    img.src = pathProjeto+'/img/foto-perfil.png'; // Altere conforme necessário

    img.alt = 'Foto do usuário';
    fotoPerfil.appendChild(img);
 
    // Estrutura para o conteúdo do comentário
    const conteudoComentario = document.createElement('div');
    conteudoComentario.classList.add('conteudo-comentario');
 
    const idPerfil = document.createElement('div');
    idPerfil.classList.add('id-perfil');
    idPerfil.textContent = '_viniross'; // Altere para pegar dinamicamente, se necessário
 
    const textoComentario = document.createElement('textarea');
    textoComentario.classList.add('textarea-comentario');
    textoComentario.placeholder = 'Escreva seu comentário...';
 
    // Botão para salvar o comentário
    const botaoSalvar = document.createElement('button');
    botaoSalvar.textContent = 'Salvar';
    botaoSalvar.classList.add('botao-salvar');
    botaoSalvar.onclick = function () {
        salvarComentario(conteudoComentario, textoComentario.value);
    };
 
    // Adiciona os elementos ao conteúdo do comentário
    conteudoComentario.appendChild(idPerfil);
    conteudoComentario.appendChild(textoComentario);
    conteudoComentario.appendChild(botaoSalvar);
 
    // Adiciona a foto e o conteúdo ao comentário
    novoComentario.appendChild(fotoPerfil);
    novoComentario.appendChild(conteudoComentario);
 
    // Adiciona o novo comentário ao container
    comentariosContainer.insertBefore(novoComentario, document.querySelector('.add-comentario-btn'));
}
 
function salvarComentario(conteudoComentario, texto) {
    // Remove a textarea e o botão de salvar
    const textarea = conteudoComentario.querySelector('.textarea-comentario');
    const botaoSalvar = conteudoComentario.querySelector('.botao-salvar');
    conteudoComentario.removeChild(textarea);
    conteudoComentario.removeChild(botaoSalvar);
 
    // Adiciona o texto como comentário final
    const textoComentario = document.createElement('div');
    textoComentario.classList.add('texto-comentario');
    textoComentario.textContent = texto;
    conteudoComentario.appendChild(textoComentario);
}
 
function adicionarComentario() {
    // Pega o valor do textarea
    var comentarioTexto = document.getElementById('comentario').value;
 
    // Substitui quebras de linha (\n) por <br>
    var comentarioComQuebraDeLinha = comentarioTexto.replace(/\n/g, '<br>');
 
    // Cria um novo elemento de comentário
    var novoComentario = document.createElement('div');
    novoComentario.classList.add('comentario');  // Aplica a classe de estilo de comentário
 
    // Cria o conteúdo de texto do comentário, com as quebras de linha
    novoComentario.innerHTML = `
        <div class="texto-comentario">${comentarioComQuebraDeLinha}</div>
    `;
 
    // Adiciona o novo comentário ao container de comentários
    document.getElementById('comentariosContainer').appendChild(novoComentario);
 
    // Limpa o campo de texto
    document.getElementById('comentario').value = '';
}
 