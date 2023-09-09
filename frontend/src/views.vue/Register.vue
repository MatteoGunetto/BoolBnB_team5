<script>
export default {
    setup() {


        return {}
    }
}
</script>

<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
    
                    <div class="card-body">
                        <form method="POST" action="http://127.0.0.1:8000/register">
                            <input type="hidden" name="_token" value="v7EyOpNlsz4S57GlKopKk22xx00tf5trgnibN5Ey">
                            <!-- name -->
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="" required="" autocomplete="name" autofocus="">
    
                                </div>
                            </div>
                            <!-- surname -->
                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surame</label>
    
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control " name="surname" value="" required="" autocomplete="surname" autofocus="">
    
                                </div>
                            </div>
                            <!-- date of birth -->
                            <div class="mb-4 row">
                                <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>
    
                                <div class="col-md-6">
                                    <input id="dateOfBirth" type="date" class="form-control " name="dateOfBirth" value="" required="" autocomplete="surname" autofocus="">
    
                                </div>
                            </div>
                            <!-- email -->
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email">
    
                                </div>
                            </div>
                            <!-- password -->
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " name="password" required="" autocomplete="new-password">
    
                                </div>
                            </div>
                            <!-- confirm password -->
                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                                </div>
                            </div>
                            <!-- register button -->
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>

</style>