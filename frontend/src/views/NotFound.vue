<template>
  <div class="container">
    <img src="../assets/images/404-removebg.png" alt="404 error image">
    <h1>This Page Is Doesn't Exist</h1>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
  .container {
    padding: 40px 0px;
    @include d-flex(column);
    gap: 20px;
    h1 {
      color: $primary-color;
    }
    img {
      width: max(40%,250px);
    }
  }
</style>