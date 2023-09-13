import { reactive } from "vue"
export const store = reactive({

    //questi per ora non li utilizziamo
    //commentato la funzione che li chiama/genera in Home in method
    apartments: "http://127.0.0.1:8000/api/apartments",
    urlImg: "http://127.0.0.1:8000/storage/",
    apartmentsArray: [],

    urlForHomeSearch: "http://localhost:8000/api/qualcosa",
    apartmentsInXKmArray:[],
});