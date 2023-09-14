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


            //indirizzo inserito nella barra di ricerca che viene mandato al backend per trovare appartamenti in un raggio X (questo X è specificato nel backend)
            const addressToSend = this.$data.searchAddress;

            // Effettua la chiamata API a Laravel e passa il valore come parametro
            axios.get(store.urlForHomeSearch , {
                        params: {
                            address: addressToSend
                        }
                    })
                .then(response => {

                    console.log("risposta tornata con successo", response.data)
                    store.apartmentsInXKmArray = (response.data);
                    console.log("questo è l array nello store", store.apartmentsInXKmArray)
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


        },

        searchBarHome(){

        // Ottieni un riferimento agli elementi con la classe address-option
        const addressOptionElements = document.querySelectorAll(".address-option");

        // Imposta il testo consigliato come ricerca del indirizzo
        addressOptionElements.forEach(function(indirizzo){
            indirizzo.addEventListener("click", function(){
                this.$data.searchAddress.value=indirizzo.textContent
            });
        })
        // /api/tomtom-proxy

        if  (this.$data.searchAddress.length > 4 ) {
                    const addressSearched = this.$data.searchAddress.value;

                    axios.get('https://api.tomtom.com/search/2/geocode/${this.$data.searchAddress}', {
                        params: {
                            address: addressSearched
                        }
                    })
                    .then(response => {
                        console.log(this.$data.searchAddress.value, "search value")
                        let suggestedAddresses = response.data.results;

                        addressOptionElements[0].innerHTML = suggestedAddresses[0].address.freeformAddress + ", " + suggestedAddresses[0].address.country;
                        addressOptionElements[1].innerHTML = suggestedAddresses[1].address.freeformAddress + ", " + suggestedAddresses[1].address.country;
                        addressOptionElements[2].innerHTML = suggestedAddresses[2].address.freeformAddress + ", " + suggestedAddresses[2].address.country;
                    })
                    .catch(error => {
                        console.error("C'è stato un errore:", error);
                    });

                    addressOptionElements.forEach(function(element) {
                        element.style.display = "block";
                    });
                }

            
                else {
                    addressOptionElements.forEach(function(element) {
                        element.style.display = "none";

                        // questa è una porcheria, per' "quasi" funziona, lascia i bordi dei div
                        // addressOptionElements[0].innerHTML = ""
                        // addressOptionElements[1].innerHTML = ""
                        // addressOptionElements[2].innerHTML = ""
                    });
                }


        let debounceTimer;

        //eventlistener che si attiva quando cambia il valore di searchAddress che sarebbe il nostro campo input
        // searchAddress.addEventListener("input", function() {
        //     clearTimeout(debounceTimer); // Cancella qualsiasi timer esistente
        //     debounceTimer = setTimeout(() => { // Imposta un nuovo timer

                
        //     }, 500); // Il timer è impostato per mezzo secondo (500 millisecondi)

        // })     
},
    mounted() {
        //funzione per consigli indirizzi
    }
    //     created() {
    // this.getApartment();
    // }
}
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
    
                            <input class="form-control w-50 rounded-3 input-lg" list="datalistOptions" id="exampleDataList" placeholder="Dove vuoi andare?" v-model="searchAddress" @input="searchBarHome">
                            
    
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
