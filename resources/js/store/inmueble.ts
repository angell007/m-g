import InmuebleService from '../services/InmuebleService'

export default ({
    state: {
        inmuebles: new Array,
        inmueble: Object,
    },

    getters: {
        getInmuebles(state: any) {
            return state.inmuebles
        },
        getInmueble(state: any) {
            return state.inmueble;
        },
    },

    actions: {

        getInmuebles: async function (context: any) {
            const inmuebles = new InmuebleService;
            const data = await inmuebles.getAll()
            context.commit("inmuebles", data)

        },

        destroyInmueble: async function (context: any, id: number) {
            const inmuebles = new InmuebleService;
            const data = await inmuebles.destroyInmueble(id);
        },

        editInmueble: async function (context: any, id: number) {
            const inmuebles = new InmuebleService;
            const resp = inmuebles.editInmueble(id);
            context.commit("inmueble", resp);
        }
    },

    mutations: {
        inmuebles(state: any, data: Array<string>) {
            console.log(['muations', data]);
            return state.inmuebles = data
        },
        inmueble(state: any, data: any) {
            return state.inmueble = data
        }
    },

    modules: {
    }
})
