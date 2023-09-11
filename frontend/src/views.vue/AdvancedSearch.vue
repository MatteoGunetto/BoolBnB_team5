<script>
import Card from '../components/elements/Card.vue';
export default {
    components: {
        Card,
    }
}
</script>

<template>
    <div class="container">
        <div class="row justify-content-between">
            <h2 class="py-4">Filtra ricerca</h2>
            <div class="col-lg-4">
                <!-- search bar -->
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

                <!-- filters -->
                <!-- camere -->
                <section class="py-3">
                    <h4>Camere da letto </h4>
                    <nav aria-label="...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">4+</label>
                        </div>

                    </nav>
                </section>

                <!-- bagni -->
                <section class="py-3">
                    <h4>Bagni </h4>
                    <nav aria-label="...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">4+</label>
                        </div>

                    </nav>
                </section>

                <!-- distanza raggio 20km -->
                <section class="py-3">
                    <label for="customRange3" class="form-label">
                        <h4>
                            Distanza
                        </h4>
                    </label>
                    <input type="range" class="form-range" min="0" max="10" step="0.5" id="customRange3">
                </section>

                <!-- servizi -->
                <section>
                    <h4>Servizi </h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="Swimming pool" checked>
                            <label class="form-check-label" for="Wi-fi">Wi-fi</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value=""
                                id="Swimming pool">
                            <label class="form-check-label" for="Swimming pool">Swimming pool</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="Garage">
                            <label class="form-check-label" for="Garage">Garage</label>
                        </li>
                    </ul>
                </section>

            </div>
            <div class="col-lg-8">
                qua le cards
            </div>
        </div>
    </div>
</template>


<style lang="scss" >
.list-group {
    --bs-list-group-border-color: none;
}
</style>
