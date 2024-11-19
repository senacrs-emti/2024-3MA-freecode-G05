function adicionarComentario() {
    const container = document.querySelector(".comentarios-container");

    // Criação do elemento de comentário
    const novoComentario = document.createElement("div");
    novoComentario.className = "comentario";
    novoComentario.style.marginTop = "20px"; // Garante o espaçamento para o novo comentário
    novoComentario.innerHTML = `
        <div class="foto-perfil">
            <img src="img/foto-perfil.png" alt="Foto do usuário">
        </div>
        <div class="conteudo-comentario">
            <div class="id-perfil">_viniross</div>
            <div class="texto-comentario">Adicione seu comentário...</div>
        </div>
    `;

    // Insere o novo comentário antes do botão
    container.insertBefore(novoComentario, container.querySelector(".add-comentario-btn"));
}
