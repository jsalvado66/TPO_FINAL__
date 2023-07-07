class Producto{
    _con = new Routes();
    constructor(codigo,descripcion,cantidad,precio){
        this.codigo = codigo;
        this.descripcion = descripcion;
        this.cantidad = cantidad;
        this.precio = precio;
    }
    async obtenerProductos(){
        var resultado=  this._con.obtener_productos().then((resultado)=>{
            return resultado;
        });
        return resultado;
    }

    async obtenerProducto(codigo){
        var resultado = this._con.obtener_producto(codigo).then((resultado)=>{
            return resultado;
        });
        return resultado;
    }
    async crearProducto(){
        let obj = {
            codigo:this.codigo,
            descripcion:this.descripcion,
            cantidad:this.cantidad,
            precio:this.precio
        }
        
        var resultado = this._con.agregar_producto(obj).then((resultado)=>{
            return resultado
        })
        return resultado
    }

    async modificarProducto(codigo){
        let obj = {
            descripcion:this.descripcion,
            cantidad:this.cantidad,
            precio:this.precio
        }
        
        var resultado = this._con.modificar_producto(codigo,obj).then((resultado)=>{
            return resultado
        })
        return resultado
    }
    
    async eliminarProducto(codigo){        
        var resultado = this._con.eliminar_producto(codigo).then((resultado)=>{
            return resultado
        })
        return resultado;
    }
}


