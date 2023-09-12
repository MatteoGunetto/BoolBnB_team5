<script>
import { store } from '../store';
import axios from 'axios'
import Card from '../components/elements/Card.vue';

export default {
    data() {
        return {
            store,
            searchAddress: '',
        }
    },
    components: {
        Card,
    },

    methods: {



        getApartment() {

            //chiamata per inviare l'indirizzo
            const searchAddress = this.$data.searchAddress;
            

            // Effettua la chiamata API a Laravel e passa il valore come parametro
            axios.get(`/api/vueAddress?searchAddress=${searchAddress}`)
                .then(response => {
                    // Gestisci la risposta qui
                })
                .catch(error => {
                    console.error(err);
                });

            //chiamata per avere gli appartamenti della query
            axios.get(store.apartments)
                .then(res => {
                    store.apartmentsArray = (res.data);
                })

                .catch(err => {
                    console.log(err);
                });


        }
    },
    //     created() {
    // this.getApartment();
    // }
}
</script>

<template>
    <!-- Hero -->
    <h1>{{ searchAddress }}</h1>
    <header class="container-fluid px-4 py-5 my-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="mb-4">
                        <div editable="rich">
                            <h2 class="display-2 fw-bold text-white">Scopri un Nuovo Modo di Abitare</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-5">
                        <div class="input-group position-relative">
                            <span><i class="bi bi-geo-alt"></i></span>
    
                            <input class="form-control w-50 rounded-3 input-lg" list="datalistOptions" id="exampleDataList" placeholder="Dove vuoi andare?" v-model="searchAddress">
    
                            <RouterLink to="/list" class="btn btn-primary btn-lg px-4 gap-3 text-white rounded btn-search" role="button" @click.prevent="getApartment">Cerca</RouterLink>
    
                        </div>
                        <!-- <datalist id="datalistOptions">
                                                <option value="San Francisco">
                                                <option value="New York">
                                                <option value="Seattle">
                                                <option value="Los Angeles">
                                                <option value="Chicago">
                                            </datalist> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Fine Header -->
    
    <!-- In Evidenza -->
    <!-- <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h1>In evidenza</h1>
                    </div>
                    <div class="col-md-4" v-for="item in 3" :key="item.id">
                        <Card />
                    </div>
                </div>
            </div> -->
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

.btn-search {
    right: 0;
    top: 0;
}
</style>
