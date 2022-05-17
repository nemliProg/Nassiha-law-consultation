<template>
  <div class="container">
    <div class="profile">
      <h2>Maître Nadia Tarafi</h2>
      <p>Lawyer at the bar of Rabat</p>
      <h3>Skills</h3>
      <div class="skills">
        <p>Skills 1</p>
        <p>Skills 2</p>
        <p>Skills 3</p>
        <p>Skills 4</p>
        <p>Skills 5</p>
        <p>Skills 6</p>
        <p>Skills 7</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Profile",
  
};
</script>

<style lang="scss" scoped>
.profile {
  width: 80%;
  margin: auto;
  &>h3{
    padding: 15px 0px 5px;
  }
  .skills{
    p {
      margin-bottom: 5px;
    }
  }
}
</style>