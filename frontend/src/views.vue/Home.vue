<script>
import { store } from '../store';
import axios from 'axios'
import Card from '../components/elements/Card.vue';
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

            //     // chiamata per avere TUTTI gli appartamenti
            //     axios.get(store.apartments)
            //         .then(res => {
            //             store.apartmentsArray = (res.data);
            //         })

            //         .catch(err => {
            //             console.log(err);
            //         });


        }


    },
    mounted() {
        //funzione per consigli indirizzi
    }
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
                        <!-- <div class="input-group position-relative">
                            <span><i class="bi bi-geo-alt"></i></span>

                            <input class="form-control w-50 rounded-3 input-lg" list="datalistOptions" id="exampleDataList" placeholder="Dove vuoi andare?" v-model="store.addressSelected">

                            <RouterLink to="/list" class="btn btn-primary btn-lg px-4 gap-3 text-white rounded btn-search" role="button" @click.prevent="getApartment">Cerca</RouterLink>

                        </div> -->
                        <!-- <datalist id="datalistOptions">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist> -->
                    </div>
                    <Searchbar />
                </div>
            </div>
        </div>
    </header>
    <!-- Fine Header -->

    <!-- In Evidenza -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1>In evidenza</h1>
            </div>
            <div class="col-md-4">
                <Card />
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
