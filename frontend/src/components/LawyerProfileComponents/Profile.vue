<template>
  <div class="container">
    <div class="profile">
      <h2>Maître {{lawyer.lname}} {{lawyer.fname}}</h2>
      <p>Lawyer at the bar of {{lawyer.bar}}</p>
      <h3>Skills <img v-if="v == 1" src="../../assets/icons/addIcon.svg" alt="add"></h3>
      <div class="skills">
        <p v-for="(skill,i) in lawyer.skills" :key="i" >{{skill}} <img v-if="v == 1" src="../../assets/icons/deleteIcon.svg" alt="delete"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Profile",
  props: ["lawyer","v"]
};
</script>

<style lang="scss" scoped>
.profile {
  width: 80%;
  margin: auto;
  &>h3{
    padding: 15px 0px 5px;
    display: flex;
    align-items: center;
    img {
      width: 20px;
      height: 20px;
      margin-left: 10px;
      cursor: pointer;
    }
  }
  .skills{
    p {
      margin-bottom: 5px;
      display: flex;
      align-items: center;
      img {
        width: 20px;
        height: 20px;
        margin-left: 10px;
        cursor: pointer;
      }
    }
  }
}
</style>