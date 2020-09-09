import Axios from "axios";

export default {
    data: () => ({
        dialog: false,
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
        search: "",
        mostrar: false,
        editedIndex: -1,
        editedItem: {
            nombre: "",
            identificacion: "",
            apellido: "",
            tipo_identificacion: "",
        },
        defaultItem: {
            nombre: "",
            identificacion: "",
            apellido: "",
            tipo_identificacion: "",
        },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1
                ? "Nuevo Propietario"
                : "Editar Propietario";
        },
        propietariosAll() {
            return this.$store.getters.getPropietarios;
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
    },

    created() {
        this.getCambio();
    },

    methods: {
        async getCambio() {
            await this.$store.dispatch("getPropietarios");
        },

        edit(item) {
            this.editedIndex = this.propietariosAll.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        destroy(item) {
            const index = this.propietariosAll.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.$store.dispatch("destroyArrendatario", item.id).then((x) => {
                    this.propietariosAll.splice(index, 1);
                    alert("Eliminado correcto");
                    this.getCambio();
                });
        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        async save() {
            if (this.editedIndex > -1) {
                console.log([this.editedItem.id, this.editedIndex]);
                try {
                    const response = await Axios.patch(
                        `https://inmobiliaria.test/propietarios/${this.editedItem.id}`,
                        this.editedItem
                    );
                    this.getCambio();
                } catch (error) {
                    console.log(error);
                }
            } else {
                try {
                    const response = await Axios.post(
                        "https://inmobiliaria.test/propietarios",
                        this.editedItem
                    );
                    this.getCambio();
                } catch (error) {
                    console.log(error);
                }
            }
            this.close();
        },
    },
};
