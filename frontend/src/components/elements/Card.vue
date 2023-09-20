<script>
import { store } from '../../store.js';
export default {
    data() {
        return {
            store,
        }
    },
    props: {
        cardProp: Object,
    },
    methods: {

    }
}
</script>

<template>

        <div class="card">
            <img :src="`${store.urlImg}${cardProp.image}`" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-direction-column">
                <div>
                    <h5 class="card-title text-primary">{{ cardProp.title }}</h5>
                    <p class="card-text mb-4">{{ cardProp.description }}</p>
                </div>

                <div class="icon-container d-flex position-relative mt-3">
                    <div class="icon d-flex align-items-center">
                        <img src="../../../public/icon-bed.svg" alt="icona-letto">
                        <span class="ms-2">{{ cardProp.rooms }}</span>
                    </div>
                    <div class="icon d-flex align-items-center ms-2">
                        <img src="../../../public/people-icon.svg" alt="icona-bagno">
                        <span class="ms-2">{{ cardProp.beds }}</span>
                    </div>
                    <div class="icon d-flex align-items-center ms-2">
                        <img src="../../../public/icon-bathroom.svg" alt="icona-appartamento">
                        <span class="ms-2">{{ cardProp.bathrooms }}</span>
                    </div>
                    <div class="icon d-flex align-items-center ms-2">
                        <img src="../../../public/icon-rooms.svg" alt="icona-appartamento">
                        <span class="ms-2">{{ cardProp.squareMeters }} Mq</span>
                    </div>


                    <div v-if="cardProp.distance" class="icon d-flex align-items-center ms-2 align-self-end">
                        <span class="ms-2">
                            <span>
                                Distance:
                            </span>
                            {{ cardProp.distance.toFixed(2) }} km
                        </span>
                    </div>
                </div>
            </div>
        </div>
</template>

<style lang="scss" scoped>
.icon img {
    filter: brightness(0.8);
}

.icon {
    color: #ADB5BD;
}

.icon-container:before {
    content: "";
    border: 0.5px solid #d2d5d7;
    position: absolute;
    right: 0;
    left: 0;
    top: -2px;
}

.icon-container {
    padding: 16px 0px 4px 0px;
}

.card-body{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card {
    margin-bottom: 50px;
}
</style>
