<script setup>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import HelloWorld from './components/HelloWorld.vue'

const size = 50;
</script>

<template>
    <img :style="`width: ${width}px; height: ${height}px`" id="main-logo" alt="Vue logo" src="./assets/logo.png" />
    <HelloWorld msg="Hello Vue 3 + Vite" />
</template>

<script>

export default {
    data() {
        return {
            count: 0,
            width: 95,
            height: 95,
            sizeLimit: 100,
            sizeMin: 10,
            iterationInterval: 500,
            interval: null,
        }
    },
    mounted() {
        this.interval = setInterval(() => {
            this.changeSize()
        }, this.iterationInterval)
    },
    beforeMount() {

    },
    beforeUnmount() {
      clearInterval(this.interval)
    },
    methods: {
        changeSize(){
            if (this.width < this.sizeLimit){
                this.width++
                this.height++
            }
        }
    }
}

// (function myLoop (i) {
//     setTimeout(function () {
//         this.size++;          //  your code here
//         if (--i) myLoop(i);      //  decrement i and call myLoop again if i > 0
//     }, 1000)
// })(100);
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
