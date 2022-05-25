<template>
  <div class="container">
    <div class="profile">
      <h2>Maître {{lawyer.lname}} {{lawyer.fname}}</h2>
      <p>Lawyer at the bar of {{lawyer.bar}}</p>
      <h3>Skills</h3>
      <div class="skills">
        <p v-for="(skill,i) in lawyer.skills" :key="i" >{{skill}}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Profile",
  props: ["lawyer"]
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