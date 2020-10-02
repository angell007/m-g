import axios from 'axios'

class InmuebleService {
    async getAll() {
        const response = axios.get(`https://inmobiliaria.test/api/inmuebles`);
        return (await response).data;
    }
    async destroyInmueble(id: number) {
        const response = axios.delete(`https://inmobiliaria.test/api/inmuebles/${id}`);
        return (await response).data;
    }
    async editInmueble(id: number) {
        const response = axios.get(`https://inmobiliaria.test/api/inmuebles/${id}`);
        return (await response).data.data;
    }
}

export default InmuebleService