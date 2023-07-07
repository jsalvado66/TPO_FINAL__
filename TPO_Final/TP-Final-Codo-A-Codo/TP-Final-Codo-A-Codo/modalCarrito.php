<template>
        <v-row justify="center">
            <v-dialog
            v-model="dialogCarrito"
            persistent
            max-width="600px"
            >
            <v-card>
                <v-card-title>
                <span class="text-h5">Agregar al Carrito</span>
                </v-card-title>
                <v-card-text>
                <v-container>
                    <v-row>
                    <v-col
                        cols="12"
                        sm="12"
                        md="12"
                    >
                    <button class="btn btn-primary" @click="restarCantidad"><span style="font-size:20px;" class="mdi mdi-minus"></span></button>
                        <v-text-field
                        label="Cantidad"
                        type="number"
                        v-model="newCarrito.cantidad"
                        required
                        ></v-text-field>
                        <button class="btn btn-primary" @click="sumarCantidad()"><span style="font-size:20px;" class="mdi mdi-plus"></span></button>
                    </v-col>
                    </v-row>
                </v-container>
                <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="dialogCarrito = false"
                >
                    Cerrar
                </v-btn>
                <v-btn
                    color="blue darken-1"
                    text
                    @click="agregarCarrito()"
                >
                    Agregar
                </v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>
        </v-row>
        </template>