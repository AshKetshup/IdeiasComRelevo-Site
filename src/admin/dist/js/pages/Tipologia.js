export default class Tipologia {
    #area = 0;
    #categoriaEnergetica = "";
    #tipologia = "";
    #estado = 0;
    #wcs = 0;
    #piso = 0;
    #hasGaragem = false;
    #hasParking = false;
    #descricao = "";
    #venda = 0;
    #aluguer = 0;

    constructor(area, categoriaEnergetica, tipologia, estado, wcs, piso, hasGaragem, hasParking, descricao, venda, aluguer) {
        this.#area = area;
        this.#categoriaEnergetica = categoriaEnergetica;
        this.#tipologia = tipologia;
        this.#estado = estado;
        this.#wcs = wcs;
        this.#piso = piso;
        this.#hasGaragem = hasGaragem;
        this.#hasParking = hasParking;
        this.#descricao = descricao;
        this.#venda = venda;
        this.#aluguer = aluguer;
    }

    get area() {
        return document.createTextNode(this.area);
    }

    get categoriaEnergetica() {
        return document.createTextNode(this.categoriaEnergetica);
    }

    get tipologia() {
        return document.createTextNode(this.tipologia);
    }

    get estado() {
        var return_value = document.createElement(span);
        return_value = return_value.classList.add("badge");

        switch (this.estado) {
            case 1:
                return_value.appendChild(document.createTextNode("Vende-se"));
                return_value = return_value.classList.add("badge-success");
                break;
        
            case 2:
                return_value.appendChild(document.createTextNode("Aluga-se"));
                return_value = return_value.classList.add("badge-warning");
                break;

            case 3:
                return_value.appendChild(document.createTextNode("Vende-se e Aluga-se"));
                return_value = return_value.classList.add("badge-info");
                break;

            case 4:
                return_value.appendChild(document.createTextNode("Vendido"));
                return_value = return_value.classList.add("badge-danger");
                break;
        }

        return return_value;
    }

    get wcs() {
        return document.createTextNode(this.wcs);
    }

    get piso() {
        return document.createTextNode(this.piso);
    }

    get hasGaragem() {
        var return_value = document.createElement(i);
        return_value = return_value.classList.add("fa-solid");

        this.hasGaragem 
            ? return_value.classList.add("text-success fa-check") 
            : return_value.classList.add("text-danger fa-close")

        return return_value;
    }

    get hasParking() {
        var return_value = document.createElement(i);
        return_value = return_value.classList.add("fa-solid");

        this.hasParking
            ? return_value.classList.add("text-success fa-check") 
            : return_value.classList.add("text-danger fa-close")
    
        return return_value;
    }

    get descricao() {
        return document.createTextNode(this.descricao);
    }

    get venda() {
        return document.createTextNode(this.venda);
    }

    get aluguer() {
        return document.createTextNode(this.aluguer);
    }
}