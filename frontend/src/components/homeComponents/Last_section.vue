<template>
<div class="last-section">
  <h3>For the first time,consult a lawyer in realtime chat<br />
  And get the answer as soon as possible.</h3>
  <router-link to="" @click="toSearch"><button>Consult a Lawyer now</button></router-link>
</div>
  
</template>

<script>
export default {
  name : "Last",
  methods:{
    toSearch(){
      if (window.localStorage.getItem('role') == 'client') {
        this.$router.push('/search');
      } else if (window.localStorage.getItem('role') == 'lawyer') {
        this.$router.push('/chat');
      }else {
        this.$router.push('/authenticate/client/login');
      }
    }
  }
}
</script>

<style lang="scss" scoped>

  .last-section {
    text-align: center;
    padding: 3rem 0px;
    h3{
      font-family: $tenor;
      font-size: 1.8rem;
      font-weight: 300;
      margin-bottom: 2rem;
    }
    a button {
      font-family: $source;
      background-color: $primary-color;
      color: white;
      padding: 15px 20px;
      letter-spacing: 3px;
      border: none;
      border-radius: 5px;
      font-size: 1.2rem;
      cursor: pointer;
    }
  }
</style>