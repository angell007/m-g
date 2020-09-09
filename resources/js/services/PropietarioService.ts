import axios from 'axios'

class PropietarioService {
    async getAll() {
        const response = axios.get(`https://inmobiliaria.test/propietarios`);
        return (await response).data;
    }
    async destroyPropietario(id: number) {
        const response = axios.delete(`https://inmobiliaria.test/propietarios/${id}`);
        return (await response).data;
    }
    async editPropietario(id: number) {
        const response = axios.get(`https://inmobiliaria.test/propietarios/${id}`);
        return (await response).data.data;
    }
}

export default PropietarioService