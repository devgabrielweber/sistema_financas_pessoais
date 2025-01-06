function redirecionar(rota, id) {
    let form = document.createElement('form')
    form.setAttribute('method', 'POST')
    form.setAttribute('action', 'index.php')
    variavel = document.createElement('input')
    variavel.setAttribute('name', "rota")
    variavel.setAttribute("value", rota)
    variavel.setAttribute('type', 'hidden')
    form.appendChild(variavel);

    if (id != undefined) {
        input = document.createElement('input');
        input.setAttribute('type', 'hidden')
        input.setAttribute('name', 'id')
        input.setAttribute('value', id)
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}
