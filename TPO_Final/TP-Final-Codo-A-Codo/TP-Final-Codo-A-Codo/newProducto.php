<div class="container" v-if="isNewProduct">
            <h1 class="text-center">Agregar Productos al Inventario</h1>
            <br><br>
           
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
                    <a class="btn btn-outline-dark" @click="isNewProduct = false">Cancelar</a>
                </div>
            </div>
            </div>