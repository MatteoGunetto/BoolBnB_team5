import { reactive } from "vue"
export const store = reactive({

    //questi per ora non li utilizziamo
    //commentato la funzione che li chiama/genera in Home in method
    apartments: "http://127.0.0.1:8000/api/apartments",
    urlImg: "http://127.0.0.1:8000/storage/",
    apartmentsArray: [],

    singleApartmentArray: [],





    //url che viene chiamato quando viene cercato un indirizzo in homepage
    urlForHomeSearch: "http://localhost:8000/api/qualcosa",
    //questo in realtà non mi serve, posso usare direttamente apartmentsInAdvancedSearch
    apartmentsAfterHomeSearch:[],

    // questa mi serve per popolare 
    urlForAllAmenities: "http://localhost:8000/api/allAmenities",
    allAmenities: [],

    //url che viene chiamato quando cambiano gli input/filtri nell AdvancedSearch
    urlForFilteredSearch: "http://localhost:8000/api/filteredApartments",
    //con questo arry faccio le card,
    //questo array viene popolato dopo ricerca dalla home e aggiornato dopo filtraggio
    apartmentsInAdvancedSearch: [],

    //questo viene popolato dalla home
    addressSelected : ""



});