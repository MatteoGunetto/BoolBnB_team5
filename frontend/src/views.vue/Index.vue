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
    <div class="container-fluid px-4 py-5 my-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <div editable="rich">
                            <h2 class="display-2 fw-bold">Eccoci live<span class="text-primary"> Team 5!</span></h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mb-5">
                        <input class="form-control w-50" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <!-- <datalist id="datalistOptions">
                                <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
                            </datalist> -->
                        <a class="btn btn-primary btn-lg px-4 gap-3" href="#" role="button">Cerca</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


<style lang="scss" scoped>

</style>