function mostrarInputComentario() {
    const container = document.getElementById("comentariosContainer");

    // Criar elementos
    const input = document.createElement("textarea");
    input.placeholder = "Digite seu comentário...";
    input.classList.add("textarea-comentario");

    const button = document.createElement("button");
    button.textContent = "Enviar";
    button.classList.add("botao-enviar");

    // Evento de clique no botão
    button.onclick = () => {
        const conteudo = input.value;
        fetch("adicionar_comentario.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id_usuario=1&conteudo=${encodeURIComponent(conteudo)}` // Substituir por ID dinâmico
        }).then(response => {
            if (response.ok) {
                location.reload();
            }
        });
    };

    // Adicionar ao container
    container.appendChild(input);
    container.appendChild(button);
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
    modal.style.display = 'flex'; // Exibir o modal
}

function fecharModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none'; // Ocultar o modal
}

function salvarEdicao() {
    const nomeUsuario = document.getElementById("username").value;
    const descricao = document.getElementById("descriptionPerfil").value; // Alterado para o ID correto
    const time = document.querySelector("select[name='time']").value;

    const formData = new FormData();
    formData.append("id_usuario", 1); // Substituir pelo ID correto
    formData.append("nome_usuario", nomeUsuario);
    formData.append("descricao", descricao);
    formData.append("time_preferido", time);

    fetch("salvar_perfil.php", {
        method: "POST",
        body: formData
    }).then(response => {
        if (response.ok) {
            location.reload();
        }
    });
}

window.addEventListener('click', function (event) {
    const modal = document.getElementById('editModal');

    // Fechar o modal ao clicar fora do conteúdo
    if (event.target === modal) {
        fecharModal();
    }
});
