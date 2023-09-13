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

            },
        };
    },
    created() {
        // Effettua una chiamata Axios per ottenere l'elenco degli appartamenti
        axios.get(store.apartments)
            .then(res => {
                store.apartmentsArray = (res.data);
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

            // Reimposta le selezioni del filtro
            this.filtro.stanze = null;
            this.filtro.bagni = null;
            this.filtro.servizi = [];
            console.log("roomsNumber:", this.filtro.roomsNumber);
            console.log("bedsNumber:", this.filtro.bedsNumber);
            console.log("bathroomsNumber:", this.filtro.bathroomsNumber);

        },
    },
    computed: {
        apartmentsFiltered() {
            // Inizia con la lista completa degli appartamenti
            let filteredSearch = this.store.apartmentsArray.apartments;

            // Filtra per il numero di stanze (roomsNumber)
            if (this.filtro.roomsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    // Restituisce true solo se il numero di stanze dell'appartamento è uguale a quello selezionato
                    return apartment.rooms === this.filtro.roomsNumber;
                });
            }

            // Filtra per il numero di letti (bedsNumber)
            if (this.filtro.bedsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    // Restituisce true solo se il numero di letti dell'appartamento è uguale a quello selezionato
                    return apartment.beds === this.filtro.bedsNumber;
                });
            }

            // Filtra per il numero di bagni (bathroomsNumber)
            if (this.filtro.bathroomsNumber !== null) {
                filteredSearch = filteredSearch.filter(apartment => {
                    // Restituisce true solo se il numero di bagni dell'appartamento è uguale a quello selezionato
                    return apartment.bathrooms === this.filtro.bathroomsNumber;
                });
            }

            // Restituisce la lista degli appartamenti filtrati
            console.log("filteredSearch:", filteredSearch);
            return filteredSearch;
        },
    }
}
</script>

<template>
    <pre>{{ store.apartmentsArray }}</pre>
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

                <!-- filters -->
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

                <!-- camere -->
                <section class="py-3">
                    <h4>Camere da letto </h4>
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

                <!-- distanza raggio 20km -->
                <section class="py-3">
                    <label for="customRange3" class="form-label">
                        <h4>
                            Distanza
                        </h4>
                    </label>
                    <input type="range" class="form-range" min="0" max="10" step="0.5" id="customRange3">
                </section>

                <!-- servizi -->
                <section>
                    <h4>Servizi </h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Wifi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Swimming pool
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Parking
                        </label>
                    </div>
                </section>

            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 g-3 p-3" v-for="apartment in  store.apartmentsArray.apartments">
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
