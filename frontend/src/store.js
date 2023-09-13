import { reactive } from "vue"
export const store = reactive({

    apartments: "http://127.0.0.1:8000/api/apartments",
    urlImg: "http://127.0.0.1:8000/storage/",
    apartmentsArray: [],

});