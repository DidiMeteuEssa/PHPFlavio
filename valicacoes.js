function validarCadastroFilme(){
    const genero = document.getElementById("genero").value;
    const ano = document.getElementById("ano").value;
    const nome = document.getElementById("nome").value;
    if(ano == ''){
         alert("Digite o ano do filme!");
         return false;
    }

    if(nome == ''){
         alert("Digite o nome do filme!");
         return false;
    }

    if(genero == ''){
         alert("Selecione um gênero!");
         return false;
    }

    return true;
 }
 
 function mensagem(){
     alert("Filme deletado!");
 }

 