<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <h1>Baja de Productos</h1>
    
    <h3>Codo a Codo 2023</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th align="right">Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="producto in productos">
                <td>{{ producto.codigo }}</td>
                <td>{{ producto.descripcion }}</td>
                <td>{{ producto.cantidad }}</td>
                <td align="right">{{ producto.precio }}</td>
                <td><button @click="eliminarProducto(producto.codigo)">Eliminar</button></td>
            </tr>
        </tbody>
    </table>

    <div class="contenedor-centrado">
        <a href="index.php">Menu principal</a>
    </div>

    <script src="https://unpkg.com/vue@next"></script>
    <script>
        //const URL = "http://127.0.0.1:5000/"
        const URL = "jsalvado.pythonanywhere.com"

        const app = Vue.createApp({
            data() {
                return {
                    productos: []
                }
            },
            methods: {
                obtenerProductos() {
                    // Obtenemos el contenido del inventario
                    fetch(URL + 'productos')
                        .then(response => {
                            if (response.ok) {
                                return response.json(); // Parseamos la respuesta JSON
                            } else {
                                // Si hubo un error, lanzar explícitamente una excepción
                                // para ser "catcheada" más adelante
                                throw new Error('Error al obtener los productos.');
                            }
                        })
                        .then(data => {
                            // El código Vue itera este elemento para generar la tabla
                            this.productos = data;
                        })
                        .catch(error => {
                            console.log('Error:', error);
                            alert('Error al obtener los productos.');
                        });
                },
                eliminarProducto(codigo) {
                    // Eliminamos el producto de la fila seleccionada
                    fetch(URL + `productos/${codigo}`, { method: 'DELETE' })
                        .then(response => {
                            if (response.ok) {
                                // Eliminar el producto de la lista después de eliminarlo en el servidor
                                this.productos = this.productos.filter(producto => producto.codigo !== codigo);
                                console.log('Producto eliminado correctamente.');
                            } else {
                                // Si hubo un error, lanzar explícitamente una excepción
                                // para ser "catcheada" más adelante
                                throw new Error('Error al eliminar el producto.');
                            }
                        })
                        .catch(error => {
                            // Código para manejar errores
                            alert('Error al eliminar el producto.');
                        });
                }
            },
            mounted() {
                //Al cargar la página, obtenemos la lista de productos
                this.obtenerProductos();
            }
        });

        app.mount('body');
    </script>
</body>
</html>