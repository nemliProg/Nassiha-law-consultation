<template>
  <Cover />
  <Second />
  <Tirth />
  <Last />
</template>

<script>
import Cover from "../components/homeComponents/Cover.vue";
import Second from "../components/homeComponents/Second_section.vue";
import Tirth from "../components/homeComponents/Tirth_section.vue";
import Last from "../components/homeComponents/Last_section.vue";

export default {
  name: "HomeView",
  components: {
    Cover,
    Second,
    Tirth,
    Last,
  }
};
</script>

<style lang="scss" >
</style>
