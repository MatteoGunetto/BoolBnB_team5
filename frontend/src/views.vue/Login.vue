<script>
export default {
    setup() {


        return {}
    }
}
</script>

<template>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Login</div>
    
                    <div class="card-body">
                        <form method="POST" action="http://127.0.0.1:8000/login">
                            <input type="hidden" name="_token" value="v7EyOpNlsz4S57GlKopKk22xx00tf5trgnibN5Ey">
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email" autofocus="">
    
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " name="password" required="" autocomplete="current-password">
    
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
    
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
    
                                    <a class="btn btn-link" href="http://127.0.0.1:8000/forgot-password">
                                        Forgot Your Password?
                                    </a>
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