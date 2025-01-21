function redirecionar(rota, valor = 0, campo = 0) {
    let form = document.createElement('form')
    form.setAttribute('method', 'POST')
    form.setAttribute('action', '/index.php')
    variavel = document.createElement('input')
    variavel.setAttribute('name', "rota")
    variavel.setAttribute("value", rota)
    variavel.setAttribute('type', 'hidden')
    form.appendChild(variavel);

    if (valor != 0) {
        if (campo != 0) {
            input = document.createElement('input');
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', campo)
            input.setAttribute('value', valor)
            form.appendChild(input);
        } else {
            input = document.createElement('input');
            input.setAttribute('type', 'hidden')
            input.setAttribute('name', 'id')
            input.setAttribute('value', valor)
            form.appendChild(input);
        }
    }
    document.body.appendChild(form);
    form.submit();
}
