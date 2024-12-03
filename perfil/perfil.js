function mostrarInputComentario() {
    const container = document.getElementById("comentariosContainer");
    const input = document.createElement("textarea");
    input.placeholder = "Digite seu comentário...";
    const button = document.createElement("button");
    button.textContent = "Enviar";
    button.onclick = () => {
        const conteudo = input.value;
        fetch("adicionar_comentario.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id_usuario=1&conteudo=${encodeURIComponent(conteudo)}`
        }).then(response => {
            if (response.ok) {
                location.reload();
            }
        });
    };
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
    modal.style.display = 'flex'; // Torna o modal visível
}

// Fecha o modal ao clicar no botão ou fora do conteúdo
function fecharModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
}

// Salva as alterações do perfil
function salvarEdicao() {
    const nomeUsuario = document.getElementById("username").value;
    const descricao = document.getElementById("description").value;
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


// Fecha o modal ao clicar fora do conteúdo
window.addEventListener('click', function (event) {
    const modal = document.getElementById('editModal');
    const modalContent = modal.querySelector('.modal-content');

    // Se o clique não foi no conteúdo do modal e o modal está aberto
    if (event.target === modal) {
        fecharModal();
    }
});