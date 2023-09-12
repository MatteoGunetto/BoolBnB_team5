<script>
import Card from '../components/elements/Card.vue';
export default {
    components: {
        Card,
    }
}
</script>

<template>
    <!-- Hero -->
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
                        <div class="input-group">
                            <span><i class="bi bi-geo-alt"></i></span>

                            <input class="form-control w-50 rounded-3" list="datalistOptions" id="exampleDataList"
                                placeholder="Dove vuoi andare?">
                        </div>
                        <!-- <datalist id="datalistOptions">
                                <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
                            </datalist> -->
                        <a class="btn btn-primary btn-lg px-4 gap-3 text-white rounded" href="#" role="button">Cerca</a>
                    </div>
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
            <div class="col-md-4" v-for="item in 3" :key="item.id">
                <Card />
            </div>
        </div>
    </div>
    <!-- Fine In Evidenza -->
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
</style>