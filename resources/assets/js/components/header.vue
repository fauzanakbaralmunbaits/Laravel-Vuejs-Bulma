<template>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
                <img src="" alt="Vue.js" width="112" height="28">
            </a>

            <!-- <div class="navbar-menu is-active">
                <a class="navbar-item" href="">
                    Home
                </a>

                <a class="navbar-item" href="">
                    About
                </a>
            </div> -->

            <a role="button" class="navbar-burger burger is-active" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>

        </div>

        <div id="navbarBasicExample" class="navbar-menu is-active">
            <div class="navbar-start">
                <router-link to="/home" class="navbar-item">Home</router-link>
                <router-link to="/about" class="navbar-item">About</router-link>
            </div>
        </div>
    </nav>

</template>
