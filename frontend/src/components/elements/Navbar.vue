<script>
export default {
    // data () {

    // }
}
</script>

<template>
    <!-- <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <RouterLink to="/login">Login<span class="visually-hidden">(current)</span></RouterLink>
        </li>
        <li class="nav-item">
            <RouterLink to="/register">Register<span class="visually-hidden">(current)</span></RouterLink>
        </li>
    </ul>
</nav> -->

<!-- Con un operatore ternario metto la nav in absolute nella home e gli attribuisco un background quando è da un altra parte -->
    <nav class="navbar navbar-expand-lg" :class="{ 'navbar-absolute': $route.path === '/' || $route.params.id, 'bg-primary' : $route.path === '/list' }">
        <div class="container">
            <RouterLink to="/" class="navbar-brand text-white">BoolBnb</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 d-flex align-items-center">
                    <li class="nav-item">
                         <a class="text-white text-decoration-none d-flex align-items-center gap-1" href="http://127.0.0.1:8000/login">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a :class="{ 'btn-primary text-white': $route.path === '/' || $route.params.id, 'bg-white text-primary' : $route.path === '/list' }" class="btn btn-primary text-decoration-none" href="http://127.0.0.1:8000/register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>



<style lang="scss" scoped>
nav {
    z-index: 10000;
}

.navbar-brand{
    font-weight: 800;
}

.navbar-absolute{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
}
</style>
