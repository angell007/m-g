<template>
  <section class="section-content bg padding-y">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="row no-gutters justify-content-center align-items-center minh-100">
            <aside class="col-sm-6 p-4">
              <article class="gallery-wrap">
                <div class="img-big-wrap">
                  <a data-fslightbox target="blank" :href="imagePath">
                    <picture>
                      <img
                        :src="imagePath"
                        class="img-fluid"
                        @click="toggler = !toggler"
                        style="width: 100%; cursor:pointer;"
                      />
                    </picture>
                  </a>
                </div>
                <hr />

                <v-dialog v-model="dialog" max-width="700px">
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      class="btn"
                      color="green lighten-1"
                      dark
                      small
                      v-bind="attrs"
                      v-on="on"
                    >Cambiar portada</v-btn>
                  </template>

                  <v-card>
                    <v-container>
                      <v-row justify="center">
                        <v-col cols="12" sm="6" md="6">
                          <v-file-input
                            :rules="rules"
                            accept="image/*"
                            @change="uploadImage"
                            prepend-icon="mdi-camera"
                            label="Selecciona una imagen"
                            hide-details
                          ></v-file-input>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-dialog>
              </article>
            </aside>

            <aside class="col-sm-6">
              <article class="p-3">
                <h3 class="title mb-3">{{this.inmueble.codigo}}</h3>

                <div class="mb-3">
                  <var class="price h3 text-warning">
                    <div v-if="this.inmueble.proposito == 'arrendamiento'">
                      <span class="currency">Canon</span>
                      <span class="num">{{this.inmueble.canon}}</span>
                    </div>
                    <div v-if="this.inmueble.proposito != 'arrendamiento'">
                      <span class="currency">Precio Venta</span>
                      <span class="num">{{this.inmueble.precio}}</span>
                    </div>
                  </var>
                  <span></span>
                </div>

                <dl>
                  <dt>Descripcion</dt>
                  <dd>
                    <p class="text-justify">{{this.inmueble.descripcion}}</p>
                  </dd>
                </dl>
                <div class="row">
                  <dt class="col-sm-4">Propietario</dt>
                  <dd
                    class="col-sm-6"
                  >{{this.inmueble.propietario.nombre + this.inmueble.propietario.apellido }}</dd>

                  <dt class="col-sm-4">Tipo</dt>
                  <dd class="col-sm-6" style="text-transform:uppercase">{{this.inmueble.tipo}}</dd>

                  <dt class="col-sm-4">Proposito</dt>
                  <dd class="col-sm-6">{{this.inmueble.proposito}}</dd>

                  <dt class="col-sm-4">Habitaciones</dt>
                  <dd class="col-sm-6">{{this.inmueble.habitaciones}}</dd>

                  <dt class="col-sm-4">Direccion</dt>
                  <dd class="col-sm-6">{{this.inmueble.direccion}}</dd>
                </div>

                <v-dialog v-model="dialog2" max-width="700px">
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      color="green lighten-1"
                      dark
                      small
                      v-bind="attrs"
                      v-on="on"
                      @click="edit()"
                    >Modificar</v-btn>
                  </template>

                  <v-card>
                    <v-card-title>
                      <span class="headline">Editando {{ this.inmueble.codigo }}</span>
                    </v-card-title>

                    <v-card-text>
                      <v-container>
                        <v-row justify="center">
                          <v-col cols="12" sm="6" md="6">
                            <v-autocomplete
                              :items="getPropietarios"
                              item-text="nombre"
                              item-value="id"
                              v-model="editedItem.propietario_id"
                              label="Propietario"
                              @change="read()"
                            ></v-autocomplete>
                          </v-col>

                          <v-col cols="12" sm="6" md="6">
                            <v-text-field
                              autocomplete="off"
                              v-model="editedItem.ciudad"
                              label="Ciudad"
                            ></v-text-field>
                          </v-col>

                          <v-col cols="12" sm="6" md="6">
                            <v-text-field
                              autocomplete="off"
                              v-model="editedItem.departamento"
                              label="Departamento"
                            ></v-text-field>
                          </v-col>

                          <v-col cols="12" sm="6" md="6">
                            <v-text-field
                              autocomplete="off"
                              v-model="editedItem.direccion"
                              label="Direccion"
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
                            <v-text-field
                              autocomplete="off"
                              v-model="editedItem.canon"
                              label="Canon"
                            ></v-text-field>
                          </v-col>

                          <v-col cols="12" sm="6" md="6">
                            <v-text-field
                              autocomplete="off"
                              v-model="editedItem.precio"
                              label="Precio venta"
                            ></v-text-field>
                          </v-col>

                          <v-col cols="12" sm="6" md="6">
                            <v-autocomplete
                              :items="['local', 'apartamento', 'casa', 'bodega']"
                              v-model="editedItem.tipo"
                              label="Tipo de Inmueble"
                            ></v-autocomplete>
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
                            <v-text-field
                              v-model="editedItem.descripcion"
                              label="Describe el inmueble"
                            ></v-text-field>
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
              </article>
            </aside>
          </div>

          <div class="container">
            <v-dialog v-model="formImagen" max-width="700px">
              <template v-slot:activator="{ on, attrs }">
                <v-btn
                  class="btn btn-sm"
                  color="green lighten-1"
                  dark
                  v-bind="attrs"
                  v-on="on"
                >Agregar Imagen</v-btn>
              </template>

              <v-card>
                <v-container>
                  <v-row justify="center">
                    <v-col cols="12" sm="6" md="6">
                      <v-file-input
                        :rules="rules"
                        accept="image/*"
                        @change="uploadImagegallery"
                        prepend-icon="mdi-camera"
                        label="Selecciona una imagen"
                        hide-details
                      ></v-file-input>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card>
            </v-dialog>

              <FsLightbox :toggler="toggler" :sources="getGallery" :slide="slide + 1" />
              
            <div class="row d-flex justify-content-center">
              <div
                class="card mx-1"
                style="width: 18em;"
                v-for="(img, index) in getGallery"
                :key="index"
              >
                <img
                  @click="openLightboxOnSlide(index)"
                  class="card-img-top"
                  :src="img"
                  alt="Card image cap"
                  style="cursor:pointer"
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p
                    class="card-text"
                  >Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";
import FsLightbox from "fslightbox-vue";

export default {
  props: {
    id: String,
  },

  components: { FsLightbox },

  data: () => ({
    toggler: false,
    dialog: false,
    dialog2: false,
    formImagen: false,
    slide: 1,

    rules: [(value) => !!value || "Required."],

    imgUpload: "",
    imagePath: "",
    images: [],
    gallery: [],
    propietarios: [],
    inmueble: {
      propietario: {
        nombre: "",
        apellido: "",
      },
      ciudad: "",
      departamento: "",
      direccion: "",
      proposito: "",
      canon: 0,
      tipo: "",
      precio: 0,
      habitaciones: "",
      descripcion: "",
      propietario_id: "",
    },

    editedItem: {
      ciudad: "",
      departamento: "",
      direccion: "",
      proposito: "",
      canon: 0,
      tipo: "",
      precio: 0,
      habitaciones: "",
      descripcion: "",
      propietario_id: "",
    },
  }),

  async mounted() {
    try {
      axios.get("/api/inmuebles/" + this.id).then((resp) => {
        this.inmueble = resp.data.data;
        this.imagePath = "../../file/" + this.inmueble.portada;
        this.images.push(this.imagePath);
      });
      axios.get("/api/imagenes?id=" + this.id).then((resp) => {
        this.gallery = resp.data.map((imagen) => {
          return "../../file/" + imagen.path;
        });
      }),
        axios.get("/api/propietarios").then((resp) => {
          this.propietarios = resp.data;
        });
    } catch (error) {
      console.log(error);
    }
  },

  computed: {
    imgs() {
      return this.images();
    },
    getPropietarios() {
      return this.propietarios;
    },
    getGallery() {
      return this.gallery;
    },
  },

  methods: {
    edit() {
      this.editedItem = Object.assign({}, this.inmueble);
    },

    openLightboxOnSlide: function (number) {
      this.slide = number;
      this.toggler = !this.toggler;
    },

    read() {
      console.log(this.editedItem.propietario_id);
    },

    async uploadImage(e) {
      let img = e;
      let fd = new FormData();
      fd.append("image", img);
      fd.append("id", this.id);
      try {
        const upload = axios.post("/api/upload-portada-inmueble", fd);
        this.imagePath = "../../file/" + upload.data.data;
      } catch (error) {
        console.log(error);
      }
    },

    async uploadImagegallery(e) {
      let img = e;
      let fd = new FormData();
      fd.append("image", img);
      fd.append("id", this.id);
      try {
        const upload = axios.post("/api/imagenes", fd).then((resp) => {
          this.gallery = resp.data.data;
          console.log(this.gallery);
          console.log(this.getGallery);
        });
      } catch (error) {
        console.log(error);
      }
    },

    close() {
      this.dialog = false;
      this.dialog2 = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    async save() {
      try {
        console.log(this.editedItem);
        const response = await axios.patch(
          `https://inmobiliaria.test/api/inmuebles/${this.editedItem.id}`,
          this.editedItem
        );
        this.inmueble = Object.assign({}, response.data.data);

        this.close();
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

