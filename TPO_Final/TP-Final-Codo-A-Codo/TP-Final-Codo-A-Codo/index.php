<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPO FINAL</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    
    
</head>



<body bac>

    <div id="admProductos" data-app>
        <?php 
        require_once('navbar.php')?> 
        <div class="container">
            <button class="btn btn-outline-primary" @click="changeFlag()">Nuevo Producto</button >
<br><br><br><br><br><br>
            <?php
                require_once('newProducto.php')
            ?>
        <template>
            <v-data-table
                :headers="headers"
                :items="productos"
                :items-per-page="5"
                class="elevation-1"
            >
            <template v-slot:item.editar="{ item }">
                    <button class="btn btn-outline-white" color="success" @click="openModalEditar(item)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-draw-pen"></span></button>
            </template>
            <template v-slot:item.eliminar="{ item }">
                    <button class="btn btn-outline-danger" color="success" @click="eliminarProducto(item.codigo)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-trash-can"></span></button>   
            </template>
            <template v-slot:item.carrito="{ item }">
                    <button class="btn btn-outline-primary" color="success" @click="carritoModal(item)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-cart-arrow-up"></span></button>   
            </template>
                
            </v-data-table>
        </template>

        <?php
        require_once('modificarProducto.php')
        ?>

        <?php require_once('modalCarrito.php')?>
        
        <template>
        <v-row justify="center">
            <v-dialog
            v-model="dialogProductosCarrito"
            persistent
            max-width="600px"
            >
            <v-card>
                <v-card-title>
                <span class="text-h5">Carrito</span>
                </v-card-title>
                <v-card-text>
                <v-container>
                    <v-row>
                    <v-col
                        cols="12"
                        sm="12"
                        md="12"
                    >
                        <template>
                            <v-data-table
                                :headers="headersCarrito"
                                :items="productosCarrito"
                                :items-per-page="5"
                                class="elevation-1"
                            >
                            <template v-slot:item.cantidad="{ item }">
                                    <v-text-field v-model="item.cantidad" type="number"></v-text-field>
                            </template>
                            <!-- <template v-slot:item.editar="{ item }">
                                    <button class="btn btn-outline-secondary" color="success" @click="openModalEditar(item)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-draw-pen"></span></button>
                            </template>
                            <template v-slot:item.eliminar="{ item }">
                                    <button class="btn btn-outline-danger" color="success" @click="eliminarProducto(item.codigo)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-trash-can"></span></button>   
                            </template>
                            <template v-slot:item.carrito="{ item }">
                                    <button class="btn btn-outline-primary" color="success" @click="carritoModal(item)" :loading="item.createloading" ><span style="font-size:20px;" class="mdi mdi-cart-arrow-up"></span></button>   
                            </template> -->
                                
                            </v-data-table>
                        </template>
                    </v-col>
                    </v-row>
                </v-container>
                </v-card-text>
                <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="dialogProductosCarrito = false"
                >
                    Cerrar
                </v-btn>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="finalizarCarrito()"
                >
                    Finalizar
                </v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>
        </v-row>
        </template>
        </div>
    </div>
    <br><br><br><br>
    <footer>
        <div class="footer_info">
            <div class="footer_width abouth">
                
                
                <div class="social-media">
                    <a href="https://www.twitter.com" target="_blank"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.youtube.com" target="_blank"><i class="bx bxl-youtube"></i></a>
                    <a href="https://www.facebook.com" target="_blank"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.linkedin.com" target="_blank"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
            <br><br><br><br>
                
 
        

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/Connection.js"></script>
        <script src="js/ValidationError.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <?php
        require_once('routes.php')
        ?>
        <script src="js/Producto.js"></script>
        <script src="js/Carrito.js"></script>
        <script>
            const admProductos = new Vue({
                el:'#admProductos',
                vuetify:new Vuetify(),
                data:{
                    codigo:'',
                    descripcion:'',
                    cantidad:0,
                    precio:0.0,
                    isNewProduct:false,
                    dialog: false,
                    dialogCarrito:false,
                    headers: [
                    { text: 'Codigo', value: 'codigo' },
                    { text: 'Descripcion', value: 'descripcion' },
                    { text: 'Cantidad', value: 'cantidad' },
                    { text: 'Precio', value: 'precio' },
                    {text:'Editar',value:'editar',align:'center',sortable:false},
                    {text:'Eliminar',value:'eliminar',align:'center',sortable:false},
                    {text:'Carrito',value:'carrito',align:'center',sortable:false}
                    ],
                    producto:'',
                    productos: [],
                    carrito:'',
                    newCarrito:{
                        cantidad:0,
                        codigo:0
                    },
                    dialogProductosCarrito:false,
                    productosCarrito:[],
                    headersCarrito: [
                    { text: 'Codigo', value: 'codigo' },
                    { text: 'Descripcion', value: 'descripcion' },
                    { text: 'Cantidad', value: 'cantidad' },
                    { text: 'Precio', value: 'precio' },
                    ],
                    carritoViejo:'',
                },
                created(){
                    this.getProductos();
                    this.getCarrito();
                },
                computed:{

                },
                watch:{

                    },
                methods:{
                    changeFlag(){
                        this.isNewProduct=true;
                    },
                    async modificarProducto(){
                        if(this.validateProducto(this.producto)){
                                prod = new Producto(this.producto.codigo,this.producto.descripcion,this.producto.cantidad,this.producto.precio)
                                res = await prod.modificarProducto(this.producto.codigo);
                                console.log(res);
                                if(res.message == 'Producto modificado correctamente.'){
                                    this.dialog = false;
                                    Swal.fire("Producto almacenado correctamente!",'','success');
                                    this.getProductos();
                                }else{
                                    Swal.fire("Ocurrio un error guardando el producto",'','error')
                                }
                            }
                    },
                    async eliminarProducto(codigo){
                        Swal.fire({
                            title: 'Seguro que desea eliminar el Producto?',
                            text: "No podras revertir esta acción!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si',
                            cancelButtonText:'Cancelar'
                            }).then(async (result) => {
                            if (result.isConfirmed) {
                                prod = new Producto()
                                res = await prod.eliminarProducto(codigo)
                                console.log(res);
                                if(res.message == 'Producto eliminado correctamente.'){
                                    Swal.fire(res.message,'','success');
                                    this.getProductos();
                                }else{
                                    Swal.fire("Ocurrio un error eliminando el producto por favor intente nuevamente!")
                                }
                            }
                            })

                    },
                    async guardarProducto(){
                        try{
                            if(this.validateProducto()){
                                prod = new Producto(this.codigo,this.descripcion,this.cantidad,this.precio)
                                res = await prod.crearProducto();
                                console.log(res);
                                if(res.message == 'Producto agregado correctamente.'){
                                    Swal.fire("Producto almacenado correctamente!",'','success');
                                    this.getProductos();
                                    this.limpiarCampos();
                                }else{
                                    Swal.fire("Ocurrio un error guardando el producto",'','error')
                                }
                            }
                        }
                        catch(e){
                            if(e.name == 'ValidationError'){
                                Swal.fire(e.message,'','error');
                            }else{
                                console.log(e);
                                Swal.fire(e.message,'','error');
                            }
                        }
                    },
                    validateProducto(producto = null){
                        if(producto == null){
                            if(this.codigo == '' || this.codigo == 0 || this.codigo == null || this.codigo == undefined){
                                throw new ValidationError("El codigo es requerido!")
                                return false;
                            }

                            if(this.descripcion == '' || this.descripcion == null || this.descripcion == undefined){
                                throw new ValidationError("La descripcion es requerida!")
                                return false;
                            }

                            if(this.cantidad == '' || this.cantidad == 0 || this.cantidad == null || this.cantidad == undefined){
                                throw new ValidationError("La cantidad es requerida!")
                                return false;
                            }

                            if(this.precio == '' || this.precio == 0 || this.precio == null || this.precio == undefined){
                                throw new ValidationError("La cantidad es requerida!")
                                return false;
                            }
                            return true;
                        }else{
                            if(producto.codigo == '' || producto.codigo == 0 || producto.codigo == null || producto.codigo == undefined){
                                throw new ValidationError("El codigo es requerido!")
                                return false;
                            }

                            if(producto.descripcion == '' || producto.descripcion == null || producto.descripcion == undefined){
                                throw new ValidationError("La descripcion es requerida!")
                                return false;
                            }

                            if(producto.cantidad == '' || producto.cantidad == 0 || producto.cantidad == null || producto.cantidad == undefined){
                                throw new ValidationError("La cantidad es requerida!")
                                return false;
                            }

                            if(producto.precio == '' || producto.precio == 0 || producto.precio == null || producto.precio == undefined){
                                throw new ValidationError("La cantidad es requerida!")
                                return false;
                            }
                            return true;
                        }
                        
                    },
                    limpiarCampos(){
                        this.codigo=''
                        this.descripcion=''
                        this.cantidad=0
                        this.precio=0

                    },
                    getProductos(){
                        prod = new Producto();
                        prod.obtenerProductos().then((res)=>{
                            this.productos = res;
                        }).catch((err)=>{
                            console.log(err);
                        });

                    },
                    openModalEditar(prod){
                        this.producto = prod;
                        this.dialog = true;
                    },
                    carritoModal(carrito){
                        this.carrito = carrito
                        console.log(this.carrito);
                        this.newCarrito.cantidad = 0;
                        this.dialogCarrito = true;
                    },
                    sumarCantidad(){
                        if(this.newCarrito.cantidad == this.carrito.cantidad){
                            return false;
                        }else{
                            this.newCarrito.cantidad++
                        }
                    },
                    restarCantidad(){
                        if(this.newCarrito.cantidad == 0){
                            return false;
                        }else if(this.newCarrito.cantidad > 0){
                            this.newCarrito.cantidad--
                        }
                    },
                    async agregarCarrito(){
                        let data = {
                            cantidad : this.newCarrito.cantidad,
                            codigo:this.carrito.codigo
                        }

                        carr = new Carrito(data.codigo,data.cantidad);
                        res = await carr.agregarCarrito()

                        if(res.message == 'Producto agregado al carrito correctamente.'){
                            Swal.fire(res.message,'','success');
                            this.dialogCarrito = false;
                            this.getProductos();
                        }else{
                            Swal.fire("Ocurrio un error al agregar al carrito",'','error');
                        }

                    },
                    async getCarrito(){
                        carr = new Carrito();
                        await carr.obtenerCarrito().then((res)=>{
                            this.productosCarrito = res;
                            let carrito = JSON.stringify(this.productosCarrito); 
                            sessionStorage.setItem('carrito',carrito);
                        }).catch((err)=>{
                            console.log(err);
                        })
                    },
                    modalProductosCarrito(){
                        this.getCarrito();
                        this.dialogProductosCarrito = true;
                    },
                    async finalizarCarrito(){
                        let response = [];
                        carritoViejo = JSON.parse(sessionStorage.getItem('carrito'));
                        for(let i = 0; i< this.productosCarrito.length; i++){
                            if(this.productosCarrito[i].codigo == carritoViejo[i].codigo){
                                if(this.productosCarrito[i].cantidad < carritoViejo[i].cantidad){
                                    let codigo = this.productosCarrito[i].codigo;
                                    let cantidad = parseInt(this.productosCarrito[i].cantidad);
                                    /* let prod = {
                                        codigo:codigoVar,
                                        cantidad:cantidadVar
                                    }
                                    fetch('https://jsalvado.pythonanywhere.com/' + 'carrito', {
                                            method: 'DELETE',
                                            headers: {
                                            'Content-Type': 'application/json',
                                            },
                                            body: JSON.stringify({
                                            codigo: codigoVar,
                                            cantidad: cantidadVar, // Restamos una unidad del carrito
                                            }),
                                        }).then(response => response.json()).then(data => {
                                            if(data.message=='Producto quitado del carrito correctamente.'){
                                                response.push(prod)
                                            }
                                        }).catch(error => {
                                            console.error('Error al restar el producto del carrito:', error)
                                            alert('Error al restar el producto del carrito.')
                                            }) */
                                    carr = new Carrito(codigo,cantidad);
                                    res = carr.quitarCarrito()
                                    console.log(res)        
                                }else if(this.productosCarrito[i].cantidad > carritoViejo[i].cantidad){
                                    let codigo = this.productosCarrito[i].codigo;
                                    let cantidad = parseInt(this.productosCarrito[i].cantidad);
                                    carr = new Carrito(codigo,cantidad);
                                    res = carr.agregarCarrito()
                                    if(res.message =='Producto agregado al carrito correctamente.'){
                                        response.push(carr)
                                    }
                                }else{
                                    return true;
                                }
                            }
                        }
                        console.log(response)
                    }
                }
            })
        </script>
</body>

</html>