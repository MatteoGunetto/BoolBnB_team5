<script>
import Card from '../components/elements/Card.vue';
import axios from 'axios'
import { store } from '../store';
export default {
    data() {
        return {
            store,
            filtro: {
                roomsNumber: null,
                bedsNumber: null,
                bathroomsNumber: null,
                selectedDistance: 20,
                //capire cosa va inserito per amenities, sarà probabimente un array con gli id
            },
        };
    },
    created() {

            // Effettua una chiamata Axios per ottenere l'elenco delle amenities
            axios.get(store.urlForAllAmenities)
            .then(res => {
                store.allAmenities = (res.data);
                console.log(store.allAmenities); // Controlla i dati ottenuti
            })

            .catch(err => {
                console.log(err);
            }); 
            
   

    },
    components: {
        Card,
    },
    methods: {
        filterApartments() {
            // Inizia con la lista completa degli appartamenti
            let filteredSearch = this.store.apartmentsInXKmArray;

            //Filtra per il numero di stanze (roomsNumber)
            if (this.filtro.roomsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    
                    if(this.filtro.roomsNumber == 4){
                        return apartment.rooms >= parseInt(this.filtro.roomsNumber);
                    }
                    // Restituisce true solo se il numero di stanze dell'appartamento è uguale a quello selezionato
                    return apartment.rooms === parseInt(this.filtro.roomsNumber);
                });
            }

            // Filtra per il numero di letti (bedsNumber)
            if (this.filtro.bedsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    if(this.filtro.bedsNumber == 4){
                        return apartment.beds >= parseInt(this.filtro.bedsNumber);
                    }
                    // Restituisce true solo se il numero di letti dell'appartamento è uguale a quello selezionato
                    return apartment.beds === parseInt(this.filtro.bedsNumber);
                });
            }

            // Filtra per il numero di bagni (bathroomsNumber)
            if (this.filtro.bathroomsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    if(this.filtro.bathroomsNumber == 4){
                        return apartment.bathrooms >= parseInt(this.filtro.bathroomsNumber);
                    }
                    // Restituisce true solo se il numero di bagni dell'appartamento è uguale a quello selezionato
                    return apartment.bathrooms === parseInt(this.filtro.bathroomsNumber);
                });
            }

            //Filtra per distanza massima (da rivedere la condizione, BRUTTA MA FUNZIONALE)
            if (this.filtro.selectedDistance !== 22) {
                filteredSearch = filteredSearch.filter(apartment => {
                    // Restituisce true solo se il numero di bagni dell'appartamento è uguale a quello selezionato
                    return apartment.distance <= parseInt(this.filtro.selectedDistance);
                });
            }

            // Filtra per distanza massima (da rivedere la condizione, BRUTTA MA FUNZIONALE)

            // Restituisce la lista degli appartamenti filtrati
            console.log("filteredSearch:", filteredSearch);
            return filteredSearch;
    }
    },
    computed: {
        
    }
}
</script>

<template>
    <div class="container">

        <div class="row justify-content-between">
            <h2 class="py-4">Filtra ricerca</h2>
            <div class="col-lg-4">
                <!-- search bar -->
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

                <!-- FILTERS -->


                <!-- stanze -->
                <section class="py-3">
                    <h4>Stanze </h4>
                    <nav aria-label="...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roomsOptions1" id="room1" value="1"
                                v-model="filtro.roomsNumber" @change="filterApartments">

                            <label class="form-check-label" for="room1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roomsOptions2" id="room2" value="2"
                                v-model="filtro.roomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="room2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roomsOptions3" id="room3" value="3"
                                v-model="filtro.roomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="room3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="roomsOptions4" id="room4" value="4"
                                v-model="filtro.roomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="room4">4+</label>
                        </div>

                    </nav>
                </section>

                <!-- letti -->
                <section class="py-3">
                    <h4>Letti </h4>
                    <nav aria-label="...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bedsOptions1" id="beds1" value="1"
                                v-model="filtro.bedsNumber" @change="filterApartments">
                            <label class="form-check-label" for="beds1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bedsOptions2" id="beds2" value="2"
                                v-model="filtro.bedsNumber" @change="filterApartments">
                            <label class="form-check-label" for="beds2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bedsOptions3" id="beds3" value="3"
                                v-model="filtro.bedsNumber" @change="filterApartments">
                            <label class="form-check-label" for="beds3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bedsOptions4" id="beds4" value="4"
                                v-model="filtro.bedsNumber" @change="filterApartments">
                            <label class="form-check-label" for="beds4">4+</label>
                        </div>

                    </nav>
                </section>

                <!-- bagni -->
                <section class="py-3">
                    <h4>Bagni </h4>
                    <nav aria-label="...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bathroomsOptions1" id="bathrooms1" value="1"
                                v-model="filtro.bathroomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="bathrooms1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bathroomsOptions2" id="bathrooms2" value="2"
                                v-model="filtro.bathroomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="bathrooms2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bathroomsOptions3" id="bathrooms3" value="3"
                                v-model="filtro.bathroomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="bathrooms3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bathroomsOptions4" id="bathrooms4" value="4"
                                v-model="filtro.bathroomsNumber" @change="filterApartments">
                            <label class="form-check-label" for="bathrooms4">4+</label>
                        </div>

                    </nav>
                </section>

                <!-- distanza massima da indirizzo cercato -->
                <section class="py-3">
                    <label for="customRange3" class="form-label">
                        <h4>
                            Distanza
                        </h4>
                    </label>
                    <input type="range" class="form-range" min="1" max="20" step="1" id="customRange3" 
                    v-model="filtro.selectedDistance" @change="filterApartments">
                    <div>
                        Distanza massima: {{filtro.selectedDistance}} km
                    </div>
                </section>

                <!-- servizi -->
                <section>
                    <h4>Servizi </h4>
                    <div class="form-check" v-for="amenity in store.allAmenities">
                        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{amenity.id}}
                        </label> -->
                        
                        {{amenity.name}} 


                    </div>
                </section>

            </div>
            <!-- card -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 g-3 p-3" v-for="apartment in store.apartmentsInXKmArray">
                        <Card :cardProp="apartment" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>


<style lang="scss">
.list-group {
    --bs-list-group-border-color: none;
}
</style>
