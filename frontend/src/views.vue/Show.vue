<script>
import { store } from '../store';
import axios from 'axios'

export default {
    data() {
        return {
            store,
            dynamicId: this.$route.params.id,
            message:{
                Content: '',
                Name:'',
                SenderEmail:'',
                apartment_id: this.$route.params.id,
            } ,
            feedbackMessage: '',
        }
    },

    beforeMount() {

        // chiamata per avere TUTTI gli appartamenti
        axios.get(`${store.apartments}/${this.dynamicId}`)
            .then(res => {
                store.singleApartmentArray = (res.data.apartment);
                console.log("singleApartmentArray", store.singleApartmentArray)
            })

            .catch(err => {
                console.log(err);
            });

    },

    methods: {
        sendmessage(){

            console.log(this.message)

            axios.post("http://127.0.0.1:8000/api/allMessages", this.message)
            .then(res => {
                console.log("log di messaggi in database: ", res.data)
                this.feedbackMessage = "Messaggio inviato correttamente"

            })
            .catch(error => {
                console.error("C'è stato un errore nell'invio:", error);
                this.feedbackMessage = "Errore nell'invio del messaggio, riprova"
            });

            // Resetta i campi dell'oggetto 
            this.message.Content = '';
            this.message.Name = '';
            this.message.SenderEmail = '';


            // Chiamo l'elemento #feedbackMessage nel dom
            var feedbackMessage = document.getElementById("feedbackMessage");

            // Fa sparire il messaggio dopo 4s
            setTimeout(function() {
                feedbackMessage.style.display = "none";
            }, 4000);
            
        }
    }
}

</script>



<template>



    <section class="container-fluid hero d-flex align-items-end text-white mb-5 p-0">
        <img class="cover" :src="`${store.urlImg}${store.singleApartmentArray.image}`" alt="cover-apartment">
        <div class="container pb-4">
            <div class="row mb-3">
                <div class="col-12">
                    <h1 class="hero-title position-relative d-inline-block">{{ store.singleApartmentArray.title }}</h1>
                </div>
            </div>
            <!-- Info camera -->
            <div class="row">
                <div class="col-md-12">
                    <div class="apt-icons d-flex gap-3 align-items-center">
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/icon-bed.svg">
                            <span class="ms-2">{{ store.singleApartmentArray.rooms }}</span>
                        </div>
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/people-icon.svg">
                            <span class="ms-2">{{store.singleApartmentArray.beds}}</span>
                        </div>
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/icon-bathroom.svg">
                            <span class="ms-2">{{ store.singleApartmentArray.bathrooms }}</span>
                        </div>
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/icon-rooms.svg">
                            <span class="ms-2">{{ store.singleApartmentArray.squareMeters }}<span style="font-size: 10px;"> /Mq</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="container">


        <!-- Descrizione -->
        <section class="row justify-content-between">
            <div class="col-lg-7">
                <h2 class="mb-0">Description</h2>
                        <!-- aggiunto anche questo, probabilmente da sistemare -->
                <section class="mb-3" style="font-size:12px">
                    <span>Rooms: {{ store.singleApartmentArray.rooms }} &middot; </span>
                    <span>Beds: {{ store.singleApartmentArray.beds }} &middot; </span>
                    <span>Bathrooms: {{ store.singleApartmentArray.bathrooms }} &middot; </span>
                    <span>{{ store.singleApartmentArray.squareMeters }} mq</span>
                </section>
                <p>{{ store.singleApartmentArray.description }}</p>


                <!-- Mappa -->
                <div class="map h-50">
                    <iframe class="embed-responsive-item" frameborder="0" style="border:0" height="100%" width="100%"
                    :src="'https://www.google.com/maps/embed/v1/place?key=AIzaSyAwWLnZ3JzfvFKPo307-Yq0aYrkNTig4Zk&q=' + store.singleApartmentArray.latitude + ',' + store.singleApartmentArray.longitude"
                    allowfullscreen=""> </iframe>

                </div>
            </div>


            <div class="col">
                <!-- Messaggio -->
                <div class="card">
                    <div class="card-header">
                        Manda un messaggio
                    </div>
                    <div class="card-body">
                        <form>
                            <!-- Nome form -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Il tuo nome</label>
                                <input v-model="message.Name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Inserisci nome">
                            </div>

                            <!-- Mail Form -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">La tua mail</label>
                                <input v-model="message.SenderEmail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci mail">
                            </div>

                            <!-- Descrizione messaggio-->
                            <div class="mb-3">
                                <label for="message">Messaggio</label>
                                <textarea v-model="message.Content" class="form-control" id="message" rows="5" placeholder="Scrivi qui il tuo messaggio"></textarea>
                            </div>

                            <div class="success-message">
                                <p :class="feedbackMessage === 'Messaggio inviato correttamente' ? 'success' : 'danger'" id="feedbackMessage">{{ feedbackMessage }}</p>
                            </div>

                            <button type="submit" class="btn btn-primary text-white" @click.prevent="sendmessage">Invia messaggio</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>

                <!-- aggiunto questo, probabilmente da sistemare -->
                <div>
            <h3>
                Host:
            </h3>
            <p>{{store.singleApartmentArray.user.name}}</p>
        </div>

        <!-- Amenities -->
        <section>
            <h3>Cosa troverai</h3>
            <div class="row py-4">
                <div class="col-lg-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center" v-for="amenity in store.singleApartmentArray.amenities ">
                            <i :class="`bi ${ amenity.icon }`" class="me-2" style="font-size: 1.2rem;"></i>
                            <font-awesome-icon :icon="`fa-solid ${ amenity.icon }`" /> {{amenity.name}}
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
</template>


<style lang="scss" scoped>
@import "../../scss/boolBnbStyle.scss";
.icon-group img {
    width: 28px;
}

.hero {
    position: relative;
    height: 300px;
}

.hero .container:first-of-type {
    z-index: 10;
}

.hero:after {
    content: ""; // ::before and ::after both require content
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(30deg, #000000e0, #ffffff00);
    opacity: 0.7;
    z-index: 5;
}

.hero .cover {
    object-fit: cover;
    position: absolute;
    height: 100%;
    width: 100%;
}

.hero-title:after {
    content: '';
    width: 100%;
    border-bottom: solid 2px #fff;
    position: absolute;
    left: 0;
    bottom: -12px;
    z-index: 1;
}

.map{
    border-radius: 16px!important;
}

.success{
    color: $primary;
}

.danger{
    color: $danger;
}
</style>


