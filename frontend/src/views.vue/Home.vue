<script>
import Card from '../components/elements/Card.vue'; // Importa il componente Card
import axios from 'axios';
import { store } from '../store';
import Searchbar from '../components/elements/Searchbar.vue';

export default {
    data() {
        return {
            store,
            searchAddress: '',
            prova: ''

        }
    },
    components: {
        Card,
        Searchbar,
    },

    methods: {

        getApartment() {

            //indirizzo inserito nella barra di ricerca che viene mandato al backend per trovare appartamenti in un raggio X (questo X è specificato nel backend)
            const addressToSend = store.addressSelected;

            // Effettua la chiamata API a Laravel e passa il valore come parametro
            axios.get(store.urlForHomeSearch, {
                params: {
                    address: addressToSend
                }
            })
                .then(response => {

                    console.log("dati che mi tornano dal backend dopo ricerca in home", response.data)
                    store.apartmentsInAdvancedSearch = (response.data);
                    console.log("questo è l array nello store, sempre popolato da barra di ricerca", store.apartmentsAfterHomeSearch)
                })
                .catch(error => {
                    console.error(error);
                });




        },

        promoApartment() {
            // Effettua una richiesta HTTP GET all'URL degli appartamenti specificato in store.apartments
            axios.get(store.urlPromoApartmentsForHome)
                .then(res => {
                    // Quando la richiesta ha successo, assegna i dati ottenuti da res.data a store.apartmentsArray
                    store.promoApartmentsArray = res.data;
                })
                .catch(err => {
                    // Se la richiesta fallisce, registra l'errore nella console per scopi di debug
                    console.error(err);
                });
        },


    },
    mounted() {
        // Chiama promoApartment() quando il componente viene montato (pagina caricata)
        this.promoApartment();
    },

    //     created() {
    // this.getApartment();
    // }
}
</script>

<template>
    <!-- Hero -->
    <h1>{{ searchAddress }}</h1>
    <header class="container-fluid px-4  text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto position-relative">
                    <div class="mb-4">
                        <div editable="rich">
                            <h2 class="display-2 fw-bold text-white">Scopri un Nuovo Modo di Abitare</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-5">

                    </div>
                    <Searchbar />
                </div>
            </div>
        </div>
    </header>
    <!-- Fine Header -->

    <!-- In Evidenza -->
    <!-- <pre>{{ store.apartmentsArray }}</pre> -->
    <div class="container">
        <div class="row row-cols-1 py-5">
            <h3 class="text-center text-primary">Appartamenti in Evidenza </h3>
        </div>

        <div class="row row-cols-3">
            <div class="col" v-for="apartment in store.promoApartmentsArray">
                <router-link style="text-decoration: none;" :to="`/show/${apartment.id}`">
                    <Card :cardProp="apartment" />
                </router-link>
            </div>
        </div>

    </div>
    <!-- Fine In Evidenza -->

    <!-- Inizio Consigliati -->
    <!-- <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h1>Consigliati</h1>
                    </div>
                    <div class="col-md-4" v-for="item in 3" :key="item.id">
                        <Card />
                    </div>
                </div>
            </div> -->
    <!-- Fine consigliati -->
</template>


<style lang="scss">
@import "../../scss/boolBnbStyle.scss";

body {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

header {
    background-image: url('../assets/images/hero-img-boolbnb.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    color: white;
    padding: 100px;
    text-align: center;
}
</style>
