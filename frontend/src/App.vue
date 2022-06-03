<template>
  <Nav />
  <router-view />
  <Footer v-if="!isChat" />
</template>
<script>
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",
  components: {
    Nav,
    Footer,
  },
  mounted() {
    if (localStorage.getItem("token") !== null) {
      this.$store.dispatch("setIsLoggedIn", true);
      this.$store.dispatch("setRole", localStorage.getItem("role"));
    }
  },
  computed: {
    isChat() {
      return this.$route.name === "Chat";
    },
  },
};
</script>
<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: $poppins;
}
</style>