<script>
import { store } from '../../store.js';
export default {
    data() {
        return {
            store,
        }
    },
    props:{
        cardProp: Object,
    }
}
</script>

<template>
    <div class="card">
        <img :src="cardProp.image" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{cardProp.title}}</h5>
            <p class="card-text">{{cardProp.description}}
            </p>

            <p>
                <strong>
                    distance: 
                </strong>

                {{cardProp.distance.toFixed(2)}} km
            </p>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>