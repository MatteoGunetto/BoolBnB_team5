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
}
</script>

<template>
    <!-- Hero -->
    <h1>{{ searchAddress }}</h1>
    <header class="container-fluid px-4 py-5 my-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto position-relative">
                    <div class="mb-4">
                        <div editable="rich">
                            <h2 class="display-2 fw-bold text-white">Scopri un Nuovo Modo di Abitare</h2>
                        </div>
                    </div>
                    <Searchbar />                    
                </div>
            </div>
        </div>
    </header>
    <!-- Fine Header -->

    

    <pre>{{ store.suggestedAddresses }}</pre>
    
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
