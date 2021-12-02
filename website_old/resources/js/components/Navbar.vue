<template>
    <nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
        <a href="#" class="navbar-brand">SecuAsk</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/questionnaires">Questionnaires</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/blog">Blog</router-link>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
        </div>
    </nav>
</template>
