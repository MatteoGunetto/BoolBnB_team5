<script>
import { store } from '../../store';
import axios from 'axios'

export default {
    data() {
        return {
            store,
            searchAddress: '',
            showDialog: false,
            
        }
    },
    components: {
       
    },

    methods: {

        suggestionValue(i){


            var elements = document.getElementsByClassName("suggestion");

            console.log(elements);


            // console.log(elements[i].textContent);

            store.addressSelected = elements[i].textContent;

            this.showDialog = true;
            
        },
        
        getApartment() {


            //indirizzo inserito nella barra di ricerca che viene mandato al backend per trovare appartamenti in un raggio X (questo X è specificato nel backend)
            const addressToSend = store.addressSelected;

            // Effettua la chiamata API a Laravel e passa il valore come parametro
            axios.get(store.urlForHomeSearch , {
                        params: {
                            address: addressToSend
                        }
                    })
                .then(response => {

                    console.log("risposta tornata con successo", response.data)

                    store.apartmentsInAdvancedSearch = (response.data);
                    console.log("questo è l array nello store", store.apartmentsInAdvancedSearch)
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

        getHints(){

        // Ottieni un riferimento agli elementi con la classe address-option
        const addressOptionElements = document.querySelectorAll(".address-option");

        // Imposta il testo consigliato come ricerca del indirizzo
        addressOptionElements.forEach(function(indirizzo){
            indirizzo.addEventListener("click", function(){
                store.addressSelected = indirizzo.textContent
            });
        })
        // /api/tomtom-proxy

        if  (store.addressSelected.length > 4 ) {
                    const addressSearched = store.addressSelected;

                    //variabili per chiamata axios dei suggerimenti in home
                    let valueEncoded = encodeURIComponent(store.addressSelected);
                    let tomtomKey = 'deapGsJZBuBGHOlGUsntPZ7nSfOrRLYK';

                    let axiosUrl = `https://api.tomtom.com/search/2/geocode/${valueEncoded}.json?key=${tomtomKey}`;

                    axios.get(axiosUrl)
                    .then(response => {
                        store.suggestedAddresses = response.data.results;
                    })
                    .catch(error => {
                        console.error("C'è stato un errore:", error);
                    });

                    
                }
    
},
    mounted() {
        this.getApartment();
        //funzione per consigli indirizzi
    }
    //     created() {
    // this.getApartment();
    // }
}
}
</script>

<template>

    <div class="d-flex justify-content-center position-relative gap-2 mb-5">
        <div class="input-group">
            <input class="mainSearch form-control w-50 rounded-pill input-lg" list="datalistOptions" id="exampleDataList"  placeholder="Dove vuoi andare?" v-model="store.addressSelected" @input="getHints">
            <i class="bi bi-geo-alt" style="font-size: 1.3em"></i>
            <RouterLink to="/list" class="btn btn-primary btn-lg px-4 gap-3 text-white btn-search rounded-pill" id="button-search" role="button" @click.prevent="getApartment"><i class="bi bi-search"></i> Cerca</RouterLink>

        </div>

        <ul class="list-group position-absolute w-100 pt-2 mt-5 shadow-lg text-start" v-if="store.addressSelected !== '' && !showDialog">
            <li class="list-group-item suggestion py-3" v-for="(suggestion, i) in store.suggestedAddresses" :key="i" @click.prevent="suggestionValue(i)">{{ suggestion.address.freeformAddress, suggestion.address.country }}</li>
            
        </ul>
    
    </div>

                    <!-- <div v-for="suggestion in store.suggestedAddresses">
                        <input type="text" @click.prevent="suggestionValue" :value="`${ suggestion.address.freeformAddress }, ${ suggestion.address.country }`">
                    </div> -->
                    
</template>


<style lang="scss" scoped>
@import "../../../scss/boolBnbStyle.scss";
@import 'bootstrap-icons/font/bootstrap-icons.css';

a#button-search {
    margin-left: -100px;
    z-index: 100;
}

.suggestion{
    border-bottom: 1px solid $light;
    z-index:100;
}

.suggestion:hover{
   background-color: $primary;
   opacity: $primary-bg-subtle;
   color: $white;
   cursor: pointer;
}

.mainSearch{
    padding-left: 40px;
}

.bi-geo-alt{
    position: absolute;
    width: 50px;
    height: 100%;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    z-index: 20;
}

</style>
