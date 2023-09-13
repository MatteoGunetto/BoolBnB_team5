<script>
import { store } from '../store';
import axios from 'axios'

export default {
    data() {
        return {
            store,
            dynamicId: this.$route.params.id,
        }
    },

    beforeMount() {

        // chiamata per avere TUTTI gli appartamenti
        axios.get(`${store.apartments}/${this.dynamicId}`)
            .then(res => {
                store.singleApartmentArray = (res.data.apartment);
            })

            .catch(err => {
                console.log(err);
            });
    }
}
</script>

<template>
    <pre>{{ store.singleApartmentArray }}</pre>
    <section class="container-fluid hero d-flex align-items-end pb-4 text-white mb-5">
        <!-- <img :src="`${store.urlImg}${store.singleApartmentArray.image}`" alt=""> -->
        <div class="container">
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
                            <span class="ms-2">{{store.singleApartmentArray.beds}}</span>
                        </div>
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/icon-bathroom.svg">
                            <span class="ms-2">{{ store.singleApartmentArray.bathrooms }}</span>
                        </div>
                        <div class="icon-group d-flex justify-content-center align-items-center">
                            <img src="../../../public/icon-rooms.svg">
                            <span class="ms-2">{{ store.singleApartmentArray.rooms }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
    <section class="container">
    
        <pre>{{ store.singleApartmentArray }}</pre>
        <!-- Descrizione -->
        <section class="row justify-content-between">
            <div class="col-lg-7">
                <h2>Description</h2>
                <p>{{ store.singleApartmentArray.description }}</p>
    
    
                <!-- Mappa -->
                <iframe class="embed-responsive-item" frameborder="0" style="border:0" height="300px" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAwWLnZ3JzfvFKPo307-Yq0aYrkNTig4Zk&amp;q=41.530560,14.391640" allowfullscreen=""> </iframe>
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
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Inserisci nome">
                            </div>
    
                            <!-- Mail Form -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">La tua mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci mail">
                            </div>
    
                            <!-- Descrizione messaggio-->
                            <div class="mb-3">
                                <label for="message">Messaggio</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Scrivi qui il tuo messaggio"></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary text-white">Inserisci appartamento</button>
    
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Amenities -->
        <section>
            <h3>Cosa troverai</h3>
            <div class="row py-4">
                <div class="col-lg-3">
                    <ul class="list-group list-group-flush">
                        <div>
                            <li class="list-group-item"> <i class="fa-solid fa-wifi"></i> Wifi</li>
                        </div>
                        <div>
                            <li class="list-group-item"> <i class="fa-solid fa-square-parking"></i> Parking</li>
                        </div>
                    </ul>
                </div>
            </div>
        </section>
    
        <section>
            <div class="row py-4">
                <div class="col-lg-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" v-for="amenity in store.singleApartmentArray.amenities ">
                            {{ amenity.icon }}
                            {{amenity.name}}
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
    height: 300px;
    background-color: $primary;
}

.hero-title:after {
    content: '';
    width: 100%;
    border-bottom: solid 2px #fff;
    position: absolute;
    left: 0;
    bottom: -16px;
    z-index: 1;
}
</style>