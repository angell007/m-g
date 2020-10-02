import axios from 'axios'

class ArrendatarioService {
    async getAll() {
        const response = axios.get(`https://inmobiliaria.test/api/arrendatarios`);
        return (await response).data;
    }
    async destroyArrendatario(id: number) {
        const response = axios.delete(`https://inmobiliaria.test/api/arrendatarios/${id}`);
        return (await response).data;
    }
    async editArrendatario(id: number) {
        const response = axios.get(`https://inmobiliaria.test/api/arrendatarios/${id}`);
        return (await response).data.data;
    }
}

export default ArrendatarioService