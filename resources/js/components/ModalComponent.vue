<template>
  <v-row class="ml-4">
    <v-dialog v-model="dialog" persistent max-width="700px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="d-flex flex-row" color="green lighten-1" dark v-bind="attrs" v-on="on">Nuevo</v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Nuevo arrendatario</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row ref="form" v-model="valid" lazy-validation>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Nombre(s)*" v-model="formArrendatario.nombre" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Apellido(s)" v-model="formArrendatario.apellido"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-autocomplete
                  :items="['Cedula', 'Pasaporte', 'Nit']"
                  v-model="formArrendatario.tipo_identificacion"
                  label="TIpo de Documento"
                ></v-autocomplete>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Nº Documento*"
                  required
                  v-model="formArrendatario.identificacion"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Email*"
                  required
                  v-model="formArrendatario.email"
                  :rules="emailRules"
                ></v-text-field>
              </v-col>
              <!-- <v-col cols="12" sm="6">
                <v-select :items="['0-17', '18-29', '30-54', '54+']" label="Edad*" required></v-select>
              </v-col>-->
            </v-row>
          </v-container>
          <small color="Red">*Indica campos obligatorios</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="submit()">Guardar</v-btn>
          <v-btn color="blue darken-1" text @click="dialog = false">Cancelar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script>
import Axios from "axios";
export default {
  data: () => ({
    formArrendatario: {
      nombre: "",
      identificacion: "",
      apellido: "",
      tipo_identificacion: "",
    },
    valid: false,
    emailRules: [
      (v) => !!v || "E-mail is required",
      (v) => /.+@.+/.test(v) || "E-mail must be valid",
    ],
    dialog: false,
  }),

  methods: {
    async submit() {
      if (this.valid == false) {
        alert("Por favor complete correctamente los campos");
        return await false;
      }

      const datos = this.formArrendatario;
      //   datos.append("datos", );
      try {
        const response = await Axios.post(
          "https://inmobiliaria.test/arrendatarios",
          datos,
          {}
        );
        console.log(response.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>