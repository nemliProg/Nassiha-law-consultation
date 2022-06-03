<template>
  <div class="lawyer">
      <div>
        <div class="lawyer-photo">
          <img :src="lawyer.photo" alt="profile photo">
        </div>
        <div class="langs">
          <img src="../../assets/icons/languages/maroc.png" alt="arabic">
          <img src="../../assets/icons/languages/la-france.png" alt="frensh">
          <img src="../../assets/icons/languages/royaume-uni.png" alt="english">
        </div>
      </div>
      <div>
        <h3>Maître {{ lawyer.fname}} {{ lawyer.lname }}</h3>
        <h4>Avocat au barreau de {{ lawyer.bar }}</h4>
        <p class="lawyer-adress"><span class="adress-icon"><img src="../../assets/icons/adressIconWhite.svg" alt=""></span> {{ lawyer.adress }}</p>
        <div class="skills">
          <p v-for="(skill,i) in lawyer.skills?.slice(0,2)">{{ skill }}</p>
        </div>
        <div class="see-more">
          <span class="plus-icon"><img src="../../assets/icons/Plus.svg" alt=""></span>
          see more skills
        </div>
      </div>
      <div>
        <img src="../../assets/icons/akbarIcon.svg" alt="arrow">
      </div>
    </div>
</template>

<script>
export default {
  name : 'search item',
  props : ['lawyer']
}
</script>

<style>

</style>