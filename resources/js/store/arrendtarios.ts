import ArrendatarioService from '../services/ArrendatarioService'

export default ({
    state: {
        posts: new Array,
        arrendatarios: new Array,
        arrendatario: Object,
    },

    getters: {
        getArrendatarios(state: any) {
            return state.arrendatarios
        },
        getArrendatario(state: any) {
            return state.arrendatario
        },
    },

    actions: {

        getArrendatarios: async function (context: any) {
            const arrendatarios = new ArrendatarioService;
            const data = await arrendatarios.getAll()
            console.log(['arrendatarios', data]);
            context.commit("arrendatarios", data)

        },

        destroyArrendatario: async function (context: any, id: number) {
            const arrendatarios = new ArrendatarioService;
            const data = await arrendatarios.destroyArrendatario(id);
        },

        editArrendatario: async function (context: any, id: number) {
            const arrendatarios = new ArrendatarioService;
            const resp = arrendatarios.editArrendatario(id);
            context.commit("arrendatario", resp);
        }
    },

    mutations: {
        arrendatarios(state: any, data: Array<string>) {
            return state.arrendatarios = data
        },
        arrendatario(state: any, data: any) {
            return state.arrendatario = data
        }
    },

    modules: {
    }
})
