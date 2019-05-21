function validaDados()
{
    document.formulario.subimit();
}

$("#ajudaIcon").click(function(){
    $("#ajudaOptions").toggle(400);
});

$("#dropSimbolo").click(function(){
    $("#statusOptions").toggle();
})

function escolheStatus(status)
{
    let elementoInputPhp = document.getElementById("status");
    let elemento = document.getElementById("statusCurrent");
    switch(status)
    {
        case "Online":
        elemento.style.color = "#20FD20";
        elemento.style.fontWeight = "bolder";
        break;
        
        case "Offline":
        elemento.style.color = "grey";
        break;
        
        case "Invisível":
        elemento.style.color = "silver";
        break;
    }
    
    elemento.innerHTML = status;
    elementoInputPhp.value = status;
    $("#statusOptions").toggle();

    
}