import axios from "axios";
import errorResponseHandler from "./errorResponseHandler";

const instance = axios.create({
    baseURL: `http://localhost:8000/api/`
});

instance.interceptors.response.use(response => response, errorResponseHandler);

export default instance;
