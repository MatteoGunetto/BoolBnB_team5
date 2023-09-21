<script>
import Card from '../components/elements/Card.vue'; // Importa il componente Card
import axios from 'axios'; // Importa Axios per effettuare richieste HTTP
import { store } from '../store'; // Importa lo store (presumibilmente Vuex) per gestire lo stato globale dell'app
import Searchbar from '../components/elements/Searchbar.vue';

export default {
    data() {
        return {
            store, // Rende disponibile lo store nei dati del componente
            filtro: {
                //questo non funziona se lo passo al backend, quindi al backend gli passo direttamente store.addressSelected
                //addressInAdvancedSearch: store.addressSelected,

                roomsNumber: null, // Numero di stanze selezionato
                bedsNumber: null, // Numero di letti selezionato
                bathroomsNumber: null, // Numero di bagni selezionato
                selectedDistance: 20, // Distanza massima selezionata
                selectedAmenities: [],
            },
        };
    },
    created() {
        // Effettua una chiamata Axios per ottenere l'elenco delle amenities
        axios.get(store.urlForAllAmenities) // Effettua una richiesta GET all'URL delle amenities
            .then(res => {
                store.allAmenities = (res.data); // Imposta l'elenco delle amenities nello store
                console.log('queste sono gli id amenities', store.allAmenities); // Stampa i dati delle amenities ottenuti dalla chiamata
                //this.filterApartments();
            })
            .catch(err => {
                console.log(err); // Gestisce gli errori se la chiamata fallisce
            });
    },
    components: {
        Card,
        Searchbar
    },
    methods: {
        filterApartments() {
            axios.get(store.urlForFilteredSearch, {
                params: {
                    addressInAdvancedSearch: this.store.addressSelected,
                    roomsNumber: this.filtro.roomsNumber,
                    bedsNumber: this.filtro.bedsNumber,
                    bathroomsNumber: this.filtro.bathroomsNumber,
                    selectedDistance: this.filtro.selectedDistance,
                    selectedAmenities: JSON.stringify(this.filtro.selectedAmenities), // se desideri inviare un array come parametro, potrebbe essere utile trasformarlo in stringa
                }
            })
                .then(response => {

                    console.log("AAArisposta tornata con successo", response.data)
                    store.apartmentsInAdvancedSearch = (response.data);

                })
                .catch(error => {
                    console.error(error);
                });
        },

        // Questo metodo non serve più perchè non lo richiami (lo usi in home ma qui no)
        // promoApartment() {
        //     // Effettua una richiesta HTTP GET all'URL degli appartamenti specificato in store.apartments
        //     axios.get(store.urlPromoApartmentsForHome)
        //         .then(res => {
        //             // Quando la richiesta ha successo, assegna i dati ottenuti da res.data a store.apartmentsArray
        //             store.promoApartmentsArray = res.data;
        //         })
        //         .catch(err => {
        //             // Se la richiesta fallisce, registra l'errore nella console per scopi di debug
        //             console.error(err);
        //         });
        // },


    },
    // Questo metodo non serve più perchè non lo richiami (lo usi in home ma qui no)
    // mounted() {
    //     // Chiama promoApartment() quando il componente viene montato (pagina caricata)
    //     this.promoApartment();
    // },
    // computed: {
    //     // Puoi aggiungere calcoli basati su dati reattivi qui, se necessario
    // }
}
</script>

<template>
    <div class="container">

        <div class="row justify-content-between">
            <h2 class="py-4">Filtra ricerca</h2>
            <div class="col-lg-4">



                <!-- address -->
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">

                            <input class="form-control me-2" type="search" v-model="store.addressSelected"
                                aria-label="Search">

                            <button class="btn btn-outline-success" type="submit"
                                @click.prevent="filterApartments">Search</button>

                        </form>
                    </div>
                </nav>
                <!-- search bar
                <Searchbar /> -->



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
                        Distanza massima: {{ filtro.selectedDistance }} km
                    </div>
                </section>

                <!-- servizi -->
                <section>
                    <h4>Servizi </h4>
                    <div class="form-check" v-for="amenity in store.allAmenities" :key="amenity.id">
                        <input class="form-check-input" type="checkbox" :value="amenity.id" :id="'amenity' + amenity.id"
                            v-model="filtro.selectedAmenities" @change="filterApartments">
                        <label class="form-check-label" :for="'amenity' + amenity.id">
                            {{ amenity.name }}
                        </label>
                    </div>

                </section>

            </div>


            <!-- In Evidenza: così stampa tutti quelli in evidenza ma nel div sotto te li ristampa tutti (sia quelli in evidenza che quelli non in evidenza) -->
            <!-- <pre>{{ store.apartmentsArray }}</pre> -->
            <!-- <div class="col-lg-8">
                <div class="row">
                    <h3 class="text-center text-primary">Appartamenti in Evidenza </h3>
                </div>

                <div class="row">
                    <div class="col-md-6 g-3 p-3 text-decoration-none" v-for="apartment in store.promoApartmentsArray">
                        <router-link style="text-decoration: none;" :to="`/show/${apartment.id}`">
                            <Card :cardProp="apartment" />
                        </router-link>
                    </div>
                </div>

            </div> -->

            <!-- In evidenza: qui stampa tutti gli appartamenti: sia in evidenza che non. Bisogna fargli stampare prima gli appartamenti sponsorizzati. -->
            <!-- card -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 g-3 p-3 text-decoration-none carta"
                        v-for="apartment in store.apartmentsInAdvancedSearch" :key="apartment.id">


                        <router-link style="text-decoration: none;" :to="`/show/${apartment.id}`">
                            <Card :cardProp="apartment" class="h-100 m-0"/>
                        </router-link>
                        <!-- Badge "In Evidenza" -->
                        <span v-if="apartment.promotions.length > 0" class="badge badge-success">In Evidenza</span>
                    </div>
                    <!-- <div class="col-md-6 g-3 p-3 text-decoration-none"
                        v-for="apartment in store.apartmentsInAdvancedSearch">
                        <router-link style="text-decoration: none;" :to="`/show/${apartment.id}`" 
                        v-if="(now()->between($startDate, $endDate)) ? '' : ''">
                            <Card :cardProp="apartment" />
                        </router-link>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</template>


<style lang="scss">
.list-group {
    --bs-list-group-border-color: none;
}

/* Stile per il badge "In Evidenza" */
.badge-success {
    background-color: #4CAF50;
    /* Colore verde */
    color: #fff;
    /* Testo bianco */
    padding: 5px 10px;
    /* Spaziatura interna */
    border-radius: 5px;
    /* Bordo arrotondato */
    font-size: 14px;
    /* Dimensione del testo */
    font-weight: bold;
    /* Testo in grassetto */
    margin-top: 10px;
    /* Spaziatura superiore */
    position: absolute;
    right: 30px;
    top: 20px;

}

.carta {
    position: relative;
}
</style>

