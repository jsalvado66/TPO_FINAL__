class Carrito {
    _con = new Routes();

    constructor(codigo,cantidad){
        this.codigo = codigo;
        this.cantidad = cantidad;
    }

    async agregarCarrito(){
        let obj = {
            codigo : this.codigo,
            cantidad:this.cantidad
        }

        var resultado = this._con.agregar_carrito(obj).then((resultado)=>{
            return resultado;
        })
        return resultado
    }

    async quitarCarrito(){
            let obj = {
                codigo : this.codigo,
                cantidad:this.cantidad
            }
            var resultado = this._con.quitar_carrito(JSON.stringify(obj)).then((resultado)=>{
                return resultado;
            })
            return resultado

    }

    async obtenerCarrito(){
        var resultado = this._con.obtener_carrito().then((resultado)=>{
            return resultado;
        })
        return resultado
    }
}