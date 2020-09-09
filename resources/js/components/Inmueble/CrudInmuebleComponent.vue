<template>
  <div>
    <v-app>
      <v-main>


        <v-data-table
          :headers="headers"
          :items="InmueblesAll"
          :search="search"
          :loading="loading"
          color="secondary"
        >
           
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Inmuebles</v-toolbar-title>
              <v-divider class="ml-4" inset vertical></v-divider>
              <v-spacer></v-spacer>

              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
            </v-toolbar>

            <v-dialog v-model="dialog" max-width="700px">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  class="d-flex flex-row my-4 ml-4"
                  color="green lighten-1"
                  dark
                  v-bind="attrs"
                  v-on="on"
                >Nuevo</v-btn>
              </template>

              <v-card>
                <v-card-title>
                  <span class="headline">{{ formTitle }}</span>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row justify="center">
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field autocomplete="off" v-model="editedItem.ciudad" label="Ciudad"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          autocomplete="off"
                          v-model="editedItem.departamento"
                          label="Departamento"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field autocomplete="off" v-model="editedItem.canon" label="Canon"></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-text-field
                          autocomplete="off"
                          v-model="editedItem.habitaciones"
                          type="number"
                          label="Habitaciones"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-autocomplete
                          :items="['arrendamiento', 'venta']"
                          v-model="editedItem.proposito"
                          label="Proposito"
                        ></v-autocomplete>
                      </v-col>
                      <v-col cols="12" sm="6" md="6">
                        <v-autocomplete
                          :items="['apartaestudio', 'apartamento', 'casa', 'bodega']"
                          v-model="editedItem.tipo"
                          label="Tipo de Inmueble"
                        ></v-autocomplete>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="close">Cancelar</v-btn>
                  <v-btn color="blue darken-1" text @click="save">Guardar</v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>

            <!-- <v-row class="ml-4"> -->

            <!-- </v-row> -->
          </template>
          <template v-slot:item[`actions`]="{ item }">
            <v-icon small class="mr-2" @click="edit(item)">mdi-pencil</v-icon>
            <v-icon small @click="destroy(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </v-main>
    </v-app>
  </div>
</template>
<script src="../../scripts/inmueble.js"></script>
