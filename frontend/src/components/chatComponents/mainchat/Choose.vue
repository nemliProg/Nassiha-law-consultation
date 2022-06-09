<template>
  <div class="choose" :style="{ 'margin-left': sidebarWidth }">
    <div class="img-holder">
      <img src="../../../assets/logos/LOGO_Component.svg" alt="Logo">
    </div>
    <h1>Choose a Consultation</h1>
  </div>
</template>

<script>
import { sidebarWidth } from "../sidebar/state";
export default {
  name: "MainChat",
  setup() {
    return {
      sidebarWidth,
    };
  },
};
</script>

<style lang="scss" scoped>
.choose {
  position: relative;
  background-color: $bg-color;
  height: calc(100vh - 70px);
  @include d-flex(column);
  .img-holder{
    width: 30%;
    img{
      width: 100%;
    }
  }
  h1{
    font-size: 2.5rem;
    font-weight: 300;
    color: $secondary-color;
  }
}
</style>