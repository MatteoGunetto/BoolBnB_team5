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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <RouterLink to="/" class="navbar-brand text-primary">BoolBnb</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8000/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8000/register">Register</a>
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
</style>
