<template>
  <h1>Welcome to NASSIHA</h1>
  <div class="container">
    <div class="side lawyer">
      <img src="../assets/illustrations/lawyer.svg" alt="lawyer" />
      <button>
        <router-link to="/authenticate/lawyer/login">Lawyer</router-link>
      </button>
    </div>
    <div class="side client">
      <img src="../assets/illustrations/client.svg" alt="client" />
      <button>
        <router-link to="/authenticate/client/login">Client</router-link>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Authenticate",
  components: {},
};
</script>

<style lang="scss" scoped>
h1 {
  font-family: $tenor;
  margin: 50px auto;
  width: max-content;
  @include before-tablet {
    font-size: 1.6rem;
  }
  @include phone {
    font-size: 1.3rem;
  }
}
.container {
  margin: 50px auto 60px;
  @include d-flex;
  .side {
    @include d-flex(column);
    width: min(500px, 40%);
    height: 450px;
    gap: 50px;
    img {
      width: 80%;
      margin: 0px auto;
    }
    button {
      width: 60%;
      padding: 15px;
      outline: none;
      border: none;
      background-color: $bg-color;
      font-size: 1.2rem;
      cursor: pointer;
      a {
        text-decoration: none;
        color: black;
      }
    }
  }
  .lawyer {
    background-color: $secondary-color;
  }
  .client {
    background-color: $tertiary-color;
  }
  @include before-tablet {
    @include d-flex(column);
    .side {
      height: 300px;
      width: min(400px, 80%);
      img {
        width: 50%;
      }
      @include phone-360 {
        height: 200px;
        button {
          a{
            font-size: 14px;
          }
        }
        img{
          display: none;
        }
      }
    }
  }
}
</style>