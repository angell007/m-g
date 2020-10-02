import axios from 'axios'
export default {
    data: () => ({
        dialog: false,
        headers: [
            { text: "Propietario", value: "propietario.nombre" },
            {
                text: "Direccion",
                align: "start",
                sortable: false,
                filterable: false,
                value: "direccion",
            },
            { text: "Ciudad", value: "ciudad" },
            { text: "Proposito", value: "proposito" },
            { text: "Canon", value: "canon" },
            { text: "Habitaciones", value: "habitaciones" },
            { text: "Tipo", value: "tipo" },
            { text: "Actions", value: "actions", sortable: false },
        ],
        propietarios: [],

        loading: true,
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
                ? "Nuevo Inmueble"
                : "Editar Inmueble";
        },
        InmueblesAll() {
            this.loading = false
            return this.$store.getters.getInmuebles;
        },

        getPropietarios() {
            return this.propietarios;
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
    },

    created() {
        this.getCambio();
        axios.get("/api/propietarios").then((resp) => {
            this.propietarios = resp.data;
        });
    },

    methods: {
        async getCambio() {
            await this.$store.dispatch("getInmuebles");
        },

        edit(item) {
            this.editedIndex = this.InmueblesAll.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },



        destroy(item) {
            const index = this.InmueblesAll.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.$store.dispatch("destroyArrendatario", item.id).then((x) => {
                    this.InmueblesAll.splice(index, 1);
                    alert("Eliminado correcto");
                    this.getCambio();
                });
        },

        ver(item) {
            try {
                window.location.href = `https://inmobiliaria.test/inmuebles/${item.id}`
            } catch (error) {
                console.log(error);
            }
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
                    const response = await axios.patch(
                        `https://inmobiliaria.test/api/inmuebles/${this.editedItem.id}`,
                        this.editedItem
                    );
                    this.getCambio();
                } catch (error) {
                    console.log(error);
                }
            } else {
                try {
                    const response = await axios.post(
                        "https://inmobiliaria.test/api/inmuebles",
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
