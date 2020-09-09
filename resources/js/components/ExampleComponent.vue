<template>
  <div>
    <v-app>
      <v-main>
        <v-data-table
          :headers="headers"
          :items="arrendatariosAll"
          sort-by="identificacion"
          :search="search"
        >
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Arrendatarios</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-spacer></v-spacer>
              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
            </v-toolbar>
            <modal-component></modal-component>
            <edit-component v-if="mostrar" :mostrar="mostrar" @mostrar="mostrar=false"></edit-component>
          </template>
          <template v-slot:item="{ item }">
            <v-icon small class="mr-2" @click="edit(item)">mdi-pencil</v-icon>
            <v-icon small @click="destroy(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </v-main>
    </v-app>
  </div>
</template>
<script>
export default {
  data() {
    return {
      arrendatarios: Array,
      search: "",
      mostrar: false,
      headers: [
        {
          text: "Identificacion",
          align: "start",
          sortable: false,
          filterable: false,
          value: "identificacion",
        },
        { text: "Nombre", value: "nombre" },
        { text: "Apellido", value: "apellido" },
        { text: "Direccion", value: "direccion" },
        { text: "Telefono", value: "telefono" },
        { text: "Estado", value: "accept" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },

  mounted() {
    this.getCambio();
  },

  computed: {
    arrendatariosAll() {
      return this.$store.getters.getArrendatarios;
    },
  },

  methods: {
    async destroy(item) {
      const index = this.arrendatariosAll.indexOf(item);
      confirm("Are you sure you want to delete this item?") &&
        (await this.$store.dispatch("destroyArrendatario", item.id)) &&
        alert("Eliminado correcto");
      await this.$store.dispatch("getTest");
    },

    async edit(item) {
      await this.$store.dispatch("editArrendatario", item.id);
      this.mostrar = await true;
      console.log(this.mostrar);
    },

    async getCambio() {
      await this.$store.dispatch("getTest");
    },
  },
};
</script>
