<script>
export default {
    setup() {


        return {}
    }
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Modifica il tuo Appartamento</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <form>
    
                    <!-- Titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Inserisci titolo">
                    </div>
    
                    <!-- Descrizione -->
                    <div class="mb-3">
                        <label for="description">Descrizione</label>
                        <textarea class="form-control" id="description" rows="5"></textarea>
                    </div>
    
                    <!-- Numero di stanze -->
                    <div class="form-group">
                        <label for="rooms">Numero stanze:</label>
                        <select class="form-control" id="rooms">
                                <option value="" selected disabled>Seleziona il numero di stanze</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                    </div>
    
                    <!-- Numero di letti -->
                    <div class="form-group">
                        <label for="beds">Numero letti:</label>
                        <select class="form-control" id="beds">
                                <option value="" selected disabled>Seleziona il numero di letti</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                    </div>
    
                    <!-- Numero di bagni -->
                    <div class="form-group">
                        <label for="bathrooms">Numero bagni:</label>
                        <select class="form-control" id="bathrooms">
                                <option value="" selected disabled>Seleziona il numero di letti</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>
                    </div>
    
                    <!-- Dimensione appartamento -->
                    <div class="form-group">
                        <label for="squareMeters">Dimensioni appartamento</label>
                        <input required="" type="number" min="1" name="squareMeters" class="form-control" id="squareMeters" placeholder="Inserisci dimensioni in mt quadri " value="">
                    </div>
    
                    <!-- Indirizzo -->
                    <div class="mb-3">
                        <label for="address" class="form-label">indirizzo:</label>
                        <input required="" type="text" name="address" class="form-control" id="address" placeholder="Inserisci indirizzo" value="">
                    </div>
    
                    <!-- Immagine -->
                    <div class="mb-3">
                        <label for="image" class="form-label">selezionare immagine:</label>
                        <input required="" type="file" name="image" class="form-control" id="image" placeholder="selezionare immagine" value="">
                    </div>
    
                    <!-- Servizi aggiuntivi -->
                    <div class="mb-3">
                        <label for="amenities" class="form-label">Selezionare servizi aggiuntivi:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-1" value="1">
                            <label class="form-check-label" for="amenity-1">
                                        Wifi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-2" value="2">
                            <label class="form-check-label" for="amenity-2">
                                Parking
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-3" value="3">
                            <label class="form-check-label" for="amenity-3">
                                Swimming Pool
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-4" value="4">
                            <label class="form-check-label" for="amenity-4">
                                Concierge
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-5" value="5">
                            <label class="form-check-label" for="amenity-5">
                                Sauna
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-6" value="6">
                            <label class="form-check-label" for="amenity-6">
                                Sea View
                            </label>
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-primary text-white">Modifica appartamento</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>