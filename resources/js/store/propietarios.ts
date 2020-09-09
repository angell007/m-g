import PropietarioService from '../services/PropietarioService'

export default ({
    state: {
        posts: new Array,
        propietarios: new Array,
        propietario: Object,
    },

    getters: {
        getPropietarios(state: any) {
            return state.propietarios
        },
        getPropietario(state: any) {
            return state.propietario
        },
    },

    actions: {

        getPropietarios: async function (context: any) {
            const propietarios = new PropietarioService;
            const data = await propietarios.getAll()
            console.log(['propietarios', data]);
            context.commit("propietarios", data)

        },

        destroyPropietario: async function (context: any, id: number) {
            const propietarios = new PropietarioService;
            const data = await propietarios.destroyPropietario(id);
        },

        editPropietario: async function (context: any, id: number) {
            const propietarios = new PropietarioService;
            const resp = propietarios.editPropietario(id);
            context.commit("propietario", resp);
        }
    },

    mutations: {
        propietarios(state: any, data: Array<string>) {
            return state.propietarios = data
        },
        propietario(state: any, data: any) {
            return state.propietario = data
        }
    },

    modules: {
    }
})
