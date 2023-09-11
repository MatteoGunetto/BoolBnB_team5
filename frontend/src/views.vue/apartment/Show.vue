<script>
export default {
    setup() {


        return {}
    }
}
</script>

<template>
    <section class="container">

        <!-- Titolo -->
        <div class="row">
            <div class="col-12 py-5">
                <h1>Titolo Appartamento</h1>
            </div>

             <!-- Immagine -->
            <div class="col-md-12">
                <img src="http://127.0.0.1:8000/storage/uploads/7hccTuuuyBbNcQKwo2ZQguNAHczrW2HmDOtckpn6.png" class="card-img-top" alt="Apartment Image">
            </div>
        </div>

         <!-- Info camera -->
        <div class="row">
            <div class="col-md-12">
                <section class="my-2">
                    <div>
                        <h3>Host: Andrea</h3>
                    </div>
                    <span>Rooms: 3 · </span>
                    <span>Beds: 5 · </span>
                    <span>Bathrooms: 3 · </span>
                    <span>72 mq</span>
                </section>
            </div>
        </div>

         <!-- Descrizione -->
        <section class="row justify-content-between">
            <div class="col-lg-7">
                <h2>Description</h2>
                <p>""defrwefregergregrere"".</p>


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
    
    </section>
</template>


<style lang="scss" scoped>

</style>