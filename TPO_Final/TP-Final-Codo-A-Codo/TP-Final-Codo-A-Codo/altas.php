<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    <!-- <link rel="stylesheet" href="./css/estilos.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        *{
            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Raleway', sans-serif;
            

        }
    </style>
    <div id="altasProductos" data-app class="container">
        <h1 class="text-center">Agregar Productos al Inventario</h1>
        
        <div class="card border-dark">
            <div class="card-header">
                <h3 class="text-center">Codo a Codo 2023</h3>
            </div>
            <div class="card-body">
                <strong for="codigo">Código:</strong>
                <v-text-field label="Código"type="text" id="codigo" v-model="codigo" name="codigo" required></v-text-field><br>

                <strong for="descripcion">Descripción:</strong>
                <v-text-field label="Descripcion" type="text" id="descricpion" v-model="descripcion" name="descricpion" required></v-text-field><br>

                <strong for="cantidad">Cantidad:</strong>
                <v-text-field label="Cantidad" type="number" id="cantidad" v-model="cantidad" name="cantidad" required></v-text-field><br>

                <strong for="precio">Precio:</strong>
                <v-text-field label="Precio" type="number" step="0.01" id="precio" v-model="precio" name="precio" required></v-text-field><br>

                <button color="info" class="btn btn-outline-primary" @click="guardarProducto()">Agregar Producto</button>
                <a class="btn btn-outline-dark" href="index.php">Menu principal</a>
            </div>
        </div>  
    </div>
    

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
        <script>
            const altasProductos = new Vue({
                el:'#altasProductos',
                vuetify: new Vuetify(),
                data:{
                    codigo:'',
                    descripcion:'',
                    cantidad:0,
                    precio:0.0,
                },
                methods:{
                    async guardarProducto(){
                        try{
                            if(this.validateProducto()){
                                prod = new Producto(this.codigo,this.descripcion,this.cantidad,this.precio)
                                res = await prod.crearProducto();
                                console.log(res);
                                if(res.message == 'Producto agregado correctamente.'){
                                    Swal.fire("Producto almacenado correctamente!",'','success');
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
                            }
                        }
                    },
                    validateProducto(){
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
                    },
                    limpiarCampos(){
                        this.codigo=''
                        this.descripcion=''
                        this.cantidad=0
                        this.precio=0

                    }
                }
            })
        </script>
</body>

</html>