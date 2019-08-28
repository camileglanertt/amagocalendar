function confirma($id){
    Swal.fire({
        title: 'Você tem certeza que quer excluir o comentário?',
        text: "Críticas construtivas fazem seu negócio melhorar cada vez mais!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'red',
        cancelButtonColor: '#ccc',
        confirmButtonText: 'Excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            excluiComentario($id);
        }
    })
}
function excluiComentario($id){
    window.location.href = "verInteracoes.php?codigoComentario="+$id;
}